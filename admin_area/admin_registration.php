<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
        <h2 class="text-center m-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-4">
                <img src="../images/register.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5 bg-info">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username"
                        placeholder="Enter your name" required class="form-control">
                    </div>

                    <!-- email -->
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email"
                        placeholder="Enter your email" required class="form-control">
                    </div>

                    <!-- password -->
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password"
                        placeholder="Enter your pasword" required class="form-control">
                    </div>

                    <!-- conf password -->
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Password</label>
                        <input type="password" id="confirm_password" name="confirm_password"
                        placeholder="Confirm your pasword" required class="form-control">
                    </div>

                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0 text-light" 
                        name="admin_registration" value="Register">
                        <h6 class="mt-2 pt-1 text-capitalize">Do you already have an account? <a href="admin_login.php" class="text-light">Login</a></h6>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>