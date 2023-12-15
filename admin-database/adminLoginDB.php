<?php
session_start();
include 'connectionDB.php';

if (isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $login_query = "SELECT * FROM admin_tbl WHERE admin_username = '$username'";
  $result = mysqli_query($connection, $login_query);

    if (mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      if($password == $row['admin_password']){
        $_SESSION ['adminID'] = $row['admin_ID'];
        $_SESSION ['adminName'] = $row['admin_name'];
        $_SESSION ['username'] = $row['admin_username'];
        $_SESSION ['password'] = $row['admin_password'];
        header("Location: ../admin/productList.php");
         exit();
      } else{
        echo 
          "<script>alert('Your password is incorrect.'); window.location.href = '../admin/adminLogin.php';</script>";
           exit();
      }
    } else{
      echo 
          "<script>alert('Account not registered.'); window.location.href = '../admin/adminLogin.php';</script>";
           exit();
    }
  }else{
    header("location: ../admin/adminLogin.php");
     exit();
  }
  ?>