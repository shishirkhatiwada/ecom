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
            <h1 class="main-heading text-center p-4">Admin Register</h1>
            <form method="POST" action="" enctype="multipart/form-data"> 
          
            <div class="row mb-3">
    <label for="username" class="col-md-4 col-form-label text-md-end">Username</label>
    <div class="col-md-6">
        <input id="username" type="text" class="form-control" name="username" value="" required autocomplete="name" autofocus>
    </div>
</div>



              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control " name="email" value="" required autocomplete="email" autofocus>
                </div>
              </div>

              <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control " name="password" required autocomplete="current-password">
                </div>
              </div>

              <div class="row mb-3">
                <label for="confirm_password" class="col-md-4 col-form-label text-md-end">Confirm Password</label>
                <div class="col-md-6">
                  <input id="confirm_password" type="password" class="form-control " name="confirm_password" required autocomplete="current-password">
                </div>
              </div>


             

              <div class="row mb-0 mt-4">
              <div class="row mb-0 mt-4 gap-3">
                <div class="col-md-8 offset-md-3">
                  <input type="submit" class="btn btn-primary py-1 px-4" name="admin_register" value="Register">
                

              </div>
              <div class="col-md-8 offset-md-3">
                 <p class="small">Already have an account</p>
                 <a href="adminlogin.php" class="text-danger">Login</a>

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
include('../includes/connect.php'); // Include the database connection once at the beginning

if (isset($_POST['admin_register'])) {
    $admin_name = mysqli_real_escape_string($con, $_POST['username']);
    $admin_email = mysqli_real_escape_string($con, $_POST['email']);
    $admin_password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    // Check if the username or email already exists
    $check_query = "SELECT * FROM `admin_table` WHERE admin_name = '$admin_name' OR admin_email = '$admin_email'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Username or email address already exists. Please choose a different username or email.')</script>";
    } else {
        // Check if the passwords match
        if ($admin_password !== $confirm_password) {
            echo "<script>alert('Passwords do not match. Please try again.')</script>";
        } else {
            // Hash the password
            $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

            // Insert data into the admin_table
            $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($con, $insert_query);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sss", $admin_name, $admin_email, $hashed_password);

            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Admin registered successfully')</script>";
                // Redirect to a different page after successful registration
                header("Location: adminlogin.php");
                exit; // Terminate script execution after the redirection
            } else {
                echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
            }

            mysqli_stmt_close($stmt);
        }
    }
}
?>







