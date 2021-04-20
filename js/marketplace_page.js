//Categories select 
let categories = document.getElementById('categBlock');
let categoriesMore = document.getElementById('categMore');
let categoriesArrow = document.getElementById('arrowCateg');

let arrCategOption = document.getElementsByClassName('option_categories');

categoriesMore.style.maxHeight = categoriesMore.scrollHeight + "px";
categoriesArrow.style.transform = "rotate(0deg)";
categories.addEventListener('click', function() {
    if (categoriesMore.style.maxHeight) {
        categoriesMore.style.maxHeight = null;
        categoriesArrow.style.transform = "rotate(-90deg)";
    } else {
        categoriesMore.style.maxHeight = categoriesMore.scrollHeight + "px";
        categoriesArrow.style.transform = "rotate(0deg)";
    }
});

let oldSelected;
for (let i = 0; i < arrCategOption.length; i++) {
    arrCategOption[i].addEventListener('click', function() {
        let selectedElem = i;
        let countSelectedElem = document.getElementsByClassName('selected_categ_option');

        if (countSelectedElem.length == 0) {
            arrCategOption[selectedElem].classList.add('selected_categ_option');
            oldSelected = selectedElem;
        } else if (selectedElem == oldSelected) {
            arrCategOption[oldSelected].classList.remove('selected_categ_option');
        } else {
            arrCategOption[oldSelected].classList.remove('selected_categ_option');
            arrCategOption[selectedElem].classList.add('selected_categ_option');
            oldSelected = selectedElem;
        }
    });
}

//Filter
let filter = document.getElementById('filterBlock');
let filterMore = document.getElementById('moreFilter');
let filterArrow = document.getElementById('filterCateg');

filterMore.style.maxHeight = filterMore.scrollHeight + "px";
filterArrow.style.transform = "rotate(0deg)";

filter.addEventListener('click', function() {
    if (filterMore.style.maxHeight) {
        filterMore.style.maxHeight = null;
        filterArrow.style.transform = "rotate(-90deg)";
    } else {
        filterMore.style.maxHeight = filterMore.scrollHeight + "px";
        filterArrow.style.transform = "rotate(0deg)";
    }
});


//Filter slider
let leftInput;
let rightInput;

let leftTumbler;
let rightTumbler;
let range;

let minPriceInput;
let maxPriceInput;

if (window.innerWidth > 1080) {
    leftInput = document.getElementById('inputLeft');
    rightInput = document.getElementById('inputRight');

    leftTumbler = document.getElementById('leftTumb');
    rightTumbler = document.getElementById('rightTumb');
    range = document.getElementById('range');

    minPriceInput = document.getElementById('minPrice');
    maxPriceInput = document.getElementById('maxPrice');
} else {
    leftInput = document.getElementById('inputLeftMob');
    rightInput = document.getElementById('inputRightMob');

    leftTumbler = document.getElementById('leftTumbMob');
    rightTumbler = document.getElementById('rightTumbMob');
    range = document.getElementById('rangeMob');

    minPriceInput = document.getElementById('minPriceMob');
    maxPriceInput = document.getElementById('maxPriceMob');
}

minPriceInput.onblur = function() {
    leftInput.value = minPriceInput.value;
    setLeftValue();
}

maxPriceInput.onblur = function() {
    rightInput.value = maxPriceInput.value;
    setRightValue();
}

function setLeftValue() {
    let field = leftInput;
    let min = parseInt(field.min);
    let max = parseInt(field.max);

    field.value = Math.min(parseInt(field.value), parseInt(rightInput.value) - 1);

    let percent = ((field.value - min) / (max - min)) * 100;

    leftTumbler.style.left = percent + '%';
    range.style.left = percent + '%';

    minPriceInput.value = field.value;
}

setLeftValue();

function setRightValue() {
    let field = rightInput;
    let min = parseInt(field.min);
    let max = parseInt(field.max);

    field.value = Math.max(parseInt(field.value), parseInt(leftInput.value));

    let percent = ((field.value - min) / (max - min)) * 100;

    rightTumbler.style.right = (100 - percent) + '%';
    range.style.right = (100 - percent) + '%';

    maxPriceInput.value = field.value;

}

setRightValue();

leftInput.addEventListener('input', setLeftValue);
rightInput.addEventListener('input', setRightValue);

