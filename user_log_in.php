<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php

        $username = "";
        $password = "";

        $conn = new mysqli('localhost','root','','employee');
        $sql = "SELECT * FROM customer";    
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();

        $check_username = "";
        $check_password = "";

        //if user doesnt have an account and want to register
        if(isset($_POST["sign_up"])){
            echo '
                <script>
                window.location.href = "user_sign_up.php";
                </script>';
        }

        //if user have account
        if(isset($_POST["log_in"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $check_username = $row["username"];

            //check if username is valid in the database
            $sql = "SELECT * FROM customer WHERE username = '$username'";    
            $result = mysqli_query($conn, $sql);
            $rowusernamevalid = $result->fetch_assoc();

            //if username is valid
            if($rowusernamevalid["username"] == $username){
                //check if password is valid in the database for the username that have been inputted
                $sql = "SELECT * FROM customer WHERE username = '$username'";    
                $result = mysqli_query($conn, $sql);
                $rowpasswordvalid = $result->fetch_assoc();
                
                //if password for the username is same
                if($rowpasswordvalid["password"] == $password){
                    echo '
                    <script>
                    alert("Login Successfully");
                    window.location.href = "user_browser.php";
                    </script>';
                }
                //if password dosnt match with the valid username
                else
                    echo '
                    <script>
                    alert("Password doesnt match with the username");
                    window.location.href = "user_log_in.php";
                    </script>';
            }
            // if username is invalid
            else
            echo '
            <script>
            alert("Username Doesnt Exist");
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
        <div class="center_form">
            <img src="https://i.imgur.com/ZamKnxw.png" alt="Casan's Footwear Logo" width="400">
            <div class="subform">
                <form action="" method="post">
                    <!--Get username -->
                    <label for="username">Username:</label>
                    <input type="text" name="username" value="<?php $username = readline() ;?>"><br>
                    <!--Get password -->
                    <label for="password">Password:</label>
                    <input type="password" name="password" value="<?php $password = readline();?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                    title="8 or more Character, Atleast 1 Capital Letter, Atleast 1 Special Character, Atleast 1 Number">><br>
                    <br>
                    <!--Log In button -->
                    <input name="log_in" type="submit" value="Log In" id="big_button">
                    <hr>
                    <!--Sign up -->
                    <div>
                        <label for="sign_up">Don't have an account?</label>
                        <input name="sign_up" type="submit" value="Sign Up">
                        <input name="back" type="submit" value="Back">
                    </div>
                    
                </form>
            </div>
        </div>
    </body>
</html>
