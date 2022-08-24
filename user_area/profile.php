<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?Php echo $_SESSION['username'] ?></title>
    <!-- bootstrap CSS link   -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="../victor.css">

    <style>
      body{
    overflow-x: hidden;
}

   .profile_image{
    width: 100%;
    /* height: 100%; */
    object-fit: contain;
   }


   .edit_image{
    height: 100px;
    width: 100px;
    object-fit: contain;
}
    </style>
</head>

<body>
         <!-- navbar -->
<div class="container-fluid p-0">
          <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light ">
          <img src="./images/icons/logo-01.png" alt="">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="../display_all.php">Products</a>
                </li>
                <?php 
                if(isset($_SESSION['username'])){
                  echo "<li class='nav-item active'>
                  <a class='nav-link' href='profile.php'>My account</a>
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
                <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="#">Total Price: #<?php total_cart_price(); ?></a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="../search_product.php" method="get">
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
          <a class='nav-link' href='logout.php'>Logout</a>  
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
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                <li class="nav-item bg-info">
                <a class="nav-link" href="#"><h4 class="text-light">Your Profile</h4></a>
                </li>
                <?php
                $username=$_SESSION['username'];
                $user_image="select * from `user_table` where username='$username'";
                $user_image=mysqli_query($con,$user_image);
                $row_image=mysqli_fetch_array($user_image);
                $user_image=$row_image['user_image'];
                echo"<li class='nav-item'>
                <img src='./user_images/$user_image' alt='' class='profile_image my-4'>
               </li>";
                ?>
                
                <li class="nav-item">
                <a class="nav-link text-light" href="profile.php">Pending Orders</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-light" href="logout.php">Logout</a>
                </li>
                </ul>
            </div>
            <div class="col md-10 text-center">

            <!-- calling function for order -->
              <?php get_user_order_details();
              if(isset($_GET['edit_account'])){
                include('edit_account.php');
              }
              if(isset($_GET['my_orders'])){
                include('user_orders.php');
              }
              if(isset($_GET['delete_account'])){
                include('delete_account.php');
              }
              ?>
            </div>
        </div>

      
        <!-- last child -->
        <!-- include footer -->
        <?php include("../includes/footer.php")?>

<!-- container fluid div -->
</div>





<!-- bootstrap js link -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>