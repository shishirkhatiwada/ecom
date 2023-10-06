<?php
if(isset($_GET['edit_products'])){
    $edit_id = $_GET['edit_products'];
    $get_data = "SELECT * FROM `products` WHERE product_id = $edit_id";
    $result = mysqli_query($con, $get_data);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keyword = $row['product_keyword'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image1 = $row['product_image1'];
        $product_image2 = $row['product_image2'];
        $product_image3 = $row['product_image3']; 
        $product_price = $row['product_price'];

        // Now you can use these variables as needed.
    }

    // Fetch category name
    $select_category = "SELECT * FROM `categories` WHERE category_id=$category_id";
    $result_category = mysqli_query($con, $select_category);
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];

    // Fetch brand name
    $select_brands = "SELECT * FROM `brands` WHERE brand_id=$brand_id";
    $result_brand = mysqli_query($con, $select_brands);
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $row_brand['brand_title'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h3 class="text-center text-success">Edit Product</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" value="<?php echo $product_title; ?>" class="form-control form-control-lg" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" name="product_desc" value="<?php echo $product_description; ?>" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" name="product_keywords" value="<?php echo $product_keyword; ?>" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Category</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                <?php  
                $select_category_all = "SELECT * FROM `categories`";
                $result_category_all = mysqli_query($con, $select_category_all);
                while($row_category_all = mysqli_fetch_assoc($result_category_all)){
                    $category_title = $row_category_all['category_title'];
                    $category_id = $row_category_all['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Product Brands</label>
            <select name="product_brands" class="form-select">
                <option value="<?php echo $brand_id; ?>"><?php echo $brand_title; ?></option>
                <?php  
                $select_brands_all = "SELECT * FROM `brands`";
                $result_brands_all = mysqli_query($con, $select_brands_all);
                while($row_brand_all = mysqli_fetch_assoc($result_brands_all)){
                    $brand_title = $row_brand_all['brand_title'];
                    $brand_id = $row_brand_all['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
                <input type="file" name="product_image1" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image1; ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">Product Image2</label>
            <div class="d-flex">
                <input type="file" name="product_image2" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image2; ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">Product Image3</label>
            <div class="d-flex">
                <input type="file" name="product_image3" class="form-control w-90 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image3; ?>" alt="" class="product_img">
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" value="<?php echo $product_price; ?>" class="form-control" required="required">
        </div>
        <div class="w-50 m-auto p-10">
            <input type="submit" name="edit_product" value="Update Product" class="btn btn-dark m-10 p-10">
        </div>
    </form>
</body>
</html>


<!-- editing products -->

<?php

if(isset($_POST['edit_product'])){
    $product_title = $_POST['product_title'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    $temp_product_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_product_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_product_image3 = $_FILES['product_image3']['tmp_name'];



    if($product_title == '' or $product_desc == '' or $product_keywords == '' or $product_category == '' or
    $product_brands == '' or $product_image1 == '' or $product_image2 == '' or $product_image3 == '' or $product_price == ''  
){
    echo "<script>Please fill the required fields</script>";
} else{
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");



    //query to update products
    $update_product = "UPDATE `products` SET 
    product_title = '$product_title',
    product_description = '$product_description',
    product_keyword = '$product_keyword',
    category_id = $product_category,
    brand_id = $product_brands,
    product_image1 = '$product_image1',
    product_image2 = '$product_image2',
    product_image3 = '$product_image3',
    product_price = '$product_price',
    date = NOW()
    WHERE product_id = $edit_id";
    $result_update= mysqli_query($con, $update_product);
    if($result_update){
    echo "<script>alert('Product updated successfully')</script>";
    echo "<script>window.open('./insertproducts.php','_self')</script>";

    }




}

}




?>





