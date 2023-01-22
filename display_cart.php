<!DOCTYPE html>
<html>
<head>
<title>Casan's Cart</title>
</head>
<body>
    <?php
    $conn = new mysqli('localhost','root','','employee');

    $pink_slides = "100";
    $black_sandals = "150";
    $bnw_sneakers = "200";
    $blue_slippers = "100";
    $pink_slippers = "100";
    $pretty_slippers ="120";
    $red_shirt = "150";
    $black_shirt = "150";
    $usb_charger = "100";

    $quantity = 0;
    $total_price = 0;
    
    $shipping_name = "";
    $shipping_mobile_number = "";
    $shipping_address = "";

    $billing_name = "";
    $billing_mobile_number = "";
    $billing_address = "";

    $new_shipping_name = "";
    $new_shipping_mobile_number = "";
    $new_shipping_address = "";

    $new_billing_name = "";
    $new_billing_mobile_number = "";
    $new_billing_address = "";

    $new_total_price = "";

    if(isset($_POST["confirm_shipping_address"])){
        $shipping_name = $_POST["shipping_name"];
        $shipping_mobile_number = $_POST["shipping_mobile_number"];
        $shipping_address = $_POST["shipping_address"];

        $new_shipping_name = $shipping_name;
        $new_shipping_mobile_number = $shipping_mobile_number;
        $new_shipping_address = $shipping_address;
    }

    if(isset($_POST["same_with_billing_address"])){
        $shipping_name = $_POST["shipping_name"];
        $shipping_mobile_number = $_POST["shipping_mobile_number"];
        $shipping_address = $_POST["shipping_address"];

        $new_shipping_name = $shipping_name;
        $new_shipping_mobile_number = $shipping_mobile_number;
        $new_shipping_address = $shipping_address;

        $billing_name = $_POST["shipping_name"];
        $billing_mobile_number = $_POST["shipping_mobile_number"];
        $billing_address = $_POST["shipping_address"];

        $new_billing_name = $billing_name;
        $new_billing_mobile_number = $billing_mobile_number;
        $new_billing_address = $billing_address;
    }

    if(isset($_POST["confirm_billing_address"])){
        $shipping_name = $_POST["shipping_name"];
        $shipping_mobile_number = $_POST["shipping_mobile_number"];
        $shipping_address = $_POST["shipping_address"];

        $new_shipping_name = $shipping_name;
        $new_shipping_mobile_number = $shipping_mobile_number;
        $new_shipping_address = $shipping_address;

        $billing_name = $_POST["shipping_name"];
        $billing_mobile_number = $_POST["shipping_mobile_number"];
        $billing_address = $_POST["shipping_address"];

        $new_billing_name = $billing_name;
        $new_billing_mobile_number = $billing_mobile_number;
        $new_billing_address = $billing_address;
    }

    if(isset($_POST["back"])){
        echo '
        <script>
        window.location.href = "user_browser.php";
        </script>';
    }
    
    if(isset($_POST["clear"])){
        $query = "DELETE FROM `cart`";
        $run = mysqli_query($conn,$query);
    }

    if(isset($_POST["place_order"])){
        $shipping_name = $_POST["shipping_name"];
        $shipping_mobile_number = $_POST["shipping_mobile_number"];
        $shipping_address = $_POST["shipping_address"];

        $new_shipping_name = $shipping_name;
        $new_shipping_mobile_number = $shipping_mobile_number;
        $new_shipping_address = $shipping_address;

        $billing_name = $_POST["shipping_name"];
        $billing_mobile_number = $_POST["shipping_mobile_number"];
        $billing_address = $_POST["shipping_address"];

        $new_billing_name = $billing_name;
        $new_billing_mobile_number = $billing_mobile_number;
        $new_billing_address = $billing_address;

        $sql = "SELECT * FROM cart";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()) {
                $query = "insert into place_order(shipping_name,shipping_mobile_number,shipping_address,billing_name,billing_mobile_number,billing_address,product_name,quantity,price) 
                values ('$shipping_name','$shipping_mobile_number','$shipping_address','$billing_name','$billing_mobile_number','$billing_address','" . $rows["product_name"] . "','" . $rows["quantity"] . "','" . $rows["price"] . "')";
                $run = mysqli_query($conn,$query);
            }
        }
        $sql = "DELETE FROM cart";
        $result = $conn->query($sql);

        echo '
                <script>
                alert("Ordered Confirmed");
                window.location.href = "user_browser.php";
                </script>';
    }

    ?>
    <div>
        <div>
            <img src="https://i.imgur.com/nd7JLkm.png" alt="***" width="400">
        </div>
        <form method="post" action="">
            <div>
                <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM cart";
                        $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($rows = $result->fetch_assoc()) {
                            $data_count = mysqli_num_rows($result);
                                    echo "<tr>";
                                    echo "<td>" . $rows["product_name"] . "</td>";
                                    echo "<td>" . $rows["quantity"] . "</td>";
                                    echo "<td> ₱" . $rows["price"] . "</td>";
                                    echo "</tr>";
                                    $total_price += $rows["price"];
                        }
                    } 
                    ?>
                </table>
              
                <label for="total_price"id="total_price" ></label>
                
                <script>
                    document.getElementById("total_price").innerHTML = "Total Price: ₱" + <?php echo $total_price;?>;
                </script>

                <div>
                    <h3>Shipping Address</h3>
                    <label for="shipping_name">Full Name:</label>
                    <input type="text" name="shipping_name" value="<?php $shipping_name = readline(); echo($new_shipping_name)?>"><br>
                    <label for="shipping_mobile_number">Mobile Number:</label>
                    <input type="text" name="shipping_mobile_number" value="<?php $shipping_mobile_number = readline(); echo($new_shipping_mobile_number)?>"><br>
                    <label for="shipping_address">Address:</label>
                    <input type="text" name="shipping_address" value="<?php $shipping_address = readline(); echo($new_shipping_address)?>"><br>
                    <input name="confirm_shipping_address" type="submit" value="CONFIRM SHIIPING ADDRESS">
                    <input name="same_with_billing_address" type="submit" value="SAME WITH BILLING ADDRESS">
                </div>
                <div>
                    <h3>Billing Address</h3>
                    <label for="billing_name">Full Name:</label>
                    <input type="text" name="billing_name" value="<?php $billing_name = readline(); echo($new_billing_name)?>"><br>
                    <label for="billing_mobile_number">Mobile Number:</label>
                    <input type="text" name="billing_mobile_number" value="<?php $billing_mobile_number = readline(); echo($new_billing_mobile_number)?>"><br>
                    <label for="billing_address">Address:</label>
                    <input type="text" name="billing_address" value="<?php $billing_address = readline(); echo($new_billing_address)?>"><br>
                    <input name="confirm_billing_address" type="submit" value="CONFIRM BILLING ADDRESS">
                </div>

                <br>


                <div class="flex_container_row" id="button_bar">
                    <input name="back" type="submit" value="BACK">
                    <input name="clear" type="submit" value="CLEAR">
                    <input name="place_order" type="submit" value="PLACE ORDER">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
