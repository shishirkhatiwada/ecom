<h3 class="text-center">Payments</h3>
<table style="border-collapse: collapse; width: 100%;">
    <thead>


    <?php  
$get_payments = "SELECT * FROM `user_payments`";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);
        echo "
        <tr style='background-color: #343a40; color: #fff;' class='text-center'>
            <th style='padding: 10px; border: 1px solid #fff;'>Sl No</th>
            <th style='padding: 10px; border: 1px solid #fff;'>Invoice Number</th>
            <th style='padding: 10px; border: 1px solid #fff;'>Amount</th>
            <th style='padding: 10px; border: 1px solid #fff;'>Payment Mode</th>
            <th style='padding: 10px; border: 1px solid #fff;'>Order Date</th>
            <th style='padding: 10px; border: 1px solid #fff;'>Delete</th>
        </tr>
    </thead>";

    if($row_count == 0){
        echo "<h3 class='bg-danger text-center mt-5'>No Payments (wasli karo jao ) </h3>";
    }else {

        $number = 0;
        while($row_data = mysqli_fetch_assoc($result)){
            $payment_id = $row_data['payment_id'];
            $order_title = $row_data['order_title'];
            $amount = $row_data['amount'];
            $invoice_number = $row_data['invoice_number'];
            $payment_mode = $row_data['payment_mode'];
            $date = $row_data['date'];
            $number++;
            echo " <tr class='text-center'>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$date</td>
            <td style='border: 1px solid #fff; padding: 10px;'><a href='' type='button' class='text-dark' ><i class='fa-solid fa-trash'></i></a></td>

            
        </tr>";
      
        }
    }
?>

    <tbody>
        <?php  
        
        ?>
       
        
    </tbody>
</table>

<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-body">
       Do you really want to delete this ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <a href="./index.php?view_brands" class="text-white text-decoration-none"> No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $brand_id; ?> ' type="button" class="text-white text-decoration-none" >Yes</a></button>
      </div>
    </div>
  </div>
</div>
