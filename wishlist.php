<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Bootstrap CSS Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 
 <!-- FontAswesome icon Link -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 <title>Document</title>
</head>
<body>
 <td class="d-flex justify-content-center">
    <input class="btn btn-secondary mx-2" type="submit" value="Update" name="update_cart">
    <input class="btn btn-danger" type="submit" value="Remove" name="remove_cart">
    <form action="wishlist.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <?php
        // Check if the product is already in the wishlist for the current user
        $check_query = "SELECT * FROM wishlist WHERE user_id = '{$_SESSION['user_id']}' AND product_id = '$product_id'";
        $result_check = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($result_check) > 0) {
            // Product is already in the wishlist, display "Remove from Wishlist" button
            echo '<button type="submit" class="btn btn-danger">Remove from Wishlist</button>';
        } else {
            // Product is not in the wishlist, display "Add to Wishlist" button
            echo '<button type="submit" class="btn btn-primary">Add to Wishlist</button>';
        }
        ?>
    </form>
</td>

</body>
</html>
<?php
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page or display an error message
    echo "Please log in to add items to your wishlist.";
    exit;
}

// Check if the product_id is provided
if (!isset($_POST['product_id'])) {
    // Display an error message or redirect the user
    echo "Invalid product.";
    exit;
}

// Get the product_id and user_id from the form
$product_id = $_POST['product_id'];
$user_id = $_SESSION['user_id'];

// Check if the product is already in the wishlist
$check_query = "SELECT * FROM wishlist WHERE user_id = '$user_id' AND product_id = '$product_id'";
$result_check = mysqli_query($conn, $check_query);

if (mysqli_num_rows($result_check) > 0) {
    // Product is already in the wishlist, so remove it
    $remove_query = "DELETE FROM wishlist WHERE user_id = '$user_id' AND product_id = '$product_id'";
    $result_remove = mysqli_query($conn, $remove_query);

    if ($result_remove) {
        // Product removed from the wishlist successfully
        echo "Product removed from your wishlist.";
    } else {
        // Error occurred while removing the product from the wishlist
        echo "Error removing the product from your wishlist.";
    }
} else {
    // Product is not in the wishlist, so add it
    // Insert the product into the wishlist table
    $insert_query = "INSERT INTO wishlist (user_id, product_id) VALUES ('$user_id', '$product_id')";
    $result_insert = mysqli_query($conn, $insert_query);

    if ($result_insert) {
        // Product added to the wishlist successfully
        echo "Product added to your wishlist.";
    } else {
        // Error occurred while adding the product to the wishlist
        echo "Error adding the product to your wishlist.";
    }
}
?>
