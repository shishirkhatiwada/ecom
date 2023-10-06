<h3 class="text-center">All Categories</h3>
<table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr style="background-color: #343a40; color: #fff;" class="text-center">
            <th style="padding: 10px; border: 1px solid #fff;">Sl No</th>
            <th style="padding: 10px; border: 1px solid #fff;">Category Title</th>
            <th style="padding: 10px; border: 1px solid #fff;">Edit</th>
            <th style="padding: 10px; border: 1px solid #fff;">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php  
        $select_cat = "SELECT * FROM `categories`";
        $result = mysqli_query($con, $select_cat);
        $number = 0;
        while($row = mysqli_fetch_assoc($result)){
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;
        ?>
        <tr class='text-center'>
            <td><?php echo $number; ?></td>
            <td><?php echo $category_title; ?></td>
            <td style='border: 1px solid #fff; padding: 10px;'><a href='index.php?edit_category=<?php echo $category_id; ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td style='border: 1px solid #fff; padding: 10px;'><a href='index.php?delete_category=<?php echo $category_id; ?>'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
