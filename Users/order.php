<?php
 include('../DatabaseConnection/connection.php');
 include('../functions/common_function.php');

 if(isset($_GET['user_id']))
 {
  $user_id=$_GET['user_id'];
 }


 //getting total items and total price of all items
 $get_ip_address=getIPAddress();
 $total_price=0;
 $cart_query_price="SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
 $cart_query_price_result=mysqli_query($conn,$cart_query_price);
 $invoice_number=mt_rand();
 $status='pending';
 $cart_query_price_count=mysqli_num_rows($cart_query_price_result);

 while($row_price=mysqli_fetch_array($cart_query_price_result))
 {
  $product_id=$row_price['product_id'];
  $product_price_query="SELECT * FROM product WHERE product_id=$product_id";
  $product_price_query_result=mysqli_query($conn,$product_price_query);

  while($row_product_price=mysqli_fetch_array($product_price_query_result))
  {
   $product_price=array($row_product_price['product_price']); 
   $product_values=array_sum($product_price);
   $total_price+=$product_values;
  }
 }

 //getting quantity from cart
 $get_cart="SELECT * FROM cart_details";
 $get_cart_result=mysqli_query($conn,$get_cart);
 $get_cart_quantity=mysqli_fetch_array($get_cart_result);
 $quantity=$get_cart_quantity['quantity'];

 if($quantity==0)
 {
  $quantity=1;
  $subtotal=$total_price;
 }
 else {
  $quantity=$quantity;
  $subtotal=$total_price*$quantity;
 }

 $insert_orders="INSERT INTO user_orders (user_id,amount_due,invoice_number,total_products,order_date,order_status) VALUES ($user_id,$subtotal,$invoice_number,$cart_query_price_count,NOW(),'$status')";
 $result_query=mysqli_query($conn,$insert_orders);

 if($result_query)
 {
  echo "<script>alert('Orders are submitted successfully')</script>";
  echo "<script>window.open('profile.php','_self')</script>";
 }

 //orders pending

 $insert_pending_orders="INSERT INTO orders_pending (user_id,invoice_number,product_id,quantity,order_status) VALUES ($user_id,$invoice_number,$product_id,$quantity,'$status')";
 $result_pending_query=mysqli_query($conn,$insert_pending_orders);

 //delete items from cart
 $empty_cart="DELETE FROM cart_details WHERE ip_address='$get_ip_address'";
 $empty_cart_result=mysqli_query($conn,$empty_cart);
?>