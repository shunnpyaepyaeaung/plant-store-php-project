<?php 
    session_start();
    include("admin/confs/config.php");
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    mysqli_query($conn, "INSERT INTO orders (name, email, phone,address,status,created_date, modified_date) VALUES ('$username','$email','$phone','$address',0,now(),now())");
    $order_id = mysqli_insert_id($conn);
    foreach($_SESSION['cart'] as $id => $qty){
        mysqli_query($conn,"INSERT INTO order_items (order_id,plant_id,qty) VALUES ('$order_id','$id','$qty')");
    }
    unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Orders</title>
</head>
<style>
    .container{
        margin: 0 auto;
        text-align: center;
    }
    .footer {
        clear: both;
        color: #fff;
        font-size: 13px;
        padding: 8px;
        text-align: center; 
        border-top: 1px solid #7F8C8D;
        left: 0;
        bottom: 0;
        width: 100%;
}
.msg {
    background: #1ABC9C; 
    color: #fff; 
    text-align: center; 
    padding: 10px; 
    margin: 50px 20px;
}
.msg a {
    color: #eee;
    border-bottom: 1px dotted #fff;
}
</style>
<body>
    <div class="container">
        <h1>Order Submitted</h1>
        <div class="msg">
            Your order has been submitted. We will delivered the items soon.
            <a href="index.php" class="done">Home Page</a>
        </div>
    </div>
    <div class="footer bg-dark">
        &copy; Copyright <?php echo date("Y") ?>. All right reserved.
    </div>
</body>
</html>