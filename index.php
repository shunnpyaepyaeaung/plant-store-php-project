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
    <title>Plants Store</title>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Limelight&family=Playfair+Display&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .navbar-brand{
        font-family: 'Limelight', cursive;
        font-size: 30px;
    }
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
    .card-price{
        color: gray !important;
        font-family: 'EB Garamond', serif;
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
    .card{
        margin-top: 20px;
        border: none;
    }
    .btn{
        border-radius: 0;
    }
    i{
        font-size: 25px !important;
        margin-right: 10px;
    }
    .card-title{
        font-family: 'EB Garamond', serif;
        text-transform: uppercase;
    }
    .btn{
        font-family: 'Playfair Display', serif;    }
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
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a href="view-cart.php" class="nav-link"><i class="fa fa-shopping-cart"></i><span><?php echo $cart ?></span></a>
      </li>
    </ul>
  </div>
</nav>
    <div class="sidebar">
        <ul class="cats">
            <li>
                <b><a href="index.php">All Categories</a></b>
            </li>
            <?php while($row = mysqli_fetch_assoc($cats)): ?>
            <li>
                <a href="index.php?cat=<?php echo $row['id'] ?>">
                    <?php echo $row['name'] ?>
                </a>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <div class="main row">
    <?php while($row = mysqli_fetch_assoc($plants)): ?>
        <div class="card col-md-3">
            <img src="admin/plants/<?php echo $row['plant_img'] ?>" class="card-img-top" alt="..." style="margin-top: 5px">
            <div class="card-body">
                <h6 class="card-title dark" align="center"><?php echo $row['product_name'] ?></h6>
                <h6 class="card-price" align="center">US $<?php echo $row['price'] ?></h6>
                <div class="multi-button" align="center">
                    <a href="plant-detail.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-dark">View Detail</a>
                    <a href="add-to-cart.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-dark">Add to Cart</a>
                </div>
                
            </div>
        </div>
    <?php endwhile; ?>
    </div>
    <div class="footer bg-dark">
        &copy; Copyright <?php echo date("Y") ?>. All right reserved.
    </div>
</body>
</html>