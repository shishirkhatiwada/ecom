<?php
// Include the database connection
include('../includes/connect.php');

// Check if the form is submitted
if (isset($_POST['insert_cat'])) {
    // Get the category title from the form
    $category_title = $_POST['cat_title'];
// Select data from the database to check if the category already exists
$select_query = "SELECT * FROM categories WHERE category_title='$category_title'";
$result_select = mysqli_query($con, $select_query);

if (!$result_select) {
    die("Error in select query: " . mysqli_error($con));
}

$number = mysqli_num_rows($result_select);
if ($number > 0) {
    echo "<script>alert('This category is already present in the database')</script>";
} else {
    // Insert the new category into the database
    $insert_query = "INSERT INTO categories (category_title) VALUES ('$category_title')";
    $result = mysqli_query($con, $insert_query);

    if (!$result) {
        die("Error in insert query: " . mysqli_error($con));
    }

    if ($result) {
        echo "<script>alert('Category has been inserted successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }

}
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
<style>
/* Reset default input field styles */

.awesome-form {
    background: #ffffff;
    width: 100%;
    
    padding: 150px; /* Increase the padding for spacing */
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    transition: all 0.3s ease-in-out;
    display: flex;
    flex-direction: column;
    align-items: center; /* Center horizontally */
    margin: 0 auto; /* Center horizontally within the parent container */
}

.awesome-form:hover {
    box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
}

.awesome-form h2 {
    margin-bottom: 30px;
    color: #333;
}

.awesome-form .form-control {
    background: none;
    padding: 8px;
    margin: 20px 0;
    border: none;
    align-items: center;
    border-bottom: 1px solid #e0e0e0;
    border-radius: 0;
    box-shadow: none;
    transition: all 0.3s ease-in-out;
}

.awesome-form .form-control:focus {
    border-color: #007BFF;
    box-shadow: 0px 0px 5px rgba(0,123,255,0.5);
    outline: none;
}

/* Increase the button size and change its color */
.awesome-form .btn {
    border-radius: 10px; /* Make the button slightly rounded */
    background: #333; /* Dark color */
    color: #fff;
    padding: 15px 30px; /* Increase padding for a larger size */
    font-size: 18px; /* Increase font size */
    transition: all 0.3s ease-in-out;
}

.awesome-form .btn:hover {
    background: #000; /* Darker color on hover */
}

footer {
    background-color: #333;
    color: black; /* Change text color to black */
    text-align: center; /* Center-align the text */
    padding: 20px; /* Increase the padding for the footer */
    font-size: 18px; /* Increase the font size for the text */
}


</style>
<body>


    <div class="container mt-5">
      <div class="row">
        <div class="col-md-8 offset-md-2"> <!-- Adjust width and center content -->
          
        
        <form class="awesome-form" action="insertcategory.php" method="POST">
    <div class="form-group">
        <input type="text" class="form-control" id="name" name="cat_title" placeholder="Category Name" required>
    </div>

    <button type="submit" class="btn btn-block btn-primary" name="insert_cat">Submit</button>
</form>



        </div>
      </div>
    </div>
 
</body>
</html>
