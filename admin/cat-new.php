<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Category</title>
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
        <h1>Add New Category</h1>
        <form class="ui form" action="cat-add.php" method="post">
            <div class="field">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" placeholder="Category Name" autofocus>
            </div>
            <div class="field">
                <label>Remark</label>
                <textarea name="remark" id="remark"></textarea>
            </div>
            <input class="ui secondary button" type="submit" value="Add Category">
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