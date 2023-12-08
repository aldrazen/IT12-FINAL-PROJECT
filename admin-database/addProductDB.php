<?php
include 'connectionDB.php';

if(isset($_POST['add_product'])){
  $shirtName = $_POST['productName'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];

  //for image betch
  $image = $_FILES['image']['name'];

  //for temp image
  $tempImage = $_FILES['image']['tmp_name'];
  move_uploaded_file($tempImage, "../admin/product-images/$image");

  //insert the products
  $add_product = "INSERT INTO `product_tbl`(`shirt_name`, `prod_price`, `prod_quantity`, `prod_image`, `prod_status`) VALUES ('$shirtName','$price', '$quantity','$image','In Stock')";
  $add_result = mysqli_query($connection,$add_product);
  echo
  "<script> alert('Product added successfully!'); window.location.href = '../admin/addProductPage.php'; </script>";
 
}
else{
    header("location: ../admin/addProductPage.php");
     exit();
  }

?>