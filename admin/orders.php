<?php 
    include("confs/auth.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<style>
    .container{
        margin: 0 auto;
        text-align: center;
    }
    .btn{
        font-size: 16px !important;
    }
    a{
        text-decoration: none;
        color: black;
    }
    a:hover{
        text-decoration: none;
    }
    .undo{
        color: red;
    }
    .delivered{
        color: green;
    }
    table{
        margin-bottom: 20px !important;
    }
</style>
<body>
    <div class="container">
        <h2>Order List</h2>
        <div class="ui brown buttons">
            <a href="plant-list.php" type="button" class="ui button">Manage Plants</a>
            <a href="cat-list.php" type="button" class="ui button">Manage Categories</a>
            <a href="orders.php" type="button" class="ui button">Manage Orders</a>
            <a href="logout.php" type="button" class="ui button">Logout</a>
        </div>
        <hr>

        <?php
            include("confs/config.php");
            $orders = mysqli_query($conn, "SELECT * FROM orders");
        ?>
            
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Product Info</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php while($order = mysqli_fetch_assoc($orders)):?>

                <tr>
                    <td data-label="name"><?php echo $order['name'] ?></td>
                    <td data-label="email"><?php echo $order['email'] ?></td>
                    <td data-label="phone"><?php echo $order['phone'] ?></td>
                    <td data-label="address"><?php echo $order['address'] ?></td>
                    <td data-label="items">
                    <?php 
                            $order_id = $order['id'];
                            $items = mysqli_query($conn, "SELECT order_items.*, plants.product_name FROM order_items LEFT JOIN plants ON order_items.plant_id = plants.id WHERE order_items.order_id = $order_id");
                            while($item = mysqli_fetch_assoc($items)):
                        ?>
                        <b>
                            <a href="../plant-detail.php?id=<?php echo $item['plant_id'] ?>">
                                <?php echo $item['product_name'] ?>
                            </a>
                            (<?php echo $item['qty'] ?>)
                        </b>
                        <br><br>
                            <?php endwhile; ?>
                    </td>
                    <td data-label="status">
                        <?php if($order['status']): ?>
                            <a class="undo" href="order-status.php?id=<?php echo $order['id'] ?>&status=0">Undo</a>
                            <?php else: ?>
                            <a class="delivered" href="order-status.php?id=<?php echo $order['id'] ?>&status=1">Mark as delivered</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>

            </tbody>

        </table>


 

       
    </div>
</body>
</html>