@extends('admin.layouts.app')

@section('title', 'Ajouter un médicament')

@section('content')
<style>
    :root {
        --medicine-primary: #312ee6;
        --medicine-primary-dark: #241fd0;
        --medicine-ink: #0b1646;
        --medicine-muted: #5d6791;
        --medicine-line: #dce3f2;
        --medicine-soft: #f4f6ff;
    }

    * {
        box-sizing: border-box;
    }

    .field {
        min-width: 0;
    }

    .control {
        width: 100%;
    }

    .control input,
    .control select {
        width: 100%;
        max-width: 100%;
    }

    .form-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .general-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 28px;
    }

    .stock-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 28px 30px;
    }

    .medicine-create {
        color: var(--medicine-ink);
        padding: 10px 0 0;
    }

    .medicine-hero {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin: 4px 0 34px;
    }

    .medicine-heading {
        display: flex;
        align-items: center;
        gap: 24px;
    }

    .back-btn,
    .hero-pill,
    .section-icon,
    .input-icon,
    .preview-empty-icon {
        display: inline-grid;
        place-items: center;
    }

    .back-btn {
        width: 68px;
        height: 68px;
        border-radius: 10px;
        background: #fff;
        border: 1px solid #e7ebf5;
        color: var(--medicine-ink);
        font-size: 25px;
        text-decoration: none;
        box-shadow: 0 14px 34px rgba(15, 23, 42, .10);
    }

    .medicine-hero h1 {
        margin: 0 0 8px;
        font-size: clamp(30px, 3vw, 42px);
        line-height: 1;
        font-weight: 800;
        letter-spacing: -.04em;
    }

    .medicine-hero p {
        margin: 0;
        color: var(--medicine-muted);
        font-size: 17px;
        font-weight: 500;
    }

    .hero-pill {
        width: 78px;
        height: 78px;
        border-radius: 50%;
        background: #fff;
        color: var(--medicine-primary);
        font-size: 36px;
        box-shadow: 0 18px 42px rgba(15, 23, 42, .12);
    }

    .medicine-card {
        background: rgba(255, 255, 255, .96);
        border: 1px solid #e1e6f1;
        border-radius: 12px;
        box-shadow: 0 20px 52px rgba(15, 23, 42, .10);
        overflow: hidden;
    }

    .medicine-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 300px;
        gap: 32px;
        padding: 28px 28px 22px;
    }

    .form-section .form-section {
        margin-top: 46px;
        padding-top: 46px;
        border-top: 1px solid var(--medicine-line);
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 28px;
        color: var(--medicine-primary);
        font-size: 19px;
        font-weight: 800;
    }

    .section-icon {
        width: 48px;
        height: 48px;
        border-radius: 11px;
        background: #f0f1ff;
        font-size: 23px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 28px 30px;
    }

    .field label {
        display: block;
        margin-bottom: 14px;
        font-weight: 800;
        font-size: 16px;
        color: var(--medicine-ink);
    }

    .required::after {
        content: ' *';
        color: #e11d48;
    }

    .control {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--medicine-primary);
        font-size: 20px;
        z-index: 2;
    }

    .control input,
    .control select {
        height: 66px;
        border: 1px solid #cfd8ea;
        border-radius: 8px;
        background: #fff;
        color: var(--medicine-ink);
        font-size: 16px;
        font-weight: 500;
        outline: none;
        padding: 0 48px 0 56px;
        transition: border-color .2s, box-shadow .2s;
    }

    .control select {
        appearance: none;
        cursor: pointer;
    }

    .control .select-chevron {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--medicine-ink);
        pointer-events: none;
    }

    .control input::placeholder {
        color: #66729c;
    }

    .control input:focus,
    .control select:focus {
        border-color: var(--medicine-primary);
        box-shadow: 0 0 0 4px rgba(49, 46, 230, .10);
    }

    .info-box {
        display: grid;
        grid-template-columns: 42px 1fr;
        gap: 18px;
        align-items: center;
        margin-top: 52px;
        padding: 28px;
        min-height: 130px;
        border: 1px solid #cbd9ff;
        border-radius: 9px;
        background: linear-gradient(135deg, #f8fbff, #f0f5ff);
        color: var(--medicine-muted);
        font-size: 16px;
    }

    .info-box i {
        color: var(--medicine-primary);
        font-size: 30px;
    }

    .info-box strong {
        display: block;
        color: var(--medicine-primary);
        font-size: 17px;
        margin-bottom: 12px;
    }

    .photo-panel {
        border: 1px solid #e1e6f1;
        border-radius: 12px;
        padding: 20px 18px 18px;
        align-self: start;
        background: #fff;
    }

    .upload-zone {
        display: grid;
        place-items: center;
        min-height: 180px;
        margin-top: 18px;
        border: 2px dashed #cbd5ee;
        border-radius: 12px;
        background: #fbfcff;
        cursor: pointer;
        text-align: center;
        padding: 18px;
        transition: border-color .2s, background .2s;
    }

    .upload-zone:hover {
        border-color: var(--medicine-primary);
        background: #f7f8ff;
    }

    .upload-zone input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .preview-empty-icon {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        margin: 0 auto 16px;
        background: #e7e5ff;
        color: var(--medicine-primary);
        font-size: 30px;
    }

    .upload-zone strong {
        display: block;
        font-size: 16px;
        margin-bottom: 10px;
    }

    .upload-zone span,
    .preview-help {
        color: var(--medicine-muted);
        font-size: 15px;
        font-weight: 500;
    }

    .preview-wrap {
        margin-top: 22px;
    }

    .preview-wrap h3 {
        margin: 0 0 16px;
        font-size: 15px;
    }

    .image-preview {
        width: 100%;
        min-height: 170px;
        border: 1px solid #e2e8f5;
        border-radius: 9px;
        background: linear-gradient(135deg, #f8fbff, #eef2ff);
        display: grid;
        place-items: center;
        overflow: hidden;
    }

    .image-preview img {
        width: 100%;
        height: 170px;
        object-fit: cover;
        display: none;
    }

    .image-preview.has-image img {
        display: block;
    }

    .image-preview.has-image .preview-help {
        display: none;
    }

    .remove-photo-btn {
        width: 100%;
        margin-top: 12px;
        min-height: 42px;
        border: 1px solid #fecaca;
        border-radius: 8px;
        background: #fff5f5;
        color: #b91c1c;
        font-weight: 800;
        cursor: pointer;
        display: none;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .remove-photo-btn.is-visible {
        display: inline-flex;
    }

    .medicine-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        padding: 26px 30px 30px;
        border-top: 1px solid var(--medicine-line);
        background: rgba(255, 255, 255, .92);
    }

    .btn {
        min-height: 64px;
        border-radius: 8px;
        border: 1px solid #cbd5ea;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 13px;
        padding: 0 28px;
        font-size: 16px;
        font-weight: 800;
        cursor: pointer;
        text-decoration: none;
        transition: transform .2s, box-shadow .2s, opacity .2s;
    }

    .btn:hover {
        transform: translateY(-1px);
    }

    .btn.secondary {
        background: #fff;
        color: var(--medicine-ink);
    }

    .btn.primary {
        min-width: 320px;
        border: 0;
        color: #fff;
        background: linear-gradient(135deg, #4f46ff, #2f20dd);
        box-shadow: 0 16px 30px rgba(49, 46, 230, .24);
    }

    .btn:disabled {
        opacity: .65;
        cursor: not-allowed;
        transform: none;
    }

    .status {
        margin: 0 30px 24px;
        padding: 14px 18px;
        border-radius: 10px;
        display: none;
        font-weight: 700;
    }

    .status.ok {
        display: block;
        background: #dcfce7;
        color: #166534;
        border: 1px solid #86efac;
    }

    .status.err {
        display: block;
        background: #fee2e2;
        color: #991b1b;
        border: 1px solid #fca5a5;
    }

    @media (max-width: 1180px) {
        .medicine-layout {
            grid-template-columns: 1fr;
        }

        .photo-panel {
            width: 100%;
            max-width: 100%;
        }
    }

    @media (max-width: 760px) {

        .medicine-heading,
        .medicine-hero,
        .medicine-actions {
            align-items: stretch;
        }

        .medicine-heading,
        .medicine-hero,
        .medicine-actions,
        .form-grid {
            flex-direction: column;
            grid-template-columns: 1fr;
        }

        .hero-pill {
            display: none;
        }

        .medicine-layout {
            padding: 20px;
        }

        .btn,
        .btn.primary {
            width: 100%;
            min-width: 0;
        }
    }
</style>
<div class="medicine-create">
    <header class="medicine-hero">
        <div class="medicine-heading">
            <a href="{{ route('medicines.index') }}" class="back-btn" aria-label="Retour à la liste des médicaments">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div>
                <h1>Ajouter un Médicament</h1>
                <p>Remplissez les informations pour ajouter un nouveau médicament</p>
            </div>
        </div>
        <div class="hero-pill" aria-hidden="true">
            <i class="fa-solid fa-capsules"></i>
        </div>
    </header>

    @if ($errors->any())
    <div class="status err" style="display:block;margin:0 0 24px;">
        <strong>Veuillez corriger les erreurs suivantes :</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form id="medicineForm" class="medicine-card" action="{{ route('medicines.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="medicine-layout">
            <div>
                <section class="form-section">
                    <h2 class="section-title"><span class="section-icon"><i class="fa-regular fa-clipboard"></i></span>Informations générales</h2>
                    <div class="general-grid">
                        <div class="field">
                            <label for="name" class="required">Nom du médicament</label>
                            <div class="control">
                                <span class="input-icon"><i class="fa-solid fa-capsules"></i></span>
                                <input id="name" name="name" value="{{ old('name') }}" required maxlength="120" placeholder="Ex : Paracétamol 500mg">
                            </div>
                        </div>
                        <div class="field">
                            <label for="unit" class="required">Unité</label>
                            <div class="control">
                                <span class="input-icon"><i class="fa-solid fa-prescription-bottle"></i></span>
                                <select id="unit" name="unit" required>
                                    <option value="">Sélectionnez l'unité</option>
                                    @foreach([
                                    'Pièce',
                                    'Boîte',
                                    'Paire',
                                    'Rouleau',
                                    'Paquet',
                                    'Flacon',
                                    'Ampoule',
                                    'Poche',
                                    'Tube',
                                    'Sachet',
                                    'ml',
                                    'Litre',
                                    'mg',
                                    'g'
                                    ] as $unit)
                                    <option value="{{ $unit }}" @selected(old('unit')===$unit)>{{ $unit }}</option>
                                    @endforeach
                                </select>
                                <span class="select-chevron"><i class="fa-solid fa-chevron-down"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <label for="category" class="required">Catégorie</label>
                            <div class="control">
                                <span class="input-icon">
                                    <i class="fa-regular fa-folder"></i>
                                </span>

                                <select name="category_id" required>
                                    <option value="">Sélectionnez une catégorie</option>

                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @selected((int) old('category_id')===$category->id)>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>

                                <span class="select-chevron">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="form-section">
                    <h2 class="section-title"><span class="section-icon"><i class="fa-solid fa-cube"></i></span>Gestion du stock</h2>
                    <div class="stock-grid">
                        <div class="field">
                            <label for="quantity" class="required">Quantité actuelle</label>
                            <div class="control">
                                <span class="input-icon"><i class="fa-solid fa-cube"></i></span>
                                <input id="quantity" name="quantity" type="number" min="0" value="{{ old('quantity') }}" required placeholder="Ex : 250">
                            </div>
                        </div>
                        <div class="field">
                            <label for="min_quantity" class="required">Stock minimum</label>
                            <div class="control">
                                <span class="input-icon"><i class="fa-solid fa-triangle-exclamation"></i></span>
                                <input id="min_quantity" name="minimum_quantity" type="number" min="0" value="{{ old('minimum_quantity') }}" required placeholder="Ex : 50">
                            </div>
                        </div>
                    </div>

                    <div class="info-box">
                        <i class="fa-solid fa-circle-info"></i>
                        <div>
                            <strong>Information</strong>
                            La quantité actuelle ne doit pas être inférieure à la quantité minimum.
                        </div>
                    </div>
                </section>
            </div>

            <aside class="photo-panel">
                <h2 class="section-title"><span class="section-icon"><i class="fa-solid fa-camera"></i></span>Photo du médicament</h2>
                <label class="upload-zone" for="image">
                    <input type="file" id="image" name="photo" accept="image/png,image/jpeg,image/jpg">
                    <span>
                        <span class="preview-empty-icon"><i class="fa-regular fa-image"></i></span>
                        <strong>Cliquez pour ajouter une photo</strong>
                        <span>PNG, JPG ou JPEG (max. 2MB)</span>
                    </span>
                </label>
                <div class="preview-wrap">
                    <h3>Aperçu</h3>
                    <div class="image-preview" id="imagePreview">
                        <img id="previewImage" alt="Aperçu du médicament">
                        <span class="preview-help">Aucune photo sélectionnée</span>
                    </div>
                    <button type="button" class="remove-photo-btn" id="removePhotoBtn">
                        <i class="fa-solid fa-trash-can"></i> Supprimer la photo
                    </button>
                </div>
            </aside>
        </div>
        <div class="medicine-actions">
            <a class="btn secondary" href="{{ route('medicines.index') }}"><i class="fa-solid fa-xmark"></i>Annuler</a>
            <button type="submit" class="btn primary" id="saveBtn"><i class="fa-regular fa-floppy-disk"></i>Ajouter le médicament</button>
        </div>
        <div class="status" id="status" aria-live="polite"></div>
    </form>
</div>

<script>
    const status = document.getElementById('status');
    const image = document.getElementById('image');
    const preview = document.getElementById('imagePreview');
    const previewImage = document.getElementById('previewImage');
    const removePhotoBtn = document.getElementById('removePhotoBtn');
    let previewUrl = null;
    image.addEventListener('change', () => {
        const file = image.files?.[0];
        if (!file) {
            clearPreview();
            return;
        }

        if (!['image/png', 'image/jpeg'].includes(file.type) || file.size > 2 * 1024 * 1024) {
            image.value = '';
            clearPreview();
            setStatus('Image invalide: PNG/JPG jusqu\'à 2Mo.', true);
            return;
        }

        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
        }

        previewUrl = URL.createObjectURL(file);
        previewImage.src = previewUrl;
        preview.classList.add('has-image');
        removePhotoBtn.classList.add('is-visible');
        setStatus('');
    });

    removePhotoBtn.addEventListener('click', () => {
        image.value = '';
        clearPreview();
        setStatus('Photo supprimée.');
    });

    function clearPreview() {
        if (previewUrl) {
            URL.revokeObjectURL(previewUrl);
            previewUrl = null;
        }
        previewImage.removeAttribute('src');
        preview.classList.remove('has-image');
        removePhotoBtn.classList.remove('is-visible');
    }

    function setStatus(message, isError = false) {
        status.textContent = message;
        status.className = message ? 'status ' + (isError ? 'err' : 'ok') : 'status';
    }
</script>
@endsection