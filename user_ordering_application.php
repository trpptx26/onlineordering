<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordering Application</title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php


use LDAP\Result;

        $price = "";
        $quantity = "";
        $discount_amount = "";
        $discounted_amount = "";

        $total_bills = "";
        $total_quantity = "";
        $cash_given = "";
        $change = "";

        $pink_slides = "100";
        $black_sandals = "150";
        $bnw_sneakers = "200";
        $blue_slippers = "100";
        $pink_slippers = "100";
        $pretty_slippers ="120";
        $red_shirt = "150";
        $black_shirt = "150";
        $usb_charger = "100";

        //get database for orderingapplication
        $conn = new mysqli('localhost','root','','employee');
        $sql = "SELECT * FROM orderingapplication";    
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();

        $product_name = "";
        $new_cash_given = "";

        $subtotal_pink_slides = 0;
        $subtotal_black_sandals = 0;
        $subtotal_bnw_sneakers =0;
        $subtotal_blue_slippers = 0;
        $subtotal_pink_slippers = 0;
        $subtotal_pretty_slippers = 0;
        $subtotal_red_shirt = 0;
        $subtotal_black_shirt = 0;
        $subtotal_usb_charger = 0;

        $subquantity_pink_slides = 0;
        $subquantity_black_sandals = 0;
        $subquantity_bnw_sneakers  = 0;
        $subquantity_blue_slippers = 0;
        $subquantity_pink_slippers = 0;
        $subquantity_pretty_slippers = 0;
        $subquantity_red_shirt = 0;
        $subquantity_black_shirt = 0;
        $subquantity_usb_charger = 0;

        $valid_database_pink_slides = 0;
        $valid_database_black_sandals = 0;
        $valid_database_bnw_sneakers = 0;
        $valid_database_blue_slippers = 0;
        $valid_database_pink_slippers = 0;
        $valid_database_pretty_slippers = 0;
        $valid_database_red_shirt = 0;
        $valid_database_black_shirt = 0;
        $valid_database_usb_charger = 0;

        $validating_valid_product_name = "";

        $new_total_bills = "";
    
            // if user click button for the pink slides    
            if(isset($_POST["pink_slides"])){
                $product_name = "Pink Slides";
                $price = $pink_slides;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
            
            // if user click button for the black sandals 
            if(isset($_POST["black_sandals"])){
                $product_name = "Black Sandals";
                $price = $black_sandals;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
    
            // if user click button for the bnw sneakers
            if(isset($_POST["bnw_sneakers"])){
                $product_name = "Bnw Sneakers";
                $price = $bnw_sneakers;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
    
            // if user click button for the blue slippers
            if(isset($_POST["blue_slippers"])){
                $product_name = "Blue Slippers";
                $price = $blue_slippers;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
    
            // if user click button for the pink slippers
            if(isset($_POST["pink_slippers"])){
                $product_name = "Pink Slippers";
                $price = $pink_slippers;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
    
            // if user click button for the pretty slippers
            if(isset($_POST["pretty_slippers"])){
                $product_name = "Pretty Slippers";
                $price = $pretty_slippers;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
    
            // if user click button for the red shirt
            if(isset($_POST["red_shirt"])){
                $product_name = "Red Shirt";
                $price = $red_shirt;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
    
            // if user click button for the black shirt
            if(isset($_POST["black_shirt"])){
                $product_name = "Black Shirt";
                $price = $black_shirt;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
    
            // if user click button for the usb charger
            if(isset($_POST["usb_charger"])){
                $product_name = "USB Charger";
                $price = $usb_charger;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }


            // if user click button for the calculate
            if(isset($_POST["calculate"])){
                $new_cash_given = $_POST["cash_given"];
                $total_bills = $_POST["total_bills"];
                $cash_given = (int)$_POST["cash_given"];
                $change = $cash_given - (int)$total_bills;
                $total_quantity = $_POST["total_quantity"];
                
            }

            // if user click button for the new it will delete the order that have been made aftre clicking confirm
            if(isset($_POST["new"])){
                $query = "DELETE FROM orderingapplication;" ; 
                $run = mysqli_query($conn,$query);
            }
            
            // if user click button for the clear it will remove the inputted product in order if they dont want to confirm it
            if(isset($_POST["clear"])){
            }

            // if user click button for the checkout they will be redirected to checkout site
            if(isset($_POST["checkout"])){
                $total_bills = $_POST["total_bills"];
                $total_quantity = $_POST["total_quantity"];
                
                $query = "insert into checkout(total_bills,total_quantity) values ('$total_bills' , '$total_quantity')";
                $run = mysqli_query($conn,$query); 

                echo '
                <script>
                window.location.href = "user_checkout.php";
                </script>';
            }

            // if user click button for the logout they will be log out from the system
            if(isset($_POST["logout"])){
                echo '
                <script>
                window.location.href = "user_log_in.php";
                </script>';
            }

            if(isset($_POST["back"])){
                echo '
                <script>
                window.location.href = "administrator_browser.php";
                </script>';
            }

        ?>

        <form action="" method="post" >
            <div class="flex_container_row">
                <div>
                    <!-- Logo of the business -->
                    <div class="title">
                        <img src="https://i.imgur.com/nd7JLkm.png" alt="***" width="400">
                    </div>
                    <div class="subform">

                        <h2>Price</h2>
                        <!-- if they click a button of a product, the product name will be display here-->
                        <label for="product_name">Product Name:</label>
                        <input type="text" name="product_name" value="<?php echo ($product_name);?>"><br>

                        <!-- if they click a button of a product, the product price will be display here-->
                        <label for="price">Price:</label>
                        <input type="text" name="price" value="<?php echo ($price);?>"><br>

                        <!-- if they click a button of a product, the product quantity will be display here-->
                        <label for="quantity">Quantity:</label>
                        <input type="text" name="quantity" value="<?php echo($quantity);?>" ><br>

                        <!-- if they click a button of a product, the product discount amount will be display here-->
                        <label for="discount_amount">Discount Amount:</label>
                        <input type="text" name="discount_amount" value="<?php echo($discount_amount);?>" ><br>

                        <!-- if they click a button of a product, the product discounted amount will be display here-->
                        <label for="discounted_amount">Discounted Amount:</label>
                        <input type="text" name="discounted_amount" value="<?php echo($discounted_amount);?>"><br>

                        <!-- if they click Confirm button the product that have been displayed in price will be inputted as order of the customer -->
                        <label for="confirm">Confirm:</label>
                        <input type="submit" name="confirm" value="CONFIRM"><br>
                        
                        <?php
                            // if they click Confirm button the product that have been displayed in price will be inputted as order of the customer 
                            if(isset($_POST["confirm"])){
                                // get the product info that have been displayed in top of confirm button
                                $product_name = $_POST["product_name"];
                                $discounted_amount = $_POST["discounted_amount"];
                                $quantity = $_POST["quantity"];
                            
                                //insert the product details into database
                                $query = "insert into orderingapplication(product_name,discounted_amount,quantity) values ('$product_name','$discounted_amount' , '$quantity')" ; 
                                $run = mysqli_query($conn,$query);

                                //get the product details in the database
                                $sql = "SELECT * FROM orderingapplication";
                                $result = mysqli_query($conn,$sql);
                                $valid_product_name = $result ->fetch_assoc();

                                // get the product name in the database
                                $validating_valid_product_name = $valid_product_name["product_name"];

                                // get product details of pink slides in database if pink slides have been ordered by customer
                                if($validating_valid_product_name = "Pink Slides"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Pink Slides'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_pink_slides = $result->fetch_assoc();
                                    $valid_database_pink_slides = 1;
                                }

                                // get product details of black sandals in database if black sandals have been ordered by customer
                                if($validating_valid_product_name = "Black Sandals"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Black Sandals'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_black_sandals = $result->fetch_assoc();
                                    $valid_database_black_sandals = 1;
                                }
                                
                                // get product details of bnw sneakers in database if bnw sneakers have been ordered by customer
                                if($validating_valid_product_name = "Bnw Sneakers"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Bnw Sneakers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_bnw_sneakers = $result->fetch_assoc();
                                    $valid_database_bnw_sneakers = 1;
                                }

                                // get product details of blue slippers in database if blue slippers have been ordered by customer
                                if($validating_valid_product_name = "Blue Slippers"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Blue Slippers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_blue_slippers = $result->fetch_assoc();
                                    $valid_database_blue_slippers = 1;
                                }

                                // get product details of pink slippers in database if pink slippers have been ordered by customer
                                if($validating_valid_product_name = "Pink Slippers"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Pink Slippers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_pink_slippers = $result->fetch_assoc();
                                    $valid_database_pink_slippers = 1;
                                }

                                // get product details of pretty slippers in database if pretty slippers have been ordered by customer
                                if($validating_valid_product_name = "Pretty Slippers"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Pretty Slippers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_pretty_slippers = $result->fetch_assoc();
                                    $valid_database_pretty_slippers = 1;
                                }

                                // get product details of red shirt in database if red shirt have been ordered by customer
                                if($validating_valid_product_name = "Red Shirt"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Red Shirt'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_red_shirt = $result->fetch_assoc();
                                    $valid_database_red_shirt = 1;
                                }

                                // get product details black shirt of in database if black shirt have been ordered by customer
                                if($validating_valid_product_name = "Black Shirt"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Black Shirt'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_black_shirt = $result->fetch_assoc();
                                    $valid_database_black_shirt = 1;
                                }

                                // get product details of usb charger in database if usb charger have been ordered by customer
                                if($validating_valid_product_name = "USB Charger"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'USB Charger'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_usb_charger = $result->fetch_assoc();
                                    $valid_database_usb_charger = 1;
                                }
                                
                                //if pink slides have been ordered by customer
                                if( $valid_database_pink_slides >= 0 ){
                                    //get pink slides
                                    $bought_pink_slides = "";
                                    $bought_pink_slides_amount = "";
                                    $bought_pink_slides_quantity = "";
                    
                                    //get details of pink slides from the database
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Pink Slides'";    
                                    $result = mysqli_query($conn, $sql);
                                    $pink_slides_row = $result->fetch_assoc();
                    
                                    //get the product name from the database
                                    @$bought_pink_slides = $pink_slides_row["product_name"];
                                    //get the discounted amount from the database
                                    @$bought_pink_slides_amount = $pink_slides_row["discounted_amount"];
                                    //get the quantity from the database
                                    @$bought_pink_slides_quantity = $pink_slides_row["quantity"];
                    
                                    $subtotal_pink_slides = $bought_pink_slides_amount;
                                    $subquantity_pink_slides = $bought_pink_slides_quantity;
                                }
                    
                                //if black sandals have been ordered by customer
                                if($valid_database_black_sandals >= 0  ){
                                    //get black sandals
                                    $bought_Black_Sandals = "";
                                    $bought_Black_Sandals_amount = "";
                                    $bought_Black_Sandals_quantity = "";
                    
                                    //get details of black sandals from the database
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Black Sandals'";    
                                    $result = mysqli_query($conn, $sql);
                                    $Black_Sandals_row = $result->fetch_assoc();
                    
                                    //get the product name from the database
                                    @$bought_Black_Sandals = $Black_Sandals_row["product_name"];
                                    //get the discounted amount from the database
                                    @$bought_Black_Sandals_amount = $Black_Sandals_row["discounted_amount"];
                                    //get the quantity from the database
                                    @$bought_Black_Sandals_quantity = $Black_Sandals_row["quantity"];
                    
                                    $subtotal_black_sandals = $bought_Black_Sandals_amount;
                                    $subquantity_black_sandals = $bought_Black_Sandals_quantity;
                                }
                    
                                //if bnw sneakers have been ordered by customer
                                if($valid_database_bnw_sneakers >= 0  ){
                                    //get bnw sneakers
                                    $bought_Bnw_Sneakers = "";
                                    $bought_Bnw_Sneakers_amount = "";
                                    $bought_Bnw_Sneakers_quantity = "";
                    
                                    //get details of bnw sneakers from the database
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Bnw Sneakers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $Bnw_Sneakers_row = $result->fetch_assoc();
                    
                                    //get the product name from the database
                                    @$bought_Bnw_Sneakers = $Bnw_Sneakers_row["product_name"];
                                    //get the discounted amount from the database
                                    @$bought_Bnw_Sneakers_amount = $Bnw_Sneakers_row["discounted_amount"];
                                    //get the quantity from the database
                                    @$bought_Bnw_Sneakers_quantity = $Bnw_Sneakers_row["quantity"];
                    
                                    $subtotal_bnw_sneakers = $bought_Bnw_Sneakers_amount;
                                    $subquantity_bnw_sneakers = $bought_Bnw_Sneakers_quantity;
                                }
                    
                                //if blue slippers have been ordered by customer
                                if($valid_database_blue_slippers >= 0  ){
                                    //get Blue Slippers
                                    $bought_Blue_Slippers = "";
                                    $bought_Blue_Slippers_amount = "";
                                    $bought_Blue_Slippers_quantity = "";
                       
                                    //get details of blue slippers from the database
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Blue Slippers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $Blue_Slippers_row = $result->fetch_assoc();
                    
                                    //get the product name from the database
                                    @$bought_Blue_Slippers = $Blue_Slippers_row["product_name"];
                                    //get the discounted amount from the database
                                    @$bought_Blue_Slippers_amount = $Blue_Slippers_row["discounted_amount"];
                                    //get the quantity from the database
                                    @$bought_Blue_Slippers_quantity = $Blue_Slippers_row["quantity"];
                    
                                    $subtotal_blue_slippers = $bought_Blue_Slippers_amount;
                                    $subquantity_blue_slippers = $bought_Blue_Slippers_quantity;
                                }
                    
                                //if pink slippers have been ordered by customer
                                if($valid_database_pink_slippers >= 0 ){
                                    //get Pink Slippers
                                    $bought_Pink_Slippers = "";
                                    $bought_Pink_Slippers_amount = "";
                                    $bought_Pink_Slippers_quantity = "";
                    
                                    //get details of pink slippers from the database
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Pink Slippers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $Pink_Slippers_row = $result->fetch_assoc();
                    
                                    //get the product name from the database
                                    @$bought_Pink_Slippers = $Pink_Slippers_row["product_name"];
                                    //get the discounted amount from the database
                                    @$bought_Pink_Slippers_amount = $Pink_Slippers_row["discounted_amount"];
                                    //get the quantity from the database
                                    @$bought_Pink_Slippers_quantity = $Pink_Slippers_row["quantity"];
                    
                                    $subtotal_pink_slippers = $bought_Pink_Slippers_amount;
                                    $subquantity_pink_slippers = $bought_Pink_Slippers_quantity;
                                }
                    
                                //if pretty slippers have been ordered by customer
                                if($valid_database_pretty_slippers >= 0 ){
                                    //get Pretty Slippers
                                    $bought_Pretty_Slippers = "";
                                    $bought_Pretty_Slippers_amount = "";
                                    $bought_Pretty_Slippers_quantity = "";
                    
                                    //get details of pretty slippers from the database
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Pretty Slippers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $Pretty_Slippers_row = $result->fetch_assoc();
                    
                                    //get the product name from the database
                                    @$bought_Pretty_Slippers = $Pretty_Slippers_row["product_name"];
                                    //get the discounted amount from the database
                                    @$bought_Pretty_Slippers_amount = $Pretty_Slippers_row["discounted_amount"];
                                    //get the quantity from the database
                                    @$bought_Pretty_Slippers_quantity = $Pretty_Slippers_row["quantity"];
                    
                                    $subtotal_pretty_slippers = $bought_Pretty_Slippers_amount;
                                    $subquantity_pretty_slippers = $bought_Pretty_Slippers_quantity;
                                }
                    
                                //if red shirt have been ordered by customer
                                if($valid_database_red_shirt >= 0  ){
                                    //get Red Shirt
                                    $bought_Red_Shirt = "";
                                    $bought_Red_Shirt_amount = "";
                                    $bought_Red_Shirt_quantity = "";
                    
                                    //get details of red shirt from the database
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Red Shirt'";    
                                    $result = mysqli_query($conn, $sql);
                                    $Red_Shirt_row = $result->fetch_assoc();
                    
                                    //get the product name from the database
                                    @$bought_Red_Shirt = $Red_Shirt_row["product_name"];
                                    //get the discounted amount from the database
                                    @$bought_Red_Shirt_amount = $Red_Shirt_row["discounted_amount"];
                                    //get the quantity from the database
                                    @$bought_Red_Shirt_quantity = $Red_Shirt_row["quantity"];
                    
                                    $subtotal_red_shirt = $bought_Red_Shirt_amount;
                                    $subquantity_red_shirt = $bought_Red_Shirt_quantity;
                                }
                    
                                //if black shirt have been ordered by customer
                                if($valid_database_black_shirt >= 0 ){
                                    //get Black Shirt
                                    $bought_Black_Shirt = "";
                                    $bought_Black_Shirt_amount = "";
                                    $bought_Black_Shirt_quantity = "";
                    
                                    //get details of black shirt from the database
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Black Shirt'";    
                                    $result = mysqli_query($conn, $sql);
                                    $Black_Shirt_row = $result->fetch_assoc();
                    
                                    //get the product name from the database
                                    @$bought_Black_Shirt = $Black_Shirt_row["product_name"];
                                    //get the discounted amount from the database
                                    @$bought_Black_Shirt_amount = $Black_Shirt_row["discounted_amount"];
                                    //get the quantity from the database
                                    @$bought_Black_Shirt_quantity = $Black_Shirt_row["quantity"];
                    
                                    $subtotal_black_shirt = $bought_Black_Shirt_amount;
                                    $subquantity_black_shirt = $bought_Black_Shirt_quantity;
                                }
                    
                                //if usb charger have been ordered by customer
                                if($valid_database_usb_charger >= 0  ){
                                    //get USB Charger
                                    $bought_USB_Charger = "";
                                    $bought_USB_Charger_amount = "";
                                    $bought_Black_ShirtUSB_Charger_quantity = "";
                    
                                    //get details of usb charger from the database
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'USB Charger'";    
                                    $result = mysqli_query($conn, $sql);
                                    $USB_Charger_row = $result->fetch_assoc();
                    
                                    //get the product name from the database
                                    @$bought_USB_Charger = $USB_Charger_row["product_name"];
                                    //get the discounted amount from the database
                                    @$bought_USB_Charger_amount = $USB_Charger_row["discounted_amount"];
                                    //get the quantity from the database
                                    @$bought_USB_Charger_quantity = $USB_Charger_row["quantity"];
                    
                                    $subtotal_usb_charger = $bought_USB_Charger_amount;
                                    $subquantity_usb_charger = $bought_USB_Charger_quantity;
                                }
                                
                                //add all total bill that have benn ordered
                                $total_bills = $subtotal_pink_slides + $subtotal_black_sandals + $subtotal_bnw_sneakers + $subtotal_blue_slippers + $subtotal_pink_slippers + $subtotal_pretty_slippers + $subtotal_red_shirt + $subtotal_black_shirt + $subtotal_usb_charger;
                                //add all quantity that have been ordered
                                $total_quantity = $subquantity_pink_slides + $subquantity_black_sandals + $subquantity_bnw_sneakers + $subquantity_blue_slippers + $subquantity_pink_slippers + $subquantity_pretty_slippers + $subquantity_red_shirt + $subquantity_black_shirt + $subquantity_usb_charger;
                                }
                        ?>

                    </div>
                    <div class="subform">
                        
                        <h2>Bills</h2>

                        <!-- All total confirmed product price will be place here-->
                        <label for="total_bills">Total Bills:</label>
                        <input type="text" name="total_bills" value="<?php echo($total_bills);?>"><br>

                        <!-- all total confirmed quantity will be plac here-->
                        <label for="total_quantity">Total Quantity:</label>
                        <input type="text" name="total_quantity" value="<?php echo($total_quantity);?>"><br>

                        <!-- cash given or will be given by customer will be place here-->
                        <label for="cash_given">Cash Given:</label>
                        <input type="text" name="cash_given" value="<?php $cash_given = readline(); echo($new_cash_given)?>" placeholder="Please input cash amount"><br>

                        <!-- change for the cash  -->
                        <label for="change">Change:</label>
                        <input type="text" name="change" value="<?php echo($change);?>"><br>

                    </div>
                </div>
                <div class="flex_container_column">
                    <div class="flex_container_row" id="store">
                        <!-- BUTTONS -->
                        <div class="item_column">
                            <!-- button and image for pink slides-->
                            <img src="https://i.imgur.com/Trg22Zo.jpg"></img>
                            <input name="pink_slides" type="submit" value="PINK SLIDES"><br>
                            <!-- button and image for blue slippers-->
                            <img src="https://i.imgur.com/plvmCa7.jpg"></img>
                            <input name="blue_slippers" type="submit" value="BLUE SLIPPERS"><br>
                            <!-- button and image for rd shirt-->
                            <img src="https://i.imgur.com/EPTDHsQ.jpg"></img>
                            <input name="red_shirt" type="submit" value="RED SHIRT"><br>
                        </div>
                        <div class="item_column">
                            <!-- button and image for black sandals-->
                            <img src="https://i.imgur.com/epvIVGF.jpg"></img>
                            <input name="black_sandals" type="submit" value="BLACK SANDALS"><br>
                            <!-- button and image for pink slippers-->
                            <img src="https://i.imgur.com/57E3TsJ.jpg"></img>
                            <input name="pink_slippers" type="submit" value="PINK SLIPPERS"><br>
                            <!-- button and image for black shirt-->
                            <img src="https://i.imgur.com/rR0OD7G.jpg"></img>
                            <input name="black_shirt" type="submit" value="BLACK SHIRT"><br>
                        </div>
                        <div class="item_column">
                            <!-- button and image for bnw sneakers-->
                            <img src="https://i.imgur.com/oJHTHAf.jpg"></img>
                            <input name="bnw_sneakers" type="submit" value="BNW SNEAKERS"><br>
                            <!-- button and image for prettry slippers-->
                            <img src="https://i.imgur.com/DwRpVwl.jpg"></img>
                            <input name="pretty_slippers" type="submit" value="PRETTY SLIPPERS"><br>
                            <!-- button and image for usb charger-->
                            <img src="https://i.imgur.com/XGMI6Qk.jpg"></img>
                            <input name="usb_charger" type="submit" value="USB CHARGER"><br>
                        </div>
                    </div>
                    <div class="flex_container_row" id="button_bar">
                        <!-- BUTTONS -->
                        <!-- button for calculate after the cash given inputted-->
                        <input name="calculate" type="submit" value="CALCULATE">
                        <!-- button for new order-->
                        <input name="new" type="submit" value="NEW">
                        <!-- button for clear-->
                        <input name="clear" type="submit" value="CLEAR">
                        <!-- button for checkout if the the order is final-->
                        <input name="checkout" type="submit" value="CHECKOUT">
                        <!-- button for logout and will b redirected to login site-->
                        <input name="logout" type="submit" value="LOGOUT">

                        <input name="back" type="submit" value="BACK">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
