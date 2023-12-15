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

  <link rel="stylesheet" href="../adminStyles/addProduct.css" />
  <link rel="stylesheet" href="../adminStyles/footer.css" />
  <link rel="stylesheet" href="../adminStyles/adminHome.css" />
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
        <div class="sidebar-sticky d-flex flex-column">
          <ul class="nav flex-column mt-5  mx-2">

            <li class="nav-item">
              <a class="nav-link" href="productList.php">PRODUCT LIST</a>
            </li>
            <li class="nav-item">
              <a class="nav-link activee" href="addProductPage.php">ADD PRODUCT</a>
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
      <main role="main" class="col-md-12 ml-sm-auto m-0 p-0">
        <div class="background-img d-flex align-items-center justify-content-center flex-column">
          <img class="logo" src="../images/logo-bg.jpg" alt="logo" />
          <h3 class="text-white">ADD PRODUCT</h3>
          <div class="container w-50 mt-3">
            <form action="../admin-database/addProductDB.php" method="post" enctype="multipart/form-data">
              <div class="row mt-2">
                <div class="col-lg-6 mt-2">
                  <div class="form-outline">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control rounded-4 py-2 bg-transparent border-4" name="productName"
                      id="productName" required>
                  </div>
                </div>

                <div class="col-lg-6 mt-2">
                  <div class="form-outline">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control rounded-4 py-2 bg-transparent border-4" name="price"
                      id="price" required>
                  </div>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-lg-6">
                  <div class="form-outline">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control rounded-4 py-2 bg-transparent border-4" name="quantity"
                      id="quantity" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-outline">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" name="image" id="image" class="form-control text-black" required>
                  </div>
                </div>
              </div>

              <div class="d-flex justify-content-center">
                <button type="submit" name="add_product" class="signup py-2 rounded-4 mt-lg-5 my-3">
                  ADD PRODUCT
                </button>
              </div>
            </form>
          </div>
          <a class="goBack bi bi-arrow-90deg-left rounded-3 px-2 py-1" href="adminHome.php">
            Return
          </a>
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