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
    <h1 style="text-align:center;justify-content:center;background:aqua;"> About Us</h2>
    <h3 style="text-align:center;justify-content:center;">Welcome to Brightly!</h3>
    <h5 style="text-align:center;justify-content:center;">At Brightly, we believe that shopping should be a delightful experience, where you can find all your favorite fashion essentials and the latest electronic gadgets in one convenient place. We are an online destination dedicated to bringing you a curated collection of clothes, shoes, perfumes, and electronic products that suit your unique style and needs.</h5>

    


<h4>Our Passion for Fashion:</h4>
<p>We are passionate about fashion and believe that what you wear is an expression of your individuality. That's why our team of experienced fashion enthusiasts scours the industry to bring you the latest trends, timeless classics, and everything in between. From stylish clothing that fits like a dream to trendy footwear that complements your look, we have carefully handpicked each item with quality and style in mind</p>

<h4>Unleash Your Style:</h4>
<p>We understand that every person has their own personal style. That's why we offer a diverse range of clothing options to cater to different tastes, whether you prefer chic and sophisticated, casual and comfortable, or bold and expressive. Our extensive collection includes dresses, tops, bottoms, outerwear, and more, ensuring that you can find the perfect ensemble for any occasion.</p>


<h4>Step into Footwear Heaven:</h4>
<p>Finding the right pair of shoes can elevate your outfit and boost your confidence. Brightly is your go-to destination for footwear, offering a wide selection of shoes for men, women, and children. From sneakers and sandals to boots and heels, we have a style to suit every preference and provide the perfect finishing touch to your look.
</p>

<h4>Captivating Scents:</h4>
<p>Indulge your senses with our captivating range of perfumes and fragrances. We believe that a fragrance can evoke emotions, create memories, and leave a lasting impression. Explore our collection of exquisite scents from renowned brands, and discover the perfect fragrance that reflects your personality and enhances your aura.</p>
<h4>Electronics Made Easy:</h4>
<p>We also recognize the importance of staying up-to-date with the latest technological advancements. Our electronics section offers a variety of high-quality gadgets, from smartphones and tablets to smart home devices and entertainment systems. Whether you're a tech enthusiast or simply looking for a reliable device, we strive to provide you with a seamless shopping experience for all your electronic needs.</p>



<h6>Our Commitment to You:</h6>
<p>At Brightly, we prioritize customer satisfaction and strive to deliver a seamless shopping experience. We take pride in offering a user-friendly website, secure transactions, and prompt customer support to ensure that your journey with us is enjoyable and hassle-free. We are constantly improving our services and product offerings to exceed your expectations and provide you with the best online shopping experience.
</p>

 

<h5>Thank you for choosing Brightly as your preferred destination for clothes, shoes, perfumes, and electronic products. We are excited to embark on this fashion and technology journey with you, and we look forward to serving you with style, passion, and dedication.</h5>
<h4 style="text-align:center;justify-content:left;">Happy Shopping!</h4>

<h4 style="text-align:center;justify-content:left;">The Brightly Team</h4>


    <!-- Footer Section -->
    <!-- include footer -->
    <?php
      include("./DatabaseConnection/footer.php");
    ?>
</body>
</html>