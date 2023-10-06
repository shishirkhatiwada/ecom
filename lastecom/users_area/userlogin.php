<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <style>
  body{
    overflow-x: hidden;
  }
 </style>
</head>
<body>



<main class="w-100 m-auto m-6">
  <div class="container ">
    <div class="row justify-content-center">
      <div class="col-md-6 p-5">
        <div class="card shadow-sm m-auto">
          <div class="card-body m-5 ">
            <h1 class="main-heading">Login</h1>
            <form method="POST" action="" > 
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">Username</label>
                <div class="col-md-6">
                  <input id="text" type="name" class="form-control " name="user_username" value="" required autocomplete="name" autofocus>
                </div>
              </div>
            


              <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control " name="user_password" required autocomplete="current-password">
                </div>
              </div>

          

            
              <div class="row mb-0 mt-4 gap-3">
                <div class="col-md-8 offset-md-3">
                  <input type="submit" class="btn btn-primary py-1 px-4" name="user_login" value="Login">
                
                 

                 
               


              </div>
              <div class="col-md-8 offset-md-3">
                 <p class="small">Don't have an account <a href="userregister.php" class="text-danger">Register</a></p>
                 

               
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

</body>
</html>



<?php

@session_start();
include('../includes/connect.php'); // Make sure to include your database connection
include('../functions/common_functions.php');

if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    // You should use prepared statements to prevent SQL injection
    $select_query = "SELECT * FROM `user_table` WHERE username = ?";
    $stmt = mysqli_prepare($con, $select_query);
    mysqli_stmt_bind_param($stmt, "s", $user_username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verify the password
        if (password_verify($user_password, $row['user_password'])) {
            // Password is correct, set user session
            $_SESSION['username'] = $user_username;

            // Check if the user has items in their cart
            $user_ip = getIPAddress();
            $select_cart_items = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";
            $result_cart = mysqli_query($con, $select_cart_items);
            $row_count = mysqli_num_rows($result_cart);

            if ($row_count > 0) {
                // User has items in the cart, redirect to payment page
                echo "<script>alert('Login successful. Redirecting to payment page.')</script>";
                echo "<script>window.open('./payment.php', '_self')</script>";
            } else {
                // User doesn't have items in the cart, redirect to profile page
                echo "<script>alert('Login successful. Redirecting to profile page.')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";
            }
        } else {
            echo "<script>alert('Incorrect password. Please try again.')</script>";
        }
    } else {
        echo "<script>alert('Username not found. Please check your username.')</script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con); // Close the database connection
}
?>




