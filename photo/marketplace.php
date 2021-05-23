<?php
session_start();
require_once "web/Database.php";

$typesArray = [];
$typesArray2 = [];
if ($_GET["types"]) {
    $typesArray = $_GET["types"];
    $typesArray2 = [];

    for ($i=0; $i < count($typesArray); $i++) { 
        $typesArray2[$i] = "type = '${typesArray[$i]}'";
    }

    $types = implode(" || ", $typesArray2);
}

if ($_GET["categoria"]) {
    if ($types) $types = "(" . $types;
    $categoria = ($types ? ") AND " : "") . "categoria_id = '${_GET["categoria"]}'";
}

$maxPriceInDb = Database::sendQuery("SELECT * FROM `devices` ORDER BY price DESC")->fetch_array()["price"];

$minPrice = $_GET["min_price"] ?? 0; 
$maxPrice = $_GET["max_price"] ?? $maxPriceInDb;

$order = $_GET["order"] ?? "price";
$orderType = $_GET["order_type"] ?? "DESC";
$searchString = "AND name LIKE '%${_GET["search"]}%'";

$products = [];

$query = Database::sendQuery("SELECT * FROM `devices` WHERE $types $categoria " . ($types || $categoria ? " AND " : "") . " price >= $minPrice AND price <= $maxPrice $searchString ORDER BY $order $orderType");

