<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/contacts.css">
    <link rel="stylesheet" href="styles/profile.css">
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

    <?php include 'parts/header.php'?>

    <main>
        <?php echo "<h3> Здравствуйте " .$_COOKIE['user']." </h3>"?>
    </main>

    <?php include 'parts/footer.php'?>

</body>
<script src="js/loader.js"></script>
<script src="https://kit.fontawesome.com/e3dce40605.js" crossorigin="anonymous"></script>

</html>