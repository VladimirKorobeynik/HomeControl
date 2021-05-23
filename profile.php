<?php 

require_once "web/Database.php";
session_start(); 

if (array_key_exists("sub", $_GET)) {
    Database::sendQuery("UPDATE `users` SET `subscription_id`='" . (int)$_GET["sub"] . "' WHERE `user_id`='${_SESSION["id"]}'");
}

if ($_POST) {
    $email = $_POST["email"];
    $fullname = $_POST["fullname"];
    $name = $_POST["name"];
    $birth = $_POST["birth"];
    $patronymic = $_POST["patronymic"];
    $number = $_POST["number"];
    $address = $_POST["address"];

    if (mb_strlen($password) > 0) {
        $password = md5($password."ghjfdkhgj453534$#@#");
        Database::sendQuery("UPDATE `users` SET `fullname`='$fullname',`name`='$name',`patronymic`='$patronymic',`number`='$number',`address`='$address',`email`='$email',`birthday`='$birth',`password`='$password' WHERE `user_id`='${_SESSION["id"]}'");
    } else {
        Database::sendQuery("UPDATE `users` SET `fullname`='$fullname',`name`='$name',`patronymic`='$patronymic',`number`='$number',`address`='$address',`email`='$email',`birthday`='$birth'WHERE `user_id`='${_SESSION["id"]}'");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/marketplace.css">
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="shortcut icon" href="photo/MainLogo.png" type="image/x-icon">

    <style type="text/css">
    .tablinks {
	width:100%;
	height: 50px;
	

}


.tab {
    overflow: hidden;
   
}
.tab button {
    background-color: inherit;
    
    cursor: pointer;
    border: 0;
    font-size: 20px;
   
}
.tab button:hover {
background-color:#505050;
	color: white;

}
.tab button.active {
  background-color:#505050;
	color: white;
}
.tabcontent {
    display: none;
    	
    border-top: none;
}
.profile_info li{
	display: inline-table;
	list-style-type: none;
}
.last_item_profile{
	padding-bottom: 80px;
}
	.first_item_profile{
		padding-top: 20px;
	}
.account_body_info{
		margin-top: 25px;
		margin-bottom: 10%;
	}
	.title_profile{
		padding-left: 4%;
	}
	.title_profile p{
		font-size: 18px;
    font-weight: bold;
    color: #6F7587;
    padding-bottom:10px;
		
	}
	hr{
		color: #BFBFBF;
		margin-left: 4.5%;
		margin-right:4.5%;
	}
	.right_side {
		font-size: 18px;
    font-weight: bold;
    color: black;
    width: 50%;
		
	}
	.left_side{
	width: 40%;
		font-size: 18px;
    font-weight: bold;
    color: #6F7587;
	}
	.Edit_information_button{

        width: 110px;
        height: 30px;
       margin-right:4.5%;
        background-color: #299AD2;
       border-radius: 40px;
        float: right;
        color:white ;
        cursor: pointer;
    border: 0;
    font-size:15px ;
	}
	.sub_plan{
        width: 100%;
        height: 200px;
        background: #FFFFFF;
        box-shadow: 0px 0px 25px rgba(138, 138, 138, 0.25);
        border-radius: 40px;
            border: 0;
               margin-bottom: 3%;
               font-family: Roboto;
               font-style: normal;
               font-weight: bold;
               font-size: 17px;


    }


    .active {
      box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), inset 0px 0px 25px rgba(9, 196, 255, 0.25);
    }

    .sub_plan:hover{
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), inset 0px 0px 25px rgba(9, 196, 255, 0.25);
    }
   .fat_plan{
               font-family: Roboto;
               font-style: normal;
               font-weight: bold;
               font-size: 25px;

   }
   .сancel_sub{
    background: #FFFFFF;
box-shadow: 0px 0px 29px rgba(182, 61, 61, 0.25);
border-radius: 10px;
width: 40%;
height: 70px;
border: 0;
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 25px;
line-height: 34px;
color: #AA3737;

   }
   .subscription_items{
    text-align: center;
   }
   .сancel_sub:hover{
    box-shadow: 0px 0px 29px rgba(182, 61, 61, 0.25), inset 0px 0px 29px rgba(182, 61, 61, 0.25);
   }
   .account_orders .history_order_item{

    vertical-align: middle;
    width: 100%;
       height: 168px;
       background: #FFFFFF;
box-shadow: 0px 0px 25px rgba(138, 138, 138, 0.25);
border-radius: 40px;
margin-bottom: 4%;

   }
   .account_orders .history_order_item p{
    display: inline-block;
        vertical-align: middle;


   }
   .account_orders .history_order_item img{
    display: inline-block;
        vertical-align: middle;
        margin-top: 30px;
        margin-left: 3px;


   }
   .price_oder_item,.quantity_oder_item,.category_oder_item,.type_oder_item,.title_oder_item{
font-family: Roboto;
font-style: normal;
font-weight: bold;
font-size: 16px;
line-height: 19px;
color: #262626;
margin-right: 5%;

}
.img_order_item{
    vertical-align: middle;
   width: 100px;

}
.title_oder_item{

.type_oder_item{

}
.category_oder_item{

}
.quantity_oder_item{

}
.price_oder_item{

}
</style>
    <script type="text/javascript">
    

    	function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
    


    </script>
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
        <?php if ($_SESSION["id"]): 
            $user = Database::sendQuery("SELECT * FROM `users` WHERE `user_id` = '" . $_SESSION["id"]. "'")->fetch_array();

            ?>

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
                        <ul class="account_menu tab">
                         <li><button class="tablinks" onclick="openCity(event, 'Account')" id="click">Account information</button></li>
                          <li><button class="tablinks" onclick="openCity(event, 'Subscription')">Subscription</button><li>
                            <li><button class="tablinks" onclick="openCity(event, 'Orders')">Orders history</button></li>
                            <li><button class="tablinks" onclick="openCity(event, 'Chat')">Chat</button></li>
                            <li><a href="../web/exit.php">Exit</a></li>
                        </ul>
                    </div>
                </div>
                <div class="account_content">
                    <!-- account info -->
                    <div class="account_info tabcontent" id="Account">
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
                                        <p>login</p>
                                        <p class="user_login" id="userAccountLog"><?=$user["login"]?></p>
                                        
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="account_body_info block_theme" id="profile">
                        	<div class="title_profile">
                        	<div class="account_head_content_top">
                                    <h2 class="first_item_profile">Private information</h2>
                             </div>
                             <button class="Edit_information_button" id="edit_button">Edit</button>
                           <p>Your private information is not visible to others.</p>
                           </div>

                           <ul class="profile_info">
                                        	<li class="left_side">Email address</li>
                                        	<li class="right_side" ><?=$user["email"]?></li>
                                        </ul>
                                          <hr>

                                        <ul class="profile_info">
                                            <li class="left_side"> Fullname</li>
                                            <li class="right_side"><?=$user["fullname"]?></li>
                                        </ul>
                                          <hr>


                                        <ul class="profile_info">
                                        	<li class="left_side">Name</li>
                                        	<li class="right_side"><?=$user["name"]?></li>
                                        </ul>
                                          <hr>
 
                                        <ul class="profile_info">
                                        	<li class="left_side">Patronymic</li>
                                        	<li class="right_side"><?=$user["patronymic"]?></li>
                                        </ul>
                                          <hr>


                                        <ul class="profile_info">
                                        	<li class="left_side">Number</li>
                                        	<li class="right_side"><?=$user["number"]?></li>
                                        </ul>
                                          <hr>


                                        <ul class="profile_info">
                                        	<li class="left_side">Address</li>
                                        	<li class="right_side"><?=$user["address"]?></li>
                                        </ul>
                                          <hr>


                                        <ul class="profile_info">
                                        	<li class="left_side">Password</li>
                                        	<li class="right_side">************</li>
                                        </ul>
                                          <hr>


                                        <ul class="profile_info last_item_profile">
                                        	<li class="left_side">Birthday</li>
                                        	<li class="right_side"><?=$user["birthday"]?></li>
                                        </ul>
                        </div>
                        <div class="account_body_info block_theme" id="profile_edit" style="display: none;">
                            <form method="POST">
                                <div class="title_profile">
                            <div class="account_head_content_top">
                                    <h2 class="first_item_profile">Private information</h2>
                             </div>
                             <button class="Edit_information_button">Save</button>
                           <p>Your private information is not visible to others.</p>
                           </div>

                           <ul class="profile_info">
                                            <li class="left_side">Email address</li>
                                            <li class="right_side" ><input name="email" value="<?=$user["email"]?>"></li>
                                        </ul>
                                          <hr>

                                        <ul class="profile_info">
                                            <li class="left_side"> Fullname</li>
                                            <li class="right_side"><input name="fullname" value="<?=$user["fullname"]?>"></li>
                                        </ul>
                                          <hr>


                                        <ul class="profile_info">
                                            <li class="left_side">Name</li>
                                            <li class="right_side"><input name="name" value="<?=$user["name"]?>"></li>
                                        </ul>
                                          <hr>
 
                                        <ul class="profile_info">
                                            <li class="left_side">Patronymic</li>
                                            <li class="right_side"><input name="patronymic" value="<?=$user["patronymic"]?>"></li>
                                        </ul>
                                          <hr>


                                        <ul class="profile_info">
                                            <li class="left_side">Number</li>
                                            <li class="right_side"><input name="number" value="<?=$user["number"]?>"></li>
                                        </ul>
                                          <hr>


                                        <ul class="profile_info">
                                            <li class="left_side">Address</li>
                                            <li class="right_side"><input name="address" value="<?=$user["address"]?>"></li>
                                        </ul>
                                          <hr>


                                        <ul class="profile_info">
                                            <li class="left_side">Password</li>
                                            <li class="right_side"><input name="password"></li>
                                        </ul>
                                          <hr>


                                        <ul class="profile_info last_item_profile">
                                            <li class="left_side">Birthday</li>
                                            <li class="right_side"><input name="birth" value="<?=$user["birthday"]?>" type="date"></li>
                                        </ul>
                            </form>
                        </div>
                    </div>
                    <!-- account subscription -->
                    <div class="account_subscription account_info tabcontent " id="Subscription">
                        <div class="account_head_info">
                            <div class="bg_file">
                                <h3>Subscription</h3>
                                <img src="photo/fileAccountBg1.png" alt="">
                            </div>
                            <div class="account_head_content block_theme" style="display: table; top:75px; margin-bottom: 20%;">
                                <div class="subscription_items">
                                  <?php
                                  $subscription_id = Database::sendQuery("SELECT * FROM `users` WHERE user_id='${_SESSION["id"]}'")->fetch_array()["subscription_id"];

                                  $subscriptions = Database::sendQuery("SELECT * FROM `subscriptions`");

                                  while ($sub = $subscriptions->fetch_assoc()):

                                    ?>                         
                                        <button style="cursor: pointer;" onclick="window.location = '/profile.php?sub=<?=$sub["subscription_id"]?>'" class="sub_plan <?=($sub["subscription_id"] == $subscription_id ? "active" : "")?>"><p class="fat_plan"><?=$sub["name"]?></p><br>$<?=$sub["price"]?>/month after offer period</button>
                                    <? endwhile; ?>         

                                    <button style="cursor: pointer;" onclick="window.location = '/profile.php?sub=0'" href="/?subscription=0" class="сancel_sub <?=($sub["subscription_id"] == 0 ? "active" : "")?>">Отменить подписку</button>
                                </div>

                            </div>

                        </div>
 
                    
                    <!-- account orders -->
                    <div class="account_orders  account_info tabcontent" id="Orders">
                          <div class="account_head_info">
                            <div class="bg_file">
                                <h3>Order history</h3>
                                <img src="photo/fileAccountBg1.png" alt="">
                            </div>
                            <div class="account_head_content block_theme"  style="display: table; top:75px; margin-bottom: 20%; width: 93.7%;">

                                <div class="history_order_item">
                                    <img class="img_order_item" src="photo/lampochka.png">
                                    <p class="title_oder_item">Смарт лампочка Xiaomi</p>
                                    <p class="type_oder_item">Устройства</p>
                                    <p class="category_oder_item">Умные устройства</p>
                                    <p class="quantity_oder_item">100 шт.</p>
                                    <p class="price_oder_item">1000 грн</p>
                                </div>
                                <div class="history_order_item">
                                    <img class="img_order_item" src="photo/lampochka.png">
                                    <p class="title_oder_item">Смарт лампочка Xiaomi</p>
                                    <p class="type_oder_item">Устройства</p>
                                    <p class="category_oder_item">Умные устройства</p>
                                    <p class="quantity_oder_item">100 шт.</p>
                                    <p class="price_oder_item">1000 грн</p>
                                </div>
                                <div class="history_order_item">
                                    <img class="img_order_item" src="photo/lampochka.png">
                                    <p class="title_oder_item">Смарт лампочка Xiaomi</p>
                                    <p class="type_oder_item">Устройства</p>
                                    <p class="category_oder_item">Умные устройства</p>
                                    <p class="quantity_oder_item">100 шт.</p>
                                    <p class="price_oder_item">1000 грн</p>
                                </div>
                                

                                </div>



                            </div>
                    </div>
                    <!-- account chat -->
                    <div class="account_chat tabcontent" id="Chat">
                    <div class="account_info" id="Account">
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
                           <h3></h3>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </main>

        <?php else:?>
        <a href="Login.php">To authorization page</a>
        <?php endif;?>

        <?php include 'parts/footer.php' ?>
    </div>

    <script src="js/loader.js"></script>
    <script src="https://kit.fontawesome.com/e3dce40605.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
    		document.getElementById("click").click();
            document.getElementById("edit_button").addEventListener("click", () => {
                document.getElementById("profile").style.display = "none";
                document.getElementById("profile_edit").style.display = "block";
            });
    </script>
</body>

</html>