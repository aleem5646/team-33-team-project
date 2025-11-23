document.addEventListener('DOMContentLoaded', () => {

    const modal = document.getElementById('2fa-modal');
    const modalForm = document.getElementById('2fa-form');
    const modalUserId = document.getElementById('2fa_user_id');
    const modalCodeInput = document.getElementById('2fa_code');
    const modalError = document.getElementById('2fa-error');
    const modalVerifyButton = document.getElementById('2fa-verify-button');
    const modalCloseButton = document.getElementById('2fa-close-button');

    const loginForm = document.querySelector(`form[action='${window.appRoutes.login}']`);
    const registrationForm = document.querySelector(`form[action='${window.appRoutes.registration}']`);
    
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    function showModal(userId) {
        modalUserId.value = userId; 
        modalCodeInput.value = '';  
        modalError.textContent = ''; 
        modal.classList.remove('hidden'); 
    }

    function hideModal() {
        modal.classList.add('hidden'); 
    }

    document.querySelectorAll('[data-toggle-password-for]').forEach(button => {
        button.addEventListener('click', () => {
            const targetInputId = button.dataset.togglePasswordFor;
            if (!targetInputId) return;

            const input = document.getElementById(targetInputId);
            if (!input) return;

            const eyeIcon = button.children[0];
            const eyeSlashIcon = button.children[1];

            if (input.type === 'password') {
                input.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeSlashIcon.classList.remove('hidden');
            } else {
                input.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeSlashIcon.classList.add('hidden');
            }
        });
    });

    function clearFormErrors() {
        const loginError = document.getElementById('login-error');
        if (loginError) loginError.textContent = '';
        
        const regErrors = ['first_name-error', 'last_name-error', 'email-error', 'hashed_password-error'];
        regErrors.forEach(id => {
            const el = document.getElementById(id);
            if (el) el.textContent = '';
        });
    }

    if (modalForm) {
        modalForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            modalError.textContent = '';
            modalVerifyButton.disabled = true;
            modalVerifyButton.textContent = 'Verifying...';

            const formData = new FormData(modalForm);

            try {
                const response = await fetch(window.appRoutes.verifyCode, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken, 
                        'Accept': 'application/json',
                    },
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Verification failed.');
                }

                if (data.status === 'success') {
                    window.location.href = data.redirect;
                }

            } catch (error) {
                modalError.textContent = error.message;
            } finally {
                modalVerifyButton.disabled = false;
                modalVerifyButton.textContent = 'Verify';
            }
        });
    }

    if (modalCloseButton) {
        modalCloseButton.addEventListener('click', hideModal);
    }
    async function handleAuthFormSubmit(e) {
        e.preventDefault();
        const form = e.target;
        const submitButton = form.querySelector('button[type="submit"]');
        clearFormErrors();

        submitButton.disabled = true;
        submitButton.textContent = 'Please wait...';

        try {
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                },
            });
            
            const data = await response.json();
            if (response.ok) {
                if (data.status === '2fa_required') {
                    showModal(data.userId); 
                }
            } else if (response.status === 401) {
                const errorContainer = document.getElementById('login-error');
                if (errorContainer) {
                    errorContainer.textContent = data.message;
                }
            } else if (response.status === 422) {
                const errors = data.errors;
                for (const field in errors) {
                    const errorContainer = document.getElementById(`${field}-error`);
                    if (errorContainer) {
                        errorContainer.textContent = errors[field][0];
                    }
                }
            } else {
                throw new Error(data.message || 'An unknown error occurred.');
            }
        } catch (error) {
           
            const errorContainer = document.getElementById('login-error');
            if (errorContainer) {
                errorContainer.textContent = 'A network error occurred. Please try again.';
            } else {
                alert('A network error occurred. Please try again.');
            }
        } finally {
            submitButton.disabled = false;
            if(form === loginForm) submitButton.textContent = 'Login';
            if(form === registrationForm) submitButton.textContent = 'Sign Up';
        }
    }

    if (loginForm) {
        loginForm.addEventListener('submit', handleAuthFormSubmit);
    }
    if (registrationForm) {
        registrationForm.addEventListener('submit', handleAuthFormSubmit);
    }
});