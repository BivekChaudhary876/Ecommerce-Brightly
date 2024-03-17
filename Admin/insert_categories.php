<?php
include('../DatabaseConnection/connection.php');

if(isset($_POST['insert_cat']))
{
 $category_title=$_POST['cat_title'];
 $select_query="Select * from categories where category_title='$category_title'";
 $result_select=mysqli_query($conn,$select_query);
 $number=mysqli_num_rows($result_select);
 if($number>0)
 {
  echo "<script>alert('Category Already Exists..!')</script>";
 }
 else 
 {
  $insert_query="insert into categories (category_title) values ('$category_title')";
  $result=mysqli_query($conn,$insert_query);
  if($result)
  {
   echo "<script>alert('Category has been inserted successfully')</script>";
  }   
 }
}
?>

<form action="" method="post" class="mb-2">
 <div class="input-group w-90 mb-2">
  <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert Category" aria-label="Categories" aria-describedby="addon-wrapping">
</div>
<div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="bg-success p-2 my-3 border-0" name="insert_cat" value="Insert Categories" aria-label="Category" aria-describedby="addon-wrapping">
    <!-- <button class="bg-success p-2 my-3 border-0">Insert Categories</button> -->
  </div>
</form>