<?php
    include("../config/constants.php");
    
    $order_id = $_GET['id'];

    // Retrieve customer ID associated with the order
    $sql_get_customer_id = "SELECT CustomerID FROM orders WHERE OrderID = $order_id";

    $result_get_customer_id = mysqli_query($conn, $sql_get_customer_id);

    if ($result_get_customer_id) {
        $row_customer_id = mysqli_fetch_assoc($result_get_customer_id);
        $customer_id = $row_customer_id['CustomerID'];

        // Delete the order
        $sql_delete_order = "DELETE FROM orders WHERE OrderID = $order_id";
        $result_delete_order = mysqli_query($conn, $sql_delete_order);

        // Delete the customer associated with the order
        $sql_delete_customer = "DELETE FROM customers WHERE CustomerID = $customer_id";
        $result_delete_customer = mysqli_query($conn, $sql_delete_customer);

        if ($result_delete_order && $result_delete_customer) {
            // Order and customer deleted successfully
            $_SESSION['delete'] = "<div class='success'>Order deleted successfully.</div>";
            header('location:' . HOMEURL . 'admin/manage-order.php');
        } else {
            // Failed to delete order or customer
            $_SESSION['delete'] = "<div class='error'>Failed to delete order.</div>";
            header('location:' . HOMEURL . 'admin/manage-order.php');
        }
    } else {
        // Failed to retrieve customer ID
        $_SESSION['delete'] = "<div class='error'>Failed to retrieve customer ID.</div>";
        header('location:' . HOMEURL . 'admin/manage-order.php');
    }
?>
