<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/marketplace.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/admin.css">
    <title>Home Control</title>
</head>

<body>
    <!-- preloader -->
    <div class="preloader" id="preloader">
        <div class="loader">
            <img src="photo/house.png" alt="">
            <img src="photo/loaderGear.png" class="bigGear" alt="">
            <img src="photo/loaderGear.png" class="smallGear" alt="">
        </div>
    </div>
    <!-- contacts window -->
    <?php include 'parts/contactWindow.php' ?>
    <!-- cover block modal -->
    <div class="modal_bg"></div>
    <div class="modal addModal" id="addModal">
        <div class="modal_head">
            <h2>Добавить товар</h2>
            <span class="close_icon"><img src="photo/closeIconBlack.png" alt="X"></span>
        </div>
        <div class="modal_content">
            <form action="POST">
                <div class="field_block">
                    <label for="addFieldName">Название</label>
                    <input type="text" class="input_form" id="addFieldName" name="name">
                </div>
                <div class="field_block">
                    <label for="addCategorie">Категория</label>
                    <input type="select" class="input_form" id="addFieldCategorie" name="categorie">
                </div>
                <div class="field_block">
                    <label for="addFieldType">Тип</label>
                    <input type="text" class="input_form" id="addFieldType" name="type">
                </div>
                <div class="field_block">
                    <label for="addFieldCount">Количество</label>
                    <input type="number" min="0" class="input_form" id="addFieldCount" name="count">
                </div>
                <div class="field_block">
                    <label for="addFieldPrice">Цена</label>
                    <input type="number" min="1" class="input_form" id="addFieldPrice" name="price">
                </div>
                <div class="field_block">
                    <label for="addFieldPrice">Фото</label>
                    <input type="file" id="addFieldPhoto" name="photo">
                </div>
                <div class="field_block">
                    <label for="addFieldDescription">Описание</label>
                    <textarea type="text" id="addFieldDescription" name="description"></textarea>
                </div>
                <button class="standart_btn">Добавить</button>
            </form>
        </div>
    </div>
    <div class="wrapper">
        <header class="header_marketplace" id="header">
            <div class="header_inner">
                <div class="header_logo">
                    <a class="logo_link" href="admin.php">
                        <div class="logo-block">
                            <img src="photo/MainLogo.png" alt="">
                        </div>
                        <h5>Home Control</h5>
                    </a>
                </div>
                <div class="burger_menu">
                    <input type="checkbox" id="burgerMenu">
                    <label for="burgerMenu">
                        <div class="burger_line first_line"></div>
                        <div class="burger_line second_line"></div>
                        <div class="burger_line third_line"></div>
                        <div class="burger_line fourth_line"></div>
                    </label>
                </div>
                <div class="search_block">
                    <!-- <form action="web/product.php" method="GET">
                        <input type="text" id="searchField" name="searchField" placeholder="Search ...">
                        <button class="standart_btn"><img src="photo/searchIcon.png" alt=""></button>
                    </form> -->
                    <input type="text" id="searchField" name="searchField" placeholder="Search ...">
                    <img src="photo/searchIcon.png" alt="">
                </div>
                <nav class="nav">
                    <a class="nav_link" href="marketplace.php">Магазин</a>
                    <a class="nav_link" href="#">Распечатать выборку</a>
                    <?php
                    if ($_COOKIE['user'] == '') :
                    ?>
                        <a class="nav_link" href="../Login.php">Log in</a>
                    <?php else : ?>
                        <div class="user_block">
                            <a href="profile.php">
                                <div class="user_img">
                                    <img src="photo/UserAvatar.png" alt="">
                                    <span class="notification"><span>9+</span></span>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                </nav>
            </div>
            <div class="nav_side" id="navSide">
                <div class="nav_head">
                    <?php
                    if ($_COOKIE['user'] == '') :
                    ?>
                        <a class="nav_link" href="../Login.php">Log in</a>
                    <?php else : ?>
                        <div class="user_block">
                            <a href="profile.php">
                                <div class="user_img">
                                    <img src="photo/UserAvatar.png" alt="">
                                    <span class="notification"><span>9+</span></span>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="close_side_nav" id="closeNavSide"><img src="photo/closeIcon.png" alt=""></div>
                </div>
                <div class="nav_body">
                    <a class="nav_link" href="#">Распечатать выборку</a>
                </div>
            </div>
        </header>

        <div class="cover_block" id="coverBlock"></div>

        <main>
            <div class="main_content">
                <div class="market_content">
                    <div class="sidebar">
                        <div class="categories_block active block_theme">
                            <div class="inner_categories" id="categBlockAdmin">
                                <h3>Таблицы</h3>
                                <span id="arrowCategAdmin"><img src="photo/arrowList.png" alt=""></span>
                            </div>
                            <div class="more_categories" id="categMoreAdmin">
                                <div class="option_categories">
                                    <p>Товари</p>
                                </div>
                                <div class="option_categories">
                                    <p>Набори</p>
                                </div>
                                <div class="option_categories">
                                    <p>Користувачі</p>
                                </div>
                            </div>
                        </div>
                        <div class="filter_block block_theme">
                            <div class="inner_filter" id="filterBlockAdmin">
                                <h3>Filter</h3>
                                <span id="filterArrowAdmin"><img src="photo/arrowList.png" alt=""></span>
                            </div>
                            <div class="more_filter" id="moreFilterAdmin">
                                <div class="setting_filter">
                                    <h3>Price</h3>
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
                                    <h3>Count</h3>
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
                                        <h4>Категория</h4>
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
                                    <div class="type_device">
                                        <h4>Type device</h4>
                                        <div class="checkbox_container">
                                            <div class="checkbox_box">
                                                <input type="checkbox" id="checkbox5" class="checkInput">
                                                <label for="checkbox5" class="check_wrap"></label>
                                                <p>Type 1</p>
                                            </div>
                                            <div class="checkbox_box">
                                                <input type="checkbox" id="checkbox6" class="checkInput">
                                                <label for="checkbox6" class="check_wrap"></label>
                                                <p>Type 2</p>
                                            </div>
                                            <div class="checkbox_box">
                                                <input type="checkbox" id="checkbox7" class="checkInput">
                                                <label for="checkbox7" class="check_wrap"></label>
                                                <p>Type 3</p>
                                            </div>
                                            <div class="checkbox_box">
                                                <input type="checkbox" id="checkbox8" class="checkInput">
                                                <label for="checkbox8" class="check_wrap"></label>
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
                                <div class="add_product_block">
                                    <button class="add_product_button standart_btn" id="addProductBtn">Добавить +</button>
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
                        <div class="card_grid">
                            <table class="card_object_grid">
                                <thead class="object_attribute">
                                    <tr>
                                        <td>Изображение</td>
                                        <td>Название</td>
                                        <td>Категория</td>
                                        <td>Тип</td>
                                        <td>Количество</td>
                                        <td>Цена</td>
                                        <td>Панель <br> инструментов</td>
                                    </tr>
                                </thead>
                                <tbody id="objectGrid">
                                    <tr class="card_object block_theme">
                                        <td class="object_image">
                                            <img src="photo/testProduct.png" alt="">
                                        </td>
                                        <td class="object_name">
                                            <p>Смарт лампочка Xiaomi</p>
                                        </td>
                                        <td class="object_categotie">
                                            <p>Устройства</p>
                                        </td>
                                        <td class="object_type">
                                            <p>Умные устройства</p>
                                        </td>
                                        <td class="object_count">
                                            <p>100 шт.</p>
                                        </td>
                                        <td class="object_price">
                                            <p>1000 грн</p>
                                        </td>
                                        <td class="object_control_panel">
                                            <div class="control_block">
                                                <a href="#" id="editObject"><i class="fa fa-edit edit-icon"></i></a>
                                                <a href="#" id="deleteObject"><i class="fa fa-times delete-icon"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="card_object block_theme">
                                        <td class="object_image">
                                            <img src="photo/testProduct.png" alt="">
                                        </td>
                                        <td class="object_name">
                                            <p>Смарт лампочка Xiaomi</p>
                                        </td>
                                        <td class="object_categotie">
                                            <p>Устройства</p>
                                        </td>
                                        <td class="object_type">
                                            <p>Умные устройства</p>
                                        </td>
                                        <td class="object_count">
                                            <p>100 шт.</p>
                                        </td>
                                        <td class="object_price">
                                            <p>1000 грн</p>
                                        </td>
                                        <td class="object_control_panel">
                                            <div class="control_block">
                                                <a href="#" id="editObject"><i class="fa fa-edit edit-icon"></i></a>
                                                <a href="#" id="deleteObject"><i class="fa fa-times delete-icon"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="more_product_block">
                            <button class="standart_btn more_product_btn">More</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include 'parts/footer.php' ?>
    </div>
    <script src="js/loader.js"></script>
    <script src="js/burgerNavigation.js"></script>
    <script type="module" src="js/adminPage.js"></script>
</body>

</html>