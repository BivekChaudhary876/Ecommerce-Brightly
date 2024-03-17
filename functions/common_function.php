<?php

//getting products
function getproducts()
{
    global $conn;

    //condition to check isset or not
  if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){

      
      $select_query="SELECT * FROM product order by rand() LIMIT 0,4 ";
                $result_query=mysqli_query($conn,$select_query);
               
                while($row=mysqli_fetch_assoc($result_query)){
                  $product_id=$row['product_id'];
                  $product_title=$row['product_title'];
                  $product_description=$row['product_description'];
                  $product_image1=$row['product_image1'];
                  $product_price=$row['product_price'];
                  $category_id=$row['category_id'];
                  $brand_id=$row['brand_id'];
                  echo "<div class='col-md-4 mb-4'>
                  <div class='card'>
                    <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                      <h5 class='card-title'> $product_title</h5>
                      <p class='card-text'>$product_description</p>
                      <p class='card-text'>Price: $product_price /-</p>
                      <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                      <a href='#' class='btn btn-primary'>WishList</a>
                      <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>View more</a>
                    </div>
                  </div>
                </div>";
                }
  }
  }
}

//getting all products
function get_all_products(){
    global $conn;

    //condition to check isset or not
if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){

    
    $select_query="SELECT * FROM product order by rand() ";
              $result_query=mysqli_query($conn,$select_query);
              
              while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
                echo "<div class='col-md-4 mb-4'>
                <div class='card banner'>
                  <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title '> $product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price /-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                    <a href='#' class='btn btn-primary'>WishList</a>
                    <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>View more</a>
                  </div>
                </div>
              </div>";
              }
}
}
}

//getting unique categories
function get_unique_categories()
{
    global $conn;
    //condition to check isset or not
if(isset($_GET['category'])){
    $category_id=$_GET['category'];
    $select_query="SELECT * FROM product WHERE category_id='$category_id'";
              $result_query=mysqli_query($conn,$select_query);
              $num_of_rows=mysqli_num_rows($result_query);
              if($num_of_rows==0)
              {
                echo "<h2 class='text-center'>No stock for this category</h2>";
              }
              while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
                echo "<div class='col-md-4 mb-4'>
                <div class='card'>
                  <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'> $product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price /-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                    <a href='#' class='btn btn-primary'>WishList</a>
                     <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>View more</a>
                  </div>
                </div>
              </div>";
              }
}
}

//getting unique brands
function get_unique_brands()
{
    global $conn;
    //condition to check isset or not
if(isset($_GET['brand'])){
    $brand_id=$_GET['brand'];
    $select_query="SELECT * FROM product WHERE brand_id='$brand_id'";
              $result_query=mysqli_query($conn,$select_query);
              $num_of_rows=mysqli_num_rows($result_query);
              if($num_of_rows==0)
              {
                echo "<h2 class='text-center'>This brand is not available</h2>";
              }
              while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
                echo "<div class='col-md-4 mb-4'>
                <div class='card'>
                  <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'> $product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price /-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                    <a href='#' class='btn btn-primary'>WishList</a>
                     <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>View more</a>
                  </div>
                </div>
              </div>";
              }
}
}



//displaying brands in sidenav

function getbrands(){
    global $conn;
    $select_brands='SELECT * FROM brands';
              $result_brands=mysqli_query($conn,$select_brands);

              while($row_data=mysqli_fetch_assoc($result_brands))
              {
                $brand_title=$row_data['brand_title'];
                $brand_id=$row_data['brand_id'];
                echo "<li class='nav-item'>
                <a class='nav-link text-light' href='index.php?brand=$brand_id' ><h5>$brand_title</h5></a>
              </li>";
              }
}

//displaying categories

function getcategories(){
    global $conn;
    $select_categories='SELECT * FROM categories';
              $result_categories=mysqli_query($conn,$select_categories);
              while($row_data=mysqli_fetch_assoc($result_categories))
              {
                $category_title=$row_data['category_title'];
                $category_id=$row_data['category_id'];
                echo "<li class='nav-item'>
                <a class='nav-link text-light' href='index.php?category=$category_id' ><h5>$category_title</h5></a>
              </li>";
              }
}

