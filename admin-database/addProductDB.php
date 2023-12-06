<?php
include 'connectionDB.php';

if(isset($_POST['add-product'])){
  $productName = $_POST['productName'];
  $price = $_POST['price'];
  $size = $_POST['size'];
  $quantity = $_POST['quantity'];

  //for image betch
  $image = $_POST['image']['name'];

}

?>