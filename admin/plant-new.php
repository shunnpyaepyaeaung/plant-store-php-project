<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Plants</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet"> 
</head>
<style>
    body{
        background: #efefef;
    }
    form label {
        display: block;
        margin-top: 8px;
        font-family: 'Open Sans', sans-serif;
    }
    .container{
        margin: 0 auto;
        text-align: center;
        background-color: white;
        width: 500px;
        padding: 20px;
        margin: 10px auto;
        border: 4px solid #ddd;
        background: #fff;
    }
    h1{
        font-family: 'Playfair Display', serif;
    }
    label{
        text-align: left;
    }
    
</style>
<body>
<?php
        include("confs/auth.php")
    ?>
    <div class="container">
        <h1>Add New Plant</h1>
        <form class="ui form" action="plant-add.php" method="post" enctype="multipart/form-data">
            <div class="field">
                <label for="name">Product Name</label>
                <input type="text" name="product_name" id="pname" placeholder="Product Name" autofocus>
            </div>
            <div class="field">
                <label for="description">Description</label>
                <textarea name="description" id="description"></textarea>
            </div>
            <div class="field">
                <label for="price">Price</label>
                <input type="number" step="any" name="price" id="price" placeholder="Product Price">
            </div>
            <div class="field">
                <label for="categories">Category</label>
                <select name="category_id" id="categories">
                    <option vlaue="0">--Choose category--</option>
                    <?php 
                        include("confs/config.php");
                        $result = mysqli_query($conn, "SELECT id, name FROM categories");
                        while($row = mysqli_fetch_assoc($result)):
                    ?>
                    <option value="<?php echo $row['id'] ?>">
                        <?php echo $row['name'] ?>
                    </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="field">
                <label for="plant_img">Plant Image</label>
                <input type="file" name="plant_img" id="plant_img">
            </div>
            <input class="ui secondary button" type="submit" value="Add Plant"><br>
            <a href="plant-list.php" class="back">Back</a>
        </form>
        <div>
            <a class="ui teal basic button" href="plant-list.php">Manage Plants</a>
            <a class="ui teal basic button" href="cat-list.php">Manage Categories</a><br><br>
            <a class="ui teal basic button" href="orders.php">Manage Orders</a>
            <a class="ui teal basic button" href="logout.php">Logout</a>
        </div>
    </div>
  
</body>
</html>