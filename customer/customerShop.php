<?php
session_start();
if(isset($_SESSION['customerID'])){
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
  <link rel="stylesheet" href="../customerStyles/shop.css" />
  <link rel="stylesheet" href="../customerStyles/footer.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:wght@400;700&display=swap"
    rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Baskervville&family=Krona+One&family=Roboto:wght@400;700&display=swap"
    rel="stylesheet" />
  <title>TopShelf Co.</title>
</head>

<body>
  <nav class="navbar navbar-expand-md mb-3 pt-lg-4">
    <div class="container-xxl flex-wrap flex-md-nowrap" aria-label="Main Navigation">
      <a href="customerHome.php"><img class="ts-logo navbar-brand rounded-4" src="../images/logo-trans.png"
          alt="Logo" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="bi bi-list fs-1"></i>
      </button>
      <div class="right-section collapse navbar-collapse align-items-center" id="navbarCollapse">
        <ul class="navbar-nav d-flex flex-row flex-wrap py-md-0 text-center">
          <li class="nav-item col-4 col-md-auto">
            <a class="nav-link p-3 larger-text" href="customerHome.php">HOME</a>
          </li>
          <li class="nav-item col-4 col-md-auto">
            <a class="nav-link activee p-3 normal-text" href="customerShop.php">SHOP</a>
          </li>
          <li class="nav-item col-4 col-md-auto">
            <a class="nav-link p-3 normal-text" href="">ABOUT</a>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse align-items-center justify-content-end" id="navbarCollapse">
        <div class="right-section d-flex flex-row flex-wrap py-md-0 text-center">
          <div class="icon-container col-4 col-md-auto ">
            <i class="bi bi-search fs-3"></i>
          </div>
          <div class="icon-container col-4 col-md-auto px-4">
            <i class="bi bi-bag fs-3" onclick="myBag()"></i>
          </div>
          <div class="icon-container col-4 col-md-auto ">
            <i class="bi bi-person-circle fs-3" onclick="customerUpdate()"><span class="fs-4">
                <?php echo $_SESSION ['username']?></span>
            </i>
            <a href="../Sessions/customerLogout.php" style="color: #be1206">logout?</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="products">
    <div class="container mt-sm-5">
      <div class="row row-gap-4">
        <?php
    include '../customer-database/connectionDB.php';

    // Products query
    $product_result = mysqli_query($connection,"SELECT * FROM product_tbl");

    while ($product_row = mysqli_fetch_assoc($product_result)) {
        $shirtName = $product_row['shirt_name'];
        $productPrice = $product_row['prod_price'];
        $productImage = $product_row['prod_image'];
        $prodID = $product_row['prod_ID'];
        echo "<div class='col-lg-3'>
            <div class='card mt-3'>
                <img class='card-img-top shadow' name='$productImage' src='../admin/product-images/$productImage' alt='$productImage' />
            </div>
            <p class='productName p-0 mt-2 mb-0' name='$prodID'>$shirtName</p>
            <p class='productdPrice m-0' name='$productPrice'>₱ $productPrice</p>
            <div class='d-flex p-0 m-0 justify-content-between align-items-center'>
                <p class='size m-0 p-0'>Size</p>
                <div class='sizeCategory d-flex'>";
                $size_result = mysqli_query($connection, "SELECT * FROM size_tbl");
                while ($size_row = mysqli_fetch_assoc($size_result)) {
                  $sizeID = $size_row['size_ID'];
                  $sizeName = $size_row['size_name'];
                  echo "<button class='btn btn-size mx-2' onclick='selectSize($sizeID)'>$sizeName</button>";
                }
                mysqli_data_seek($size_result, 0);
                echo "</div>
                </div>
                  <div class='d-grid pt-3'>
                    <button onclick='addToCart($prodID)' class='btn btn-add btn-outline-dark border-2 rounded-5'>
                      ADD TO BAG
                    </button>
                  </div>
              </div>";
            }
        ?>
      </div>
    </div>
  </div>
</body>
<footer>
  <div class="container-fluid bg-black">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-6 mb-4">
          <h1 class="display-3 text-white">
            FREE SHIPPING ON YOUR FIRST ORDER!
          </h1>

        </div>
        <div class="col-lg-6">
          <h4>You can connect with us through the following:</h4>
          <div class="col-lg bi bi-facebook fs-3 text-white">
            <a href="https://www.facebook.com/profile.php?id=100092420918245" target="_blank"
              class="social-media">TopShelf Co.
            </a>
          </div>
          <div class="col-lg bi bi-instagram fs-3 text-white">
            <a href="https://www.instagram.com/topshelf.23/" target="_blank" class="social-media">topshelf.23
            </a>
          </div>
          <div class="col-lg bi bi-tiktok fs-3 text-white">
            <a href="https://www.tiktok.com/@topshelfco_" target="_blank" class="social-media">topshelfco_</a>
          </div>
        </div>
      </div>
      <div class="logo-container mt-5 d-flex justify-content-center align-items-center">
        <img class="footer-logo" src="../images/logo-bg.jpg" alt="" />
      </div>
    </div>
  </div>
</footer>

</html>
<?php
}else{
  header('Location: ../Main/homepage.php');
  exit();
}
?>