leftInput.addEventListener('mouseover', function() {
    leftTumbler.classList.add('hover');
});
leftInput.addEventListener('mouseout', function() {
    leftTumbler.classList.remove('hover');
});
leftInput.addEventListener('mousedown', function() {
    leftTumbler.classList.add('active');
});
leftInput.addEventListener('mouseout', function() {
    leftTumbler.classList.remove('active');
});


rightInput.addEventListener('mouseover', function() {
    rightTumbler.classList.add('hover');
});
rightInput.addEventListener('mouseout', function() {
    rightTumbler.classList.remove('hover');
});
rightInput.addEventListener('mousedown', function() {
    rightTumbler.classList.add('active');
});
rightInput.addEventListener('mouseout', function() {
    rightTumbler.classList.remove('active');
});


//View mode 
let firstMode = document.getElementById('mode1');
let secondeMode = document.getElementById('mode2');
let modeContainer = document.getElementById('modeCont');
let arrCardProduct = Array.from(document.getElementsByClassName('card_wrapper'));

firstMode.onchange = function() {
    if (firstMode.checked) {
        modeContainer.style.left = 2 + "px";
        arrCardProduct.map(elem => {
            elem.classList.remove('card_mode_tile_long')
            elem.classList.add('card_mode_tile');
            //Card more description animation
            elem.onmouseover = function() {
                elem.childNodes[1].childNodes[5].style.maxHeight = elem.childNodes[1].childNodes[5].scrollHeight + "px";
                elem.childNodes[1].style.position = "absolute";
                elem.childNodes[1].childNodes[5].style.padding = "15px";
                elem.childNodes[1].style.zIndex = "10";
            }
            elem.onmouseout = function() {
                elem.childNodes[1].childNodes[5].style.maxHeight = null;
                elem.childNodes[1].style.position = "relative";
                elem.childNodes[1].childNodes[5].style.padding = "0 15px";
                elem.childNodes[1].style.zIndex = "0";
            }
        });
    }
}

let eventOnChange = new Event('change');
firstMode.dispatchEvent(eventOnChange);

window.onresize = function() {
    if (window.innerWidth < 690 && !firstMode.checked) {
        firstMode.checked = true;
        firstMode.dispatchEvent(eventOnChange);
    }
}

secondeMode.onchange = function() {
    if (secondeMode.checked) {
        modeContainer.style.left = 46 + "px";
        arrCardProduct.map(elem => {
            if (!elem.classList.contains('card_viewed')) {
                elem.classList.remove('card_mode_tile');
                elem.classList.add('card_mode_tile_long')
                elem.onmouseover = function() {};
                elem.onmouseout = function() {};
            }
        });
    }
}


//Select 
let selectHeader = Array.from(document.getElementsByClassName('select_header'));
let selectBody = Array.from(document.getElementsByClassName('select_body'));

selectHeader.forEach(element => {
    element.addEventListener('click', function() {
        this.parentElement.classList.toggle('select_active');
    });
});

//Viewed Carousel
$(document).ready(function() {
    $(".owl-carousel").owlCarousel({
        items: 4,
        // loop: true,
        // autoplay: true,
        nav: true,
        navText: ['<img src="photo/owlPrev.png">', '<img src="photo/owlNext.png">'],
        margin: 15,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            420: {
                items: 1,
                nav: false
            },
            650: {
                items: 2,
                nav: false,
            },
            1025: {
                items: 3,
            },
            1250: {
                items: 4,
            }

        },
    });
});

//Burger menu
let bodyMarketplace = document.getElementById('bodyMarketplace');
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
        bodyMarketplace.style.overflow = "hidden";
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
    bodyMarketplace.style.overflow = "visible";
}

//Filter mobile
let filterMobileBtn = document.getElementById('filterActiveBtn');
let filterMob = document.getElementById('filterMob');
let coverBlockFilter = document.getElementById('coverBlockFilter');

filterMobileBtn.onclick = function() {
    coverBlockFilter.style.zIndex = 15;
    coverBlockFilter.style.opacity = 1;
    filterMob.style.opacity = 1;
    filterMob.style.zIndex = 16;
    bodyMarketplace.style.overflow = "hidden";
}

coverBlockFilter.onclick = function() {
    coverBlockFilter.style.zIndex = -10;
    coverBlockFilter.style.opacity = 0;
    filterMob.style.opacity = 0;
    filterMob.style.zIndex = -10;
    bodyMarketplace.style.overflow = "visible";
}