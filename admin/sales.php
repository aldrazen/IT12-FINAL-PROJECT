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
  <link rel="stylesheet" href="../adminStyles/sales.css" />
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
          <ul class="nav flex-column mt-5 mx-2">
            <li class="nav-item ">
              <a class="nav-link activee" href="productList.php">PRODUCT LIST</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="addProductPage.php">ADD PRODUCT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="orders.php">ORDERS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link activee" href="sales.php">SALES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="customers.php">CUSTOMERS</a>
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
          <table class="table text-center">
            <h1>SALES</h1>
            <thead>
              <tr>
                <th>DAILY SALES</th>
                <th>MONTHLY SALES</th>
              </tr>
            </thead>
            <tbody>
              <?php
               date_default_timezone_set('Asia/Manila');
                include '../admin-database/connectionDB.php';
                $orderDate = date('Y-m-d');
                $currentMonth = date('m');
                $query = "SELECT SUM(total_price) AS daily_sales
                FROM order_tbl
                WHERE order_date = '$orderDate'";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    $dailySales = mysqli_fetch_assoc($result);
                    echo "<tr>";
                    if ($dailySales['daily_sales'] > 0) {
                        echo "<td>₱{$dailySales['daily_sales']}</td>";
                    } else {
                        echo "<td>No daily sales today.</td>";
                    }
                    $monthlySalesQuery = "SELECT SUM(total_price) AS monthly_sales
                                        FROM order_tbl
                                        WHERE MONTH(order_date) = $currentMonth";
                    $monthlySalesResult = mysqli_query($connection, $monthlySalesQuery);
                    if ($monthlySalesResult) {
                        $monthlySales = mysqli_fetch_assoc($monthlySalesResult);
                        if ($monthlySales['monthly_sales'] > 0) {
                            echo "<td>₱{$monthlySales['monthly_sales']}</td>";
                        } else {
                            echo "<td>No monthly sales yet.</td>";
                        }
                    } else {
                        echo "Error: " . mysqli_error($connection);
                    }
                    echo "</tr>";
                } else {
                    echo "Error: " . mysqli_error($connection);
                }
                mysqli_close($connection);
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