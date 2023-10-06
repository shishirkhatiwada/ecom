


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../cart.css">
</head>
<body>
    

<?php   

$username = $_SESSION['username'];
$get_user = "Select * from `user_table` where username = '$username'";
$result = mysqli_query($con, $get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];
// echo $user_id;

?>



    <h3 class="text-dark p-4 text-center">My Orders</h3>

    <div class="container">
        
            
                <form action="" method="post">
                    <table class="table">
                    <thead class="thead-dark bg-primary">
                            <tr>
                                <th scope="col" style="color: red;">Sl Number</th>
                                <th scope="col" style="color: red;">Amount Due</th>
                                <th scope="col" style="color: red;">Invoice Number</th>
                                <th scope="col" style="color: red;">Date</th>
                                <th scope="col" style="color: red;">Complete / Incomplete</th>
                                <th scope="col" style="color: red;">Status</th>
                            </tr>
                        </thead>

                     <tbody class="">

                     <?php
$get_order_details = "Select * from `user_orders` where user_id = $user_id";
$result_orders = mysqli_query($con, $get_order_details);
$number = 1;

while ($row_orders = mysqli_fetch_assoc($result_orders)) {
    $order_id = $row_orders['order_id'];
    $amount_due = $row_orders['amount_due'];
    $total_products = $row_orders['total_products'];
    $invoice_number = $row_orders['invoice_number'];
    $order_status = $row_orders['order_status'];
    if ($order_status == 'pending') {
        $order_status = 'Incomplete';
    } else {
        $order_status = 'Complete';
    }
    $order_date = $row_orders['order_date'];

    echo "<tr>
        <td>$number</td>
        <td>$amount_due</td>
        <td>$invoice_number</td>
        <td>$order_date</td>
        <td>$order_status</td>";
    
    if ($order_status == 'Complete') {
        echo "<td>Paid</td>";
    } else {
        echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-dark'>Confirm</a></td>";
    }
    
    echo "</tr>";

    $number++;
}




?>



                                
                        </tbody>
                    </table>
                </form>
        
      
    </div>









</body>
</html>










<!-- <tr>
        <td>$number</td>
        <td>$amount_due</td>
        <td>$invoice_number</td>
        <td>$order_date</td>
        <td>$order_status</td> -->




