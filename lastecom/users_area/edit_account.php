<?php  
if(isset($_GET['edit_account'])){
    $user_session_name = $_SESSION['username'];
    $select_query = "Select * from `user_table` where username = '$user_session_name'";
    $result_query = mysqli_query($con,$select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_address= $row_fetch['user_address'];
    $user_mobile= $row_fetch['user_mobile'];



    if(isset($_POST['user_update'])){
        $update_id = $user_id;
        $username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_address= $_POST['user_address'];
        $user_mobile= $_POST['user_mobile'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");

        //update data 

        $update_data = "UPDATE `user_table` SET username = '$username', user_email = '$user_email', user_image = '$user_image', user_address = '$user_address', user_mobile = '$user_mobile' WHERE user_id = $update_id";

        $result_query_update = mysqli_query($con, $update_data);
        
        if ($result_query_update) {
            echo "<script>alert('Account has been updated')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
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
            <h1 class="main-heading">Edit Account</h1>
            <form method="POST" action="" enctype="multipart/form-data"> 
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">Username</label>
                <div class="col-md-6">
                  <input id="text" type="name" class="form-control " value="<?php echo  $username;  ?>" name="user_username" placeholder="Enter new username">
                </div>
              </div>
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control " name="user_email" value="<?php echo $user_email   ?>" placeholder="Enter new Email">
                </div>
              </div>

              <div class="row mb-3 d-flex">
                <label for="image" class="col-md-4 col-form-label text-md-end">User Image</label>
                <div class="col-md-6">
                  <input id="image" type="file" class="form-control " name="user_image"  >
                  <img src="./user_images/<?php  echo $user_image; ?>" alt="" class='my-4' style='max-width: 100%; height: auto;'>
                </div>
              </div>

           

              <div class="row mb-3">
                <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>
                <div class="col-md-6">
                  <input id="text" type="name" class="form-control " name="user_address" value="<?php echo $user_address;  ?> " placeholder="Enter new address">
                </div>
              </div>


              <div class="row mb-3">
                <label for="phone" class="col-md-4 col-form-label text-md-end">Contact</label>
                <div class="col-md-6">
                  <input id="text" type="name" class="form-control " name="user_contact" value="<?php echo $user_mobile;  ?> " placeholder="Enter new Number">
                </div>
              </div>


              <div class="row mb-0 mt-4">
              <div class="row mb-0 mt-4 gap-3">
                <div class="col-md-8 offset-md-3">
                  <input type="submit" class="btn btn-primary py-1 px-4" name="user_update" value="Update Profile">
                

              </div>
           
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
</body>
</html>