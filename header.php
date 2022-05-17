<?php

include_once("connection.php");
include_once("header.php");

if(!empty($_SESSION['username'])){
   $login_username= $_SESSION['username'];
   $get_data= "select * from users where username='$login_username'";
   $res_data = @mysqli_query($conn,$get_data);
   $count_data = @mysqli_num_rows($res_data);
   if($count_data > 0){
      $fh_data = @mysqli_fetch_array($res_data);
      $id= $fh_data['users_id'];
      $email= $fh_data['email'];
      $username= $fh_data['username'];
    }
}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <!-- title -->
     <title>Mobile Shop</title>
  
   
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">


    <!-- css for slider -->
    

     <!--[if IE 9]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" />
        <![endif]-->
        <!--[if IE]>
            <script src="js/html5shiv.min.js"></script>
    <![endif]-->

    
</head>

<body id="" class=''>

<!-- START HEADER SECTION -->
<header id="masthead">
  <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="index.php">MobileShop</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
           
            <li>
              <form action="search.php">
                <input  type="Search" name="key" id="search" placeholder="Search..">
                <input type="submit" value="Search" id="Search">
              </form>
            </li>
            <?php if(isset($_SESSION['username'])){ ?>
              <li class="dropdown"><a href="logout.php" id="logout" class="f700">Logout</a></li>
            <?php } else{ ?>
              <li><a href="login.php">Sign In </a></li>
            <?php } ?>
            <?php if(isset($_SESSION['username'])){ ?>
              <li><a href="viewCart.php" class="cart_bg"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </a></li>
            <?php } else{ ?>
              <li><a href="#" class="cart_bg"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
  </nav>

  <div class="preheader">
    <div class="container">
     <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Brands <span class="fa fa-angle-down"></span></a>
          <ul class="dropdown-menu">
             <?php
                $sql = 'SELECT * FROM product_category order by id';
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) 
                {
              ?>
                                                  
            <li><a href="Product.php?id=<?php echo $row['id'];?>"><?php echo $row["category_name"];?></a> </li>
            <?php 
              } 
            }
            ?>                                                                                                                                                                                         
          </ul>
        </li>

        <li><a href="about.php">About</a></li>

        <li><a href="contact.php">Contact</a></li>
        <?php if(isset($_SESSION['username'])){ ?>
          <li class="dropdown"><a href="profile.php" id="logout" class="f700"><?php echo $username;?>'s Profile</a></li>
        <?php } else{?>
        <li><a href="register.php">Sign up</a></li>
        <?php } ?>
       </ul>
     </div>  
  </div>
</header>
 