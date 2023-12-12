<?php
include 'connectionDB.php';

session_start();
if (isset($_GET['update_cart'])){
   $customerID = $_SESSION['customerID'];
   $cartID = $_GET['update_cart'];
   $quantity = mysqli_real_escape_string($connection, $_GET['quantity']);

   $update_cart = mysqli_query($connection, "UPDATE cart_tbl SET cart_quantity = $quantity WHERE customer_ID = $customerID AND cart_ID = $cartID");

    if ($update_cart) {
    echo "<script> alert('QUANTITY UPDATED!'); window.location.href = '../customer/customerBag.php';</script>";
    exit();
  } else {
    echo "Error updating quantity: " . mysqli_error($connection);
}
}else{
  header("location: ../customer/customerBag.php");
  exit();
}
?>