while ($row = $query->fetch_array()) {
    $products[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/owl.carousel.min.css">
    <link rel="stylesheet" href="styles/owl.theme.default.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/marketplace.css">
    <title>Home Control Marketplace</title>
</head>

<body id="bodyMarketplace">
    <script type="text/javascript">
        const id = <?=$_SESSION["id"] ? $_SESSION["id"] : "0"?>;
        const replaceParameter = (url, parameter, value) => {
            url = url.replace(new RegExp("&?" + parameter + "=([a-zA-Z0-9а-яёА-ЯЁ_]*)"), "");

            if (url.includes("?")) {
                return url + "&" + parameter + "=" + value;
            } else {
                return url + "?" + parameter + "=" + value;
            }
        };

        const toParameter = (parameter, value) => {
            window.location = replaceParameter(window.location.href, parameter, value);
        }

        const order = (row, type) => {
            window.location = replaceParameter(replaceParameter(window.location.href, "order", row), "order_type", type);
        };

        const categoria = id => {
            toParameter("categoria", id);
        };
    </script>
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
            <form>
                <div class="setting_filter">
                    <div class="input_block">
                        <div class="from_price">
                            <p>From</p>
                            <input type="number" value="0" id="minPriceMob" min="0" max="<?=$maxPriceInDb?>">
                        </div>
                        <div class="divider"></div>
                        <div class="to_price">
                            <input type="number" value="<?=$maxPriceInDb?>" id="maxPriceMob" min="0" max="<?=$maxPriceInDb?>">
                            <p>To</p>
                        </div>
                    </div>
                    <div class="wrap_slider">
                        <div class="slider_price_block">
                            <input type="range" min="0" max="<?=$maxPriceInDb?>" value="<?=$minPrice?>" id="inputLeftMob" name="min_price">
                            <input type="range" min="0" max="<?=$maxPriceInDb?>" value="<?=$maxPrice?>" id="inputRightMob" name="max_price">
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
                            <?php
                            $query = Database::sendQuery("SELECT * FROM type");
                            while ($type = $query->fetch_array()) {
                            ?>
                            <div class="checkbox_box">
                                <input type="checkbox" id="checkBoxMob<?=$type["id"]?>" name="types[]" value="<?=$type["id"]?>" class="checkInput" <?=(in_array($type["id"], $typesArray) ? "checked" : "")?>>
                                <label for="checkBoxMob<?=$type["id"]?>" class="check_wrap"></label>
                                <p><?=$type["type"]?></p>
                            </div>
                            <?
                            }
                            ?>
                        </div>
                    </div>
                    <div class="block_filter_btn">
                        <button class="btn_apply" id="btnApplyMob">Apply</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- contacts window -->
    <?php include 'parts/contactWindow.php'?>
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
                                <?
                                $query = Database::sendQuery("SELECT * FROM `categories`");
                                while ($categoria = $query->fetch_array()):?>
                                    <div categoria_id="<?=$categoria["categoria_id"]?>" class="option_categories <?=($categoria["categoria_id"] == $_GET["categoria"] ? "selected_categ_option" : "")?>">
                                        <p><?=$categoria["name"]?></p>
                                    </div>
                                <?endwhile;?>
                            </div>
                        </div>
                        <div class="filter_block block_theme">
                            <div class="inner_filter" id="filterBlock">
                                <h3>Filter</h3>
                                <span id="filterCateg"><img src="photo/arrowList.png" alt=""></span>
                            </div>
                            <div class="more_filter" id="moreFilter">
                                <div class="setting_filter">
                                    <form method="GET">
                                        <div class="input_block">
                                        <div class="from_price">
                                            <p>From</p>
                                            <input type="number" value="0" id="minPrice" min="0" max="<?=$maxPriceInDb?>">
                                        </div>
                                        <div class="divider"></div>
                                        <div class="to_price">
                                            <input type="number" value="<?=$maxPriceInDb?>" id="maxPrice" min="0" max="<?=$maxPriceInDb?>">
                                            <p>To</p>
                                        </div>
                                        </div>
                                        <div class="wrap_slider">
                                            <div class="slider_price_block">
                                                <input type="range" min="0" max="<?=$maxPriceInDb?>" value="<?=$minPrice?>" id="inputLeft" name="min_price">
                                                <input type="range" min="0" max="<?=$maxPriceInDb?>" value="<?=$maxPrice?>" id="inputRight" name="max_price">
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
                                                <?php
                                                $query = Database::sendQuery("SELECT * FROM type");
                                                while ($type = $query->fetch_array()) {
                                                ?>
                                                <div class="checkbox_box">
                                                    <input type="checkbox" id="checkBox<?=$type["id"]?>" name="types[]" value="<?=$type["id"]?>" class="checkInput" <?=(in_array($type["id"], $typesArray) ? "checked" : "")?>>
                                                    <label for="checkBox<?=$type["id"]?>" class="check_wrap"></label>
                                                    <p><?=$type["type"]?></p>
                                                </div>
                                                <?
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="block_filter_btn">
                                            <button class="btn_apply" id="btnApply">Apply</button>
                                        </div>
                                    </form>
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
                                            <span class="selected_option"><?

                                            if ($_GET["order"] == "price") {
                                                if ($_GET["order_type"] == "DESC") echo "По убыванию цены";
                                                else echo "По возростанию цены";
                                            } else {
                                                echo "По количеству";
                                            }

                                            ?></span>
                                            <div class="select_img">
                                                <img src="photo/selectArrow.png" alt="">
                                            </div>
                                        </div>
                                        <div class="select_body">
                                            <div class="select_option" onclick="order('price', 'ASC')">По возростанию цены</div>
                                            <div class="select_option" onclick="order('price', 'DESC')">По убыванию цены</div>
                                            <div class="select_option" onclick="order('count', 'DESC')">По количеству</div>
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
                                            <span class="selected_option"><?=Database::sendQuery("SELECT * FROM `categories` WHERE categoria_id=" . ($_GET["categoria"] ? $_GET["categoria"] : 1))->fetch_array()["name"]?></span>
                                            <div class="select_img">
                                                <img src="photo/selectArrow.png" alt="">
                                            </div>
                                        </div>
                                        <div class="select_body">
                                            <?
                                            $query = Database::sendQuery("SELECT * FROM `categories`");
                                            while ($categoria = $query->fetch_array()):?>
                                                <div categoria_id="<?=$categoria["categoria_id"]?>" onclick="categoria(<?=$categoria['categoria_id']?>)" class="select_option"><?=$categoria["name"]?></div>
                                            <?endwhile;?>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter_activate_btn_block">
                                    <button class="standart_btn filter_activate_btn" id="filterActiveBtn">Filter</button>
                                </div>
                            </div>
                        </div>
                        <div class="card_grid" id="mainCardGrid">
                        </div>
                        <div class="more_product_block" style="display: block; width: 100%; margin: 0; padding: 0;">
                            <table style="width: 100%; margin: 0; padding: 0;">
                                <?php 
                                foreach ($products as $product):
                                ?>
                                <tr class="card_object block_theme">
                                    <td class="object_image">
                                        <img src="photo/products/<?=$product["device_id"]?>.png" alt="" id="product_<?=$product["device_id"]?>" product_id="<?=$product["device_id"]?>" price="<?=$product["price"]?>" name="<?=$product["name"]?>" style="left: 0; right: 0; width: 50px; height: 50px;">
                                    </td>
                                    <td class="object_name">
                                        <p><?=$product["name"]?></p>
                                    </td>
                                    <td class="object_categotie">
                                        <p><?=
                                            Database::sendQuery("SELECT * FROM `categories` WHERE categoria_id='${product["categoria_id"]}'")->fetch_array()["name"]
                                            ?></p>
                                    </td>
                                    <td class="object_type">
                                        <p><?=
                                            Database::sendQuery("SELECT * FROM `type` WHERE id='${product["type"]}'")->fetch_array()["name"]
                                            ?></p>
                                    </td>
                                    <td class="object_count">
                                        <p><?=$product["count"]?> шт.</p>
                                    </td>
                                    <td class="object_price">
                                        <p><?=$product["price"]?> грн</p>
                                    </td>
                                    <td>
                                        <button class="standart_btn buy_btn add_to_cart" product_id="product_<?=$product["device_id"]?>">Buy</button>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            </table>
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
                                            <img src="photo/testProduct.png" alt="" product_id="1" price="1000" name="Smart lightbulb Xiaomi">
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