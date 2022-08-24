<?php 

if(isset($_GET['delete_orders'])){
    $delete_order=$_GET['delete_orders'];

    // echo $delete_category;
    $delete_order="Delete from `user_orders` where order_id='$delete_order'";
    $result=mysqli_query($con,$delete_order);
    if($result){
        echo "<script>alert('order is deleted succesfully')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
    }
}

?>
