<?php
include('includes/connect.php');
include('functions/common_functions.php');
session_start();
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
    <link rel="stylesheet" href="test2.css">
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>

<header>
    <h2 class="logo">Pretty Little Things</h2>
    <nav>
        <ul class="nav__links">
            <li>
                <a class="links" aria-current="page" href="../index.php">Home</a>
                <a class="links" href="../displayall.php">Products</a>
                <a class="links" href="userregister.php">Register</a>
                <a class="links" href="#">Contact</a>
               
                <form class="d-flex" role="search" action="../search.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" value="search" class="btn btn-outline-dark text-white" name="search_data_product">
                </form>
            </li>
        </ul>
    </nav>
</header>

<nav class="nav2">
    
    <?php 

     

if (!isset($_SESSION['username'])) {
    echo "<div class='logo text-sm'>Welcome Guest</div>";
} else {
    echo "<div class='logo text-sm'>Welcome " . $_SESSION['username'] . "</div>";
}



    
    if(!isset($_SESSION['username'])){
        echo "<a href='./users_area/userlogin.php' class='text-dark'>Login</a>";
    } else{
        echo "<a href='logout.php' class='text-dark'>Logout</a>";

    }
    
    ?>
</nav>
<div class="row px-1">
    <div class="col-md-12">
        <div class="row">
            <?php  
            
            if(!isset($_SESSION['username'])){
                include('userlogin.php'); // Corrected file path
            } else{
                include('payment.php'); // Corrected file path
            }
            
            ?>
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
</body>
</html>
