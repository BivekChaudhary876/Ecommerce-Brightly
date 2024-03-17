<?php
include('../DatabaseConnection/connection.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

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
 <title>Payment</title>
</head>
<body>
 

<!-- php code to access user id -->
<?php
 $user_ip=getIPAddress();
 $get_user="SELECT * FROM user_table WHERE user_ip='$user_ip'";
 $result=mysqli_query($conn,$get_user);
 $result_query=mysqli_fetch_array($result);
 $user_id=$result_query['user_id'];
?>
 <div class="container-fluid">
  <h2 class="text-center text-info">Payment Options</h2>
  <div class="row">
   <div class="col-md-6">
    <button id="payment-button"><img src="../assets/khalti.png" alt="Khalti"></button>
    <!-- Place this where you need payment button -->
    <!-- Paste this code anywhere in you body tag -->
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_ebe97fa995a84d45813d6d476be70a9e",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
            onSuccess(payload) {
                // hit merchant api for initiating verification
                console.log(payload);
                if (payload.idx) {
                    $.ajax({
                        method: 'post',
                        url: "../api/verify.php?token=" + payload.token + "&amount=" + payload.amount,
                        success: function(response) {
                            // Handle success response from your API
                            console.log("Verification success:", response);
                            // Perform any other actions you need after successful verification
                        },
                        error: function(error) {
                            // Handle error response from your API
                            console.log("Verification error:", error);
                            // Perform any other error handling actions
                        }
                    });
                }
            },
            onError(error) {
                console.log("Checkout error:", error);
                // Perform any error handling actions you need
            },
            onClose() {
                console.log('Widget is closing');
                // Perform any actions you need when the widget is closed
            }
        }
    };

    var checkout = new KhaltiCheckout(config);
    var btn = document.getElementById("payment-button");
    btn.onclick = function() {
        // minimum transaction amount must be 10, i.e 1000 in paisa.
        checkout.show({ amount: 1000 });
    };
</script>
   </div>
   <div class="col-md-6">
    <a href="order.php?user_id=<?php echo $user_id ?>" target="_blank"><h2 class="text-center">Payment Via Cash</h2></a>
   </div>
  </div>
 </div>
</body>
</html>