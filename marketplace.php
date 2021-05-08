<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/owl.carousel.min.css">
    <link rel="stylesheet" href="styles/owl.theme.default.css">
    <link rel="stylesheet" href="styles/marketplace.css">
    <title>Home Control Marketplace</title>
</head>

<body id="bodyMarketplace">
    <!-- preloader -->
    <div class="preloader" id="preloader">
        <div class="loader">
            <img src="photo/house.png" alt="">
            <img src="photo/loaderGear.png" class="bigGear" alt="">
            <img src="photo/loaderGear.png" class="smallGear" alt="">
        </div>
    </div>
    <!-- cart messagebox -->
    <div class="added_product_messagebox">
        <span>Товар добавлен в корзину :)</span>
    </div>
    <div class="fly_product"></div>
    <!-- cover block modal -->
    <div class="modal_bg"></div>
    <!-- cart modal -->
    <div class="modal" id="cart">
        <div class="modal_head">
            <h2>Ваша Корзина</h2>
            <span class="close_icon"><img src="photo/closeIconBlack.png" alt="X"></span>
        </div>
        <div class="modal_content">
            <div class="added_product" id="addedCardGrid">
                <p class="text_empty_cart">Ваша корзина пуста</p>
            </div>
            <div class="buy_block_cart">
                <div class="total_price_block">
                    <p>Итоговая сумма:</p>
                    <span class="total_price" id="totalCost">4000грн</span>
                </div>
                <button class="create_order_btn standart_btn" id="checkout">Оформить заказ</button>
            </div>
        </div>
    </div>
    <!-- order modal -->
    <div class="modal order_modal" id="order">
        <div class="modal_head">
            <h2>Ваш заказ</h2>
            <span class="close_icon"><img src="photo/closeIconBlack.png" alt="X"></span>
        </div>
        <div class="modal_content">
            <div class="order_product" id="orderProductsBlock">

            </div>
            <div class="warning_block">
                <div class="warning_text">
                    <h3>УВАГА!</h3>
                    <p><span class="danger_text">перевіряйте ваші дані</span> перед оплатою замовлення!!!</p>
                </div>
                <div class="warning_img">
                    <img src="photo/warningIcon.png" alt="">
                </div>
            </div>
            <div class="buy_block_cart buy_block_order" id="orderPay">
                <div class="total_price_block">
                    <p>Итоговая сумма:</p>
                    <span class="total_price" id="totalPriceOrder">4000грн</span>
                </div>
            </div>
        </div>
    </div>
    <div class="cover_block" id="coverBlockFilter"></div>
    <!-- mobile filter -->
    <div class="filter_block filter_mobile block_theme" id="filterMob">
        <div class="inner_filter">
            <h3>Filter</h3>
        </div>
        <div class="more_filter">
            <div class="setting_filter">
                <div class="input_block">
                    <div class="from_price">
                        <p>From</p>
                        <input type="number" value="0" id="minPriceMob" min="0" max="100">
                    </div>
                    <div class="divider"></div>
                    <div class="to_price">
                        <input type="number" value="100" id="maxPriceMob" min="0" max="100">
                        <p>To</p>
                    </div>
                </div>
                <div class="wrap_slider">
                    <div class="slider_price_block">
                        <input type="range" min="0" max="100" value="25" id="inputLeftMob">
                        <input type="range" min="0" max="100" value="75" id="inputRightMob">
                        <div class="slider">
                            <div class="track"></div>
                            <div class="range" id="rangeMob"></div>
                            <div class="tumbler tumbler_left" id="leftTumbMob"></div>
                            <div class="tumbler tumbler_right" id="rightTumbMob"></div>
                        </div>
                    </div>
                </div>
                <div class="type_device">
                    <h4>Type device</h4>
                    <div class="checkbox_container">
                        <div class="checkbox_box">
                            <input type="checkbox" id="checkboxMob1" class="checkInput">
                            <label for="checkboxMob1" class="check_wrap"></label>
                            <p>Type 1</p>
                        </div>
                        <div class="checkbox_box">
                            <input type="checkbox" id="checkboxMob2" class="checkInput">
                            <label for="checkboxMob2" class="check_wrap"></label>
                            <p>Type 2</p>
                        </div>
                        <div class="checkbox_box">
                            <input type="checkbox" id="checkboxMob3" class="checkInput">
                            <label for="checkboxMob3" class="check_wrap"></label>
                            <p>Type 3</p>
                        </div>
                        <div class="checkbox_box">
                            <input type="checkbox" id="checkboxMob4" class="checkInput">
                            <label for="checkboxMob4" class="check_wrap"></label>
                            <p>Type 4</p>
                        </div>
                    </div>
                </div>
                <div class="block_filter_btn">
                    <button class="btn_apply" id="btnApplyMob">Apply</button>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">

        <?php include 'parts/marketplaceHeader.php' ?>

        <main>
            <div class="main_content">
                <div class="market_content">
                    <div class="sidebar">
                        <div class="categories_block active block_theme">
                            <div class="inner_categories" id="categBlock">
                                <h3>Categories</h3>
                                <span id="arrowCateg"><img src="photo/arrowList.png" alt=""></span>
                            </div>
                            <div class="more_categories" id="categMore">
                                <div class="option_categories">
                                    <p>Устройства</p>
                                </div>
                                <div class="option_categories">
                                    <p>Датчики</p>
                                </div>
                                <div class="option_categories">
                                    <p>Наборы</p>
                                </div>
                            </div>
                        </div>
                        <div class="filter_block block_theme">
                            <div class="inner_filter" id="filterBlock">
                                <h3>Filter</h3>
                                <span id="filterCateg"><img src="photo/arrowList.png" alt=""></span>
                            </div>
                            <div class="more_filter" id="moreFilter">
                                <div class="setting_filter">
                                    <div class="input_block">
                                        <div class="from_price">
                                            <p>From</p>
                                            <input type="number" value="0" id="minPrice" min="0" max="100">
                                        </div>
                                        <div class="divider"></div>
                                        <div class="to_price">
                                            <input type="number" value="100" id="maxPrice" min="0" max="100">
                                            <p>To</p>
                                        </div>
                                    </div>
                                    <div class="wrap_slider">
                                        <div class="slider_price_block">
                                            <input type="range" min="0" max="100" value="25" id="inputLeft">
                                            <input type="range" min="0" max="100" value="75" id="inputRight">
                                            <div class="slider">
                                                <div class="track"></div>
                                                <div class="range" id="range"></div>
                                                <div class="tumbler tumbler_left" id="leftTumb"></div>
                                                <div class="tumbler tumbler_right" id="rightTumb"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="type_device">
                                        <h4>Type device</h4>
                                        <div class="checkbox_container">
                                            <div class="checkbox_box">
                                                <input type="checkbox" id="checkbox1" class="checkInput">
                                                <label for="checkbox1" class="check_wrap"></label>
                                                <p>Type 1</p>
                                            </div>
                                            <div class="checkbox_box">
                                                <input type="checkbox" id="checkbox2" class="checkInput">
                                                <label for="checkbox2" class="check_wrap"></label>
                                                <p>Type 2</p>
                                            </div>
                                            <div class="checkbox_box">
                                                <input type="checkbox" id="checkbox3" class="checkInput">
                                                <label for="checkbox3" class="check_wrap"></label>
                                                <p>Type 3</p>
                                            </div>
                                            <div class="checkbox_box">
                                                <input type="checkbox" id="checkbox4" class="checkInput">
                                                <label for="checkbox4" class="check_wrap"></label>
                                                <p>Type 4</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block_filter_btn">
                                        <button class="btn_apply" id="btnApply">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_products block_theme">
                        <div class="control_content_panel">
                            <div class="panel_head">
                                <div class="select_container">
                                    <div class="select">
                                        <div class="select_header">
                                            <span class="selected_option">По возростанию цены</span>
                                            <div class="select_img">
                                                <img src="photo/selectArrow.png" alt="">
                                            </div>
                                        </div>
                                        <div class="select_body">
                                            <div class="select_option selected_option_body">По возростанию цены</div>
                                            <div class="select_option">По убыванию цены</div>
                                            <div class="select_option">По количеству</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="view_product_card_control">
                                    <div class="active_mode" id="modeCont"></div>
                                    <input type="radio" id="mode1" name="mode" checked="checked" hidden>
                                    <label for="mode1"><span><img src="photo/controlViewCard1.png" alt=""></span></label>
                                    <input type="radio" id="mode2" name="mode" hidden>
                                    <label for="mode2"><span><img src="photo/controlViewCard2.png" alt=""></span></label>
                                </div>
                            </div>
                            <div class="sidebar_mobile">
                                <div class="select_container">
                                    <div class="select">
                                        <div class="select_header">
                                            <span class="selected_option">Устройства</span>
                                            <div class="select_img">
                                                <img src="photo/selectArrow.png" alt="">
                                            </div>
                                        </div>
                                        <div class="select_body">
                                            <div class="select_option selected_option_body">Устройства</div>
                                            <div class="select_option">Датчики</div>
                                            <div class="select_option">Наборы</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter_activate_btn_block">
                                    <button class="standart_btn filter_activate_btn" id="filterActiveBtn">Filter<span class="selected_parameters">3</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="card_grid" id="mainCardGrid">
                        </div>
                        <div class="more_product_block">
                            <button class="standart_btn more_product_btn">More</button>
                        </div>
                    </div>
                </div>
                <div class="viewed block_theme">
                    <div class="viewed_header">
                        <h2>Viewed</h2>
                    </div>
                    <div class="carousel_block">
                        <div class="owl-carousel">
                            <div>
                                <div class="card_wrapper card_mode_tile card_viewed">
                                    <div class="card">
                                        <div class="product_image">
                                            <img src="photo/testProduct.png" alt="">
                                        </div>
                                        <div class="min_describe">
                                            <h4 class="name_product">Smart lightbulb Xiaomi</h4>
                                            <div class="in_stock_block">
                                                <span class="in_stock">
                                                    <img src="photo/checkmark.png" alt="">
                                                </span>
                                                <p>in stock</p>
                                            </div>
                                        </div>
                                        <div class="more_describe">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere,
                                                quibusdam harum! Veritatis dolore officiis sapiente numquam!
                                                Repellendus officiis quae quisquam blanditiis provident modi,
                                                itaque facere, voluptas, aspernatur quidem veniam dolorem!</p>
                                        </div>
                                        <div class="buy_block">
                                            <span class="price">1000grn</span>
                                            <button class="standart_btn buy_btn">Buy</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card_wrapper card_mode_tile card_viewed">
                                    <div class="card">
                                        <div class="product_image">
                                            <img src="photo/testProduct.png" alt="">
                                        </div>
                                        <div class="min_describe">
                                            <h4 class="name_product">Smart lightbulb Xiaomi</h4>
                                            <div class="in_stock_block">
                                                <span class="in_stock">
                                                    <img src="photo/checkmark.png" alt="">
                                                </span>
                                                <p>in stock</p>
                                            </div>
                                        </div>
                                        <div class="more_describe">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere,
                                                quibusdam harum! Veritatis dolore officiis sapiente numquam!
                                                Repellendus officiis quae quisquam blanditiis provident modi,
                                                itaque facere, voluptas, aspernatur quidem veniam dolorem!</p>
                                        </div>
                                        <div class="buy_block">
                                            <span class="price">1000grn</span>
                                            <button class="standart_btn buy_btn">Buy</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card_wrapper card_mode_tile card_viewed">
                                    <div class="card">
                                        <div class="product_image">
                                            <img src="photo/testProduct.png" alt="">
                                        </div>
                                        <div class="min_describe">
                                            <h4 class="name_product">Smart lightbulb Xiaomi</h4>
                                            <div class="in_stock_block">
                                                <span class="in_stock">
                                                    <img src="photo/checkmark.png" alt="">
                                                </span>
                                                <p>in stock</p>
                                            </div>
                                        </div>
                                        <div class="more_describe">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere,
                                                quibusdam harum! Veritatis dolore officiis sapiente numquam!
                                                Repellendus officiis quae quisquam blanditiis provident modi,
                                                itaque facere, voluptas, aspernatur quidem veniam dolorem!</p>
                                        </div>
                                        <div class="buy_block">
                                            <span class="price">1000grn</span>
                                            <button class="standart_btn buy_btn">Buy</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card_wrapper card_mode_tile card_viewed">
                                    <div class="card">
                                        <div class="product_image">
                                            <img src="photo/testProduct.png" alt="">
                                        </div>
                                        <div class="min_describe">
                                            <h4 class="name_product">Smart lightbulb Xiaomi</h4>
                                            <div class="in_stock_block">
                                                <span class="in_stock">
                                                    <img src="photo/checkmark.png" alt="">
                                                </span>
                                                <p>in stock</p>
                                            </div>
                                        </div>
                                        <div class="more_describe">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere,
                                                quibusdam harum! Veritatis dolore officiis sapiente numquam!
                                                Repellendus officiis quae quisquam blanditiis provident modi,
                                                itaque facere, voluptas, aspernatur quidem veniam dolorem!</p>
                                        </div>
                                        <div class="buy_block">
                                            <span class="price">1000grn</span>
                                            <button class="standart_btn buy_btn">Buy</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="card_wrapper card_mode_tile card_viewed">
                                    <div class="card">
                                        <div class="product_image">
                                            <img src="photo/testProduct.png" alt="">
                                        </div>
                                        <div class="min_describe">
                                            <h4 class="name_product">Smart lightbulb Xiaomi</h4>
                                            <div class="in_stock_block">
                                                <span class="in_stock">
                                                    <img src="photo/checkmark.png" alt="">
                                                </span>
                                                <p>in stock</p>
                                            </div>
                                        </div>
                                        <div class="more_describe">
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere,
                                                quibusdam harum! Veritatis dolore officiis sapiente numquam!
                                                Repellendus officiis quae quisquam blanditiis provident modi,
                                                itaque facere, voluptas, aspernatur quidem veniam dolorem!</p>
                                        </div>
                                        <div class="buy_block">
                                            <span class="price">1000grn</span>
                                            <button class="standart_btn buy_btn">Buy</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include 'parts/footer.php' ?>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/loader.js"></script>
    <script src="js/API/google_pay.js"></script>
    <script src="js/burgerNavigation.js"></script>
    <script type="module" src="js/marketplace_page.js"></script>
    <script async src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded()"></script>

</body>

</html>