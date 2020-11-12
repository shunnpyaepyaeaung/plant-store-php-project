<?php
    include("confs/config.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM plants WHERE id = $id";
    mysqli_query($conn, $sql);
    header("location: plant-list.php")
?>
