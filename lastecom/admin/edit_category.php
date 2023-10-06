<?php
if(isset($_GET['edit_category'])){
    $edit_category = $_GET['edit_category'];
   
    $get_categories = "SELECT * FROM `categories` WHERE category_id = $edit_category";
    $result = mysqli_query($con, $get_categories);
    $row = mysqli_fetch_assoc($result);
    $category_title = $row['category_title'];
}

if(isset($_POST['update_cat'])){
    // Handle the category update here based on the form data.
    $new_category_title = $_POST['category_title'];

    // Use an UPDATE SQL query to update the category title in the database.
    $update_query = "UPDATE `categories` SET category_title = '$new_category_title' WHERE category_id = $edit_category";
    $update_result = mysqli_query($con, $update_query);

    if($update_result){
        // Category updated successfully.
        // You can redirect or display a success message here.
        echo "<script>alert('Category updated successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    } else {
        // Handle the case where the update fails.
        echo "<script>alert('Category update failed')</script>";
    }
}
?>





<style>
/* Reset default input field styles */
body{
    overflow-x: hidden;
}

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

<h3 class="text-center m-4">Edit Category</h3>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2"> <!-- Adjust width and center content -->
            <form class="awesome-form" action="" method="POST">
                <div class="form-group">
                    <label for="" class="text-success mt-3">Category Title</label>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="category_title" placeholder="Category Name" required="required" value="<?php echo $category_title; ?>">
                </div>
                <button type="submit" class="btn btn-block btn-primary m-4" name="update_cat">Submit</button>
            </form>
        </div>
    </div>
</div>

