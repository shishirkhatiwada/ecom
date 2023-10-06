<?php
include('../includes/connect.php');
include('../functions/common_functions.php');

?>

<?php
session_start(); // Start a session to manage user sessions
include('../includes/connect.php'); // Include the database connection once at the beginning

// Check if the admin is not logged in, then redirect to the login page
if (!isset($_SESSION['admin_id'])) {
    header("Location: adminlogin.php"); // Redirect to the login page
    exit; // Terminate script execution after the redirection
}
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
    <link rel="stylesheet" href="adminarea.css">
</head>
<style>
  .product_img{
    width: 150px;
  object-fit: contain;
  }
</style>
<body>

<header>
    <h2 class="logo">Pretty Little Things</h2>
    <nav>
        <ul class="nav__links">
            <li>
             
            </li>
        </ul>
    </nav>
</header>

<nav class="nav2">
    <?php
    if (isset($_SESSION['admin_id'])) {
        $admin_id = $_SESSION['admin_id'];
        $get_admin_query = "SELECT admin_name FROM `admin_table` WHERE admin_id = $admin_id";
        $get_admin_result = mysqli_query($con, $get_admin_query);

        if ($get_admin_result && mysqli_num_rows($get_admin_result) > 0) {
            $admin_data = mysqli_fetch_assoc($get_admin_result);
            $admin_name = $admin_data['admin_name'];

            echo '<div class="logo text-sm">Logged in as ' . $admin_name . '</div>';
            echo '<a href="logout.php" class="text-danger">Logout</a>';
        }
    } else {
        echo '<div class="logo text-sm">Welcome Guest</div>';
        echo '<a href="./users_area/userlogin.php" class="text-dark">Login</a>';
    }
    ?>
</nav>



<!-- Sidebar and Products -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar">
                <div class="sidebar-categories area">
                    <h3>Admin Panel</h3>
                    <hr>
                    <div  class="collapse show">
                   
                                <ul>
                                <h2>DashBoard</h2>
                            <h3> <li><a href="insertproducts.php">Insert Product</a></li></h3>
                                <h3><li><a href="index.php?view_products">View Products</a></li></h3>
                                <h3><li><a href="index.php?insert_category">Insert Categories</a></li></h3>
                                <h3><li><a href="index.php?view_categories">View Categories</a></li></h3>


                               <h3> <li><a href="index.php?insert_brands">Insert Brands</a></li> </h3>



                                <h3><li><a href="index.php?view_brands">View Brands</a></li></h3>

                            <h3> <li><a href="index.php?list_orders">All Orders</a></li></h3>

                                <h3><li><a href="index.php?list_payments">View Payments</a></li></h3>
                                <h3><li><a href="index.php?list_users">Users</a></li></h3>
                            
                            <h3><li><a href="#">Logout</a></li></h3>
                            </ul>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-9">
            <!-- Product Cards Displayed Side by Side -->
            <div class="row">
            <?php 
  
  if(isset($_GET['insert_category'])){
    include('insertcategory.php');
  }
  if(isset($_GET['insert_brands'])){
    include('insertbrands.php');
  }
  if(isset($_GET['view_products'])){
    include('view_products.php');
  }

  if(isset($_GET['edit_products'])){
    include('edit_products.php');
  }


  if(isset($_GET['delete_products'])){
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
  if(isset($_GET['delete_brand'])){
    include('delete_brands.php');
  }
  if(isset($_GET['list_orders'])){
    include('list_orders.php');
  }
  if(isset($_GET['list_payments'])){
    include('list_payments.php');
  }
  if(isset($_GET['list_users'])){
    include('list_users.php');
  }
  


  
  ?>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap footer -->
<footer class="bg-dark text-white text-center">
    <div class="container py-3">
        <p>&copy; 2023 Your Company Name</p>
    </div>
</footer>

<!-- Bootstrap JavaScript (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
