<!DOCTYPE html>
<html>
<head>
<title>Casan's Browser</title>
</head>
<body>
    <?php
    $conn = new mysqli('localhost','root','','employee');
    $quantity = 0;

    if(isset($_POST["logout"])){
        echo '
                <script>
                window.location.href = "user_log_in.php";
                </script>';
    }
    if (isset($_POST["back"])){
        echo '
            <script>
            window.location.href = "administrator_browser.php";
            </script>';
    }
    ?>
    <div>
        <div>
            <img src="https://i.imgur.com/nd7JLkm.png" alt="***" width="400">
        </div>
        <form action="" method="post" >
            <div>
                <div class="item_column">

                <!-- button and image for pink slides-->
                <img src="https://i.imgur.com/Trg22Zo.jpg" id="preview" width="200" height="200"></img>
                <p>Pink Slides ₱100</p>
                <input name="pink_slides" type="submit" value="ADD TO CART">
                <input type='text' id="quantity_pink_slides" name="quantity_pink_slides">
                <input type="button" id="add" name="+" value="+" onclick="increment_pink_slides()">
                <input type="button" id="add" name="-" value="-" onclick="decrement_pink_slides()">
                <script>
                    var count = 0;
                    function increment_pink_slides() {
                        count++;
                        document.getElementById("quantity_pink_slides").value = count;
                    }
                    function decrement_pink_slides() {
                        if (count > 0) {
                            count--;
                            document.getElementById("quantity_pink_slides").value = count;
                        }
                    }
                </script>
                <?php
                    if(isset($_POST["pink_slides"])){
                        $pink_slides_price = 100;
                        $quantity_pink_slides = $_POST["quantity_pink_slides"];
                        $total_pink_slides_price = $pink_slides_price * $quantity_pink_slides;
                        $query = "insert into cart(product_name,price,quantity) values ('Pink Slides','$total_pink_slides_price','$quantity_pink_slides')";
                        $run = mysqli_query($conn,$query); 
                        $quantity_pink_slides = 0;
                    }
                ?>

                <br>

                <!-- button and image for blue slippers-->
                <img src="https://i.imgur.com/plvmCa7.jpg" id="preview" width="200" height="200"></img>
                <p>Blue Slippers ₱150</p>
                <input name="blue_slippers" type="submit" value="ADD TO CART">
                <input type='text' id="quantity_blue_slippers" name="quantity_blue_slippers">
                <input type="button" id="add" name="+" value="+" onclick="increment_blue_slippers()">
                <input type="button" id="add" name="-" value="-" onclick="decrement_blue_slippers()">
                <script>
                    var count = 0;
                    function increment_blue_slippers() {
                        count++;
                        document.getElementById("quantity_blue_slippers").value = count;
                    }
                    function decrement_blue_slippers() {
                        if (count > 0) {
                            count--;
                            document.getElementById("quantity_blue_slippers").value = count;
                        }
                    }
                </script>
                <?php
                    if(isset($_POST["blue_slippers"])){
                        $blue_slippers_price = 150;
                        $quantity_blue_slippers = $_POST["quantity_blue_slippers"];
                        $total_blue_slippers_price = $blue_slippers_price * $quantity_blue_slippers;
                        $query = "insert into cart(product_name,price,quantity) values ('Blue Slippers','$total_blue_slippers_price','$quantity_blue_slippers')";
                        $run = mysqli_query($conn,$query); 
                        $quantity_blue_slippers = 0;
                    }
                ?>

                <br>

                <!-- button and image for red shirt-->
                <img src="https://i.imgur.com/EPTDHsQ.jpg" id="preview" width="200" height="200"></img>
                <p>Red Shirt ₱150</p>
                <input name="red_shirt" type="submit" value="ADD TO CART">
                <input type='text' id="quantity_red_shirt" name="quantity_red_shirt">
                <input type="button" id="add" name="+" value="+" onclick="increment_red_shirt()">
                <input type="button" id="add" name="-" value="-" onclick="decrement_red_shirt()">
                <script>
                    var count = 0;
                    function increment_red_shirt() {
                        count++;
                        document.getElementById("quantity_red_shirt").value = count;
                    }
                    function decrement_red_shirt() {
                        if (count > 0) {
                            count--;
                            document.getElementById("quantity_red_shirt").value = count;
                        }
                    }
                </script>
                <?php
                    if(isset($_POST["red_shirt"])){
                        $red_shirt_price = 150;
                        $quantity_red_shirt = $_POST["quantity_red_shirt"];
                        $total_red_shirt_price = $red_shirt_price * $quantity_red_shirt;
                        $query = "insert into cart(product_name,price,quantity) values ('Red Shirt','$total_red_shirt_price','$quantity_red_shirt')";
                        $run = mysqli_query($conn,$query); 
                        $quantity_red_shirt = 0;
                    }
                ?>

                <br>


            </div>

            <div class="item_column">
                <!-- button and image for black sandals-->
                <img src="https://i.imgur.com/epvIVGF.jpg" id="preview" width="200" height="200"></img>
                <p>Black Sandals ₱150</p>
                <input name="Black_sandals" type="submit" value="ADD TO CART">
                <input type='text' id="quantity_Black_sandals" name="quantity_Black_sandals">
                <input type="button" id="add" name="+" value="+" onclick="increment_Black_sandals()">
                <input type="button" id="add" name="-" value="-" onclick="decrement_Black_sandals()">
                <script>
                    var count = 0;
                    function increment_Black_sandals() {
                        count++;
                        document.getElementById("quantity_Black_sandals").value = count;
                    }
                    function decrement_Black_sandals() {
                        if (count > 0) {
                            count--;
                            document.getElementById("quantity_Black_sandals").value = count;
                        }
                    }
                </script>
                <?php
                    if(isset($_POST["Black_sandals"])){
                        $Black_sandals_price = 150;
                        $quantity_Black_sandals = $_POST["quantity_Black_sandals"];
                        $total_Black_sandals_price = $Black_sandals_price * $quantity_Black_sandals;
                        $query = "insert into cart(product_name,price,quantity) values ('Black Sandals','$total_Black_sandals_price','$quantity_Black_sandals')";
                        $run = mysqli_query($conn,$query); 
                        $quantity_Black_sandals = 0;
                    }
                ?>

                <br>

                <!-- button and image for pink slippers-->
                <img src="https://i.imgur.com/57E3TsJ.jpg" id="preview" width="200" height="200"></img>
                <p>Pink Slippers ₱100</p>
                <input name="pink_slippers" type="submit" value="ADD TO CART">
                <input type='text' id="quantity_pink_slippers" name="quantity_pink_slippers">
                <input type="button" id="add" name="+" value="+" onclick="increment_pink_slippers()">
                <input type="button" id="add" name="-" value="-" onclick="decrement_pink_slippers()">
                <script>
                    var count = 0;
                    function increment_pink_slippers() {
                        count++;
                        document.getElementById("quantity_pink_slippers").value = count;
                    }
                    function decrement_pink_slippers() {
                        if (count > 0) {
                            count--;
                            document.getElementById("quantity_pink_slippers").value = count;
                        }
                    }
                </script>
                <?php
                    if(isset($_POST["pink_slippers"])){
                        $pink_slippers_price = 100;
                        $quantity_pink_slippers = $_POST["quantity_pink_slippers"];
                        $total_pink_slippers_price = $pink_slippers_price * $quantity_pink_slippers;
                        $query = "insert into cart(product_name,price,quantity) values ('Pink Slippers','$total_pink_slippers_price','$quantity_pink_slippers')";
                        $run = mysqli_query($conn,$query); 
                        $quantity_pink_slippers = 0;
                    }
                ?>

                <br>

                <!-- button and image for black shirt-->
                <img src="https://i.imgur.com/rR0OD7G.jpg" id="preview" width="200" height="200"></img>
                <p>Black Shirt ₱150</p>
                <input name="black_shirt" type="submit" value="ADD TO CART">
                <input type='text' id="quantity_black_shirt" name="quantity_black_shirt">
                <input type="button" id="add" name="+" value="+" onclick="increment_black_shirt()">
                <input type="button" id="add" name="-" value="-" onclick="decrement_black_shirt()">
                <script>
                    var count = 0;
                    function increment_black_shirt() {
                        count++;
                        document.getElementById("quantity_black_shirt").value = count;
                    }
                    function decrement_black_shirt() {
                        if (count > 0) {
                            count--;
                            document.getElementById("quantity_black_shirt").value = count;
                        }
                    }
                </script>
                <?php
                    if(isset($_POST["black_shirt"])){
                        $black_shirt_price = 150;
                        $quantity_black_shirt = $_POST["quantity_black_shirt"];
                        $total_black_shirt_price = $black_shirt_price * $quantity_black_shirt;
                        $query = "insert into cart(product_name,price,quantity) values ('Black Shirt','$total_black_shirt_price','$quantity_black_shirt')";
                        $run = mysqli_query($conn,$query); 
                        $quantity_black_shirt = 0;
                    }
                ?>

                <br>


            </div>

            <div class="item_column">
                <!-- button and image for bnw sneakers-->
                <img src="https://i.imgur.com/oJHTHAf.jpg" id="preview" width="200" height="200"></img>
                <p>Bnw Sneakers ₱200</p>
                <input name="bnw_sneakers" type="submit" value="ADD TO CART">
                <input type='text' id="quantity_bnw_sneakers" name="quantity_bnw_sneakers">
                <input type="button" id="add" name="+" value="+" onclick="increment_bnw_sneakers()">
                <input type="button" id="add" name="-" value="-" onclick="decrement_bnw_sneakers()">
                <script>
                    var count = 0;
                    function increment_bnw_sneakers() {
                        count++;
                        document.getElementById("quantity_bnw_sneakers").value = count;
                    }
                    function decrement_bnw_sneakers() {
                        if (count > 0) {
                            count--;
                            document.getElementById("quantity_bnw_sneakers").value = count;
                        }
                    }
                </script>
                <?php
                    if(isset($_POST["bnw_sneakers"])){
                        $bnw_sneakers_price = 200;
                        $quantity_bnw_sneakers = $_POST["quantity_bnw_sneakers"];
                        $total_bnw_sneakers_price = $bnw_sneakers_price * $quantity_bnw_sneakers;
                        $query = "insert into cart(product_name,price,quantity) values ('BNW Sneakers','$total_bnw_sneakers_price','$quantity_bnw_sneakers')";
                        $run = mysqli_query($conn,$query); 
                        $quantity_bnw_sneakers = 0;
                    }
                ?>

                <br>

                <!-- button and image for prettry slippers-->
                <img src="https://i.imgur.com/DwRpVwl.jpg" id="preview" width="200" height="200"></img>
                <p>Pretty Slippers ₱120</p>
                <input name="pretty_slippers" type="submit" value="ADD TO CART">
                <input type='text' id="quantity_pretty_slippers" name="quantity_pretty_slippers">
                <input type="button" id="add" name="+" value="+" onclick="increment_pretty_slippers()">
                <input type="button" id="add" name="-" value="-" onclick="decrement_pretty_slippers()">
                <script>
                    var count = 0;
                    function increment_pretty_slippers() {
                        count++;
                        document.getElementById("quantity_pretty_slippers").value = count;
                    }
                    function decrement_pretty_slippers() {
                        if (count > 0) {
                            count--;
                            document.getElementById("quantity_pretty_slippers").value = count;
                        }
                    }
                </script>
                <?php
                    if(isset($_POST["pretty_slippers"])){
                        $pretty_slippers_price = 120;
                        $quantity_pretty_slippers = $_POST["quantity_pretty_slippers"];
                        $total_pretty_slippers_price = $pretty_slippers_price * $quantity_pretty_slippers;
                        $query = "insert into cart(product_name,price,quantity) values ('Pretty Slippers','$total_pretty_slippers_price','$quantity_pretty_slippers')";
                        $run = mysqli_query($conn,$query); 
                        $quantity_pretty_slippers = 0;
                    }
                ?>

                <br>

                <!-- button and image for usb charger-->
                <img src="https://i.imgur.com/XGMI6Qk.jpg" id="preview" width="200" height="200"></img>
                <p>USB Charger ₱100</p>
                <input name="usb_charger" type="submit" value="ADD TO CART">
                <input type='text' id="quantity_usb_charger" name="quantity_usb_charger">
                <input type="button" id="add" name="+" value="+" onclick="increment_usb_charger()">
                <input type="button" id="add" name="-" value="-" onclick="decrement_usb_charger()">
                <script>
                    var count = 0;
                    function increment_usb_charger() {
                        count++;
                        document.getElementById("quantity_usb_charger").value = count;
                    }
                    function decrement_usb_charger() {
                        if (count > 0) {
                            count--;
                            document.getElementById("quantity_usb_charger").value = count;
                        }
                    }
                </script>
                <?php
                    if(isset($_POST["usb_charger"])){
                        $usb_charger_price = 100;
                        $quantity_usb_charger = $_POST["quantity_usb_charger"];
                        $total_usb_charger_price = $usb_charger_price * $quantity_usb_charger;
                        $query = "insert into cart(product_name,price,quantity) values ('USB Charger','$total_usb_charger_price','$quantity_usb_charger')";
                        $run = mysqli_query($conn,$query); 
                        $quantity_usb_charger = 0;
                    }
                ?>

                <br>
            </div>

            <div>
                <img src="https://i.imgur.com/wOUQbAr.png" alt="image" onclick="location.href='display_cart.php'">
            </div>
            <input name="logout" type="submit" value="LOGOUT">
            <input name="back" type="submit" value="BACK">
        </form>
    </div>
</body>
</html>
