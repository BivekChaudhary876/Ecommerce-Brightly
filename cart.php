<?php
include('./DatabaseConnection/connection.php');
include('./functions/common_function.php');
session_start();
?>
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
.cart-image{
  width: 80px;
  height: 80px;
  object-fit:contain;
}
    </style>

 <title>Ecommerce Website Cart details</title>
</head>
<body>
 <!-- Navbar -->
 <div class="container-fluid p-0">
    <!-- first Child -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Brightly</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_items();
              ?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./Users/user_login.php"><i class="fa-solid fa-user"></i></a>
            </li>
          
          </ul>
         
        </div>
      </div>
    </nav>


    <!-- calling cart function -->
    <?php
    cart();
    ?>

    <!-- Second Child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <div class="container-fluid">
        <ul class="navbar-nav me-auto">
        <?php
        if(!isset($_SESSION['user_username']))
        {
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }
        else {
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['user_username']."</a> 
        </li>";
        }
        if(!isset($_SESSION['user_username']))
        {
          echo "<li class='nav-item'>
          <a class='nav-link' href='./Users/user_login.php'>Login</a> 
        </li>";
        }
        else {
          echo "<li class='nav-item'>
          <a class='nav-link' href='./Users/user_logout.php'>Logout</a> 
        </li>";
        }
        ?>
      </ul>
      </div>
    </nav>

    <!-- third child -->
    <div class="bg-light">
      <h3 class="text-center">Cart</h3>
    </div>

    <!-- fourth chid -->
    <div class="container">
      <div class="row">
        <form action="" method="post">
          <table class="table table-bordered">
            

            <!-- php code to display dynamic data -->
            <?php
              $get_ip_address=getIPAddress();
              $total=0;
              $cart_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
              $result=mysqli_query($conn,$cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count>0)
              {
                echo "<thead class='text-center'>
              <tr>
                <th>Product Title</th>
                <th>Product Image</th>  
                <th>Quantity</th>  
                <th>Total Price</th>  
                <th>Remove</th>  
                <th colspan='2'>Operations</th>  
              </tr>
            </thead>
          </tbody>";

              while($row=mysqli_fetch_array($result)){
                $product_id=$row['product_id'];
                $select_products="SELECT * FROM product WHERE product_id='$product_id'";
                $result_product=mysqli_query($conn,$select_products);
                while($row_product_price=mysqli_fetch_array($result_product)){
                  $product_price=array($row_product_price['product_price']);
                  $price_table=$row_product_price['product_price'];
                  $product_title=$row_product_price['product_title'];
                  $product_image1=$row_product_price['product_image1'];
                  $product_values=array_sum($product_price);
                  $total+= $product_values;
                
            ?>
            <tbody class="text-center">
              <tr>
                <td><?php echo $product_title ?></td>
                <td><img src="./Admin/product_images/<?php echo $product_image1 ?>" alt="" class="cart-image"></td>
                <td><input type="text" name="qty" id="" class="form-input w-50"></td>
                <?php
                  $get_ip_address=getIPAddress();
                  if (isset($_POST['update_cart'])) {
          $quantities = $_POST['qty'];
          $update_cart = "UPDATE cart_details SET quantity='$quantities' WHERE ip_address='$get_ip_address'";
          $result_product_quantity = mysqli_query($conn, $update_cart);
          $total = (int)$total * (int)$quantities;
      }

                ?>
                <td>Rs. <?php echo $price_table ?></td>           
                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>           
                <td class="d-flex justify-content-center">
                  <input class="btn btn-secondary mx-2" type="submit" value="Update" name="update_cart">
                  <input class="btn btn-danger" type="submit" value="Remove" name="remove_cart">
                </td>           
              </tr>
              <?php
              }
              }
            }
            
            else
            {
              echo "<h1 class='text-center text-danger'>Cart is empty</h1>";
            }
              ?>
            </tbody>
          </table>
          

          <!-- Subtotal -->
          <div class="d-flex">
            <?php
              $get_ip_address=getIPAddress();
              $cart_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
              $result=mysqli_query($conn,$cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count>0)
              {
                echo "<h4 class='px-3'>Subtotal: <strong class='text-success'>Rs. $total/-</strong></h4>
                <input class='btn btn-primary mx-3' type='submit' value='Continue Shopping' name='continue_shopping'>
                <button class='btn btn-success'><a href='./Users/checkout.php' class='text-decoration-none text-light'>Checkout</a></button>";
              }
              else {
                echo "<input type='submit' value='Continue Shopping' name='continue_shopping' class='btn btn-primary'>";
              }
              if(isset($_POST['continue_shopping']))
              {
                echo "<script>window.open('index.php','_self')</script>";
              }

            ?>
            
          </div>
        </div>
      </div>
      </form>

    <!-- Function to remove item -->
    <?php
    function remove_cart_item(){
      global $conn;
      if(isset($_POST['remove_cart']))
      {
        foreach ($_POST['removeitem'] as $remove_id) {
          echo $remove_id;
          $delete_query="DELETE FROM cart_details WHERE product_id=$remove_id";
          $run_delete=mysqli_query($conn,$delete_query);
          if($run_delete)
          {
            echo "<script>window.open('cart.php','_self')</script>";
          }
        }
      }
    }
    echo $remove_id=remove_cart_item();

    ?>

    <!-- Footer Section -->
    <!-- include footer -->
    <?php
      include("./DatabaseConnection/footer.php");
    ?>
</body>
</html>