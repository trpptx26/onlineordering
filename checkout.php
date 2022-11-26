<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
    <link rel="stylesheet" href="eps.css">
    </head>
    <body>
        <?php
            $conn = new mysqli('localhost','root','','employee');
            $sql = "SELECT * FROM customer";    
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();

            $sql = "SELECT * FROM checkout";    
            $result = mysqli_query($conn, $sql);
            $row2 = $result->fetch_assoc();

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

            $name = $row["first_name"];
            $email = $row["email"];

            $total_bills = $row2["total_bills"];
            $total_quantity = $row2["total_quantity"];

            $product_name = $row3["product_name"];

            $total = $total_bills + $shipping_fee;

            if(isset($_POST["back"])){
                echo '
                <script>
                window.location.href = "ordering_application.php";
                </script>';
            }

            if(isset($_POST["confirm"])){
                $name = $row["first_name"];
                $email = $row["email"];
                $shipping_address = $_POST["shipping_address"];
                $total_bills = $row2["total_bills"];
                $total_quantity = $row2["total_quantity"];
                $product_name = $row3["product_name"];
                $total = $total_bills + $shipping_fee;

                $query = "insert into orderqueue(name,email,shipping_address,total,product_name) values ('$name' , '$email','$shipping_address','$total','$product_name')";
                $run = mysqli_query($conn,$query); 

                $query = "DELETE FROM orderingapplication";
                $run = mysqli_query($conn,$query); 

                $query = "DELETE FROM checkout";
                $run = mysqli_query($conn,$query); 

                echo '
                <script>
                alert("Ordered Confirmed");
                window.location.href = "ordering_application.php";
                </script>';
            }
        ?>
        <div class="subform">
            <form action="" method="post">
                <div>
                    <label for="name">Name :</label>
                    <input type="text" name="name" value="<?php echo($name);?>"><br>

                    <label for="email">Email :</label>
                    <input type="text" name="email" value="<?php echo($email);?>"><br>

                    <label for="total_bills">Total Bills :</label>
                    <input type="text" name="total_bills" value="<?php echo($total_bills);?>"><br>

                    <label for="total_quantity">Total Quantity :</label>
                    <input type="text" name="total_quantity" value="<?php echo($total_quantity);?>"><br>

                    <label for="shipping_address">Shipping Address :</label>
                    <input type="text" name="shipping_address" value="<?php $shipping_address = readline();?>" placeholder="Please Input Valid Address" ><br>

                    <label for="total">Total :</label>
                    <input type="text" name="total" value="<?php echo($total);?>"><br>

                        <!-- BUTTONS -->
                        <input name="back" type="submit" value="BACK">
                        <input name="confirm" type="submit" value="CONFIRM">
                </div>
            </form>
        </div>
    </body>
</html>
