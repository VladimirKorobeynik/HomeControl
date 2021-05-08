//Class
import Products from './mainClass/Products.js';

//functions
import { sidebarBlockShow, selectOption, setLeftValue, setRightValue } from './marketplaceEventHandler.js';

async function getProductData() {
    let response = await fetch('http://localhost/web/product.php');

    if (response.ok) { // если HTTP-статус в диапазоне 200-299
        // получаем тело ответа (см. про этот метод ниже)
        let data = await response.json();
        sessionStorage.setItem('productData', JSON.stringify(data));
    } else {
        alert("Ошибка HTTP: " + response.status);
    }
}
getProductData();

let responseData = JSON.parse(sessionStorage.getItem('productData'));

let products = new Products(responseData);

products.outProductAdmin();


// Table categories
let categoriesTable = document.getElementById('categBlockAdmin');
let categoriesTableMore = document.getElementById('categMoreAdmin');
let categoriesTableArrow = document.getElementById('arrowCategAdmin');

let arrCategOption = document.getElementsByClassName('option_categories');

sidebarBlockShow(categoriesTable, categoriesTableMore, categoriesTableArrow);

selectOption(arrCategOption);

// Product filter

let filterBlock = document.getElementById('filterBlockAdmin');
let moreFilter = document.getElementById('moreFilterAdmin');
let filterArrow = document.getElementById('filterArrowAdmin');

sidebarBlockShow(filterBlock, moreFilter, filterArrow);

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
    setLeftValue(leftInput, rightInput, leftTumbler, range, minPriceInput);
}

maxPriceInput.onblur = function() {
    rightInput.value = maxPriceInput.value;
    setRightValue(leftInput, rightInput, rightTumbler, range, maxPriceInput);
}

setLeftValue(leftInput, rightInput, leftTumbler, range, minPriceInput);

setRightValue(leftInput, rightInput, rightTumbler, range, maxPriceInput);

leftInput.addEventListener('input', function() {
    setLeftValue(leftInput, rightInput, leftTumbler, range, minPriceInput)
});
rightInput.addEventListener('input', function() {
    setRightValue(leftInput, rightInput, rightTumbler, range, maxPriceInput)
});

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

document.getElementById('addProductBtn').onclick = function() {

    modalControl(document.getElementById('addModal'), 'add');
}

//Function modal control
function modalControl(modal, modalName) {
    if (modalName == 'add') {

    }
    if (modalName == 'edit') {

    }

    let overlay = document.querySelector('.modal_bg');

    modal.childNodes[1].childNodes[3].onclick = function() {
        hideModal(modal);
    }

    overlay.classList.add('modal_bg_active');
    modal.style.display = 'block';

    overlay.addEventListener('click', function() {
        hideModal(modal);
    });

    document.body.addEventListener('keyup', function(e) {
        if (e.keyCode == 27) {
            hideModal(modal);
        }
    });
}

function hideModal(modal) {
    let overlay = document.querySelector('.modal_bg');
    modal.style.display = 'none';
    overlay.classList.remove('modal_bg_active');
}