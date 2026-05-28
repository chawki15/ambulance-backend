<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ajouter utilisateur | Admin</title>
    <style>
        :root {
            --bg: #f5f7fc;
            --surface: #fff;
            --border: #e4eaf5;
            --primary: #4f46e5;
            --text: #16223b;
            --muted: #617191;
            --danger: #dc2626;
            --success: #16a34a
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            background: var(--bg);
            font-family: "Segoe UI", Tahoma, Arial, sans-serif;
            color: var(--text)
        }

        .layout {
            display: flex;
            min-height: 100vh
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #182a56, #0f1d3a);
            color: #eef2ff;
            padding: 22px 16px
        }

        .brand {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 24px
        }

        .ttl {
            font-size: 12px;
            opacity: .7;
            margin: 14px 8px;
            text-transform: uppercase;
            letter-spacing: 1px
        }

        .item {
            display: block;
            color: inherit;
            text-decoration: none;
            padding: 12px;
            border-radius: 10px;
            margin: 4px 0;
            font-weight: 600
        }

        .item.active {
            background: linear-gradient(90deg, #5f54ff, #4f46e5)
        }

        .main {
            flex: 1;
            padding: 24px
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 14px 18px
        }

        .search {
            min-width: 300px;
            border: 1px solid #d6dff0;
            border-radius: 10px;
            padding: 10px 14px
        }

        h1 {
            margin: 20px 0 8px;
            font-size: 36px
        }

        .crumb {
            color: var(--muted);
            margin-bottom: 16px
        }

        .panel {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 20px
        }

        .steps {
            display: flex;
            gap: 18px;
            padding-bottom: 14px;
            border-bottom: 1px solid #e9eef8;
            margin-bottom: 16px
        }

        .step {
            font-size: 13px;
            color: #6b7a96;
            font-weight: 600
        }

        .step b {
            display: inline-flex;
            width: 22px;
            height: 22px;
            border-radius: 999px;
            background: #eef1ff;
            color: #4338ca;
            align-items: center;
            justify-content: center;
            margin-right: 8px
        }

        .step.active b {
            background: #4f46e5;
            color: #fff
        }

        .grid {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 16px
        }

        .photo {
            border: 1px dashed #cfd8ed;
            border-radius: 12px;
            padding: 14px;
            text-align: center
        }

        .avatar {
            width: 66px;
            height: 66px;
            border-radius: 999px;
            background: #ebe8ff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px
        }

        .form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 6px
        }

        .req::after {
            content: ' *';
            color: var(--danger)
        }

        input,
        select {
            width: 100%;
            border: 1px solid #d6dff0;
            border-radius: 10px;
            padding: 11px 12px
        }

        .full {
            grid-column: 1/-1
        }

        .role-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px
        }

        .role-card {
            border: 1px solid #d6dff0;
            border-radius: 10px;
            padding: 12px;
            text-align: center;
            cursor: pointer
        }

        .role-card.active {
            border-color: #4f46e5;
            box-shadow: 0 0 0 2px #ece9ff;
            color: #4338ca;
            font-weight: 700
        }

        .role-panel,
        .review-card {
            margin-top: 12px;
            border: 1px solid #e4eaf5;
            border-radius: 10px;
            padding: 14px;
            background: #fcfdff
        }

        .switches {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 10px
        }

        .review-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px
        }

        .k {
            color: var(--muted)
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px
        }

        .btn {
            padding: 10px 15px;
            border-radius: 10px;
            border: 1px solid #d1dbef;
            background: #fff;
            font-weight: 700
        }

        .btn.primary {
            background: linear-gradient(90deg, #5f54ff, #4f46e5);
            color: #fff;
            border: 0
        }

        .status {
            margin-top: 10px;
            font-size: 14px
        }

        .ok {
            color: var(--success)
        }

        .err {
            color: var(--danger)
        }

        .hidden {
            display: none
        }
    </style>
</head>

<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="brand">StockSystem</div>
            <div class="ttl">Principal</div><a class="item" href="/admin/home">Tableau de bord</a><a class="item active" href="/admin/users">Utilisateurs</a><a class="item" href="/admin/medicines">Médicaments</a><a class="item" href="/admin/stock-movements/in">Mouvements de stock</a>
        </aside>
        <main class="main">
            <div class="topbar">
                <div>☰</div><input class="search" placeholder="Rechercher..." disabled>
                <div>Admin</div>
            </div>
            <h1>Add New User</h1>
            <div class="crumb">Home › Users › Add New User</div>
            <div class="panel">
                <div class="steps">
                    <div class="step active" id="s1"><b>1</b>Basic Information</div>
                    <div class="step" id="s2"><b>2</b>Role & Profile Information</div>
                    <div class="step" id="s3"><b>3</b>Review & Confirm</div>
                </div>
                <form id="create-user-form" novalidate>
                    <div id="step1">
                        <div class="grid">
                            <div class="photo">
                                <div class="avatar" id="avatarPreview">📷</div><strong>Upload Photo (optionnel)</strong><br><small>JPG/PNG max 2Mo (preview uniquement)</small><br><br><input id="photo" type="file" accept="image/png,image/jpeg,image/jpg">
                            </div>
                            <div class="form">
                                <div><label class="req">Full Name</label><input name="name" required minlength="3"></div>
                                <div><label class="req">Email Address</label><input name="email" type="email" required></div>
                                <div><label class="req">Phone Number</label><input name="phone" required pattern="^\+?[0-9\s\-]{8,20}$"></div>
                                <div><label class="req">Role</label><select name="role" id="roleSelect" required>
                                        <option value="">Select role</option>
                                        <option value="driver">Driver</option>
                                        <option value="nurse">Nurse</option>
                                        <option value="general_doctor">General Doctor</option>
                                        <option value="specialist_doctor">Specialist Doctor</option>
                                    </select></div>
                                <div><label class="req">Mot de passe</label><input name="password" type="password" required minlength="10"></div>
                                <div><label class="req">Confirm Mot de passe</label><input name="password_confirmation" type="password" required minlength="10"></div>
                            </div>
                        </div>
                    </div>
                    <div id="step2" class="hidden"><label class="req">Select Role</label>
                        <div class="role-grid">
                            <div class="role-card" data-role="driver">Driver</div>
                            <div class="role-card" data-role="nurse">Nurse</div>
                            <div class="role-card" data-role="general_doctor">General Doctor</div>
                            <div class="role-card" data-role="specialist_doctor">Specialist Doctor</div>
                        </div>
                        <small style="color:#7a88a4;display:block;margin-top:10px">Please fill in the information specific to the selected role.</small>
                        <div class="role-panel">
                            <h3 id="roleTitle" style="margin:0 0 10px;color:#4338ca">Specialist Doctor Information</h3>
                            <div class="form">
                                <div id="f-specialty"><label class="req">Specialty</label><select name="specialty">
                                        <option value="">Select specialty</option>
                                        <option>Cardiology</option>
                                        <option>Pediatrics</option>
                                        <option>Orthopedics</option>
                                        <option>Dermatology</option>
                                    </select></div>
                                <div><label class="req">License Number</label><input name="license_number" placeholder="Enter license number" required></div>
                                <div><label class="req">Experience Years</label><input name="experience_years" type="number" min="0" max="60" required></div>
                                <div id="f-diploma" class="hidden"><label>Diploma</label><input name="diploma" placeholder="Enter diploma"></div>
                            </div>
                            <div class="switches" id="availabilitySwitches">
                                <div><label>Is Available</label><select name="is_available">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select></div>
                                <div><label>Is Active</label><select name="is_active">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select></div>
                            </div>
                        </div>
                    </div>
                    <div id="step3" class="hidden">
                        <h3>Review & Confirm</h3>
                        <div class="review-grid">
                            <div class="review-card" id="reviewBasic"></div>
                            <div class="review-card" id="reviewRole"></div>
                        </div>
                    </div>
                    <div class="actions"><button type="button" class="btn" id="prevBtn">Previous</button><button type="button" class="btn primary" id="nextBtn">Next Step →</button></div>
                    <div class="status" id="status" role="status" aria-live="polite"></div>
                </form>
            </div>
        </main>
    </div>
    <script>
        const form = document.getElementById('create-user-form'),
            statusBox = document.getElementById('status'),
            nextBtn = document.getElementById('nextBtn'),
            prevBtn = document.getElementById('prevBtn');
        const step1 = document.getElementById('step1'),
            step2 = document.getElementById('step2'),
            step3 = document.getElementById('step3');
        let currentStep = 1;
        let isSubmitting = false;
        const roleSelect = document.getElementById('roleSelect');
        const roleCards = [...document.querySelectorAll('.role-card')];
        const roleTitle = document.getElementById('roleTitle');
        const fSpecialty = document.getElementById('f-specialty');
        const fDiploma = document.getElementById('f-diploma');
        const photo = document.getElementById('photo'),
            avatarPreview = document.getElementById('avatarPreview');
        const DRAFT_KEY = 'admin_user_create_draft_v1';
        photo.addEventListener('change', () => {
            const f = photo.files?.[0];
            if (!f) return;
            if (!['image/jpeg', 'image/png'].includes(f.type) || f.size > 2 * 1024 * 1024) {
                photo.value = '';
                setStatus('Only JPG/PNG up to 2Mo.', true);
                return;
            }
            const r = new FileReader();
            r.onload = () => avatarPreview.innerHTML = `<img src="${r.result}" style="width:100%;height:100%;object-fit:cover;border-radius:999px">`;
            r.readAsDataURL(f);
            saveDraft();
        });

        function setStatus(m, e = false) {
            statusBox.textContent = m;
            statusBox.className = 'status ' + (e ? 'err' : 'ok')
        }

        function strongPassword(v) {
            return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\s]).{10,}$/.test(v)
        }

        function setStep(n) {
            currentStep = n;
            step1.classList.toggle('hidden', n !== 1);
            step2.classList.toggle('hidden', n !== 2);
            step3.classList.toggle('hidden', n !== 3);
            ['s1', 's2', 's3'].forEach((id, i) => document.getElementById(id).classList.toggle('active', n === i + 1));
            prevBtn.style.visibility = n === 1 ? 'hidden' : 'visible';
            nextBtn.textContent = n === 3 ? 'Create User' : 'Next Step →';
        }

        function syncRoleUI(role) {
            roleCards.forEach(c => c.classList.toggle('active', c.dataset.role === role));
            const names = {
                driver: 'Driver',
                nurse: 'Nurse',
                general_doctor: 'General Doctor',
                specialist_doctor: 'Specialist Doctor'
            };
            roleTitle.textContent = (names[role] || 'Role') + ' Information';
            fSpecialty.classList.toggle('hidden', role === 'driver');
            fDiploma.classList.toggle('hidden', role !== 'nurse');
            const showSwitches = !['driver', 'nurse'].includes(role);
            document.getElementById('availabilitySwitches').classList.toggle('hidden', !showSwitches);
            if (!showSwitches) {
                form.is_available.value = '1';
                form.is_active.value = '1';
            }
        }

        function fillReview() {
            document.getElementById('reviewBasic').innerHTML = `<h4>Basic Information</h4><p><span class='k'>Full Name:</span> ${form.name.value}</p><p><span class='k'>Email:</span> ${form.email.value}</p><p><span class='k'>Phone:</span> ${form.phone.value}</p><p><span class='k'>Role:</span> ${form.role.value}</p>`;
            document.getElementById('reviewRole').innerHTML = `<h4>Role Information</h4><p><span class='k'>License:</span> ${form.license_number.value}</p><p><span class='k'>Experience:</span> ${form.experience_years.value} years</p><p><span class='k'>Specialty:</span> ${form.specialty.value||'-'}</p><p><span class='k'>Available:</span> ${form.is_available.value==='1'?'Yes':'No'}</p><p><span class='k'>Active:</span> ${form.is_active.value==='1'?'Yes':'No'}</p>`
        }

        function saveDraft() {
            const d = {
                name: form.name.value,
                email: form.email.value,
                phone: form.phone.value,
                role: form.role.value,
                password: form.password.value,
                password_confirmation: form.password_confirmation.value,
                specialty: form.specialty.value,
                license_number: form.license_number.value,
                experience_years: form.experience_years.value,
                diploma: form.diploma.value,
                is_available: form.is_available.value,
                is_active: form.is_active.value,
                currentStep
            };
            localStorage.setItem(DRAFT_KEY, JSON.stringify(d));
        }

        function loadDraft() {
            try {
                const raw = localStorage.getItem(DRAFT_KEY);
                if (!raw) return;
                const d = JSON.parse(raw);
                Object.keys(d).forEach(k => {
                    if (form[k] && d[k] != null) form[k].value = d[k];
                });
                syncRoleUI(form.role.value);
                setStep([1, 2, 3].includes(Number(d.currentStep)) ? Number(d.currentStep) : 1);
                if (currentStep === 3) fillReview();
                if (form.name.value || form.email.value) setStatus('Draft restored after refresh.');
            } catch (e) {}
        }
        roleSelect.addEventListener('change', () => {
            syncRoleUI(roleSelect.value);
            saveDraft();
        });
        roleCards.forEach(c => c.addEventListener('click', () => {
            roleSelect.value = c.dataset.role;
            syncRoleUI(c.dataset.role);
            saveDraft();
        }));
        prevBtn.addEventListener('click', () => {
            if (currentStep > 1) {
                setStep(currentStep - 1);
                saveDraft();
            }
        });
        nextBtn.addEventListener('click', async () => {
            setStatus('');
            if (currentStep === 1) {
                if (!form.name.checkValidity() || !form.email.checkValidity() || !form.phone.checkValidity() || !form.role.checkValidity() || !form.password.checkValidity() || !form.password_confirmation.checkValidity()) {
                    form.reportValidity();
                    setStatus('Please fill required fields.', true);
                    return;
                }
                if (form.password.value !== form.password_confirmation.value) {
                    setStatus('Password confirmation does not match.', true);
                    return;
                }
                if (!strongPassword(form.password.value)) {
                    setStatus('Password too weak.', true);
                    return;
                }
                setStep(2);
                syncRoleUI(form.role.value);
                saveDraft();
                return;
            }
            if (currentStep === 2) {
                if (!form.license_number.value.trim() || !form.experience_years.value) {
                    setStatus('Complete role fields.', true);
                    return;
                }
                fillReview();
                setStep(3);
                saveDraft();
                return;
            }
            if (currentStep === 3) {
                if (isSubmitting) return;
                isSubmitting = true;
                nextBtn.disabled = true;
                setStatus('Creating user...');
                const formData = new FormData();
                ['name', 'email', 'phone', 'password', 'password_confirmation', 'role', 'specialty', 'license_number', 'experience_years', 'diploma', 'is_available', 'is_active'].forEach(k => formData.append(k, form[k]?.value ?? ''));
                formData.set('email', form.email.value.trim().toLowerCase());
                if (photo.files?.[0]) formData.append('profile_photo', photo.files[0]);
                try {
                    const res = await fetch('/api/register', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        credentials: 'same-origin',
                        body: formData
                    });
                    const data = await res.json();
                    if (!res.ok) {
                        let first = data?.errors ? Object.values(data.errors)[0]?.[0] : null;
                        if (first === 'validation.unique') first = 'Email déjà utilisé.';
                        if (first === 'validation.confirmed') first = 'Confirmation du mot de passe invalide.';
                        throw new Error(first || data.message || 'Creation failed.');
                    }
                    setStatus('User created successfully. Redirecting...');
                    localStorage.removeItem(DRAFT_KEY);
                    form.reset();
                    avatarPreview.textContent = '📷';
                    setTimeout(() => {
                        window.location.href = '/admin/users';
                    }, 800);
                } catch (err) {
                    setStatus(err.message || 'Unexpected error.', true)
                } finally {
                    nextBtn.disabled = false;
                    isSubmitting = false;
                }
            }
        });
        form.addEventListener('input', saveDraft);
        form.addEventListener('change', saveDraft);
        setStep(1);
        syncRoleUI('');
        loadDraft();
    </script>
</body>

</html>