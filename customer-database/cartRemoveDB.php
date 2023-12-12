<?php
include 'connectionDB.php';

session_start();
if (isset($_GET['remove_item'])){
   $customerID = $_SESSION['customerID'];
   $cartID = $_GET['remove_item'];
  
   $remove_cart = mysqli_query($connection, "DELETE FROM `cart_tbl` WHERE cart_ID = $cartID AND customer_ID =$customerID");
    
   if ($remove_cart) {
    echo "<script> alert('ITEM REMOVED.'); window.location.href = '../customer/customerBag.php';</script>";
    exit();
  } else {
    echo "Error removing item: " . mysqli_error($connection);
}
}else{
  header("location: ../customer/customerBag.php");
  exit();
}
?>