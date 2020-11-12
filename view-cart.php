<?php 
    session_start();
    if(!isset($_SESSION['cart'])){
        header("location: index.php");
        exit();
    }
    include("admin/confs/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<style>
    a{
        color: black; 
        text-decoration: none;
    }
    a:hover{
        color: black;
        text-decoration: none;
    }
    .sidebar { 
        float: left; 
        width: 240px;
    }
    .cats { 
        list-style: none;
        padding: 10px;
    }
    .cats li a {
        display: block;
        font-size: 15px;
        padding: 8px 15px; 
        border-bottom: 1px solid #ddd;
    }
    .cats li a:hover { 
        background: #efefef;
    }   
    .main {
        float: right; 
        width: 1200px; 
        background: #fff;
        margin-top: -115px;
    }
    .order-form{
        float: right; 
        width: 1200px; 
        background: #fff;
    }
    .btn{
        border-radius: 0;
        margin-bottom: 20px;
    }
    .btn-outline-dark{
        margin-left: 16px;
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
    .hide:hover{
        color: red;
    }
</style>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">PLNTS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">View Cart <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
    <div class="sidebar">
        <ul class="cats">
            <li class="continue"><a href="index.php"><i class="fa fa-cart-plus"></i> Continue Shopping</a></li>
            <li><a href="clear-cart.php"><i class="fa fa-times"></i> Clear Cart</a></li>
        </ul>
    </div>
    <div class="main">
    <table class="ui celled table">
  <thead>
    <tr><th>Product Name</th>
    <th>Quantity</th>
    <th>Unit Price</th>
    <th>Price</th>
  </tr></thead>
 
  <tbody>
  <?php 
    $total = 0;
    foreach($_SESSION['cart'] as $id => $qty):
        $result = mysqli_query($conn, "SELECT product_name,price FROM plants WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
        $total += $row['price'] * $qty;
  ?>
    <tr>
      <td data-label="product_name"><?php echo $row['product_name'] ?></td>
      <td data-label="quantity"><?php echo $qty ?></td>
      <td data-label="price">$<?php echo $row['price'] ?></td>
      <td data-label="total_price">$<?php echo $row['price'] * $qty ?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td colspan="3" align="right"><h4>Total:</h4></td>
        <td><h4>$<?php echo $total; ?></h4></td>
    </tr>
  </tbody>
</table>
    </div>
    <div class="order-form">
        <h3>Order Now</h3>
        <hr>
        <form action="submit-order.php" method="post">
            <div class="form-group col-md-6">
                <label for="username">Your Name</label>
                <input name="username" type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control"aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Phone Number</label>
                <input name="phone" type="text" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="address">Address</label>
                <textarea class="form-control" name="address" rows="3"></textarea>
            </div>
            <input type="submit" class="btn btn-outline-dark" value="Submit">
            <a href="index.php" class="btn btn-dark">Continue Shopping</a>
        </form>
    </div>
    <div class="footer bg-dark">
        &copy; Copyright <?php echo date("Y") ?>. All right reserved.
  </div>
</body>
</html>