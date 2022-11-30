<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            //get database for customer
            $conn = new mysqli('localhost','root','','employee');
            $sql = "SELECT * FROM customer";    
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();

            //get database for checkout
            $sql = "SELECT * FROM checkout";    
            $result = mysqli_query($conn, $sql);
            $row2 = $result->fetch_assoc();

            //get database for orderingapplication
            $sql = "SELECT * FROM orderingapplication";    
            $result = mysqli_query($conn, $sql);
            $row3 = $result->fetch_assoc();

            $name = "";
            $email = "";
            $total_bills = "";
            $total_quantity = "";
            $shipping_address = "";
            $shipping_fee = 50;
            $total = "";
            $product_name = "";
            $product = "";
            $product_quantity = "";
            $quantity = 0;

            //assign $name from data from customer database for first_name
            $name = $row["first_name"];
            //assign $email from data from customer database for email
            $email = $row["email"];

            //assign $total_bills from data from checkout database for total_bills
            $total_bills = $row2["total_bills"];
            //assign $total_quantity from data from checkout database for total_quantity
            $total_quantity = $row2["total_quantity"];

            ////assign $product_name from data from orderingapplicatiopn database for product_name
            $product_name = $row3["product_name"];

            //calculate total from total bills and shipping fee
            $total = $total_bills + $shipping_fee;

            //if the user click the back button they will be redirected to ordering application site
            if(isset($_POST["back"])){
                echo '
                <script>
                window.location.href = "user_ordering_application.php";
                </script>';
            }

            //if user click the confirm button their order will be process
            if(isset($_POST["confirm"])){
                //get the first name and email from database customer
                $name = $row["first_name"];
                $email = $row["email"];
                //get the shipping address information inputted by customer
                $shipping_address = $_POST["shipping_address"];
                //get total bill and quantity from database checkout
                $total_bills = $row2["total_bills"];
                $total_quantity = $row2["total_quantity"];

                //ongoing database programming
                $sql = "SELECT * FROM orderingapplication WHERE = 'Black Sandals'";    
                $result = mysqli_query($conn, $sql);
                $check_black_sandals = $result->fetch_assoc();
                //ongoing database programming

                //get product name from database orderingapplication
                $product_name = $row3["product_name"];
                //calculate total with shipping fe
                $total = $total_bills + $shipping_fee;

                //insert buyers name, email,address,total spent and product names to the database
                $query = "insert into orderqueue(name,email,shipping_address,total,product_name) values ('$name' , '$email','$shipping_address','$total','$product_name')";
                $run = mysqli_query($conn,$query); 

                //clear orderingapplication database for the customer
                $query = "DELETE FROM orderingapplication";
                $run = mysqli_query($conn,$query); 

                //clear checkout database for the customer
                $query = "DELETE FROM checkout";
                $run = mysqli_query($conn,$query); 

                //notify the customer that the order has been made
                echo '
                <script>
                alert("Ordered Confirmed");
                window.location.href = "user_ordering_application.php";
                </script>';
            }
        ?>
        <div class="subform">
            <form action="" method="post">
                <div>
                    <!-- name of the customer will display here-->
                    <label for="name">Name :</label>
                    <input type="text" name="name" value="<?php echo($name);?>"><br>

                    <!-- -email of the customer will display here-->
                    <label for="email">Email :</label>
                    <input type="text" name="email" value="<?php echo($email);?>"><br>

                    <!-- total bills of the customer will display here-->
                    <label for="total_bills">Total Bills :</label>
                    <input type="text" name="total_bills" value="<?php echo($total_bills);?>"><br>

                    <!-- total quantity of the customer will display here-->
                    <label for="total_quantity">Total Quantity :</label>
                    <input type="text" name="total_quantity" value="<?php echo($total_quantity);?>"><br>

                    <!-- customer will input the address where the product will be deliver to-->
                    <label for="shipping_address">Shipping Address :</label>
                    <input type="text" name="shipping_address" value="<?php $shipping_address = readline();?>" placeholder="Please Input Valid Address" ><br>

                    <!-- total spent will display here-->
                    <label for="total">Total :</label>
                    <input type="text" name="total" value="<?php echo($total);?>"><br>

                        <!-- BUTTONS -->
                        <!-- if the customer want to go back to browsing product site-->
                        <input name="back" type="submit" value="BACK">
                        <!-- if customer want to initialize the order-->
                        <input name="confirm" type="submit" value="CONFIRM">
                </div>
            </form>
        </div>
    </body>
</html>
