<?php
include 'connectionDB.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
  
  $fullname = isset($_POST["fullname"]) ? $_POST["fullname"]:"";
  $username = isset($_POST["Username"]) ? $_POST["Username"]:"";
  $phoneNumber = isset($_POST["Phonenumber"]) ? $_POST["Phonenumber"]:"";
  $address = isset($_POST["Address"])  ?$_POST["Address"]:"";
  $password = isset($_POST["password"]) ? $_POST["password"]:"";
  $confirmPassword = isset($_POST["confirmPassword"]) ? $_POST["confirmPassword"]:"";   
  
  $checkAccount = "SELECT * FROM customer_tbl WHERE customer_username = '$username'";
  $result = mysqli_query($connection, $checkAccount);
   if($password != $confirmPassword){
    echo 
    "<script> alert(\"Your password doesn't match!\"); window.location.href = '../customer/customerRegister.php';</script>";
    exit();
  }
  else{
    $password == $confirmPassword;
  }

    if(mysqli_num_rows($result) > 0 ){
      echo
      "<script> alert(The username you entered is already taken. Try again); window.location.href = '../customer/customerRegister.php'; </script>";
      exit();
    }
    else{
      $query = "INSERT INTO customer_tbl (`customer_name`, `customer_username`, `customer_number`, `customer_address`,`customer_password`) VALUES ('$fullname','$username', '$phoneNumber','$address','$password')";
      $register = mysqli_query($connection, $query);
      echo
      "<script> alert('Registered successfully!'); window.location.href = '../customer/customerLogin.php';</script>";
      exit();
    }
}
else{
    header("location: ../customer/customerHome.php");
     exit();
  }
?>