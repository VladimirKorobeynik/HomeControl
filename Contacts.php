<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="contacts.css">
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

    <header class="header">
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
                <a class="nav_link" href="index.php#services">Services</a>
                <a class="nav_link" href="index.php#us">About Us</a>
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
        <div class="container">
            <h1>Our contacts</h1>

            <div class="contacts_block">
                <div class="info_block">
                    <div class="numbers">
                        <p class="number_title">Numbers:</p>
                        <div class="num">
                            <p>+380964442312</p>
                            <p>+380955443423</p>
                        </div>
                    </div>
                    <div class="address_block">
                        <span>Address:</span>
                        <p class="address">Kharkiv, prospect 228, 7/9</p>
                    </div>
                    <a href="#" class="email">homecontrol2020@gmail.com</a>
                </div>
                <div class="map_block">
                    <div class="map" id="map">

                    </div>
                </div>
            </div>
        </div>
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
    <script>
        function initMap() {
            // The location of Uluru
            const uluru = {
                lat: 51.6159853,
                lng: 4.7538639
            };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 18,
                center: uluru,
            });
            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: uluru,
                map: map,
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAMQ9lQs2wpePuFyCso5eT4SCJiveur0I&callback=initMap&libraries=&v=weekly">
    </script>
</body>
<script src="loader.js"></script>

</html>