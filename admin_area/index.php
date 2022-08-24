<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap CSS link   -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <!-- <link rel="stylesheet" href="../victor.css"> -->
    <style>
    .footer{
    position: absolute;
    bottom: 0;
     }

     body{
        overflow-x: hidden;
     }
     .product_image{
        width: 100px;
        object-fit: contain;
     }
</style>
</head>
<body>
<!-- navbar -->
<div class="container-fluid p-0">
    <!-- first child -->
 <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
       <img src="../images/icons/logo-01.png" alt="">
       <nav class="navbar navbar-expand-lg">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="" class="nav-link">Welcome Guest</a>
              </li>
            </ul>
        </nav>
 </div>
 </nav>
  <!-- second child -->
  <div class="bg-light">
      <h3 class="text-center p-2">Manage Details</h3>
  </div>
    <!-- third child -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="p-3">
                <a href="#"><img src="../images/item-cart-05.jpg" alt=""></a>
                <p class="text-light">Admin Name</p>
            </div>
            <!-- button*10>a.nav-link.text-light.bg-info.my-1 -->
            <div class="button text-center">
                <button><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">List Users</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
            </div>
        </div>
    </div>
</div>
<!-- fourth child -->
<div class="container my-5">
<?php
if(isset($_GET['insert_category'])){
include('insert_categories.php');
}
if(isset($_GET['insert_brand'])){
    include('insert_brands.php');
    }
    if(isset($_GET['view_products'])){
        include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
          include('edit_products.php');
          }
          if(isset($_GET['delete_product'])){
            include('delete_product.php');
            }
            if(isset($_GET['view_categories'])){
              include('view_categories.php');
              }
              if(isset($_GET['view_brands'])){
                include('view_brands.php');
                }
                if(isset($_GET['edit_category'])){
                  include('edit_category.php');
                  }
                  if(isset($_GET['edit_brands'])){
                    include('edit_brands.php');
                    }
                    if(isset($_GET['delete_category'])){
                      include('delete_category.php');
                      }
                      if(isset($_GET['delete_brands'])){
                        include('delete_brands.php');
                        }
                        if(isset($_GET['list_orders'])){
                          include('list_orders.php');
                          }
                          if(isset($_GET['delete_orders'])){
                            include('delete_orders.php');
                            }
  ?>
</div>


<!-- last child -->
<!-- <div class="bg-info p-3 text-center footer">
  <p>All rights reserved &copy; Designed by Victor-2022</p>
</div> -->
 <!-- include footer -->
 <?php include("../includes/footer.php")?>
   </div>
   
<!-- bootstrap js link -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>