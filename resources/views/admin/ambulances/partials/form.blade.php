@php
    $selectedType = old('type', $ambulance->type);
    $isCustomType = $selectedType && ! in_array($selectedType, $types, true);
@endphp

<style>
    .ambulance-form-page {
        padding: 24px 18px 48px;
    }

    .ambulance-form-breadcrumb {
        align-items: center;
        color: #64748b;
        display: flex;
        gap: 14px;
        font-size: 15px;
        font-weight: 600;
        margin: 0 0 28px;
    }

    .ambulance-form-breadcrumb span:last-child {
        color: #3157ff;
        font-weight: 800;
    }

    .ambulance-form-hero {
        align-items: center;
        display: flex;
        gap: 24px;
        margin-bottom: 32px;
    }

    .ambulance-form-hero-icon {
        align-items: center;
        background: linear-gradient(135deg, #eef0ff, #f8f7ff);
        border-radius: 999px;
        color: #4f46e5;
        display: flex;
        flex: 0 0 104px;
        font-size: 38px;
        height: 104px;
        justify-content: center;
        width: 104px;
    }

    .ambulance-form-hero h1 {
        color: #0f172a;
        font-size: 34px;
        font-weight: 900;
        margin: 0 0 10px;
    }

    .ambulance-form-hero p {
        color: #64748b;
        font-size: 18px;
        margin: 0;
    }

    .ambulance-form-panel {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        box-shadow: 0 18px 45px rgba(15, 23, 42, .08);
        padding: 26px 38px 38px;
    }

    .ambulance-form-section-title {
        align-items: center;
        border-bottom: 1px solid #dfe5ef;
        color: #0f172a;
        display: flex;
        font-size: 23px;
        font-weight: 900;
        gap: 18px;
        margin-bottom: 34px;
        padding-bottom: 18px;
    }

    .ambulance-form-section-title-icon {
        align-items: center;
        background: #eef0ff;
        border-radius: 12px;
        color: #3157ff;
        display: flex;
        height: 52px;
        justify-content: center;
        width: 52px;
    }

    .ambulance-form {
        display: grid;
        gap: 30px 48px;
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .ambulance-field label,
    .ambulance-status legend {
        color: #0f172a;
        display: block;
        font-size: 18px;
        font-weight: 900;
        margin-bottom: 16px;
    }

    .required {
        color: #0f172a;
    }

    .ambulance-input-wrap {
        position: relative;
    }

    .ambulance-input-icon {
        color: #64748b;
        font-size: 19px;
        left: 20px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1;
    }

    .ambulance-input,
    .ambulance-select {
        background: #fff;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        color: #64748b;
        font-size: 18px;
        height: 62px;
        outline: 0;
        padding: 0 54px;
        transition: .2s ease;
        width: 100%;
    }

    .ambulance-select {
        appearance: none;
    }

    .ambulance-select-chevron,
    .ambulance-date-icon-right {
        color: #475569;
        font-size: 18px;
        pointer-events: none;
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
    }

    .ambulance-date-icon-right {
        display: none;
    }

    .ambulance-input::placeholder {
        color: #64748b;
    }

    .ambulance-input:focus,
    .ambulance-select:focus {
        border-color: #635bff;
        box-shadow: 0 0 0 2px rgba(99, 91, 255, .24);
    }

    .custom-type-helper {
        color: #64748b;
        font-size: 14px;
        margin: 12px 0 0;
    }

    .custom-type-field[hidden] {
        display: none;
    }

    .ambulance-status {
        border: 1px solid #dfe5ef;
        border-radius: 12px;
        display: flex;
        gap: 18px;
        grid-column: 1 / -1;
        margin: 0;
        padding: 18px;
    }

    .ambulance-status legend {
        font-size: 16px;
        padding: 0 8px;
    }

    .ambulance-status label {
        align-items: center;
        color: #334155;
        display: flex;
        font-size: 15px;
        font-weight: 700;
        gap: 8px;
        margin: 0;
    }

    .form-actions {
        align-items: center;
        display: flex;
        gap: 20px;
        grid-column: 1 / -1;
        justify-content: flex-end;
        margin-top: 22px;
    }

    .form-button {
        align-items: center;
        border-radius: 10px;
        cursor: pointer;
        display: inline-flex;
        font-size: 20px;
        font-weight: 900;
        gap: 14px;
        height: 64px;
        justify-content: center;
        min-width: 184px;
        padding: 0 34px;
        text-decoration: none;
    }

    .form-button-primary {
        background: linear-gradient(135deg, #5138f5, #4f46e5);
        border: 0;
        box-shadow: 0 12px 22px rgba(79, 70, 229, .22);
        color: #fff;
        min-width: 344px;
    }

    .form-button-secondary {
        background: #fff;
        border: 1px solid #cbd5e1;
        color: #1f2937;
    }

    .form-error {
        color: #dc2626;
        font-size: 13px;
        font-weight: 700;
        margin-top: 8px;
    }

    @media (max-width: 1100px) {
        .ambulance-form {
            gap: 24px;
            grid-template-columns: 1fr;
        }

        .ambulance-status,
        .form-actions {
            grid-column: auto;
        }
    }

    @media (max-width: 768px) {
        .ambulance-form-page {
            padding: 18px 0 36px;
        }

        .ambulance-form-hero {
            align-items: flex-start;
            flex-direction: column;
        }

        .ambulance-form-panel {
            padding: 22px 18px 28px;
        }

        .form-actions {
            align-items: stretch;
            flex-direction: column-reverse;
        }

        .form-button,
        .form-button-primary {
            min-width: 100%;
            width: 100%;
        }
    }
</style>

<div class="ambulance-form-page">
    <div class="ambulance-form-breadcrumb">
        <span>Accueil</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span>Ambulances</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span>{{ $breadcrumbLabel }}</span>
    </div>

    <div class="ambulance-form-hero">
        <div class="ambulance-form-hero-icon">
            <i class="fa-solid fa-truck-medical"></i>
        </div>

        <div>
            <h1>{{ $pageTitle }}</h1>
            <p>{{ $pageDescription }}</p>
        </div>
    </div>

    <div class="ambulance-form-panel">
        <div class="ambulance-form-section-title">
            <span class="ambulance-form-section-title-icon">
                <i class="fa-solid fa-circle-info"></i>
            </span>
            Informations de l'ambulance
        </div>

        <form class="ambulance-form" action="{{ $action }}" method="POST">
            @csrf
            @if($method !== 'POST')
                @method($method)
            @endif

            <div class="ambulance-field">
                <label for="type">Type d'ambulance <span class="required">*</span></label>
                <div class="ambulance-input-wrap">
                    <i class="fa-solid fa-truck-medical ambulance-input-icon"></i>
                    <select class="ambulance-select" id="type" name="type" required>
                        <option value="">Sélectionnez le type d'ambulance</option>
                        @foreach($types as $type)
                            <option value="{{ $type }}" @selected(! $isCustomType && $selectedType === $type)>{{ $type }}</option>
                        @endforeach
                        <option value="__other" @selected($isCustomType || old('type') === '__other')>Autre</option>
                    </select>
                    <i class="fa-solid fa-chevron-down ambulance-select-chevron"></i>
                </div>
                @error('type')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="ambulance-field">
                <label for="registration">Numéro d'immatriculation <span class="required">*</span></label>
                <div class="ambulance-input-wrap">
                    <i class="fa-regular fa-id-card ambulance-input-icon"></i>
                    <input class="ambulance-input" id="registration" name="registration" type="text" value="{{ old('registration', $ambulance->registration) }}" placeholder="Ex: 12345-A-1" required>
                </div>
                @error('registration')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="ambulance-field custom-type-field" id="customTypeField" @if(! $isCustomType && old('type') !== '__other') hidden @endif>
                <label for="new_type">Nouveau type (si autre)</label>
                <div class="ambulance-input-wrap">
                    <i class="fa-solid fa-wrench ambulance-input-icon"></i>
                    <input class="ambulance-input" id="new_type" name="new_type" type="text" value="{{ old('new_type', $isCustomType ? $selectedType : '') }}" placeholder="Ex: Ambulance néonatale">
                </div>
                <p class="custom-type-helper">Ce champ apparaît seulement si vous choisissez "Autre"</p>
                @error('new_type')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="ambulance-field">
                <label for="license_expiry">Date d'expiration de la licence <span class="required">*</span></label>
                <div class="ambulance-input-wrap">
                    <i class="fa-regular fa-calendar ambulance-input-icon"></i>
                    <input class="ambulance-input" id="license_expiry" name="license_expiry" type="date" value="{{ old('license_expiry', $ambulance->license_expiry?->format('Y-m-d')) }}" required>
                    <i class="fa-regular fa-calendar ambulance-date-icon-right"></i>
                </div>
                @error('license_expiry')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            @if($showStatus)
                <fieldset class="ambulance-status">
                    <legend>Statut</legend>
                    @foreach(['available' => 'Disponible', 'mission' => 'En mission', 'maintenance' => 'Maintenance'] as $value => $label)
                        <label>
                            <input type="radio" name="status" value="{{ $value }}" @checked(old('status', $ambulance->status ?? 'available') === $value)>
                            {{ $label }}
                        </label>
                    @endforeach
                </fieldset>
            @endif

            <div class="form-actions">
                <a class="form-button form-button-secondary" href="{{ route('ambulances.index') }}">
                    <i class="fa-solid fa-xmark"></i>
                    Annuler
                </a>
                <button class="form-button form-button-primary" type="submit">
                    <i class="fa-regular fa-floppy-disk"></i>
                    {{ $submitLabel }}
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    const typeSelect = document.getElementById('type');
    const customTypeField = document.getElementById('customTypeField');
    const newTypeInput = document.getElementById('new_type');

    function toggleCustomType() {
        const isOther = typeSelect.value === '__other';
        customTypeField.hidden = !isOther;
        newTypeInput.required = isOther;
    }

    typeSelect.addEventListener('change', toggleCustomType);
    toggleCustomType();
</script>
@endpush