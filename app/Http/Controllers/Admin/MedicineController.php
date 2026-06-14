<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Medicine;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class MedicineController extends Controller
{
    private const PHOTO_MAX_WIDTH = 600;
    private const PHOTO_MAX_HEIGHT = 450;
    private const JPEG_QUALITY = 82;
    private const PNG_COMPRESSION = 8;


    public function index()
    {
        $medicines = Medicine::with('category')->latest()->paginate(10);
        $stats = [
            'total' => Medicine::count(),
            'available' => Medicine::whereColumn('quantity', '>', 'minimum_quantity')->count(),
            'low' => Medicine::whereColumn('quantity', '<=', 'minimum_quantity')
                ->where('quantity', '>', 0)
                ->count(),
            'out' => Medicine::where('quantity', 0)->count(),
        ];

        return view('admin.medicines.index', compact('medicines', 'stats'));
    }

    public function create()
    {
        return view('admin.medicines.create', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:120'],
            'unit' => ['required', 'string', 'max:50'],
            'quantity' => ['required', 'integer', 'min:0', 'gte:minimum_quantity'],
            'minimum_quantity' => ['required', 'integer', 'min:0'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $this->storeResizedPhoto($request->file('photo'));
        }

        Medicine::create($validated);

        return redirect()->route('medicines.index')->with('success', 'Médicament ajouté avec succès.');
    }

    private function storeResizedPhoto(UploadedFile $photo): string
    {
        $imageInfo = getimagesize($photo->getRealPath());

        if ($imageInfo === false) {
            throw ValidationException::withMessages([
                'photo' => 'La photo sélectionnée est invalide.',
            ]);
        }

        [$width, $height, $type] = $imageInfo;
        $source = match ($type) {
            IMAGETYPE_JPEG => imagecreatefromjpeg($photo->getRealPath()),
            IMAGETYPE_PNG => imagecreatefrompng($photo->getRealPath()),
            default => false,
        };

        if ($source === false) {
            throw ValidationException::withMessages([
                'photo' => 'La photo doit être au format JPG, JPEG ou PNG.',
            ]);
        }

        $ratio = min(self::PHOTO_MAX_WIDTH / $width, self::PHOTO_MAX_HEIGHT / $height, 1);
        $newWidth = (int) round($width * $ratio);
        $newHeight = (int) round($height * $ratio);

        $resized = imagecreatetruecolor($newWidth, $newHeight);

        if ($type === IMAGETYPE_PNG) {
            imagealphablending($resized, false);
            imagesavealpha($resized, true);
        }

        imagecopyresampled($resized, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        ob_start();
        if ($type === IMAGETYPE_PNG) {
            imagepng($resized, null, self::PNG_COMPRESSION);
        } else {
            imagejpeg($resized, null, self::JPEG_QUALITY);
        }
        $contents = ob_get_clean();

        imagedestroy($source);
        imagedestroy($resized);

        $path = $photo->hashName('medicines');
        Storage::disk('public')->put($path, $contents);

        return $path;
    }
}

