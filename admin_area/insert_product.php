<!-- connect file -->
<?php
include('../includes/connect.php');
  if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';


    // accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];


    // accessing image tmp name   
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];


    // checking empty condition
    if($product_title=='' or 
    $description=='' or $product_keywords=='' or
     $product_category=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or 
     $product_image2=='' or $product_image3=='' ){

        echo "<script>alert('please fill all the available fields')</script>";
        exit();
     }else{
         move_uploaded_file($temp_image1,"./product_images/$product_image1");
         move_uploaded_file($temp_image2,"./product_images/$product_image2");
         move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //  insert query
        $insert_products=" insert into `products` (product_title,
        product_description,product_keywords,category_id,brand_id,
        product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title',
        '$description','$product_keywords','$product_category','$product_brands','$product_image1',
        '$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('successfully inserted the products')</script>";
        }
     }
  }
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <!-- bootstrap CSS link   -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <!-- <link rel="stylesheet" href="victor.css"> -->

</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control mb-4"
                 placeholder="Enter product title" autocomplete="off" required="required" >
            </div>


            <!-- description -->
            <div class="form-outline w-50 m-auto">
                <label for="description" class="form-label">Product description</label>
                <input type="text" name="description" id="description" class="form-control mb-4" 
                placeholder="Enter product description" autocomplete="off" required="required" >
            </div>

            <!-- keywords -->
            <div class="form-outline w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control mb-4" 
                placeholder="Enter product keywords" autocomplete="off" required="required" >
            </div>
            
            <!-- categories -->
            <div class="form-outline w-50 m-auto">
                <select name="product_category" id="" class="mb-4 w-100">
                    <option value="">Select a Category</option>
                     <?php 
                     $select_query="select * from `categories`";
                     $result_query=mysqli_query($con,$select_query);
                     while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                     }
                    ?>
                    <!-- <option value="">Category1</option>
                    <option value="">Category2</option>
                    <option value="">Category3</option>
                    <option value="">Category4</option> -->
                </select>
            </div>
            

            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="w-100 mb-4 form-select">
                    <option value="">Select a Brands</option>
                    <?php 
                     $select_query="select * from `Brands`";
                     $result_query=mysqli_query($con,$select_query);
                     while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                     }
                    ?>
                    <!-- <option value="">Brand1</option>
                    <option value="">Brand2</option>
                    <option value="">Brand3</option>
                    <option value="">Brand4</option> -->
                </select>
            </div>

             <!-- image 1 -->
             <div class="form-outline w-50 m-auto">
                <label for="product_image1" class="form-label">Product image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control mb-4"  required="required" >
            </div>
            
            <!-- image 2 -->
            <div class="form-outline w-50 m-auto">
                <label for="product_image2" class="form-label">Product image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control mb-4"  required="required" >
            </div>

            <!-- image 3 -->
            <div class="form-outline w-50 m-auto">
                <label for="product_image3" class="form-label">Product image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control mb-4"  required="required" >
            </div>

            <!-- price -->
            <div class="form-outline w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control mb-4"
                 placeholder="Enter product price" autocomplete="off" required="required" >
            </div>

             <!-- submit -->
             <div class="form-outline w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>

</body>
</html>
