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
    <title>Admin Login</title>
     <!-- bootstrap CSS link   -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow: hidden;
            background-color: #e6e2df;
        }
        
        h6{
        color:#e6e2df;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center m-5">Admin Login</h2>
        <div class="row d-flex justify-content-center m-auto align-items-center">
            <div class="col-lg-6 col-xl-3">
                <img src="../images/login (2).jpg" alt="Admin Login" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5 bg-info ">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username"
                        placeholder="Enter your name" required class="form-control">
                    </div>

                    <!-- password -->
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password"
                        placeholder="Enter your pasword" required class="form-control">
                    </div>

                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0 text-light" 
                        name="admin_login" value="Login">
                        <h6 class="mt-2 pt-1 text-capitalize">Don't you have an account ? <a href="admin_registration.php" class="text-light">Register</a></h6>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>


<?php 
if(isset($_POST['admin_login'])){
   $username=$_POST['username'];
   $password=$_POST['password'];

  $select_query="select * from `admin_table` where admin_name='$username'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);


    if($row_count>0){
        $_SESSION['admin_name']=$username;
      if(password_verify($password,$row_data['admin_password'])){
        $_SESSION['admin_name']=$username;
        echo "<script>alert('Login successful')</script>";
        echo "<script>window.open('index.php','_self')</script>";
      
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
}
?>