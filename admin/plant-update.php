<?php 
    include("confs/config.php");
    $id = $_POST['id'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $plant_img = $_FILES['plant_img']['name'];
    $tmp = $_FILES['plant_img']['tmp_name'];

    if($plant_img){
        move_uploaded_file($tmp, "plants/plant_img");
        $sql = "UPDATE plants SET product_name='$product_name', description='$description', price='$price', category_id = '$category_id', plant_img ='$plant_img', modified_date=now() WHERE id = $id";
    }else{
        $sql = "UPDATE plants SET product_name='$product_name', description='$description', price='$price', category_id = '$category_id', modified_date=now() WHERE id = $id";
    }
    mysqli_query($conn, $sql);
    header("location: plant-list.php");
?>