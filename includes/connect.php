<?php
// error_reporting(E_ALL);
$con= new mysqli('localhost', 'root', '', 'mystore');
if(!$con){
    die(mysqli_error($con));
    }

        
?>


<!-- <?php

// $vic=new mysqli('localhost', 'root', '', 'mystore');
// if($vic){
//     echo "connection successful";
// }else{
//     die(mysqli_error($vic));
// }
?> -->
