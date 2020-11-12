<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<style>
    .container{
        margin: 0 auto;
        text-align: center;
    }
</style>
<body>
    <?php
        include("confs/auth.php")
    ?>
    <div class="container">
        <h1>Category List</h1>
        <?php 
            include("confs/config.php");
            $result = mysqli_query($conn, 'SELECT * FROM categories');
        ?>
        <a href="cat-new.php" class="ui basic button"><i class="icon plus"></i>New Category</a>
        <hr>
        <div class="ui brown buttons">
            <a href="plant-list.php" type="button" class="ui button">Manage Plants</a>
            <a href="cat-list.php" type="button" class="ui button">Manage Categories</a>
            <a href="orders.php" type="button" class="ui button">Manage Orders</a>
            <a href="logout.php" type="button" class="ui button">Logout</a>
        </div>
        <table class="ui celled table">
            <thead align="center">
                <tr>
                <th style="width: 500px">Category Name</th>
                <th style="width: 500px">Action</th>
                </tr>
            </thead>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tbody align="center">
                <tr title="<?php echo $row['remark'] ?>">
                <td data-label="category_name"><?php echo $row['name'] ?></td>
                <td data-label="button_actions">
                    <a href="cat-del.php?id=<?php echo $row['id'] ?>" class="ui negative button">Delete</a>
                    <a href="cat-edit.php?id=<?php echo $row['id'] ?>" class="ui teal button">Edit</a>
                </td>
                </tr>
            </tbody>
            <?php endwhile; ?>

        </table>
        
       
    </div>
    
</body>
</html>