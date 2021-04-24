//Header burger menu
let burger = document.getElementById('burgerMenu');
let mobileMenu = document.getElementById('mobMenu');

burger.onchange = function() {
    if (burger.checked) {
        mobileMenu.style.maxHeight = "233px";
        mobileMenu.style.fontSize = "16px";
        // mobileMenu.style.borderTop = "5px solid #53C0C3";
        mobileMenu.style.borderBottom = "5px solid #53C0C3";
    } else {
        mobileMenu.style.maxHeight = 0;
        mobileMenu.style.fontSize = "0px";
        // mobileMenu.style.borderTop = "none";
        mobileMenu.style.borderBottom = "none";
    }
}