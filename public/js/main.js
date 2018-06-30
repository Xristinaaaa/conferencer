const validations = {
    /**
    * @name isLoginValid
    * @description checks if the login form is correctly filled with data
    * @returns {array} empty if no errors
    */
    isLoginValid: () => {
        const formData = {
            email: $("#loginEmail").val(),
            password: $("#loginPsw").val(),
        };

        let errors = {};
        if (!formData.email) {
            errors.email = 'Please add email';
        }

        if (!formData.password) {
            errors.password = 'Please enter your password';
        }
        
        return errors;
   },
   isRegistrationValid: () => {
    const formData = {
        username: $("#registerUsername").val(),
        email: $("#registerEmail").val(),
        password: $("#registerPsw").val(),
        confirmedPassword: $("#confirmPsw").val()
    };

    let errors = {};    
    if (!formData.username) {
        errors.email = 'Please add username';
    }

    if (!formData.email) {
        errors.email = 'Please add email';
    }

    if (!formData.password) {
        errors.password = 'Please enter your password';
    }

    if (!formData.confirmedPassword || formData.password != formData.confirmedPassword) {
        errors.password = 'Confirmed password does not match password';
    }

    return errors;
   },

   showLoginErrors: (errors) => {
    
    validations.clearErrors();
    
    for (let inputName in errors) {
        const errorEl = document.createElement('span');
        errorEl.textContent = errors[inputName];
        errorEl.classList.add('error-message');
        const inputWrapper = $(`input[name="${inputName}"]`).parentElement;
        
        inputWrapper.appendChild(errorEl);
    }  
   },
   
   clearErrors: () => {
        document.querySelectorAll('form .error-message').forEach(errorEl => {
           errorEl.parentElement.removeChild(errorEl);
        });
   },
};

const listeners = {
    loginSubmitted: event => {
        let loginErros = validations.isLoginValid();
    
        if (Object.keys(loginErros).length) {
            validations.showLoginErrors(loginErros);
            event.preventDefault();
        }
    }
};

$(document).ready(function () {          
    setTimeout(function() {
        $('#sendmessage').hide();
    }, 3000);
});
$(document).ready(function () {
    setTimeout(function() {
        $('#errormessage').hide();
    }, 3000);
})

window.onload = () => {
    $('#login_form').on('submit', listeners.loginSubmitted);
};