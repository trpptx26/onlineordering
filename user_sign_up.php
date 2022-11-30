<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php

        $email = "";
        $first_name = "";
        $last_name = "";
        $birthday = "";
        $username = "";
        $password = "";
        $confirm_password = "";
        $not_a_robot = "";

        //get customer database
        $conn = new mysqli('localhost','root','','employee');
        $sql = "SELECT * FROM customer";    
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();

        $check_password = "";

        //if user click Sign Up button
        if(isset($_POST["sign_up"])){
            $email = $_POST["email"];
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $birthday = $_POST["birthday"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];

            $conn = new mysqli('localhost','root','','employee');
            $sql = "SELECT * FROM customer";    
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();

            //if password and confirm password is not match
            if($password != $confirm_password){
                echo '
                <script>
                alert("Password Must be the same");
                window.location.href = "user_sign_up.php";
                </script>';
            }
            //if password and confirm password is match
            if($password == $confirm_password){
                
                //check if username that inputted in the form is already in the database
                $username = $_POST["username"];
                $sql = "SELECT * FROM customer WHERE username = '$username'";    
                $result = mysqli_query($conn, $sql);
                $rowusernamevalid = $result->fetch_assoc();

                //if the inputted username is already in the database
                if($rowusernamevalid["username"] == $username){
                    echo '
                    <script>
                    alert("Username Already Exist");
                    window.location.href = "user_sign_up.php";
                    </script>';    
                }
                //if the inputted username is not already in the database
                else
                    $query = "insert into customer(email,first_name,last_name,birthday,username,password) values ('$email' , '$first_name','$last_name','$birthday','$username','$password')";
                    $run = mysqli_query($conn,$query); 
                    echo '<script>alert("Register Successfully"); window.location.href = "user_log_in.php";</script>';
            }
        }

        // if user click Log In button
        if(isset($_POST["log_in"])){
            echo '
                    <script>
                    window.location.href = "user_log_in.php";
                    </script>';
        }

        ?>
        <div class="center_form">
            <!-- Logo of the business-->
            <img src="https://i.imgur.com/1uAgdNg.png" alt="Casan's Footwear Logo" width="400">
            <div class="subform">
                <form action="" method="post">
                    <!-- User Input for email -->
                    <label for="email">E-mail:</label>
                    <input type="text" name="email" value="<?php $email = readline();?>"><br>
                    <!-- User Input for first name -->
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" value="<?php $first_name = readline();?>"><br>
                    <!-- User Input for last name -->
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" value="<?php $last_name = readline();?>"><br>
                    <!-- User Input for birthday -->
                    <label for="birthday">Birthday:</label>
                    <input type="date" name="birthday" value="<?php $birthday = readline();?>"><br>
                    <!-- User Input for username -->
                    <label for="username">Username:</label>
                    <input type="text" name="username" value="<?php $username = readline();?>"><br>
                    <!-- User Input for password -->
                    <label for="password">Password:</label>
                    <input type="password" name="password" value="<?php $password = readline();?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="8 or more Character, Atleast 1 Capital Letter, Atleast 1 Special Character, Atleast 1 Number"><br>
                    <!-- User Input for confirm password -->
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" name="confirm_password" value="<?php $confirm_password = readline();?>"><br>

                    <br>
                    <!-- button for sign up -->
                    <input name="sign_up" type="submit" value="Sign Up" id="big_button">
                    <hr>
                    <!-- User Input for log in-->
                    <div>
                        <label for="log_in">Already have an account?</label>
                        <input name="log_in" type="submit" value="Log In">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
