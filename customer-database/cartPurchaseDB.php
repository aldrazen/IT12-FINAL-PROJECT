<?php
date_default_timezone_set('Asia/Manila');
include 'connectionDB.php';

session_start();

$customerID = $_SESSION['customerID'];
$address = mysqli_real_escape_string($connection, $_GET['address']);
$orderDate = date('Y-m-d');
$total_price = 0;

// Check sa if ang cart kay empty
$check_query = mysqli_query($connection, "SELECT cart_tbl.prod_ID, product_tbl.prod_price, cart_tbl.cart_quantity, size_tbl.size_name
                  FROM cart_tbl INNER JOIN product_tbl ON cart_tbl.prod_ID = product_tbl.prod_ID INNER JOIN size_tbl ON cart_tbl.size_ID = size_tbl.size_ID WHERE customer_ID = $customerID");

if (mysqli_num_rows($check_query) == 0) {
    echo "<script> alert('YOUR CART IS CURRENTLY EMPTY'); window.location.href = '../customer/customerBag.php';</script>";
} else {
    //Insert first sa order_tbl
    $purchase_query = mysqli_query($connection, "INSERT INTO `order_tbl` (customer_ID, order_date, order_status, total_price) VALUES ($customerID, '$orderDate', 'Confirmed', $total_price)");

    if (!$purchase_query) {
        echo "Error: " . mysqli_error($connection);
    } else {
        // kuhaon sa ang orderID gikan sa order_tbl aron
        $orderID = mysqli_insert_id($connection);

        // kuhaon ang item from cart tapos i insert sa order_items_tbl
        while ($cart_row = mysqli_fetch_assoc($check_query)) {
            $prodID = $cart_row['prod_ID'];
            $prodPrice = $cart_row['prod_price'];
            $size = $cart_row['size_name'];
            $quantity = $cart_row['cart_quantity'];
            $item_price = $prodPrice * $quantity;
            // Insert sa order_items_tbl
            $order_item_query = mysqli_query($connection, "INSERT INTO order_items_tbl (order_ID, prod_ID, prod_size, item_price, item_quantity) VALUES ($orderID, $prodID, '$size', $item_price, $quantity)");
            
            if (!$order_item_query) {
                echo "Error: " . mysqli_error($connection);
            }
            //i add ang total price sa items
            $total_price += $item_price;
        }
        $update_order_query = mysqli_query($connection, "UPDATE `order_tbl` SET total_price = $total_price WHERE order_ID = $orderID");
        if (!$update_order_query) {
            echo "Error updating total_price: " . mysqli_error($connection);
        }
        // i delete ang sulod sa cart after maka purchase
        $clear_cart = mysqli_query($connection, "DELETE FROM cart_tbl WHERE customer_ID = $customerID");

        if (!$clear_cart) {
            echo "Error clearing the cart: " . mysqli_error($connection);
        } else {
            $udpdate_quantity = mysqli_query($connection,"UPDATE product_tbl SET prod_quantity = prod_quantity - $quantity WHERE prod_ID = $prodID");
            echo "<script> alert('THANK YOU FOR PURCHASING TOPSHELF CO. SHIRT!'); window.location.href = '../customer/customerBag.php';</script>";
        }
    }
}
?>