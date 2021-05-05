//Burger menu
let burger = document.getElementById('burgerMenu');
let navSide = document.getElementById('navSide');
let closeBtn = document.getElementById('closeNavSide');
let coverBlock = document.getElementById('coverBlock');

burger.onchange = function() {
    if (burger.checked) {
        coverBlock.style.zIndex = 15;
        coverBlock.style.opacity = 1;
        navSide.style.minWidth = "300px";
        navSide.style.maxWidth = "300px";
    }
}

closeBtn.onclick = () => closeSideNav();

coverBlock.onclick = () => closeSideNav();

function closeSideNav() {
    burger.checked = !burger.checked;
    coverBlock.style.zIndex = -10;
    coverBlock.style.opacity = 0;
    navSide.style.minWidth = "0px";
    navSide.style.maxWidth = "0px";
}