<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordering Application</title>
    <link rel="stylesheet" href="eps.css">
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
    
            if(isset($_POST["pink_slides"])){
                $product_name = "Pink Slides";
                $price = $pink_slides;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
            
            if(isset($_POST["black_sandals"])){
                $product_name = "Black Sandals";
                $price = $black_sandals;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
    
            if(isset($_POST["bnw_sneakers"])){
                $product_name = "Bnw Sneakers";
                $price = $bnw_sneakers;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
    
            if(isset($_POST["blue_slippers"])){
                $product_name = "Blue Slippers";
                $price = $blue_slippers;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
    
            if(isset($_POST["pink_slippers"])){
                $product_name = "Pink Slippers";
                $price = $pink_slippers;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
    
            if(isset($_POST["pretty_slippers"])){
                $product_name = "Pretty Slippers";
                $price = $pretty_slippers;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
    
            if(isset($_POST["red_shirt"])){
                $product_name = "Red Shirt";
                $price = $red_shirt;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
    
            if(isset($_POST["black_shirt"])){
                $product_name = "Black Shirt";
                $price = $black_shirt;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }
    
            if(isset($_POST["usb_charger"])){
                $product_name = "USB Charger";
                $price = $usb_charger;
                $quantity = (int)$_POST["quantity"];
                $discount_amount = (int)$_POST["discount_amount"];
                $discounted_amount = $price - $discount_amount;
                $quantity++;
                $discounted_amount = $discounted_amount * $quantity;
            }


            if(isset($_POST["calculate"])){
                $new_cash_given = $_POST["cash_given"];
                $total_bills = $_POST["total_bills"];
                $cash_given = (int)$_POST["cash_given"];
                $change = $cash_given - (int)$total_bills;
                $total_quantity = $_POST["total_quantity"];
                
            }

            if(isset($_POST["new"])){
                $query = "DELETE FROM orderingapplication;" ; 
                $run = mysqli_query($conn,$query);
            }
            if(isset($_POST["clear"])){
            }

            if(isset($_POST["checkout"])){
                echo '
                <script>
                window.location.href = "checkout.php";
                </script>';
            }

            if(isset($_POST["logout"])){
                echo '
                <script>
                window.location.href = "Login.php";
                </script>';
            }

        ?>

        <form action="" method="post" >
            <div class="flex_container_row">
                <div>
                    <div class="title">
                        <img src="https://i.imgur.com/nd7JLkm.png" alt="***" width="400">
                    </div>
                    <div class="subform">

                        <h2>Price</h2>
                        
                        <label for="product_name">Product Name:</label>
                        <input type="text" name="product_name" value="<?php echo ($product_name);?>"><br>
                        <label for="price">Price:</label>
                        <input type="text" name="price" value="<?php echo ($price);?>"><br>
                        <label for="quantity">Quantity:</label>
                        <input type="text" name="quantity" value="<?php echo($quantity);?>" ><br>
                        <label for="discount_amount">Discount Amount:</label>
                        <input type="text" name="discount_amount" value="<?php echo($discount_amount);?>" ><br>
                        <label for="discounted_amount">Discounted Amount:</label>
                        <input type="text" name="discounted_amount" value="<?php echo($discounted_amount);?>"><br>

                        <label for="confirm">Confirm:</label>
                        <input type="submit" name="confirm" value="CONFIRM"><br>
                        <?php
                            if(isset($_POST["confirm"])){
                                $product_name = $_POST["product_name"];
                                $discounted_amount = $_POST["discounted_amount"];
                                $quantity = $_POST["quantity"];
                            
                                $query = "insert into orderingapplication(product_name,discounted_amount,quantity) values ('$product_name','$discounted_amount' , '$quantity')" ; 
                                $run = mysqli_query($conn,$query);

                                $sql = "SELECT * FROM orderingapplication";
                                $result = mysqli_query($conn,$sql);
                                $valid_product_name = $result ->fetch_assoc();

                                $validating_valid_product_name = $valid_product_name["product_name"];

                                if($validating_valid_product_name = "Pink Slides"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Pink Slides'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_pink_slides = $result->fetch_assoc();
                                    $valid_database_pink_slides = 1;
                                }

                                if($validating_valid_product_name = "Black Sandals"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Black Sandals'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_black_sandals = $result->fetch_assoc();
                                    $valid_database_black_sandals = 1;
                                }
                                
                                if($validating_valid_product_name = "Bnw Sneakers"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Bnw Sneakers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_bnw_sneakers = $result->fetch_assoc();
                                    $valid_database_bnw_sneakers = 1;
                                }

                                if($validating_valid_product_name = "Blue Slippers"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Blue Slippers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_blue_slippers = $result->fetch_assoc();
                                    $valid_database_blue_slippers = 1;
                                }

                                if($validating_valid_product_name = "Pink Slippers"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Pink Slippers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_pink_slippers = $result->fetch_assoc();
                                    $valid_database_pink_slippers = 1;
                                }

                                if($validating_valid_product_name = "Pretty Slippers"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Pretty Slippers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_pretty_slippers = $result->fetch_assoc();
                                    $valid_database_pretty_slippers = 1;
                                }

                                if($validating_valid_product_name = "Red Shirt"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Red Shirt'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_red_shirt = $result->fetch_assoc();
                                    $valid_database_red_shirt = 1;
                                }

                                if($validating_valid_product_name = "Black Shirt"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Black Shirt'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_black_shirt = $result->fetch_assoc();
                                    $valid_database_black_shirt = 1;
                                }

                                if($validating_valid_product_name = "USB Charger"){ 
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'USB Charger'";    
                                    $result = mysqli_query($conn, $sql);
                                    $database_usb_charger = $result->fetch_assoc();
                                    $valid_database_usb_charger = 1;
                                }
                                
                                if( $valid_database_pink_slides >= 0 ){
                                    //get pink slides
                                    $bought_pink_slides = "";
                                    $bought_pink_slides_amount = "";
                                    $bought_pink_slides_quantity = "";
                    
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Pink Slides'";    
                                    $result = mysqli_query($conn, $sql);
                                    $pink_slides_row = $result->fetch_assoc();
                    
                                    @$bought_pink_slides = $pink_slides_row["product_name"];
                                    @$bought_pink_slides_amount = $pink_slides_row["discounted_amount"];
                                    @$bought_pink_slides_quantity = $pink_slides_row["quantity"];
                    
                                    $subtotal_pink_slides = $bought_pink_slides_amount;
                                    $subquantity_pink_slides = $bought_pink_slides_quantity;
                                }
                    
                                if($valid_database_black_sandals >= 0  ){
                                    //get black sandals
                                    $bought_Black_Sandals = "";
                                    $bought_Black_Sandals_amount = "";
                                    $bought_Black_Sandals_quantity = "";
                    
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Black Sandals'";    
                                    $result = mysqli_query($conn, $sql);
                                    $Black_Sandals_row = $result->fetch_assoc();
                    
                                    @$bought_Black_Sandals = $Black_Sandals_row["product_name"];
                                    @$bought_Black_Sandals_amount = $Black_Sandals_row["discounted_amount"];
                                    @$bought_Black_Sandals_quantity = $Black_Sandals_row["quantity"];
                    
                                    $subtotal_black_sandals = $bought_Black_Sandals_amount;
                                    $subquantity_black_sandals = $bought_Black_Sandals_quantity;
                                }
                    
                                if($valid_database_bnw_sneakers >= 0  ){
                                    //get bnw sneakers
                                    $bought_Bnw_Sneakers = "";
                                    $bought_Bnw_Sneakers_amount = "";
                                    $bought_Bnw_Sneakers_quantity = "";
                    
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Bnw Sneakers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $Bnw_Sneakers_row = $result->fetch_assoc();
                    
                                    @$bought_Bnw_Sneakers = $Bnw_Sneakers_row["product_name"];
                                    @$bought_Bnw_Sneakers_amount = $Bnw_Sneakers_row["discounted_amount"];
                                    @$bought_Bnw_Sneakers_quantity = $Bnw_Sneakers_row["quantity"];
                    
                                    $subtotal_bnw_sneakers = $bought_Bnw_Sneakers_amount;
                                    $subquantity_bnw_sneakers = $bought_Bnw_Sneakers_quantity;
                                }
                    
                                if($valid_database_blue_slippers >= 0  ){
                                    //get Blue Slippers
                                    $bought_Blue_Slippers = "";
                                    $bought_Blue_Slippers_amount = "";
                                    $bought_Blue_Slippers_quantity = "";
                       
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Blue Slippers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $Blue_Slippers_row = $result->fetch_assoc();
                    
                                    @$bought_Blue_Slippers = $Blue_Slippers_row["product_name"];
                                    @$bought_Blue_Slippers_amount = $Blue_Slippers_row["discounted_amount"];
                                    @$bought_Blue_Slippers_quantity = $Blue_Slippers_row["quantity"];
                    
                                    $subtotal_blue_slippers = $bought_Blue_Slippers_amount;
                                    $subquantity_blue_slippers = $bought_Blue_Slippers_quantity;
                                }
                    
                                if($valid_database_pink_slippers >= 0 ){
                                    //get Pink Slippers
                                    $bought_Pink_Slippers = "";
                                    $bought_Pink_Slippers_amount = "";
                                    $bought_Pink_Slippers_quantity = "";
                    
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Pink Slippers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $Pink_Slippers_row = $result->fetch_assoc();
                    
                                    @$bought_Pink_Slippers = $Pink_Slippers_row["product_name"];
                                    @$bought_Pink_Slippers_amount = $Pink_Slippers_row["discounted_amount"];
                                    @$bought_Pink_Slippers_quantity = $Pink_Slippers_row["quantity"];
                    
                                    $subtotal_pink_slippers = $bought_Pink_Slippers_amount;
                                    $subquantity_pink_slippers = $bought_Pink_Slippers_quantity;
                                }
                    
                                if($valid_database_pretty_slippers >= 0 ){
                                    //get Pretty Slippers
                                    $bought_Pretty_Slippers = "";
                                    $bought_Pretty_Slippers_amount = "";
                                    $bought_Pretty_Slippers_quantity = "";
                    
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Pretty Slippers'";    
                                    $result = mysqli_query($conn, $sql);
                                    $Pretty_Slippers_row = $result->fetch_assoc();
                    
                                    @$bought_Pretty_Slippers = $Pretty_Slippers_row["product_name"];
                                    @$bought_Pretty_Slippers_amount = $Pretty_Slippers_row["discounted_amount"];
                                    @$bought_Pretty_Slippers_quantity = $Pretty_Slippers_row["quantity"];
                    
                                    $subtotal_pretty_slippers = $bought_Pretty_Slippers_amount;
                                    $subquantity_pretty_slippers = $bought_Pretty_Slippers_quantity;
                                }
                    
                                if($valid_database_red_shirt >= 0  ){
                                    //get Red Shirt
                                    $bought_Red_Shirt = "";
                                    $bought_Red_Shirt_amount = "";
                                    $bought_Red_Shirt_quantity = "";
                    
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Red Shirt'";    
                                    $result = mysqli_query($conn, $sql);
                                    $Red_Shirt_row = $result->fetch_assoc();
                    
                                    @$bought_Red_Shirt = $Red_Shirt_row["product_name"];
                                    @$bought_Red_Shirt_amount = $Red_Shirt_row["discounted_amount"];
                                    @$bought_Red_Shirt_quantity = $Red_Shirt_row["quantity"];
                    
                                    $subtotal_red_shirt = $bought_Red_Shirt_amount;
                                    $subquantity_red_shirt = $bought_Red_Shirt_quantity;
                                }
                    
                                if($valid_database_black_shirt >= 0 ){
                                    //get Black Shirt
                                    $bought_Black_Shirt = "";
                                    $bought_Black_Shirt_amount = "";
                                    $bought_Black_Shirt_quantity = "";
                    
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'Black Shirt'";    
                                    $result = mysqli_query($conn, $sql);
                                    $Black_Shirt_row = $result->fetch_assoc();
                    
                                    @$bought_Black_Shirt = $Black_Shirt_row["product_name"];
                                    @$bought_Black_Shirt_amount = $Black_Shirt_row["discounted_amount"];
                                    @$bought_Black_Shirt_quantity = $Black_Shirt_row["quantity"];
                    
                                    $subtotal_black_shirt = $bought_Black_Shirt_amount;
                                    $subquantity_black_shirt = $bought_Black_Shirt_quantity;
                                }
                    
                                if($valid_database_usb_charger >= 0  ){
                                    //get USB Charger
                                    $bought_USB_Charger = "";
                                    $bought_USB_Charger_amount = "";
                                    $bought_Black_ShirtUSB_Charger_quantity = "";
                    
                                    $sql = "SELECT * FROM orderingapplication WHERE product_name = 'USB Charger'";    
                                    $result = mysqli_query($conn, $sql);
                                    $USB_Charger_row = $result->fetch_assoc();
                    
                                    @$bought_USB_Charger = $USB_Charger_row["product_name"];
                                    @$bought_USB_Charger_amount = $USB_Charger_row["discounted_amount"];
                                    @$bought_USB_Charger_quantity = $USB_Charger_row["quantity"];
                    
                                    $subtotal_usb_charger = $bought_USB_Charger_amount;
                                    $subquantity_usb_charger = $bought_USB_Charger_quantity;
                                }
                                $total_bills = $subtotal_pink_slides + $subtotal_black_sandals + $subtotal_bnw_sneakers + $subtotal_blue_slippers + $subtotal_pink_slippers + $subtotal_pretty_slippers + $subtotal_red_shirt + $subtotal_black_shirt + $subtotal_usb_charger;
                                $total_quantity = $subquantity_pink_slides + $subquantity_black_sandals + $subquantity_bnw_sneakers + $subquantity_blue_slippers + $subquantity_pink_slippers + $subquantity_pretty_slippers + $subquantity_red_shirt + $subquantity_black_shirt + $subquantity_usb_charger;
                                }
                        ?>

                    </div>
                    <div class="subform">
                        
                        <h2>Bills</h2>

                        <label for="total_bills">Total Bills:</label>
                        <input type="text" name="total_bills" value="<?php echo($total_bills);?>"><br>
                        <label for="total_quantity">Total Quantity:</label>
                        <input type="text" name="total_quantity" value="<?php echo($total_quantity);?>"><br>
                        <label for="cash_given">Cash Given:</label>
                        <input type="text" name="cash_given" value="<?php $cash_given = readline(); echo($new_cash_given)?>" placeholder="Please input cash amount"><br>
                        <label for="change">Change:</label>
                        <input type="text" name="change" value="<?php echo($change);?>"><br>

                    </div>
                </div>
                <div class="flex_container_column">
                    <div class="flex_container_row" id="store">
                        <!-- BUTTONS -->
                        <div class="item_column">
                            <img src="https://i.imgur.com/Trg22Zo.jpg"></img>
                            <input name="pink_slides" type="submit" value="PINK SLIDES"><br>
                            <img src="https://i.imgur.com/plvmCa7.jpg"></img>
                            <input name="blue_slippers" type="submit" value="BLUE SLIPPERS"><br>
                            <img src="https://i.imgur.com/EPTDHsQ.jpg"></img>
                            <input name="red_shirt" type="submit" value="RED SHIRT"><br>
                        </div>
                        <div class="item_column">
                            <img src="https://i.imgur.com/epvIVGF.jpg"></img>
                            <input name="black_sandals" type="submit" value="BLACK SANDALS"><br>
                            <img src="https://i.imgur.com/57E3TsJ.jpg"></img>
                            <input name="pink_slippers" type="submit" value="PINK SLIPPERS"><br>
                            <img src="https://i.imgur.com/rR0OD7G.jpg"></img>
                            <input name="black_shirt" type="submit" value="BLACK SHIRT"><br>
                        </div>
                        <div class="item_column">
                            <img src="https://i.imgur.com/oJHTHAf.jpg"></img>
                            <input name="bnw_sneakers" type="submit" value="BNW SNEAKERS"><br>
                            <img src="https://i.imgur.com/DwRpVwl.jpg"></img>
                            <input name="pretty_slippers" type="submit" value="PRETTY SLIPPERS"><br>
                            <img src="https://i.imgur.com/XGMI6Qk.jpg"></img>
                            <input name="usb_charger" type="submit" value="USB CHARGER"><br>
                        </div>
                    </div>
                    <div class="flex_container_row" id="button_bar">
                        <!-- BUTTONS -->
                        <input name="calculate" type="submit" value="CALCULATE">
                        <input name="new" type="submit" value="NEW">
                        <input name="clear" type="submit" value="CLEAR">
                        <input name="checkout" type="submit" value="CHECKOUT">
                        <input name="logout" type="submit" value="LOGOUT">
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>