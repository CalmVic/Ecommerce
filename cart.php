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
    <title>Ecommerce Website_Cart Details.</title>
    <!-- bootstrap CSS link   -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="./victor.css">

    <style>
      .cart_img{
        width: 70px;
        height: 70px;
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
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="display_all.php">Products</a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="./user_area/user_registration.php">Register</a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
                </li>
            </ul>
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

        <!-- fourth child-table -->
        <div class="container">
            <div class="row">
              <form action="" method="post">
                <table class="table table-bordered text-center">
                    <!-- <thead>
                        <tr>
                            <th class="px-4">Product Title</th>
                            <th class="px-4">Product Image</th>
                            <th class="px-4">Quantity</th>
                            <th class="px-4">Total Price</th>
                            <th class="px-4">Remove</th>
                            <th class="px-4" colspan="2">Operations</th>
                        </tr>
                    </thead>
                    <tbody> -->

                    <!-- php code to display the dynamic product in cart.php-->
                          <?php
                          global $con;
                          $get_ip_add = getIPAddress();  
                          $total_price = 0;
                          $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
                          $result=mysqli_query($con,$cart_query);
                          $result_count=mysqli_num_rows($result);
                          if($result_count>0){
                            echo " <thead>
                            <tr>
                                <th class='px-4'>Product Title</th>
                                <th class='px-4'>Product Image</th>
                                <th class='px-4'>Quantity</th>
                                <th class='px-4'>Total Price</th>
                                <th class='px-4'>Remove</th>
                                <th class='px-4' colspan='2'>Operations</th>
                            </tr>
                        </thead>
                        <tbody>";
                          while($row=mysqli_fetch_array($result)){
                            $product_id=$row['product_id'];  
                            $select_products="select * from `products` where product_id='$product_id'";
                            $result_products=mysqli_query($con,$select_products);
                            while($row_product_price=mysqli_fetch_array($result_products)){
                              $product_price=array($row_product_price['product_price']);
                              $price_table=$row_product_price['product_price'];
                              $product_title=$row_product_price['product_title'];
                              $product_image1=$row_product_price['product_image1'];
                              $product_values=array_sum($product_price); //[500]
                              $total_price+=$product_values;  //500
                           
                              ?>
                        <tr>
                            <td><?php echo $product_title?></td>
                            <td><img src="./images/<?php echo $product_image1?>" alt="" class="cart_img"></td>
                            <td><input type="text" class="form-input w-50" name="qty"></td>
                            
                            <?php 
                            $get_ip_add = getIPAddress();  
                            if(isset($_POST['update_cart'])){
                                  $quantities=$_POST['qty'];
                                  $update_cart="update `cart_details` set quantity='$quantities'
                                   where ip_address='$get_ip_add'";
                                   $result_products_quantity=mysqli_query($con,$update_cart);
                                   $total_price=$total_price*$quantities;
                            }
                             ?>


                            <td><?php echo $price_table?></td>
                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>"></td>
                            <td>
                            
                            <input type="submit" value="Update cart"
                             class="bg-info border-0 p-2 text-light" name="update_cart">
                             <input type="submit" value="Remove cart"
                             class="bg-info border-0 p-2 text-light" name="remove_cart">
                            <!-- <button class="bg-info border-0 p-2 mx-3 text-light mb-2">Remove</button> -->
                            </td>

                        </tr>
                        <?php  }}}
                        else{
                          echo"<h2 class='text-danger text-center'>Cart is empty</h2>";
                        }
                        ?> 
                    </tbody>
                </table>




                <!-- Subtotal -->
                <div class="d-flex mb-3">
                  <?php
                          global $con;
                          $get_ip_add = getIPAddress(); 
                          $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
                          $result=mysqli_query($con,$cart_query);
                          $result_count=mysqli_num_rows($result);
                          if($result_count>0){
                            echo "<h4 class='px-3'>Subtotal:#<strong class='text-info'>$total_price</strong></h4>
                            <input type='submit' value='Continue Shopping' name='continue_shopping'
                             class='bg-info border-0 p-2 mx-3 text-light'>
                            <button class='bg-secondary border-0 p-2 '><a href='user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>
                        </div>";
                          }else{
                            echo" <input type='submit' value='Continue Shopping' name='continue_shopping'
                             class='bg-info border-0 p-2 mx-3 text-light'>";
                          }

                          if(isset($_POST['continue_shopping'])){
                            echo"<script>window.open('index.php','_self')</script>";
                          }
                   ?>
            </div>
        </div>
        </form>
        <!-- function to remove item -->
        <?php 
        function remove_cart_item(){
          global $con;
          if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id){
              echo $remove_id;
              $delete_query="Delete from `cart_details` where product_id=$remove_id";
              $run_delete=mysqli_query($con,$delete_query);
              if($run_delete){
                echo"<script>window.open('cart.php','_self')</script>";
              }
            }
          }
        }
        echo $remove_item=remove_cart_item();
        ?>



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