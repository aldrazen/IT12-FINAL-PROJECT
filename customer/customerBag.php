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
  <link rel="stylesheet" href="../customerStyles/mybag.css" />
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
            <i class="bi bi-bag fs-3" onclick="myBag()" style="color:#96C422;"></i>
          </div>
          <div class="icon-container col-4 col-md-auto">
            <i class="bi bi-person-circle fs-3" onclick="customerUpdate()"> <span class="fs-4">
                <?php echo $_SESSION ['username']?></span>
            </i>
            <a href="../Sessions/customerLogout.php" style="color: #be1206">logout?</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="myBag">
    <div class="container mt-sm-5">
      <div class="row d-flex justify-content-between">
        <div class='col-lg-6'>
          <?php
       include '../customer-database/connectionDB.php';
       //para makuha ang sulod sa cart
       $customerID = $_SESSION['customerID'];
       $total_price = 0;
       $cart_check_query = mysqli_query($connection, "SELECT COUNT(*) as total_items FROM cart_tbl WHERE customer_ID = $customerID");
       $cart_check_result = mysqli_fetch_assoc($cart_check_query);
       $itemsInCart = $cart_check_result['total_items'];
       
       if($itemsInCart > 0){
        $cart_query = mysqli_query($connection,"SELECT cart_tbl.cart_ID, product_tbl.prod_image, product_tbl.shirt_name, product_tbl.prod_price, cart_tbl.cart_quantity, size_tbl.size_name
       FROM cart_tbl INNER JOIN product_tbl ON cart_tbl.prod_ID = product_tbl.prod_ID INNER JOIN size_tbl ON cart_tbl.size_ID = size_tbl.size_ID WHERE customer_ID = $customerID");
       while($cart_row = mysqli_fetch_assoc($cart_query)){
        $itemID = $cart_row['cart_ID'];
        $shirtImage = $cart_row['prod_image'];
        $shirtName = $cart_row['shirt_name'];
        $shirtPrice = $cart_row['prod_price'];
        $quantity = $cart_row['cart_quantity'];
        $size = $cart_row['size_name'];
        $item_total = $shirtPrice * $quantity;
        $total_price += $item_total;
        echo"<div class='card mb-3 p-3 mt-3 shadow'>
            <div class='row g-0'>
              <div class='col-md-5'>
                <img class='img-fluid' name='$shirtImage' src='../admin/product-images/$shirtImage' alt='$shirtImage'/>
              </div>
              <div class='col-md-7'>
                <div class='card-body d-flex flex-column justify-content-between  m-0 h-100'>
                  <div class='row'>
                    <div class='col-7'>
                      <div class='shirt-name'>$shirtName</div>
                      <div class='size d-flex mt-2'>
                        <div>Size:</div>
                        <div class='mx-2'>$size</div>
                      </div>
                    </div>
                    <div class='col-5 text-center'>
                      <div class='price'>₱ $shirtPrice</div>
                    </div>
                  </div>
                  <form action='../customer-database/cartUpdateDB.php' method='GET'>
                    <div class='row mt-2'>
                      <div class='col-7 quantity'>
                        <label for='quantity'>Quantity</label>
                        <input type='hidden' name='update_cart' value='$itemID'>
                        <input type='number' name='quantity' class='w-50' value='$quantity' required />
                      </div>
                      <div class='col-5 text-center total-price'>₱ $item_total.00</div>
                    </div>
                    <div class='row mt-3'>
                    <div class='col-6 text-center '><button type='submit' class='btn cart-update'>UPDATE</button></div>
                  </form>
                  <div class='col-6 text-center '><a href='../customer-database/cartRemoveDB.php?remove_item=$itemID' class='btn cart-remove' >REMOVE</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>";
        }
       } else{
        echo "<div class='alert mt-3' role='alert'><span class='bi bi-bag fs-4'> </span> Your bag is currently empty. <a href='customerShop.php' > Shop now!</a></div>";
       }
       ?>
        </div>
        <!--USER DELIVERY SECTION-->
        <div class="col-lg-4">
          <form action="../customer-database/cartPurchaseDB.php" method="GET">
            <div class="row">
              <div class="col d-flex">
                <span class="bi bi-geo-alt p-0 m-0"></span>
                <div class="row">
                  <div class="col-12">
                    <div class="address-section mx-2 mt-3">
                      <p class="mb-1">DELIVERY ADDRESS</p>
                      <?php
                    include'../customer-database/connectionDB.php';
                    $address_query = mysqli_query($connection,"SELECT customer_address FROM customer_tbl WHERE customer_ID = $customerID");
                    while($address_row = mysqli_fetch_assoc($address_query)){
                      $address = $address_row['customer_address'];
                      echo" <div class='user-address' name='address'>$address</div>";
                    }
                    ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="order-summary align-items-center">
              Order Summary
              <div class="container bg-white p-4">
                <?php
                include '../customer-database/connectionDB.php';
                $items_query = mysqli_query($connection,"SELECT COUNT(*) as total_items FROM cart_tbl WHERE customer_ID = $customerID;");
                while($result = mysqli_fetch_assoc($items_query)){
                  $totalItems = $result['total_items'];
                  echo"<div class='sub-total items p-0'>Sub-total ($totalItems items)</div>";

                }
              ?>
                <?php
                  $total_price = 0;
                  $cart_query = mysqli_query($connection,"SELECT product_tbl.shirt_name, product_tbl.prod_price, cart_tbl.cart_quantity, size_tbl.size_name
                  FROM cart_tbl INNER JOIN product_tbl ON cart_tbl.prod_ID = product_tbl.prod_ID INNER JOIN size_tbl ON cart_tbl.size_ID = size_tbl.size_ID WHERE customer_ID = $customerID");
                  while($cart_row = mysqli_fetch_assoc($cart_query)){
                    $shirtName = $cart_row['shirt_name'];
                    $shirtPrice = $cart_row['prod_price'];
                    $quantity = $cart_row['cart_quantity'];
                    $size = $cart_row['size_name'];
                    $item_total = $shirtPrice * $quantity;
                    $total_price += $item_total;
                    
                    echo"<div class='row mt-2'>
                <div class='col-8'>
                  <div class='sub-total-shirt'>$shirtName, $size</div>

                </div>
                <div class='col-4 text-center'>
                  <div class='sub-total-quantity'>$quantity</div>
                </div>
                
              </div>
              ";
              
                }
              ?>
                <?php
              include '../customer-database/connectionDB.php';
              $cart_query = mysqli_query($connection,"SELECT SUM(product_tbl.prod_price * cart_tbl.cart_quantity) AS total_price FROM cart_tbl 
              INNER JOIN product_tbl ON cart_tbl.prod_ID = product_tbl.prod_ID WHERE cart_tbl.customer_ID = $customerID;");
              while($cart_row = mysqli_fetch_assoc($cart_query)){
                $totalPrice = $cart_row['total_price'];
                echo("<div class='sub-total-amount text-end'>₱ $totalPrice</div>");
              }
              ?>
                <div class="shipping my-5">
                  Shipping
                  <div class="shipping-price text-end px-5">0</div>
                </div>
                <div class="row mb-3">
                  <div class="col-7">Total: </div>
                  <div class="col-5 text-center">
                    <?php
                  echo("<div class='total'>₱ $totalPrice</div>");
                  ?>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <input type="hidden" name="address" value="<?php echo $address; ?>">
                  <button type='submit' class="btn btn-dark px-5 py-2 rounded-5">Place Order</button>
                </div>
              </div>
            </div>
          </form>
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
          <button class="btn sign-up px-5 py-3 w-50">SIGN ME UP!</button>
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