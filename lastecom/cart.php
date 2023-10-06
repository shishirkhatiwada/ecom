<?php
include('includes/connect.php');
include('functions/common_functions.php');
session_start();

// Initialize the total price
$total_price = 0;

// Check if the "Update Cart" button is clicked
if (isset($_POST['update_cart'])) {
    // Get the user's IP address
    $get_ip_address = getIPAddress();
// Loop through the submitted quantities for each product
foreach ($_POST['qty'] as $product_id => $quantity) {
    // Sanitize the input to prevent SQL injection
    $product_id = mysqli_real_escape_string($con, $product_id);
    $quantity = mysqli_real_escape_string($con, $quantity);

    // Update the quantity in the cart_details table for the specific product and IP address
    $update_cart = "UPDATE cart_details SET quantity = $quantity WHERE ip_address = '$get_ip_address' AND product_id = '$product_id'";
    $result = mysqli_query($con, $update_cart);

    if ($result) {
        // Quantity updated successfully
        // You can add a success message or redirection here if needed
    } else {

        // There was an error updating the quantity
            // You can add an error message or handle the error as needed
        }
    }
}

// Calculate the updated total price after quantity updates
$get_ip_address = getIPAddress();
$cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
$result = mysqli_query($con, $cart_query);

while ($row = mysqli_fetch_array($result)) {
    $product_id = $row['product_id'];
    $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
    $result_products = mysqli_query($con, $select_products);

    while ($row_products_price = mysqli_fetch_array($result_products)) {
        $product_price = $row_products_price['product_price'];
        $quantity = $row['quantity'];
        $product_values = $product_price * $quantity;
        $total_price += $product_values;
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <title> Cart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"href="cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <section>
     
        <!--Nav-->
        <nav class="navbar navbar-expand-lg main-navbar bg-color main-navbar-color"
        id="main-navbar">
        <div class="container">
            <h2 class="navbar-brand" ><a href="index.php">Pretty Little Things</a> <h2>
            <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#myNav" aria-controls="nav" aria-expanded="false"
            aria-label="Toggle navigation">
        <i class="fas fa-bars"></i></button>
        <div class="collapse navbar-collapse"id="myNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.php"class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="displayall.php"class="nav-link">Products</a>
                </li>
                <li class="nav-item">
                    <a href="./users_area/userregister.php"class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="#"class="nav-link">Contact</a>
                </li>

             
                
            </ul>
        </div>
        </div>
        </nav>
        <!--End of Nav-->
    </section>


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
        echo "<a href='./users_area/logout.php' class='text-dark'>Logout</a>";

    }
    
    ?>
</nav>
<!---Hero Section-->

<!---End of Hero Section-->
<!--Cart Section-->


    <div class="container">
        <div class="cart">
            <div class="table-responsive">
                <form action="" method="post">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-white">Product</th>
                            <th scope="col" class="text-white">Total Price</th>
                            <th scope="col" class="text-white">Quantity</th>
                            <th scope="col" class="text-white">Remove</th>
                            <th scope="col" class="text-white">Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- php code to display dynamic data -->
                        <?php
                        $get_ip_address = getIPAddress();
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
                        $result = mysqli_query($con, $cart_query);

                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
                            $result_products = mysqli_query($con, $select_products);
                            while ($row_products_price = mysqli_fetch_array($result_products)) {
                                $product_price = $row_products_price['product_price'];
                                $price_table = $product_price;
                                $product_title = $row_products_price['product_title'];
                                $product_image1 = $row_products_price['product_image1'];
                                $quantity = $row['quantity'];
                                $product_values = $product_price * $quantity;
                                ?>

                                <tr>
                                    <td>
                                        <div class="main">
                                        <div class="d-flex">
                                                <!--W=145 H=98-->
                                                <img src="./admin/product_images/<?php echo $product_image1; ?>"
                                                     alt="" class="img_size">
                                            </div>
                                            <div class="des">
                                                <p><?php echo $product_title; ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h6><?php echo $price_table; ?></h6>
                                    </td>
                                    <td>
                                    <div class="counter">
                                            <input class="form-input w-50" type="text"
                                                   name="qty[<?php echo $product_id; ?>]"
                                                   value="<?php echo $quantity; ?>">
                                        </div>
                                    </td>
                                    <td>
                                    <input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>">
                                    </td>
                                    <td>
                                        <input type="submit" name="update_cart" value="Update Cart" class="btn btn-dark">
                                        <input type="submit" name="remove_cart" value="Remove Cart" class="btn btn-dark">
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="col-lg-4 offset-lg-4">
    <div class="checkout">
        <ul>
            <li class="subtotal">subtotal
                <span><?php echo $total_price; ?></span>
            </li>
        </ul>
    </div>

    <a href="./users_area/checkout.php" class="proceed-btn">Checkout</a>
    <a href="#" class="proceed-btn2 ">Proceed to Checkout</a>
</div>

<!-- function to remove cart item -->

<?php 
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        // Loop through the selected items to remove
        foreach ($_POST['removeitem'] as $remove_id) {
            // Sanitize the input to prevent SQL injection
            $remove_id = mysqli_real_escape_string($con, $remove_id);

            // Delete the selected item from the cart_details table
            $delete_query = "DELETE FROM `cart_details` WHERE product_id = $remove_id";
            $run_delete = mysqli_query($con, $delete_query);

            if($run_delete){
                // Item removed successfully, you can redirect or display a message
                echo "<script>window.open('cart.php', '_self')</script>";
            } else {
                // Handle the case where the delete operation failed
                echo "Error removing item from the cart.";
            }
        }
    }
}

// Call the remove_cart_item() function
remove_cart_item();
?>


?>

<!-- Bootstrap footer -->
<footer class="bg-dark text-white text-center">
    <div class="container py-3">
        <p>&copy; 2023 Your Company Name</p>
    </div>
</footer>

<!-- Optional JavaScript -->
<!-- ... -->
</body>
</html>

