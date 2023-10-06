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

        <h3 class="text-success text-center">View products</h3>
        <table style="border-collapse: collapse; width: 100%; border: 1px solid #343a40;">
            <thead>
                <tr style="background-color: #343a40; color: #fff;" class="text-center">
                    <th style="padding: 10px; border: 1px solid #fff;">product Id</th>
                    <th style="padding: 10px; border: 1px solid #fff;">product Title</th>
                    <th style="padding: 10px; border: 1px solid #fff;">product Image</th>
                    <th style="padding: 10px; border: 1px solid #fff;">product Price</th>
                    <th style="padding: 10px; border: 1px solid #fff;">Total Sales</th>
                    <th style="padding: 10px; border: 1px solid #fff;">Status</th>
                    <th style="padding: 10px; border: 1px solid #fff;">Edit</th>
                    <th style="padding: 10px; border: 1px solid #fff;">Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
$get_products = "Select * from `products`";
$result = mysqli_query($con, $get_products);
$number = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $status = $row['status'];
    $number++;

    // Exit PHP mode to include HTML
    ?>
    <tr class='text-center'>
        <td style='border: 1px solid #fff; padding: 10px;'><?php echo $number; ?></td>
        <td style='border: 1px solid #fff; padding: 10px;'><?php echo $product_title; ?></td>
        <td style='border: 1px solid #fff; padding: 10px;'><img src='./product_images/<?php echo $product_image1; ?>' class='product_img'/></td>
        <td style='border: 1px solid #fff; padding: 10px;'><?php echo $product_price; ?></td>
        <td style='border: 1px solid #fff; padding: 10px;'>
            <?php
            $get_count = "Select * from `orders_pending` where product_id = $product_id";
            $result_count = mysqli_query($con, $get_count);
            $rows_count = mysqli_num_rows($result_count);
            echo $rows_count;
            ?>
        </td>
        <td style='border: 1px solid #fff; padding: 10px;'><?php echo $status; ?></td>
        <td style='border: 1px solid #fff; padding: 10px;'><a href='index.php?edit_products=<?php  echo $product_id;  ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td style='border: 1px solid #fff; padding: 10px;'><a href='index.php?delete_products=<?php  echo $product_id;  ?>'><i class='fa-solid fa-trash'></i></a></td>
    </tr>
    <?php
    // Re-enter PHP mode
}
?>

             
             
            </tbody>
        </table>
  
</body>
</html>
