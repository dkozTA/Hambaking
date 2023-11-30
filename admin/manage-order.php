<?php include('partials/menu.php') ?>

    <!-- Main Content Section Start -->
    <div class="main-content">
        <div class="wrapper">
                <h1>ORDER</h1>


                        <br /><br /><br />



                        <table class="tbl-full">
                                <tr>
                                        <th>S.N.</th>
                                        <th>Customer-Name</th>
                                        <th>Food</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Order-date</th>
                                        <th>Status</th>
                                        <th>Contact</th>
                                        <!-- <th>Email</th> -->
                                        <th>Address</th>
                                        <th>Action</th>
                                </tr>

                                <?php
                                        // ... (Previous code remains unchanged)

                                        // get order
                                        $sql = "SELECT
                                                orders.OrderID AS OrderID,
                                                customers.Name AS CustomerName,
                                                menudetail.Name AS Food,
                                                orders.quantity AS Quantity,
                                                orders.total AS Total,
                                                orders.OrderDate AS OrderDate,
                                                orders.status AS Status,
                                                customers.Contact AS Contact,
                                                customers.Email AS Email,
                                                customers.Address AS Address
                                                FROM
                                                orders
                                                JOIN
                                                customers ON orders.CustomerID = customers.CustomerID
                                                JOIN
                                                menudetail ON orders.FoodID = menudetail.FoodID
                                        ";

                                        $res = mysqli_query($conn, $sql);

                                        $count = mysqli_num_rows($res);
                                        if ($count > 0) {
                                        $sn = 1; // Initialize serial number
                                        while ($rows = mysqli_fetch_assoc($res)) {
                                                // Retrieve the data for each order
                                                $order_id = $rows['OrderID'];
                                                $customer_name = $rows['CustomerName'];
                                                $food = $rows['Food'];
                                                $quantity = $rows['Quantity'];
                                                $total = $rows['Total'];
                                                $order_date = $rows['OrderDate'];
                                                $status = $rows['Status'];
                                                $contact = $rows['Contact'];
                                                $email = $rows['Email'];
                                                $address = $rows['Address'];

                                                ?>




                                                <tr>
                                                        <td><?php echo $sn++; ?>.</td>
                                                        <td><?php echo $customer_name; ?></td>
                                                        <td><?php echo $food; ?></td>
                                                        <td><?php echo $quantity; ?></td>
                                                        <td><?php echo $total."VNĐ"; ?></td>
                                                        <td><?php echo $order_date; ?></td>
                                                        <td><?php echo $status; ?></td>
                                                        <td><?php echo $contact; ?></td>
                                                        <!-- <td><?php echo $email; ?></td> -->
                                                        <td><?php echo $address; ?></td>
                                                        <td>
                                                                <a href="#" class="btn-secondary">Update</a>
                                                        </td>
                                                </tr>









                                                <?php

                                        }
                                        } else {
                                                echo "<tr><td colspan='12' class='error'>Không có đơn đặt hàng nào</td></tr>";
                                        }
                                ?>

                                
                                
                        </table>


            </div>
        </div>
        <!-- Main Content Section End -->


<?php include('partials/footer.php') ?>