//searching function

function search_product(){
    global $conn;
    if(isset($_GET['search_data_product'])){
        $search_data=$_GET['search_data'];
    $search_query="SELECT *FROM product WHERE product_keywords like '%$search_data%' ";
              $result_query=mysqli_query($conn,$search_query);
              $num_of_rows=mysqli_num_rows($result_query);
              if($num_of_rows==0)
              {
                echo "<h2 class='text-center'>No result match</h2>";
              }
              while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_description=$row['product_description'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $category_id=$row['category_id'];
                $brand_id=$row['brand_id'];
                echo "<div class='col-md-4 mb-4'>
                <div class='card'>
                  <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                  <div class='card-body'>
                    <h5 class='card-title'> $product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price: $product_price /-</p>
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                    <a href='#' class='btn btn-primary'>WishList</a>
                     <a href='product_details.php?product_id=$product_id' class='btn btn-primary'>View More</a>
                  </div>
                </div>
              </div>";
              }
}
}

//view details function
function view_details(){
  global $conn;

  //condition to check isset or not
  if(isset($_GET['product_id'])){
if(!isset($_GET['category'])){
  if(!isset($_GET['brand'])){
  $product_id=$_GET['product_id'];
  $select_query="SELECT * FROM product WHERE product_id='$product_id'";
            $result_query=mysqli_query($conn,$select_query);
            // $row=mysqli_fetch_assoc($result_query);
            // echo $row['product_title'];
            while($row=mysqli_fetch_assoc($result_query)){
              $product_id=$row['product_id'];
              $product_title=$row['product_title'];
              $product_description=$row['product_description'];
              $product_image1=$row['product_image1'];
              $product_image2=$row['product_image2'];
              $product_image3=$row['product_image3'];
              $product_price=$row['product_price'];
              $category_id=$row['category_id'];
              $brand_id=$row['brand_id'];
              echo "<div class='col-md-4 mb-4'>
              <div class='card'>
                <img src='./Admin/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                <div class='card-body'>
                  <h5 class='card-title'> $product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price /-</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                  
                  <a href='index.php' class='btn btn-primary'>Go Home</a>
                </div>
              </div>
            </div>
            <div class='col-md-8'>
            <!-- related images -->
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center  md-5'>Related products</h4>
                </div>
                <div class='col-md-6'>
                <img src='./Admin/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                </div>
                <div class='col-md-6'>
                <img src='./Admin/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                </div>
            </div>
          </div>";
            }
}
}
}
}

//get ip  address function
function getIPAddress() {  
  //whether ip is FROM the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is FROM the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is FROM the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 

//cart function
function cart(){
  if(isset($_GET['add_to_cart'])){
    global $conn;
    $get_ip_address=getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address' and product_id=$get_product_id";
    $result_query=mysqli_query($conn,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0)
    {
      echo "<script>alert('This item is already present inside the cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }else{
      $insert_query="INSERT INTO cart_details (product_id,ip_address,quantity)VALUES($get_product_id,'$get_ip_address',0)";
      $result_query=mysqli_query($conn,$insert_query);
      echo "<script>alert('Item is added to cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}

//function to get cart item number
function cart_items(){
  if(isset($_GET['add_to_cart'])){
    global $conn;
    $get_ip_address=getIPAddress();
    $select_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address' and product_id";
    $result_query=mysqli_query($conn,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    }else{
      global $conn;
    $get_ip_address=getIPAddress();
    $select_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
    $result_query=mysqli_query($conn,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
  }

  //total price function
  function total_cart_price(){
    global $conn;
    $get_ip_address=getIPAddress();
    $total=0;
    $cart_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
    $result=mysqli_query($conn,$cart_query);
    while($row=mysqli_fetch_array($result)){
      $product_id=$row['product_id'];
      $select_products="SELECT * FROM product WHERE product_id='$product_id'";
      $result_product=mysqli_query($conn,$select_products);
      while($row_product_price=mysqli_fetch_array($result_product)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total+= $product_values;
      }
    }
    echo $total;
  }
?>