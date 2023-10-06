<?php
include('../includes/connect.php'); // Make sure to include your database connection
include('../functions/common_functions.php');

$user_ip = getIPAddress();
$get_user = "SELECT * FROM `user_table` WHERE user_ip = '$user_ip'";
$result = mysqli_query($con, $get_user);
$run_query = mysqli_fetch_array($result);
$user_id = $run_query['user_id'];

// Fetch the product details here
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
    }
}
?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="test2.css">
   
  <link rel="stylesheet" href="payment.css">
 
</head>
<body>

<!-- php code to access which user is logged in and that user can only pay  -->

  <div class="credit-card-form">
    <h2>PAYMENT METHODS</h2>
<img class="Image1" src="https://i.ibb.co/hgJ7z3J/6375aad33dbabc9c424b5713-card-mockup-01.png" alt="6375aad33dbabc9c424b5713-card-mockup-01" border="0"></a>
  
    <form>
      <div class="form-group">
       <h2>We currently have only cash on delivery option. If you are sure about that then only proceed</h2>
      </div>
     
     
	  <button type="submit" class="click-button p-3" onclick="showLoading(event, this)" style="margin: 10px; padding: 5px 10px;">
    <a href="order.php?user_id=<?php echo $user_id; ?>" class="click-button p-3" style="margin: 10px; padding: 5px 10px; text-decoration: none; color: #000;">PAY Offline</a>


</button>


     
    </form>
  </div>
           <p></p>





</body>
</html>

<?php  

// $user_ip = getIPAddress();
// $get_user = "Select * from `user_table` where user_ip = '$user_ip'";
// $result = mysqli_query($con, $get_user);
// $run_query = mysqli_fetch_array($result);
// $user_id=$run_query['user_id'];













?>


