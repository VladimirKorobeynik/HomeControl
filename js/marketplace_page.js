//Class
import Products from './mainClass/Products.js';
import Cart from './mainClass/Cart.js';
import Order from './mainClass/Order.js';

//Functions
import { sidebarBlockShow, selectOption, setRightValue, setLeftValue, setEventContacts } from './marketplaceEventHandler.js';

let cart = new Cart();
cart.loadCurrentProduct();

//Categories select 
let categories = document.getElementById('categBlock');
let categoriesMore = document.getElementById('categMore');
let categoriesArrow = document.getElementById('arrowCateg');

let arrCategOption = document.getElementsByClassName('option_categories');

sidebarBlockShow(categories, categoriesMore, categoriesArrow);

selectOption(arrCategOption);

//Filter
let filter = document.getElementById('filterBlock');
let filterMore = document.getElementById('moreFilter');
let filterArrow = document.getElementById('filterCateg');

sidebarBlockShow(filter, filterMore, filterArrow);

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

//Viewed Carousel (owl-carousel)
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


//Filter mobile
let bodyMarketplace = document.getElementById('bodyMarketplace');
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


const addToCart = (img) => {
    let id = $(img).attr("product_id");
    let price = $(img).attr("price");
    let name = $(img).attr("name");

    let cartElement = (window.innerWidth < 1080) ? '.burger_menu' : '.cart_block';

    $(img).clone().css({
        'position': 'absolute',
        'z-index': 1000,
        'width': '20%',
        'left': $(img).offset()['left'],
        'top': $(img).offset()['top'],
        'border-radius': '20px',

    }).appendTo('.fly_product').animate({
        top: $(cartElement).offset()['top'],
        left: $(cartElement).offset()['left'],
        opacity: 0,
        width: 40
    }, 1000, function() {
        $(this).remove();
        $('.added_product_messagebox').show().animate({
            top: 100,
            opacity: 1
        });
    });
    setTimeout(function() {
        $('.added_product_messagebox').fadeOut(500).animate({
            top: 0,
            opacity: 0
        })
    }, 2000);
    setTimeout(function() {
        document.getElementById('cartCounter').innerHTML = +document.getElementById('cartCounter').innerHTML + 1;
    }, 1000);

    cart.addProduct({
        device_id: id,
        countBuy: 0,
        price: price,
        name: name
    });
    localStorage.setItem('basketArray', JSON.stringify(cart.cartContainer));
};

//Open cart
arrCardProduct.map((elem, index) => elem
    .childNodes[1]
    .childNodes[7]
    .childNodes[3]
    .addEventListener('click', function() {
        addToCart(elem.childNodes[1].childNodes[1].childNodes[1]);
    })
);

//Cart open event
document.getElementById('cartLink').onclick = function() {
    modalControl(document.getElementById('cart'), 'cart');
}

document.getElementById('cartLinkSide').onclick = function() {
    modalControl(document.getElementById('cart'), 'cart');
}

$(".add_to_cart").click(event => {
    addToCart(document.getElementById($(event.target).attr("product_id")));
});

async function checkout() {
    let json = localStorage.getItem('basketArray');
    await fetch('https://test.sandstone.kh.ua/parts/checkout.php?products=' + encodeURI(json));
}

//Order open event
document.getElementById('checkout').onclick = function() {
    if (cart.getCountAddedProduct() > 0 && document.cookie != '') {
        checkout();
        hideModal(document.getElementById('cart'));
        modalControl(document.getElementById('order'), 'order');

        let userOrder = new Order(true, Date.now, cart.cartContainer);
        document.getElementById('totalPriceOrder').innerHTML = userOrder.getTotalCost() + 'грн';
        userOrder.outOrderDetails();
    }
}

setEventContacts();

//Function modal control
function modalControl(modal, modalName) {
    if (modalName == 'cart') {
        cart.outProductInCart();
    }
    if (modalName == 'order') {
        if (id == 0) {
            alert("Ошибка! Вы должны быть зарегистрированы!");
            return;
        }
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

//Hide modal window
function hideModal(modal) {
    let overlay = document.querySelector('.modal_bg');
    modal.style.display = 'none';
    overlay.classList.remove('modal_bg_active');
}

// Search
let searchField = document.getElementById('searchField');

searchField.addEventListener('keyup', function(e) {
    if (e.code != "Enter") return;

    toParameter("search", e.target.value);
});