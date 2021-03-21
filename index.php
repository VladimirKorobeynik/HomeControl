<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
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

    <a href="#" class="buuton_up" id="upBtn">
        <img src="photo/upButtonArrow.png" alt="up">
    </a>
    <header class="header" id="header">
        <div class="header_inner">
            <div class="header_logo">
                <a class="logo_link" href="index.php">
                    <div class="logo-block">
                        <img src="photo/MainLogo.png" alt="">
                    </div>
                    <h5>Home Control</h5>
                </a>
            </div>
            <nav class="nav">
                <a class="nav_link" href="index.php">Home</a>
                <a class="nav_link" href="#services">Services</a>
                <a class="nav_link" href="#us">About Us</a>
                <a class="nav_link" href="Contacts.php">Contacts</a>
                <a class="nav_link" href="#">Marketplace</a>
                <?php
                if ($_COOKIE['user'] == '') :
                ?>
                    <a class="nav_link" href="Login.php">Login</a>
                <?php else : ?>
                    <?= $_COOKIE[''] ?><a href="/exit.php" class="exit_link">Log out</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main>
        <section class="section section-welcome" id="welcome">
            <div class="container">
                <div class="welcome_inner">
                    <h1 class="welcome_title">Welcome To <br>Home Control</h1>
                    <p class="welcome_text">We will help you become freer and more productive</p>
                    <a class="btn" href="#work">Learn More</a>
                </div>
            </div>
        </section>

        <section class="section section_about_us" id="us">
            <div class="decore_block decore_left"></div>
            <div class="decore_block decore_right"></div>
            <div class="container">
                <div class="section_header">
                    <h3 class="section_title">Who are we?</h3>
                    <h2 class="section_suptitle">Story about our project</h2>
                    <div class="section_text">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
                <div class="about">
                    <div class="item">
                        <div class="about_img">
                        </div>
                        <div class="team">Our Team</div>
                    </div>
                    <div class="item">
                        <div class="about_img">
                        </div>
                        <div class="tech">Technology</div>
                    </div>
                    <div class="item">
                        <div class="about_img">
                        </div>
                        <div class="Friends">Our Friends</div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section_statistics">
            <div class="statistics">
                <div class="container">
                    <div class="stat">
                        <div class="stat_item">
                            <div class="stat_count">33</div>
                            <div class="stat_text">Clients</div>
                        </div>
                        <div class="stat_item">
                            <div class="stat_count">33</div>
                            <div class="stat_text">Gadgets</div>
                        </div>
                        <div class="stat_item">
                            <div class="stat_count">33</div>
                            <div class="stat_text">Completed projects</div>
                        </div>
                        <div class="stat_item">
                            <div class="stat_count">33</div>
                            <div class="stat_text">Partners</div>
                        </div>
                        <div class="stat_item">
                            <div class="stat_count">33</div>
                            <div class="stat_text">Subscribed</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section_services" id="services">
            <div class="container">
                <div class="section_header">
                    <h3 class="section_title">Our services</h3>
                    <h2 class="section_suptitle">What services we provide</h2>
                    <div class="section_text">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
                <div class="services_cards">
                    <div class="services_card">
                        <div class="service_image">
                            <img src="" alt="">
                        </div>
                        <p class="service_name">Purchase of devices</p>
                    </div>
                    <div class="services_card">
                        <div class="service_image">
                            <img src="" alt="">
                        </div>
                        <p class="service_name">Device installation</p>
                    </div>
                    <div class="services_card">
                        <div class="service_image">
                            <img src="" alt="">
                        </div>
                        <p class="service_name">Technical support</p>
                    </div>
                    <div class="services_card">
                        <div class="service_image">
                            <img src="" alt="">
                        </div>
                        <p class="service_name">Purchase of devices</p>
                    </div>
                    <div class="services_card">
                        <div class="service_image">
                            <img src="" alt="">
                        </div>
                        <p class="service_name">Installation of system</p>
                    </div>
                    <div class="services_card">
                        <div class="service_image">
                            <img src="" alt="">
                        </div>
                        <p class="service_name">Installation of system</p>
                    </div>
                    <div class="services_card">
                        <div class="service_image">
                            <img src="" alt="">
                        </div>
                        <p class="service_name">Installation of system</p>
                    </div>
                    <div class="services_card">
                        <div class="service_image">
                            <img src="" alt="">
                        </div>
                        <p class="service_name">Installation of system</p>
                    </div>
                </div>
        </section>

        <section class="section section_work" id="work">
            <div class="container">
                <div class="section_header">
                    <h3 class="section_title">How we work</h3>
                    <h2 class="section_suptitle">What services we provide</h2>
                    <div class="section_text">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                    <div class="list_stage_work">
                        <div class="stage">
                            <div class="stage_content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi amet reprehenderit soluta consectetur at ut id vero ea cumque corporis nam impedit a, voluptatem fuga totam magnam laboriosam dignissimos eum.</p>
                                <div class="more_stage">
                                    <h4>Lorem</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum pariatur iusto doloremque perferendis mollitia consectetur sapiente id delectus totam enim, non facilis accusantium deleniti, distinctio quia harum dolorem
                                        quibusdam numquam. lore</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum pariatur iusto doloremque perferendis mollitia consectetur sapiente id delectus totam enim, non facilis accusantium deleniti, distinctio quia harum dolorem
                                        quibusdam numquam. lore</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum pariatur iusto doloremque perferendis mollitia consectetur sapiente id delectus totam enim, non facilis accusantium deleniti, distinctio quia harum dolorem
                                        quibusdam numquam. lore</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum pariatur iusto doloremque perferendis mollitia consectetur sapiente id delectus totam enim, non facilis accusantium deleniti, distinctio quia harum dolorem
                                        quibusdam numquam. lore</p>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="stage">
                            <div class="stage_content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi amet reprehenderit soluta consectetur at ut id vero ea cumque corporis nam impedit a, voluptatem fuga totam magnam laboriosam dignissimos eum.</p>
                                <div class="more_stage">
                                    <h4>Lorem</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum pariatur iusto doloremque perferendis mollitia consectetur sapiente id delectus totam enim, non facilis accusantium deleniti, distinctio quia harum dolorem
                                        quibusdam numquam. lore</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum pariatur iusto doloremque perferendis mollitia consectetur sapiente id delectus totam enim, non facilis accusantium deleniti, distinctio quia harum dolorem
                                        quibusdam numquam. lore</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum pariatur iusto doloremque perferendis mollitia consectetur sapiente id delectus totam enim, non facilis accusantium deleniti, distinctio quia harum dolorem
                                        quibusdam numquam. lore</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum pariatur iusto doloremque perferendis mollitia consectetur sapiente id delectus totam enim, non facilis accusantium deleniti, distinctio quia harum dolorem
                                        quibusdam numquam. lore</p>
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="stage">
                            <div class="stage_content">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi amet reprehenderit soluta consectetur at ut id vero ea cumque corporis nam impedit a, voluptatem fuga totam magnam laboriosam dignissimos eum.</p>
                                <div class="more_stage">
                                    <h4>Lorem</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum pariatur iusto doloremque perferendis mollitia consectetur sapiente id delectus totam enim, non facilis accusantium deleniti, distinctio quia harum dolorem
                                        quibusdam numquam. lore</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum pariatur iusto doloremque perferendis mollitia consectetur sapiente id delectus totam enim, non facilis accusantium deleniti, distinctio quia harum dolorem
                                        quibusdam numquam. lore</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum pariatur iusto doloremque perferendis mollitia consectetur sapiente id delectus totam enim, non facilis accusantium deleniti, distinctio quia harum dolorem
                                        quibusdam numquam. lore</p>
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum pariatur iusto doloremque perferendis mollitia consectetur sapiente id delectus totam enim, non facilis accusantium deleniti, distinctio quia harum dolorem
                                        quibusdam numquam. lore</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="information-block">
                <div class="social">
                    <a href="#" class="soc">Instagram</a>
                    <a href="#" class="soc">Telegram</a>
                    <a href="#" class="soc">Youtube</a>
                    <a href="#" class="soc">VK</a>
                </div>
                <p>2021 &copy; Home Control</p>
            </div>
        </div>
    </footer>
</body>
<script src="code.js"></script>
<script src="loader.js"></script>

</html>