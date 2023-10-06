<?php  

include('../includes/connect.php');
include('../functions/common_functions.php');

?>


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



<main class="w-100 m-auto">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-body">
            <h1 class="main-heading">Register</h1>
            <form method="POST" action="" enctype="multipart/form-data"> 
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">Username</label>
                <div class="col-md-6">
                  <input id="text" type="name" class="form-control " name="user_username" value="" required autocomplete="name" autofocus>
                </div>
              </div>
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control " name="user_email" value="" required autocomplete="email" autofocus>
                </div>
              </div>

              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">User Image</label>
                <div class="col-md-6">
                  <input id="email" type="file" class="form-control " name="user_image" value="" required autocomplete="email" autofocus>
                </div>
              </div>

              <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control " name="user_password" required autocomplete="current-password">
                </div>
              </div>

              <div class="row mb-3">
                <label for="confirm_password" class="col-md-4 col-form-label text-md-end">Confirm Password</label>
                <div class="col-md-6">
                  <input id="confirm_password" type="password" class="form-control " name="conf_user_password" required autocomplete="current-password">
                </div>
              </div>


              <div class="row mb-3">
                <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>
                <div class="col-md-6">
                  <input id="text" type="name" class="form-control " name="user_address" value="" required autocomplete="name" autofocus>
                </div>
              </div>


              <div class="row mb-3">
                <label for="phone" class="col-md-4 col-form-label text-md-end">Contact</label>
                <div class="col-md-6">
                  <input id="text" type="name" class="form-control " name="user_contact" value="" required autocomplete="name" autofocus>
                </div>
              </div>


              <div class="row mb-0 mt-4">
              <div class="row mb-0 mt-4 gap-3">
                <div class="col-md-8 offset-md-3">
                  <input type="submit" class="btn btn-primary py-1 px-4" name="user_register" value="Register">
                

              </div>
              <div class="col-md-8 offset-md-3">
                 <p class="small">Already have an account</p>
                 <a href="userlogin.php" class="text-danger">Login</a>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<!-- Bootstrap footer -->
<footer class="bg-dark text-white text-center">
    <div class="container py-3">
        <p>&copy; 2023 Your Company Name</p>
    </div>
</footer>

</body>
</html>

<?php   





if(isset($_POST['user_register'])){
    include('../includes/connect.php'); // Make sure to include your database connection

    $user_username  = mysqli_real_escape_string($con, $_POST['user_username']);
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($con, $_POST['user_password']);
    $conf_user_password  = mysqli_real_escape_string($con, $_POST['conf_user_password']);
    $user_address  = mysqli_real_escape_string($con, $_POST['user_address']);
    $user_contact  = mysqli_real_escape_string($con, $_POST['user_contact']);
    $user_image  = $_FILES['user_image']['name'];
    $user_image_tmp  = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    // Check if the username or email already exists
    $check_query = "SELECT * FROM `user_table` WHERE username = '$user_username' OR user_email = '$user_email'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Username or email address already exists. Please choose a different username or email.')</script>";
    } else {
        // Check if the passwords match
        if ($user_password !== $conf_user_password) {
            echo "<script>alert('Passwords do not match. Please try again.')</script>";
        } else {
            // Hash the password
            $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

            // Move the uploaded image to the destination folder
            move_uploaded_file($user_image_tmp, "./users_area/user_images/$user_image");

            // Insert data into the user_table
            $insert_query = "INSERT INTO `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $insert_query);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $user_username, $user_email, $hashed_password, $user_image, $user_ip, $user_address, $user_contact);

            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Data inserted successfully')</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($con) . "')</script>";
            }

            mysqli_stmt_close($stmt);

            // Selecting cart items
            $select_cart_items = "SELECT * FROM `cart_details` WHERE ip_address = '$user_ip'";
            $result_cart = mysqli_query($con, $select_cart_items);
            $row_count = mysqli_num_rows($result_cart);

            if ($row_count > 0) {
                $_SESSION['username'] = $user_username;
                echo "<script>alert('You have some items in your cart')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            } else {
                echo "<script>window.open('../index.php','_self')</script>";
            }
        }
    }
}

?>








