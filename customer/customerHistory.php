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
  <link rel="stylesheet" href="../customerStyles/history.css" />
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
            <a class="nav-link p-3 normal-text" href="customerShop.php">SHOP</a>
          </li>
          <li class="nav-item col-4 col-md-auto">
            <a class="nav-link p-3 normal-text" href="">ABOUT</a>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse align-items-center justify-content-end" id="navbarCollapse">
        <div class="right-section d-flex flex-row flex-wrap justify-content-between text-center py-md-0">
          <div class="icon-container col-4 col-md-auto ">
            <i class="bi bi-search fs-3"></i>
          </div>
          <div class="icon-container col-4 col-md-auto px-4">
            <i class="bi bi-bag fs-3" onclick="myBag()"></i>
          </div>
          <div class="icon-container col-4 col-md-auto">
            <i class="bi bi-person-circle fs-3" style="color:#96C422;"> <span class="fs-4">
                <?php echo $_SESSION ['username']?></span>
            </i>
            <a href="../Sessions/customerLogout.php" style="color: #be1206">logout?</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="account-details mt-sm-5">
    <div class="container bg-white pb-4">

      <div class="row">
        <div class="col-3 m-0 p-0">
          <h4 class="mx-4">My Account</h4>
          <div class="sidebar mt-4">
            <div class="account-settings d-flex justify-content-center flex-column p-0 m-0">
              <p class="fs-5 m-0 py-1 mx-2" onclick="customerUpdate()">Personal Details</p>
            </div>
            <div class="account-settings d-flex justify-content-center flex-column active mt-2">
              <p class="fs-5 m-0 py-1 text-white mx-2" onclick="customerHistory()">My Purchase</p>
            </div>
          </div>
        </div>
        <div class="col-9 p-0">
          <div class="header">
            <p class="fs-5 py-2 mx-3">My Purchase</p>
          </div>
          <?php
            include '../customer-database/connectionDB.php';
            $customerID = $_SESSION['customerID'];
            $order_items = mysqli_query($connection, "SELECT order_tbl.order_ID, product_tbl.prod_image, product_tbl.shirt_name, order_items_tbl.prod_size, order_items_tbl.item_price, 
            order_tbl.total_price, order_items_tbl.item_quantity, order_items_tbl.item_price, order_tbl.order_status, order_tbl.order_date FROM order_items_tbl 
            INNER JOIN order_tbl ON order_items_tbl.order_ID = order_tbl.order_ID INNER JOIN product_tbl ON order_items_tbl.prod_ID = product_tbl.prod_ID WHERE customer_ID = $customerID");
            $previousOrderID = null;
            while ($items_row = mysqli_fetch_assoc($order_items)) {
                $orderID = $items_row['order_ID'];
                $itemImage = $items_row['prod_image'];
                $shirtName = $items_row['shirt_name'];
                $size = $items_row['prod_size'];
                $quantity = $items_row['item_quantity'];
                $itemPrice = $items_row['item_price'];
                $orderTotalPrice = $items_row['total_price'];

                // Display total price only if the order ID has changed
                if ($orderID != $previousOrderID) {
                    echo "
                        <div class='row total-price d-flex justify-content-evenly'>
                                  <div class='col-3 p-0'>
                                    <p class='m-0 fs-5'>Order ID: $orderID</p>
                                  </div>
                                  <div class='col-5 text-end'>
                                    <p class='m-0'>Order Total: <span class='shirt-price-total'>₱$orderTotalPrice</span></p>
                                  </div>
                                </div>
                    ";
                    $previousOrderID = $orderID;
                }
                echo "
                    <div class='row d-flex mt-2 justify-content-around align-items-center'>
                        <div class='col-5 d-flex'>
                            <img class='item-image' src='../admin/product-images/$itemImage' alt='$itemImage'>
                            <div class='row'>
                                <div class='col'>
                                    <div class='shirt-description mx-2'>
                                        <p class='shirt-name m-0'>$shirtName</p>
                                        <p class='shirt-size mt-1 mb-0'>Size: $size</p>
                                        <p class='quantity mt-1'>Quantity: $quantity</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-2 text-center'>
                            <p class='shirt-price'>₱$itemPrice</p>
                        </div>
                    </div>
                ";
            }
          ?>
        </div>
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