<header class="header_marketplace" id="header">
    <div class="header_inner">
        <div class="header_logo">
            <a class="logo_link" href="marketplace.php">
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
            <a class="nav_link" href="marketplace.php">Home</a>
            <a class="nav_link" href="index.php">Our company</a>
            <a class="nav_link" href="marketplace.php">Contacts</a>
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
            <div class="cart_block" id="cartLink">
                <img src="photo/shopingCartIcon.png" alt="">
                <span class="notification"><span id="cartCounter">0</span></span>
            </div>
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
            <a class="nav_link" href="marketplace.php">Home</a>
            <a class="nav_link" href="index.php">Our company</a>
            <a class="nav_link" href="marketplace.php">Contacts</a>
            <a class="nav_link" id="cartLinkSide">Cart</a>
        </div>
    </div>
</header>

<div class="cover_block" id="coverBlock"></div>