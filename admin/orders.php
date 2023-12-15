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
  <link rel="stylesheet" href="../adminStyles/orders.css" />
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
              <a class="nav-link activee" href="#">ORDERS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sales.php">SALES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="customers.php">CUSTOMERS</a>
            </li>
          </ul>
          <div class="d-flex justify-content-center align-items-end h-50">
            <div class="sidebar-footer">
              <a class="btn btn-sm btn-outline-danger" href="../Sessions/adminLogout.php">Logout</a>
            </div>
          </div>

        </div>
      </nav>
      <main role="main" class="main col-md-10 col-lg-12">
        <div class="container d-flex flex-column justify-content-center align-items-center">
          <table class="table">
            <h1>ORDER LIST</h1>
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Customer Name</th>
                <th>Shirt Name</th>
                <th>Size</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Order Status</th>
                <th>Address</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include'../admin-database/connectionDB.php';
              $order_query = mysqli_query($connection,"SELECT order_tbl.order_ID,  order_tbl.order_date, customer_tbl.customer_name, product_tbl.shirt_name, order_items_tbl.prod_size, order_items_tbl.item_price, 
           order_items_tbl.item_quantity, order_items_tbl.item_price, order_tbl.order_status, customer_tbl.customer_address FROM order_items_tbl 
            INNER JOIN order_tbl ON order_items_tbl.order_ID = order_tbl.order_ID INNER JOIN product_tbl ON order_items_tbl.prod_ID = product_tbl.prod_ID INNER JOIN customer_tbl ON order_tbl.customer_ID=customer_tbl.customer_ID");
              while($order_row = mysqli_fetch_assoc($order_query)){
                $orderID = $order_row['order_ID'];
                $orderDate = $order_row['order_date'];
                $customerName = $order_row['customer_name'];
                $shirtName = $order_row['shirt_name'];
                $size = $order_row['prod_size'];
                $quantity = $order_row['item_quantity'];
                $price = $order_row['item_price'];
                $status = $order_row['order_status'];
                $address = $order_row['customer_address'];
                echo" <tr>
                <td>$orderID</td>
                <td>$orderDate</td>
                <td>$customerName</td>
                <td>$shirtName</td>
                <td>$size</td>
                <td>$price</td>
                <td>$quantity</td>
                <td>$status</td>
                <td>$address</td>
              </tr>";
              }
              ?>
            </tbody>
          </table>
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