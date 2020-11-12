<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plants List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .container{
        margin: 0 auto;
        text-align: center;
    }
    i{
        width: 20px;
    }
    .icons{
        position: absolute;
    }
    .action{
        width: 200px;
    }
    .buttons{
        margin-bottom: 20px !important;
    }
    table{
        margin-bottom: 20px !important;
    }
</style>
<body>
<?php
        include("confs/auth.php")
    ?>
    <div class="container">
        <h1>Plants List</h1>
        <?php 
            include("confs/config.php");
            $result = mysqli_query($conn, "SELECT plants.*, categories.name FROM plants LEFT JOIN categories ON plants.category_id = categories.id ORDER BY plants.created_date DESC");
        ?>
        
        <a href="plant-new.php" class="ui basic button"><i class="icon plus"></i>New Plants</a>
        <hr>
        <div class="ui brown buttons">
            <a href="plant-list.php" type="button" class="ui button">Manage Plants</a>
            <a href="cat-list.php" type="button" class="ui button">Manage Categories</a>
            <a href="orders.php" type="button" class="ui button">Manage Orders</a>
            <a href="logout.php" type="button" class="ui button">Logout</a>
        </div>
        <table class="ui celled table">
            <thead>
                <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Description</th>
                <th class='action'>Action</th>
            </tr></thead>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tbody>
                <tr>
                <td><img src="plants/<?php echo $row['plant_img'] ?>" alt="" align="left" width="160px" height="150px"></td>
                <td><?php echo $row['product_name'] ?></td>
                <td>$<?php echo $row['price'] ?></td>
                <td><?php echo $row['description'] ?></td>
                <td class="icons">
                    <a href="plant-del.php?id=<?php echo $row['id'] ?>" class="ui negative button"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    <a href="plant-edit.php?id=<?php echo $row['id'] ?>" class="ui teal button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </td>
                </tr>

            </tbody>
            <?php endwhile; ?>


        </table>
        
        

    </div>
</body>
</html>