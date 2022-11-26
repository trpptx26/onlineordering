<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="eps.css">
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

    $conn = new mysqli('localhost','root','','employee');
    $sql = "SELECT * FROM customer";    
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();

    $check_password = "";

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

        if($password != $confirm_password){
            echo '
            <script>
            alert("Password Must be the same");
            window.location.href = "register.php";
            </script>';
        }
        if($password == $confirm_password){
            @$check_password = $row["username"];
            if($check_password == $username){
                echo '
                <script>
                alert("Username Already Exist");
                window.location.href = "register.php";
                </script>';
                }
                else
                $query = "insert into customer(email,first_name,last_name,birthday,username,password) values ('$email' , '$first_name','$last_name','$birthday','$username','$password')";
                $run = mysqli_query($conn,$query); 
                echo '<script>alert("Register Successfully")</script>';
        }
    }

    if(isset($_POST["log_in"])){
        echo '
                <script>
                window.location.href = "Login.php";
                </script>';
    }

    ?>

    <div class="subform">
        <form action="" method="post">

            <label for="email">E-mail:</label>
            <input type="text" name="email" value="<?php $email = readline();?>"><br>

            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="<?php $first_name = readline();?>"><br>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="<?php $last_name = readline();?>"><br>

            <label for="birthday">Birthday:</label>
            <input type="date" name="birthday" value="<?php $birthday = readline();?>"><br>

            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php $username = readline();?>"><br>

            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php $password = readline();?>"><br>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" value="<?php $confirm_password = readline();?>"><br>

            <br>

            <input name="sign_up" type="submit" value="Sign Up">

            <div>
                <label for="log_in">Already have an account?</label>
                <input name="log_in" type="submit" value="Log In">
                    <!--can also be just a button with link-->
            </div>
        </form>
    </div>
</body>
</html>