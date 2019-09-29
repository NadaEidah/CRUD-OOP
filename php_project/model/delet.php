<?php

$mysql =new mysql('localhost','root','17M*71mr','My_application')or die(mysql_error($mysql));

if (isset($_POST['save'])){
    $product->name=$_POST["product_name"];
    $product->price=$_POST["price"];
    $product->description=$_POST["description"];
    $product->category_id=$_POST["category_id"];


    $mysql->query("INSERT INTO data(product_name,price,description,category_id)VALUES ('$product_name','$price','$description','$category_id')") or die($mysql->error);

}


if (isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysql->query("DELETE FROM data WHERE id=$id")or die($mysql->error());
}

?>