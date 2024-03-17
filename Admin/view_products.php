<?php
include('../DatabaseConnection/connection.php');
?>
<!-- header -->
   <?php include('../header.php');?>
<h3 class="text-center text-center"> All produts</h3>
<table class="table table-bordered mt-5">
<thead class ="bg-info">
    <tr>
        <th> product ID</th>
        <th> product Title</th>
        <th> product Image</th>
        <th> product Price</th>
        <th> Total Sold</th>
        <th> Status</th>
        <th> Edit</th>
        <th> Delete</th>
</tr>
</thread>
<tbody class="bg-secondary text-light">
    <?php
    $get_products="Select * from products";
    $result=mysqli_query($conn,$get_products);
    while($row=mysqli_fetch_assoc($result)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $status=$row['status'];
        $number++;
    }
    ?>

    <tr class='text-center'>
    <td><?php echo $number;?></td>
    <td><?php echo $product_title;?></td>
    <td><img src='./Product_images/<?php echo $product_image1;?>' class='product_img'/></td>
    <td><?php echo $product_price;?>/-</td>
    <td><?php
    $get_count="select * from orders_pending where product_id=$product_id";
    $result_count=mysqli_query($conn,$get_count);
    $rows_count=mysqli_num_rows($result_count);
    echo $rows_count; 
    ?>
    </td>
    <td><?php echo $status;?></td>
    <td><a href='index.php?edit_products' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
    <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>       

    <tr class="text-center">
        <td>1</td>
        <td>Mango</td>
        <td>Image</td>
        <td>444</td>
        <td>0</td>
        <td>true</td>
        <td><a href="" class="text-light"><i class="fa-solid fa-pen-to-square"></i></a></td>
        <td><a href="" class="text-light"><i class="fa-solid fa-trash"></i></a></td>
    </tr>
</tbody>


          