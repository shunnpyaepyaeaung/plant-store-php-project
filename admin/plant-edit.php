<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Plant</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

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
        include("confs/config.php");
        $id = $_GET['id'];
        $result = mysqli_query($conn, "SELECT * FROM plants WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <h1>Edit Plant</h1>
        <form class="ui form" action="plant-update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <div class="field">
                <label for="name">Product Name</label>
                <input type="text" name="product_name" id="pname" value="<?php echo $row['product_name'] ?>">
            </div>
            <div class="field">
                <label for="description">Description</label>
                <textarea name="description" id="description"><?php echo $row['description'] ?></textarea>
            </div>
            <div class="field">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" value="<?php echo $row['price'] ?>">
            </div>
            <div class="field">
                <label for="categories">Category</label>
                <select name="category_id" id="categories">
                    <option vlaue="0">--Choose category--</option>
                    <?php 
                        $categories = mysqli_query($conn, "SELECT id, name from categories");
                        while($cat = mysqli_fetch_assoc($categories)):
                    ?>
                    <option value="<?php echo $cat['id'] ?>" 
                        <?php if($cat['id'] == $row['category_id']) echo "selected" ?> >
                        <?php echo $cat['name'] ?>
                    </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <img src="plants/<?php echo $row['plant_img'] ?>" alt="" height="150">
            <div class="field">
                <label for="change_img">Change Image</label>
                <input type="file" name="plant_img" id="plant_img">
            </div>
            <input class="ui secondary button" type="submit" value="Update Plant"><br>
            <a href="plant-list.php" class="back">Back</a>
        </form>
        <br>
        <div>
            <a class="ui teal basic button" href="plant-list.php">Manage Plants</a>
            <a class="ui teal basic button" href="cat-list.php">Manage Categories</a><br><br>
            <a class="ui teal basic button" href="orders.php">Manage Orders</a>
            <a class="ui teal basic button" href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>