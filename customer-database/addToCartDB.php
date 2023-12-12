<?php
include 'connectionDB.php';

session_start();

if (isset($_GET['add_to_cart'])) {
    $customerID = $_SESSION['customerID'];
    $productID = $_GET['add_to_cart'];
    $sizeID = $_GET['size'];
    
    $checkCart_query = "SELECT * FROM cart_tbl WHERE customer_ID = $customerID AND prod_ID = $productID AND size_ID = $sizeID";
    $checkCart_result = mysqli_query($connection, $checkCart_query);
    $cart_row = mysqli_fetch_assoc($checkCart_result);
    
    if ($cart_row) {
      // If same size gi add to bag sa user, ma increment cart_quantity
      $update_cart = "UPDATE cart_tbl SET cart_quantity = cart_quantity + 1 WHERE customer_ID = $customerID AND prod_ID = $productID AND size_ID = $sizeID";
      $update_result = mysqli_query($connection, $update_cart);
      echo "<script> alert('ADDED TO BAG!'); window.location.href = '../customer/customerShop.php';</script>";
      exit();
    } else {
      // if wala ang product ug size sa cart, i add siya sa cart
      $addCart_query = "INSERT INTO `cart_tbl` (customer_ID, prod_ID, size_ID, cart_quantity) VALUES ('$customerID','$productID', $sizeID, 1)";
      $addCart_result = mysqli_query($connection, $addCart_query);
      echo "<script> alert('ADDED TO BAG!'); window.location.href = '../customer/customerShop.php';</script>";
      exit();
    }
} else {
    header("location: ../customer/customerShop.php");
    exit();
}
?>