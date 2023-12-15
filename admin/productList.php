<?php
include '../admin-database/connectionDB.php';
session_start();
if(isset($_SESSION['adminID'])){
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="images/x-icon" href="../images/logo-bg.jpg" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css" />
  <script src="../Bootstrap/js/bootstrap.js"></script>
  <script src="../script.js"></script>
  <link rel="stylesheet" href="../adminStyles/adminHome.css" />
  <link rel="stylesheet" href="../adminStyles/productList.css" />>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:wght@400;700&display=swap"
    rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Baskervville&family=Krona+One&family=Roboto:wght@400;700&display=swap"
    rel="stylesheet" />
  <title>Admin TopShelf Co.</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar bg-black">
        <img class="sidebar-logo" src="../images/logo-bg.jpg" alt="" />
        <div class="sidebar-sticky d-flex flex-column position-relative">
          <ul class="nav flex-column mt-5  mx-2">
            <li class="nav-item">
              <a class="nav-link activee" href="productList.php">PRODUCT LIST</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="addProductPage.php">ADD PRODUCT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="orders.php">ORDERS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">SALES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">CUSTOMERS</a>
            </li>
          </ul>
          <div class="d-flex justify-content-center align-items-end h-50">
            <div class="sidebar-footer">
              <a class="btn btn-sm btn-outline-danger" href="../Sessions/adminLogout.php">Logout</a>
            </div>
          </div>
          flex
        </div>
      </nav>
      <main role="main" class="col-md-12  col-lg-12 d-flex justify-content-end">
        <div class="products">
          <div class="container mb-4">
            <div class="row row-gap-4">
              <?php
    include '../customer-database/connectionDB.php';

    // Products query
    $product_result = mysqli_query($connection,"SELECT * FROM product_tbl");

    while ($product_row = mysqli_fetch_assoc($product_result)) {
        $shirtName = $product_row['shirt_name'];
        $productPrice = $product_row['prod_price'];
        $productImage = $product_row['prod_image'];
        $quantity = $product_row['prod_quantity'];
        $prodID = $product_row['prod_ID'];
        echo "<div class='col-lg-5'>
            <div class='card mt-3'>
                <img class='card-img-top shadow' name='$productImage' src='../admin/product-images/$productImage' alt='$productImage' />
            </div>
            <p class='productName p-0 mt-2 mb-0' name='$prodID'>$shirtName</p>
            <p class='productdPrice m-0' name='$productPrice'>₱ $productPrice</p>
            <div class='d-flex p-0 m-0 justify-content-between align-items-center'>
                <p class='size m-0 p-0 fs-4'>Quantity:  $quantity</p>
                </div>
              </div>";
            }
        ?>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>

</html>
<?php
}else{
  header('Location: adminLogin.php');
  exit();
}
?>