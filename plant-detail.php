<?php 
    session_start();
    include("admin/confs/config.php");
    $cart = 0;
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $qty){
            $cart += $qty;
        }   
    }
    if(isset($_GET['cat'])){
        $cat_id = $_GET['cat'];
        $plants = mysqli_query($conn, "SELECT * FROM plants WHERE category_id = $cat_id");
    }else{
        $plants = mysqli_query($conn, "SELECT * FROM plants");
    }
    $cats = mysqli_query($conn, "SELECT * FROM categories");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Detail</title>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Limelight&family=Playfair+Display&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
    .container{
        margin: 0 auto;
        text-align: center;
    }
     .navbar-brand{
        font-family: 'Limelight', cursive;
        font-size: 30px;
    }
    i{
        font-size: 25px !important;
        margin-right: 10px;
    }
    img{
        width: 300px;
        height: 350px;
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
.btn{
    border-radius: 0;
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
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a href="view-cart.php" class="nav-link"><i class="fa fa-shopping-cart"></i><span><?php echo $cart ?></span></a>
      </li>
    </ul>
  </div>
</nav>
    <div class="container">
        <h2>Plant Detail</h2>
        <?php
            include("admin/confs/config.php");
            $id = $_GET['id'];
            $plants = mysqli_query($conn, "SELECT * FROM plants WHERE id = $id");
            $row = mysqli_fetch_assoc($plants);
        ?>
        <div class="ui equal width center aligned padded grid">
            <div class="row">
                <div class="column">
                    <img src="admin/plants/<?php echo $row['plant_img'] ?>">
                </div>
                <div class="column">
                <table class="ui definition table">
    
                    <tbody>
                        <tr>
                        <td>Product Name</td>
                        <td><?php echo $row['product_name'] ?></td>
                        </tr>
                        <tr>
                        <td>Price</td>
                        <td>$<?php echo $row['price'] ?></td>
                        </tr>
                        <tr>
                        <td>Description</td>
                        <td><?php echo $row['description'] ?></td>
                        </tr>
                    </tbody></table>
                    <a href="add-to-cart.php?id=<?php echo $id ?>" class="btn btn-outline-dark">Add to Cart</a>
                    <a href="index.php" class="btn btn-dark">Go back</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer bg-dark">
        &copy; Copyright <?php echo date("Y") ?>. All right reserved.
    </div>
</body>
</html>