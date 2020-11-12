<?php 
    include("confs/config.php");
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $plant_img = $_FILES['plant_img']['name'];
    $tmp = $_FILES['plant_img']['tmp_name'];

    if($plant_img){
        move_uploaded_file($tmp, "plants/$plant_img");
    }

    $sql = "INSERT INTO plants (product_name, description, price, category_id, plant_img, created_date, modified_date) VALUES ('$product_name','$description', '$price', '$category_id', '$plant_img', now(), now())";
    mysqli_query($conn, $sql);
    header("location: plant-list.php");
?>

