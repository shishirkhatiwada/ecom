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
   
</head>
<body>



<main class="w-100 m-auto p-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <h1 class="main-heading text-center p-4">Admin Login</h1>
            <form method="POST" action="" enctype="multipart/form-data"> 
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">Username</label>
                <div class="col-md-6">
                  <input id="text" type="name" class="form-control " name="username" value="" required autocomplete="name" autofocus>
                </div>
              </div>
          

              <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password">
                </div>
              </div>

             

              <div class="row mb-0 mt-4">
              <div class="row mb-0 mt-4 gap-3">
                <div class="col-md-8 offset-md-3">
                  <input type="submit" class="btn btn-primary py-1 px-4" name="admin_login" value="Login">
                

              </div>
              <div class="col-md-8 offset-md-3">
                 <p class="small">Don't have an account</p>
                 <a href="adminregister.php" class="text-danger">Register</a>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Bootstrap footer -->


</body>
</html>


<?php
session_start(); // Start a session to manage user sessions
include('../includes/connect.php'); // Include the database connection once at the beginning

if (isset($_POST['admin_login'])) {
    $admin_name = mysqli_real_escape_string($con, $_POST['username']);
    $admin_password = mysqli_real_escape_string($con, $_POST['password']);

    // Query to fetch admin data by username
    $query = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_name'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['admin_password'];

        // Verify the password
        if (password_verify($admin_password, $hashed_password)) {
            // Password is correct, create a session and redirect to a dashboard or home page
            $_SESSION['admin_id'] = $row['admin_id'];
            $_SESSION['admin_name'] = $row['admin_name'];
            header("Location: index.php"); // Replace with the actual dashboard page
            exit; // Terminate script execution after the redirection
        } else {
            echo "<script>alert('Invalid password. Please try again.')</script>";
        }
    } else {
        echo "<script>alert('Admin not found. Please check your username.')</script>";
    }
}
?>








