<!-- connect file -->
<?php
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website Using PHP and MySQL.</title>
    <!-- bootstrap CSS link   -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="./victor.css">

    <style>
      body{
    overflow-x: hidden;
}

    </style>
</head>

<body>
         <!-- navbar -->
<div class="container-fluid p-0">
          <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light "><a href="index.php">
          <img src="./images/icons/logo-01.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="display_all.php">Products</a>
                </li>

                <?php 
                if(isset($_SESSION['username'])){
                  echo "<li class='nav-item active'>
                  <a class='nav-link' href='./user_area/profile.php'>My account</a>
                  </li>";
                }else{
                  echo "<li class='nav-item active'>
                  <a class='nav-link' href='./user_area/user_registration.php'>Register</a>
                  </li>";
                }
                  ?>
                <li class="nav-item active">
                <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="#">Total Price: #<?php total_cart_price(); ?></a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search_product.php" method="get">
              <input class="form-control mr-sm-2" type="search" placeholder="Search"
               aria-label="Search" name="search_data">
              <!-- <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button> -->
              <input type="submit" value="Search" class="btn btn-outline-secondary" name="search_data_product">
            </form>
          </div>
        </nav>

        <!-- calling cart function -->
        <?php 
        cart();
        ?>
          

                      
        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav me-auto">
            <?php 
if(!isset($_SESSION['username'])){
  echo  "<li class='nav-item'>
  <a class='nav-link' href=''>Welcome Guest</a>
</li>";
  }else{
  echo "<li class='nav-item'>
  <a class='nav-link' href=''>Welcome ".$_SESSION['username']."</a>  
  </li> ";
  }



          if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/user_login.php'>Login</a>  
          </li> ";
          }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./user_area/logout.php'>Logout</a>  
          </li> ";
          }
          ?>
          </ul>
        </nav>

        <!-- third child -->
        <div class="bg-light">
          <h3 class="text-center">Hidden Store </h3>
          <p class="text-center">Communication is at the heart of e-commerce and community</p>
        </div>

      <!-- fourth child -->
      <div class="row px-1">

           <!-- col md-10 div begin-->
          <div class="col-md-10">
              <!-- products -->
              <div class="row">

              
                <!-- fetching the product -->
        <?php
        // calling function
        getproducts();
        get_unique_categories();
        get_unique_brands();
        // $ip = getIPAddress();  
        // echo 'User Real IP Address - '.$ip;  
        ?>
           <!-- row class end div -->
              </div>
            <!-- col md-10 div end -->
          </div>
              



                <!-- brands and cats div -->
              <div class="col md-2 bg-secondary p-0">
                    <!-- brands to be displayed -->
                  <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                    </li>

                    <?php
                    getbrands();

                          ?>



                  <!-- Decided to keep this to show h4 & without h4-->
                    
                    <!-- <li class="nav-item">
                    <a href="#" class="nav-link text-light">Brand1</a>
                    </li> -->
                    
                  </ul>
                  
                <!-- categories to be displayed -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>

              <?php
               getcategories();

              ?>
              </ul>
         <!-- brands and cats div -->
          </div>


<!-- last fourth child div -->
      </div>


        <!-- last child -->
        <!-- include footer -->
        <?php include("./includes/footer.php")?>

<!-- container fluid div -->
</div>





<!-- bootstrap js link -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>