<?php
include('includes/connect.php');

//getting products

function getProducts(){
  
    global $con;

    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {

                $select_query = "Select * from `products` order by rand() LIMIT 0,6";
                $result_query = mysqli_query($con,$select_query);
                // $row = mysqli_fetch_assoc($result_query);
                // echo $row['product_title']
               
                
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keyword = $row['product_keyword'];
                    $category_id = $row['category_id'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $brand_id = $row['brand_id'];
                    echo" <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <!-- First product card content -->
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price : $product_price-/</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-info'>Add to Cart</a>
                            <a href='productsdetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>

               ";
                }

}
}
} 


//get all products
function getAllProducts(){
    global $con;

    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {

                $select_query = "Select * from `products` order by rand()";
                $result_query = mysqli_query($con,$select_query);
                // $row = mysqli_fetch_assoc($result_query);
                // echo $row['product_title']
               
                
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keyword = $row['product_keyword'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $product_image1 = $row['product_image1'];
                    $brand_id = $row['brand_id'];
                    echo" <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <!-- First product card content -->
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price : $product_price-/</p>

                            <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-info'>Add to Cart</a>
                            
                            <a href='productsdetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>

               ";
                }

}
}
}


//getting unique categories

function getUniqueCategory(){
  
    global $con;

    if (isset($_GET['category'])) {
        
$category_id =$_GET['category'];
                $select_query = "Select * from `products` where category_id = $category_id";
                $result_query = mysqli_query($con,$select_query);
                // $row = mysqli_fetch_assoc($result_query);
                // echo $row['product_title']
                $num_of_rows = mysqli_num_rows($result_query);
                if($num_of_rows == 0){
                    echo "<h2 class='text-center text-danger'>This category is not available</h2>";
                }
                
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keyword = $row['product_keyword'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $product_image1 = $row['product_image1'];
                    $brand_id = $row['brand_id'];
                    echo" <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <!-- First product card content -->
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price : $product_price-/</p>

                            <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-info'>Add to Cart</a>
                            <a href='productsdetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>

               ";
                }

}
}




//getting unique brands
function getUniqueBrands(){
  
    global $con;

    if (isset($_GET['brand'])) {
        
$brand_id =$_GET['brand'];
                $select_query = "Select * from `products` where brand_id = $brand_id";
                $result_query = mysqli_query($con,$select_query);
                $num_of_rows = mysqli_num_rows($result_query);
                if($num_of_rows == 0){
                    echo "<h2 class='text-center text-danger'>This brand is not available</h2>";
                }
                
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keyword = $row['product_keyword'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $product_image1 = $row['product_image1'];
                    $brand_id = $row['brand_id'];
                    echo" <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <!-- First product card content -->
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price : $product_price-/</p>

                            <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-info'>Add to Cart</a>
                            <a href='productsdetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>

               ";
                }

}
}


//displaying brands in side nav

function getBrands(){
    global $con;
    $select_brands = "SELECT * FROM brands";
    $result_brands = mysqli_query($con, $select_brands);

    if (!$result_brands) {
        die("Error in select query: " . mysqli_error($con));
    }

    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-items'><a href='index.php?brand=$brand_id' class='nav-link'>   $brand_title  </a></li>";    
    }
}

//get categories
function getCategory(){
    global $con;
    $select_categories= "SELECT * FROM categories";
    $result_categories = mysqli_query($con, $select_categories);

    if (!$result_categories) {
        die("Error in select query: " . mysqli_error($con));
    }

    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $Category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-items'><a href='index.php?category=$category_id' class='nav-link'>   $Category_title  </a></li>";    }
}


//search products
function searchProduct(){
    global $con;

            if(isset($_GET['search_data_product'])){
                $search_data_value = $_GET['search_data'];
                $search_query = "select * from `products` where product_keyword like '%$search_data_value%'";
                $result_query = mysqli_query($con,$search_query);
                $num_of_rows = mysqli_num_rows($result_query);
                if($num_of_rows == 0){
                    echo "<h2 class='text-center text-danger'>Sorry, the product you searched is not available</h2>";
                }
                
                
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keyword = $row['product_keyword'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $product_image1 = $row['product_image1'];
                    $brand_id = $row['brand_id'];
                    echo" <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <!-- First product card content -->
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price : $product_price-/</p>

                            <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-info'>Add to Cart</a>
                            <a href='productsdetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                        </div>
                    </div>
                </div>

               ";
                }
            }

}


