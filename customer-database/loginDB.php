<?php
session_start();
include 'connectionDB.php';

if (isset($_POST['Username']) && isset($_POST['password'])){
  $username = $_POST['Username'];
  $password = $_POST['password'];

  $login_query = "SELECT * FROM customer_tbl WHERE customer_username = '$username'";
  $result = mysqli_query($connection, $login_query);

    if (mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      if($password == $row['customer_password']){
        $_SESSION ['customerID'] = $row['customer_ID'];
        $_SESSION ['username'] = $row['customer_username'];
        header("Location: ../customer/customerHome.php");
         exit();
      } else{
        echo 
          "<script>alert('Your password is incorrect.'); window.location.href = '../customer/customerLogin.php';</script>";
           exit();
      }
    } else{
      echo 
          "<script>alert('Account not registered.'); window.location.href = '../customer/customerLogin.php';</script>";
           exit();
    }
  }else{
    header("location: ../customer/customerHome.php");
     exit();
  }
  ?>