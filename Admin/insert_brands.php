<?php
include('../DatabaseConnection/connection.php');

if(isset($_POST['insert_brand']))
{
 $brand_title=$_POST['brand_title'];
 $select_query="Select * from brands where brand_title='$brand_title'";
 $result_select=mysqli_query($conn,$select_query);
 $number=mysqli_num_rows($result_select);
 if($number>0)
 {
  echo "<script>alert('Brand Already Exists..!')</script>";
 }
 else 
 {
  $insert_query="insert into brands (brand_title) values ('$brand_title')";
  $result=mysqli_query($conn,$insert_query);
  if($result)
  {
   echo "<script>alert('Brand has been inserted successfully')</script>";
  }   
 }
}
?>


<form action="" method="post" class="mb-2">
 <div class="input-group w-90 mb-2">
  <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brand" aria-label="Brands" aria-describedby="addon-wrapping">
</div>
<div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="bg-success p-2 my-3 border-0" name="insert_brand" value="Insert Brands" aria-label="Brand" aria-describedby="addon-wrapping">
    <!-- <button class="bg-success p-2 my-3 border-0">Insert Brands</button> -->
  </div>
</form>