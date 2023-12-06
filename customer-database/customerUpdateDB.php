<?php
include 'connectionDB.php';

session_start();

if (isset($_POST['update'])) {
  $customerID = $_SESSION['customerID'];
  $fullname = $_POST['name'];
  $username = $_POST['username'];
  $phoneNumber = $_POST['phoneNumber'];
  $password = $_POST['password'];
  $address = $_POST['address'];
 
 // Check if the username already exists for other users
    // Assuming you store the user ID in the session
    $check_query = "SELECT * FROM customer_tbl WHERE `customer_username` = '$username' AND `customer_ID` != $customerID";
    $check_result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Username already exists for another user
        echo "<script> alert('The username you entered is already taken. Try again'); window.location.href = '../customer/customerUpdate.php'; </script>";
        exit();
    }
  $update_query = "UPDATE customer_tbl SET `customer_name` = '$fullname', `customer_username` = '$username', `customer_number` = '$phoneNumber', `customer_password` = '$password', `customer_address` = '$address' WHERE customer_ID = '$customerID'";

  $result = mysqli_query($connection, $update_query);

  if ($result) {
     $_SESSION['fullname'] = $fullname;
     $_SESSION['username'] = $username;
     $_SESSION['number'] = $phoneNumber;
     $_SESSION['address'] = $address;
     $_SESSION['password'] = $password;
    echo "<script> alert('Account updated successfully!'); window.location.href = '../customer/customerUpdate.php'; </script>";
    exit();
    
  } else {
    echo "<script> alert('The username you entered is already taken. Try again'); window.location.href = '../customer/customerUpdate.php'; </script>";
  }
}
else{
  header('Location: ../customer/customerHome.php');
  exit();
}
?>