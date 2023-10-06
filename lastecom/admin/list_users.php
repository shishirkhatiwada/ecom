<h3 class="text-center">Payments</h3>
<table style="border-collapse: collapse; width: 100%;">
    <thead>


    <?php  
$get_payments = "SELECT * FROM `user_table`";
        $result = mysqli_query($con, $get_payments);
        $row_count = mysqli_num_rows($result);
        echo "
        <tr style='background-color: #343a40; color: #fff;' class='text-center'>
            <th style='padding: 10px; border: 1px solid #fff;'>Sl no</th>
            <th style='padding: 10px; border: 1px solid #fff;'>Username</th>
            <th style='padding: 10px; border: 1px solid #fff;'>User Email</th>
            <th style='padding: 10px; border: 1px solid #fff;'>User Image</th>
            <th style='padding: 10px; border: 1px solid #fff;'>User Address</th>
            <th style='padding: 10px; border: 1px solid #fff;'>User Mobile</th>
            <th style='padding: 10px; border: 1px solid #fff;'>Delete</th>
        </tr>
    </thead>";

    if($row_count == 0){
        echo "<h3 class='bg-danger text-center mt-5'>No Users (lya business thappa cha kya ho ? gahahaha ) </h3>";
    }else {

        $number = 0;
        while($row_data = mysqli_fetch_assoc($result)){
            $user_id = $row_data['user_id'];
            $username = $row_data['username'];
            $user_email = $row_data['user_email'];
            $user_image = $row_data['user_image'];
            $user_address = $row_data['user_address'];
            $user_mobile = $row_data['user_mobile'];
            
            $number++;
            echo " <tr class='text-center'>
            <td>$number</td>
            <td>$username</td>
            <td>$user_email</td>
            <td><img src = '../users_area/user_images/$user_image'alt='$username'</td>
            <td>$user_address</td>
           
            <td> $user_mobile </td>
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
