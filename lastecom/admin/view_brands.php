<h3 class="text-center">All Brands</h3>
<table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr style="background-color: #343a40; color: #fff;" class="text-center">
            <th style="padding: 10px; border: 1px solid #fff;">Sl No</th>
            <th style="padding: 10px; border: 1px solid #fff;">Brand Title</th>
            <th style="padding: 10px; border: 1px solid #fff;">Edit</th>
            <th style="padding: 10px; border: 1px solid #fff;">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php  
        $select_cat = "SELECT * FROM `brands`";
        $result = mysqli_query($con, $select_cat);
        $number = 0;
        while($row = mysqli_fetch_assoc($result)){
            $brand_id = $row['brand_id'];
            $brand_title = $row['brand_title'];
            $number++;
        ?>
        <tr class='text-center'>
            <td><?php echo $number; ?></td>
            <td><?php echo $brand_title; ?></td>
            <td style='border: 1px solid #fff; padding: 10px;'><a href='index.php?edit_brands=<?php echo $brand_id; ?> '><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td style='border: 1px solid #fff; padding: 10px;'><a href='index.php?delete_brand=<?php echo $brand_id; ?> ' type="button" class="" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
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
