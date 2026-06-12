<style>
    #roleTitle {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #4f46e5;
        margin-bottom: 16px;
    }

    #roleTitle i {
        color: #4f46e5;
        font-size: 14px;
    }


    h1 {
        margin: 20px 0 8px;
        font-size: 36px
    }

    .crumb {
        color: var(--muted);
        margin-bottom: 16px
    }

   
        .head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 18px;
            border-bottom: 1px solid #edf1f9
        }
    
        .btn {
            border: 1px solid #d8e0f1;
            background: #fff;
            border-radius: 10px;
            padding: 10px 14px
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
        gap: 12px;
    }

    .role-card {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 10px 6px;
        text-align: center;
        cursor: pointer;
        background: #fff;
        transition: .2s;
    }

    .role-card:hover {
        border-color: #6d5dfc;
    }

    .role-card.active {
        border: 2px solid #6d5dfc;
        background: #faf9ff;
    }

    .role-card i {
        font-size: 16px;
        color: #6d5dfc;
        display: block;
        margin-bottom: 8px;
    }

    .role-card span {
        display: block;
        font-size: 11px;
        font-weight: 600;
        color: #374151;
        line-height: 1.3;
    }

    #step2 {
        display: grid;
        grid-template-columns: 330px 1fr;
        gap: 22px;
        align-items: start;
    }

    #step2.hidden {
        display: none;
    }

    .role-panel {
        margin-top: 0;
        border: 1px solid #dfe5f3;
        border-radius: 8px;
        padding: 18px;
        background: #fbfaff;
    }

    #roleTitle {
        font-size: 13px !important;
        color: #4f46e5 !important;
        margin-bottom: 16px !important;
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
        <div id="step2" class="hidden">

            <div class="role-left">
                <label class="req">Select Role</label>

                <div class="role-grid">
                    <div class="role-card active" data-role="driver">
                        <i class="fa-solid fa-truck-medical"></i>
                        <span>Driver</span>
                    </div>

                    <div class="role-card" data-role="nurse">
                        <i class="fa-solid fa-user-nurse"></i>
                        <span>Nurse</span>
                    </div>

                    <div class="role-card" data-role="general_doctor">
                        <i class="fa-solid fa-user-doctor"></i>
                        <span>General<br>Doctor</span>
                    </div>

                    <div class="role-card" data-role="specialist_doctor">
                        <i class="fa-solid fa-briefcase-medical"></i>
                        <span>Specialist<br>Doctor</span>
                    </div>
                </div>
            </div>

            <div class="role-panel">
                <h3 id="roleTitle">
                    <i class="fa-solid fa-truck-medical"></i>
                    Driver Information
                </h3>

                <div class="form">
                    <div id="f-specialty">
                        <label class="req">Specialty</label>
                        <select name="specialty">
                            <option value="">Select specialty</option>
                            <option>Cardiology</option>
                            <option>Pediatrics</option>
                            <option>Orthopedics</option>
                            <option>Dermatology</option>
                        </select>
                    </div>

                    <div>
                        <label class="req">License Number</label>
                        <input name="license_number" placeholder="Enter license number" required>
                    </div>

                    <div>
                        <label class="req">Experience Years</label>
                        <input name="experience_years" type="number" min="0" max="60" required>
                    </div>

                    <div id="f-diploma" class="hidden">
                        <label>Diploma</label>
                        <input name="diploma" placeholder="Enter diploma">
                    </div>
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

    function showValidationErrors(errors) {
        statusBox.className = 'status err';
        statusBox.innerHTML = errors.map(e =>
            `<div style="color:#dc2626;margin:5px 0">${e}</div>`
        ).join('');
    }

    function getStepOneErrors() {
        const errors = [];

        if (!form.name.value.trim()) {
            errors.push('الاسم إجباري.');
        }

        if (!form.email.value.trim()) {
            errors.push('البريد الإلكتروني إجباري.');
        }

        if (!form.phone.value.trim()) {
            errors.push('رقم الهاتف إجباري.');
        }

        if (!form.role.value) {
            errors.push('الرجاء اختيار الدور.');
        }

        if (!form.password.value) {
            errors.push('كلمة المرور إجبارية.');
        }

        if (!form.password_confirmation.value) {
            errors.push('تأكيد كلمة المرور إجباري.');
        }

        return errors;
    }

    function isEmailAlreadyUsedError(data) {
        const duplicateMessages = [
            'validation.unique',
            'The email has already been taken.',
            'Email déjà utilisé.',
            'هذا الإيميل ديجا مستعمل / Email déjà utilisé.'
        ];
        const emailErrors = data?.errors?.email || [];
        return emailErrors.some(message => duplicateMessages.includes(message)) || duplicateMessages.includes(data?.message);
    }

    function showEmailAlreadyUsedError() {
        setStep(1);
        form.email.focus();
        setStatus('هذا الإيميل ديجا مستعمل / Email déjà utilisé.', true);
    }

    async function checkDuplicates() {
        const params = new URLSearchParams({
            name: form.name.value.trim(),
            email: form.email.value.trim().toLowerCase(),
            phone: form.phone.value.trim()
        });

        const res = await fetch(`/api/users/check-duplicates?${params.toString()}`, {
            headers: {
                'Accept': 'application/json'
            },
            credentials: 'same-origin'
        });

        const data = await res.json();

        if (!res.ok) {
            throw new Error(data?.message || 'تعذر التحقق من البيانات.');
        }

        const errors = [];

        if (data.name_exists) {
            errors.push('الاسم مستعمل من قبل.');
        }

        if (data.email_exists) {
            errors.push('الإيميل مستعمل من قبل.');
        }

        if (data.phone_exists) {
            errors.push('رقم الهاتف مستعمل من قبل.');
        }

        return errors;
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
        const icons = {
            driver: 'fa-truck-medical',
            nurse: 'fa-user-nurse',
            general_doctor: 'fa-user-doctor',
            specialist_doctor: 'fa-briefcase-medical'
        };
        roleTitle.innerHTML = `<i class="fa-solid ${icons[role] || 'fa-user'}"></i> ${(names[role] || 'Role')} Information`;
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
            const errors = getStepOneErrors();
            if (errors.length) {
                showValidationErrors(errors);
                return;
            }

            if (!form.name.checkValidity() || !form.email.checkValidity() || !form.phone.checkValidity() || !form.role.checkValidity() || !form.password.checkValidity() || !form.password_confirmation.checkValidity()) {
                form.reportValidity();
                setStatus('Please verify the highlighted fields.', true);
                return;
            }

            const allErrors = [];

            if (form.password.value !== form.password_confirmation.value) {
                allErrors.push('تأكيد كلمة المرور غير مطابق.');
            }

            nextBtn.disabled = true;

            try {
                const duplicateErrors = await checkDuplicates();

                allErrors.push(...duplicateErrors);

                if (allErrors.length > 0) {

                    statusBox.innerHTML = allErrors.map(error =>
                        `<div style="color:#dc2626;margin:4px 0;">• ${error}</div>`
                    ).join('');

                    setStep(1);

                    if (allErrors.some(e => e.includes('كلمة المرور'))) {
                        form.password_confirmation.focus();
                    } else if (allErrors.some(e => e.includes('الاسم'))) {
                        form.name.focus();
                    } else if (allErrors.some(e => e.includes('الإيميل'))) {
                        form.email.focus();
                    } else if (allErrors.some(e => e.includes('الهاتف'))) {
                        form.phone.focus();
                    }

                    return;
                }

            } catch (err) {
                setStatus(err.message || 'تعذر التحقق من البيانات.', true);
                return;
            } finally {
                nextBtn.disabled = false;
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
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
                const headers = {
                    'Accept': 'application/json'
                };
                if (csrfToken) headers['X-CSRF-TOKEN'] = csrfToken;
                const res = await fetch('/api/register', {
                    method: 'POST',
                    headers,
                    credentials: 'same-origin',
                    body: formData
                });
                const contentType = res.headers.get('content-type') || '';
                const data = contentType.includes('application/json') ? await res.json() : null;
                if (!res.ok) {

                    if (data?.errors?.name) {
                        setStep(1);
                        form.name.focus();
                        throw new Error(data.errors.name[0]);
                    }

                    if (data?.errors?.email) {
                        setStep(1);
                        form.email.focus();
                        throw new Error(data.errors.email[0]);
                    }

                    if (data?.errors?.phone) {
                        setStep(1);
                        form.phone.focus();
                        throw new Error(data.errors.phone[0]);
                    }

                    let first = data?.errors ?
                        Object.values(data.errors)[0]?.[0] :
                        null;

                    if (first === 'validation.confirmed') {
                        first = 'Confirmation du mot de passe invalide.';
                    }

                    throw new Error(
                        first || data?.message || 'Creation failed. Please try again.'
                    );
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