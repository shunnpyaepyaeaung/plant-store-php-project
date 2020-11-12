<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
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
    <div class="container">
    <h1>Edit Category</h1>
    <?php 
        include('confs/config.php');
        $id = $_GET['id'];
        $result = mysqli_query($conn, "SELECT * FROM categories WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
    ?>
        <form class="ui form" action="cat-update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <div class="field">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" value="<?php echo $row['name'] ?>" placeholder="Category Name" autofocus>
            </div>
            <div class="field">
                <label>Remark</label>
                <textarea name="remark" id="remark"><?php echo $row['remark'] ?></textarea>
            </div>
            <input class="ui secondary button" type="submit" value="Update Category" placeholder="Add remark">
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