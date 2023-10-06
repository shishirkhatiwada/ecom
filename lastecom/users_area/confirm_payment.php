<?php
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
   $select_data = "Select * from `user_orders` where order_id=$order_id";
   $result = mysqli_query($con, $select_data);
   $row_fetch = mysqli_fetch_assoc($result);
   $invoice_number= $row_fetch['invoice_number'];
   $amount_due= $row_fetch['amount_due'];
}

if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "insert into `user_payments` (order_id,	invoice_number	,amount	,payment_mode) 
    values ($order_id, $invoice_number, $amount, '$payment_mode')";
    $result = mysqli_query($con, $insert_query);
    if($result){
        echo "<h3 class='text-center text-light'>Successfully paid</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }

    $update_orders = "update `user_orders` set order_status='Complete' where order_id = $order_id";
    $result_orders = mysqli_query($con, $update_orders);



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
</head>
<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number; ?>"> 
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="amount">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due; ?>">
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto" >
                    <option >Select Payment Mode </option>
                    <option >UPI </option>
                    <option >Select Payment Mode </option>
                    <option >Select Payment Mode </option>
                    <option >Select Payment Mode </option>
                    <option >Select Payment Mode </option>
                </select>
            </div>

            <div class="form-outline my-4 text-center w-50 m-auto">
                
                <input type="submit" class="bg-info py-2 px-4 bprder-0" name="confirm_payment" value="Confirm">
            </div>


        </form>
    </div>
</body>
</html>
