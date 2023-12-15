<?php
include 'connectionDB.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
  
  $fullname = isset($_POST["fullname"]) ? $_POST["fullname"]:"";
  $username = isset($_POST["username"]) ? $_POST["username"]:"";
  $password = isset($_POST["password"]) ? $_POST["password"]:"";
  $confirmPassword = isset($_POST["confirmPassword"]) ? $_POST["confirmPassword"]:"";   
  
  $checkAccount = "SELECT * FROM admin_tbl WHERE admin_username = '$username'";
  $result = mysqli_query($connection, $checkAccount);
   if($password != $confirmPassword){
    echo 
    "<script> alert(\"Your password doesn't match!\"); window.location.href = '../admin/adminRegister.php';</script>";
    exit();
  }
  else{
    $password == $confirmPassword;
  }

    if(mysqli_num_rows($result) > 0 ){
      echo
      "<script> alert(The username you entered is already taken. Try again); window.location.href = '../admin/adminRegister.php'; </script>";
      exit();
    }
    else{
      $query = "INSERT INTO admin_tbl (`admin_name`, `admin_username`, `admin_password`) VALUES ('$fullname','$username', '$password')";
      $register = mysqli_query($connection, $query);
      echo
      "<script> alert('Registered successfully!'); window.location.href = '../admin/adminRegister.php';</script>";
      exit();
    }
}
else{
    header("location: ../admin/adminRegister.php");
     exit();
  }
?>