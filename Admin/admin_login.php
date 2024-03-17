<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Bootstrap CSS Link -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 <!-- FontAswesome icon Link -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body{
    overflow-x: hidden;
  }
  .logo {
  width: 7%;
  height: 7%;
}

.card-img-top {
  width: 100%;
  height: 200px;
  object-fit: contain;
}

.admin_image {
  width: 100px;
  object-fit: contain;
}
</style>
 <title>Admin Login</title>
</head>
<body>
 <div class="container-fluid">
   <!-- header -->
   <?php include('../header.php');?>
  <h2 class="text-center">Admin Login</h2>
  <div class="row d-flex align-items-center justify-content-center">
   <div class="col-lg-12 col-xl-6">
    <form action="" method="POST" enctype="multipart/form-data " class="m-3 p-3 border border-light rounded">
     <!-- Username field -->
     <div class="form-outline mb-2">
      <label for="admin_username" class="col-sm-2 col-form-label">Username</label>
      <input type="text" class="form-control" id="admin_username" name="admin_username" placeholder="Enter Your Username" required="required" autocomplete="off">
     </div>
     <!-- Password Field -->
     <div class="form-outline mb-2">
      <label for="admin_password" class="col-sm-2 col-form-label">Password</label>
      <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Password" required="required" autocomplete="off">
     </div>
     <div class=" text-center mt-2 pt-2"> 
      <input type="submit" class="btn btn-outline-success py-2 px-3" name="admin_login" value="Login">
      <p class="pt-2 mb-0">Don't have an account? <a href="admin_registration.php"class="link-secondary">Register</a></p>
     </div>
  </div>
 </div>
</body>
</html>

<?php
if(isset($_POST['admin_login']))
{
 $username = $_POST['admin_username'];
 $password = $_POST['admin_password'];
 $select_query = "SELECT * FROM admin_table WHERE admin_username = '$username'";
 $result = mysqli_query($conn, $select_query);
 $count_result = mysqli_num_rows($result);
 $count_data = mysqli_fetch_assoc($result);

 if($count_result > 0)
 {
  if(password_verify($password,$count_data['admin_password']))
  {
   echo "<script>alert('Login Successfull')</script>";
  }
  else {
   {
    echo "<script>alert('Password Incorrect')</script>";
   }
  }
 }else
 {
  echo "<script>alert('Invalid username or password')</script>";
 }
}
?>