//view details 

function view_details(){
    global $con;
  
    if(isset($_GET['product_id'])){

    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $product_id =$_GET['product_id'];
                $select_query = "Select * from `products` where product_id = $product_id";
                $result_query = mysqli_query($con,$select_query);
                
                
                while($row = mysqli_fetch_assoc($result_query)){
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_keyword = $row['product_keyword'];
                    $product_price = $row['product_price'];
                    $category_id = $row['category_id'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
                    $brand_id = $row['brand_id'];
                    echo" <div class='col-md-4 mb-2'>
                    <div class='card'>
                        <!-- First product card content -->
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>Price : $product_price-/</p>

                            <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-info'>Add to Cart</a>
                            <a href='index.php' class='btn btn-secondary'>Back to Home</a>
                        </div>
                    </div>
                </div>
                
                <div class='col-md-8'>
                    <!-- related images -->
                    <div class='row'>
                        <div class='col-md-12'>
                            <h4 class='text-center text-dark mb-5'>Related Products Image</h4>
                        </div>
                        <div class='col-md-6 '>
                        <img src='./admin/product_images/$product_image2' class='card-img-top' alt='...'>
                            
                        </div>
                        
                        <div class='col-md-6'>
                        <img src='./admin/product_images/$product_image3' class='card-img-top' alt='...'>
                            
                        </div>
                    </div>
                </div>

                ";
                }

}
}
}
}

//get ip function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


//cart functions

function cart() {
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_address = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];

        // Use prepared statements to prevent SQL injection
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = ? AND product_id = ?";
        $stmt = mysqli_prepare($con, $select_query);
        mysqli_stmt_bind_param($stmt, "si", $get_ip_address, $get_product_id);
        mysqli_stmt_execute($stmt);
        $result_query = mysqli_stmt_get_result($stmt);

        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present in your cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            // Use prepared statements for the insert query as well
            $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES (?, ?, 0)";
            $stmt = mysqli_prepare($con, $insert_query);
            mysqli_stmt_bind_param($stmt, "is", $get_product_id, $get_ip_address);
            mysqli_stmt_execute($stmt);
            echo "<script>alert('Item is added to cart')</script>";

            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

//function to get cart numbers in cart

function cart_item(){
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_address = getIPAddress();
        

        // Use prepared statements to prevent SQL injection
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }else {
        global $con;
        $get_ip_address = getIPAddress();
        

        // Use prepared statements to prevent SQL injection
        $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
        }
        echo $count_cart_items;
    }


//total price fucntion

function total_cart_price(){
    global $con;
    $get_ip_address = getIPAddress();
    $total_price  = 0;
    $cart_query=  "Select * from `cart_details` where ip_address = '$get_ip_address'";
    $result = mysqli_query($con,$cart_query);
    while ($row= mysqli_fetch_array($result)) {
      $product_id = $row['product_id'];
      $select_products= "Select * from `products` where product_id='$product_id'";
      $result_products  =  mysqli_query($con, $select_products);
      while ($row_products_price = mysqli_fetch_array($result_products)) {
        $product_price = array($row_products_price['product_price']);
        $product_values = array_sum($product_price);
        $total_price+=$product_values;
      }
    }
echo $total_price;


}


//get user order 

function get_user_order_details()
{
    global $con;
    $username  = $_SESSION['username'];
    $get_details = "Select * from `user_table` where username='$username'";
    $result_query = mysqli_query($con,$get_details);
    while ($row_query = mysqli_fetch_array($result_query)) {
        $user_id = $row_query['user_id'];
        if(!isset($_GET['edit_account'])){
        if(!isset($_GET['my_orders'])){
            if(!isset($_GET['delete_account'])){
                $get_orders = "Select * from `user_orders` where user_id = $user_id and order_status='pending'";
    $result_orders_query = mysqli_query($con,$get_orders);
    $row_count = mysqli_num_rows($result_orders_query);
    if($row_count>0){
        echo "<h3 class='text-center '>You have <span class='text-danger'>$row_count</span> Pending Orders</h3>
        <p class='text-center '><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
    } else{
        echo "<h3 class='text-center '>You do not have any pending orders</h3>
        <p class='text-center '><a href='../index.php' class='text-dark'>Go Shopping</a></p>";
    }
    }
        }
    }
}
   
}

?>
