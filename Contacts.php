<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/contacts.css">
    <link rel="stylesheet" href="styles/style.css">
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

    <?php include 'parts/header.php' ?>

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

    <?php include 'parts/footer.php' ?>

</body>
<script src="js/loader.js"></script>
<script src="js/header.js"></script>
<script src="js/google_map.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAMQ9lQs2wpePuFyCso5eT4SCJiveur0I&callback=initMap&libraries=&v=weekly">
</script>

</html>