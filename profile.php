<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/marketplace.css">
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="shortcut icon" href="photo/MainLogo.png" type="image/x-icon">
    <title>Home Control</title>
</head>

<body>
    <div class="preloader" id="preloader">
        <div class="loader">
            <img src="photo/house.png" alt="">
            <img src="photo/loaderGear.png" class="bigGear" alt="">
            <img src="photo/loaderGear.png" class="smallGear" alt="">
        </div>
    </div>

    <div class="wrapper">
        <?php include 'parts/marketplaceHeader.php' ?>

        <main>
            <div class="main_account_content">
                <div class="sidebar_account block_theme">
                    <div class="sidebar_head">
                        <div class="sidebar_image">
                            <img src="photo/accountLogo.png" alt="">
                        </div>
                        <div class="sidebar_text">
                            <p>ACCOUNT</p>
                            <p>MANAGEMENT</p>
                        </div>
                    </div>
                    <div class="sidebar_body">
                        <ul class="account_menu">
                            <li class="active_li"><a href="#">Account information</a></li>
                            <li><a href="#">Subscription</a></li>
                            <li><a href="#">Orders history</a></li>
                            <li><a href="#">Chat</a></li>
                            <li><a href="../web/exit.php">Exit</a></li>
                        </ul>
                    </div>
                </div>
                <div class="account_content">
                    <!-- account info -->
                    <div class="account_info">
                        <div class="account_head_info">
                            <div class="bg_file">
                                <h3>Account information</h3>
                                <img src="photo/fileAccountBg1.png" alt="">
                            </div>
                            <div class="account_head_content block_theme">
                                <div class="account_head_content_top">
                                    <h2>Public Profile</h2>
                                </div>
                                <div class="account_head_content_content">
                                    <div class="user_image_block">
                                        <img src="photo/UserAvatar.png" alt="">
                                    </div>
                                    <div class="user_login_block">
                                        <p>username</p>
                                        <p class="user_login" id="userAccountLog">Vk5564</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="account_body_info block_theme">

                        </div>
                    </div>
                    <!-- account subscription -->
                    <div class="account_subscription">

                    </div>
                    <!-- account orders -->
                    <div class="account_orders">

                    </div>
                    <!-- account chat -->
                    <div class="account_chat">

                    </div>
                </div>
            </div>
        </main>

        <?php include 'parts/footer.php' ?>
    </div>

    <script src="js/loader.js"></script>
    <script src="https://kit.fontawesome.com/e3dce40605.js" crossorigin="anonymous"></script>
</body>

</html>