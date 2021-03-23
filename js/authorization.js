let logForm = document.getElementById("loginForm");
let regForm = document.getElementById("registerForm");

// ==== Form Registration ====
let backToLofinFormBtn = document.getElementById("backToLoginForm");

//Back to loginForm from registration
backToLofinFormBtn.onclick = function() {
    regForm.style.opacity = 0;
    regForm.style.zIndex = -2;
    logForm.style.opacity = 1;
    logForm.style.zIndex = 5;
}

//Show password
let showPassBtnReg = document.getElementById("hidePassReg");
let passFieldReg = document.getElementById("regPassword");
let passRepeatFieldReg = document.getElementById("repeatPassword");

showPassBtnReg.onclick = function() {
    if (passFieldReg.getAttribute("type") == "password") {
        showPassBtnReg.classList.remove("fa-eye-slash");
        showPassBtnReg.classList.add("fa-eye");
        passFieldReg.setAttribute("type", "text");
        passRepeatFieldReg.setAttribute("type", "text");
    } else {
        showPassBtnReg.classList.remove("fa-eye");
        showPassBtnReg.classList.add("fa-eye-slash");
        passFieldReg.setAttribute("type", "password");
        passRepeatFieldReg.setAttribute("type", "password");
    }
}

// ==== Form Authorization ====
let regBtn = document.getElementById("loginRegisterBtn");

//Go to the registrationForm
regBtn.onclick = function() {
    logForm.style.opacity = 0;
    logForm.style.zIndex = -2;
    regForm.style.opacity = 1;
    regForm.style.zIndex = 5;
}

//Show password
let showPassBtn = document.getElementById("hidePass");
let passField = document.getElementById("password");

showPassBtn.onclick = function() {
    if (passField.getAttribute("type") == "password") {
        showPassBtn.classList.remove("fa-eye-slash");
        showPassBtn.classList.add("fa-eye");
        passField.setAttribute("type", "text");
    } else {
        showPassBtn.classList.remove("fa-eye");
        showPassBtn.classList.add("fa-eye-slash");
        passField.setAttribute("type", "password");
    }
}