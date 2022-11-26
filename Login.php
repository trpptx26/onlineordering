<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="eps.css">
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

    if(isset($_POST["sign_up"])){
        echo '
            <script>
            window.location.href = "register.php";
            </script>';
    }

    if(isset($_POST["log_in"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $check_username = $row["username"];
        $check_password = $row["password"];
        if($check_username == $username){
            if($check_password == $password){
                echo '
                <script>
                alert("Login Successfully");
                window.location.href = "ordering_application.php";
                </script>';
            }
            else
                echo '
                <script>
                alert("Password doesnt match with the username");
                window.location.href = "Login.php";
                </script>';
        }
        else
           echo '
           <script>
           alert("Username Doesnt Exist");
           window.location.href = "Login.php";
           </script>';
    }

    ?>

    <div class="subform">
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php $username = readline() ;?>"><br>

            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php $password = readline();?>"><br>
            <input name="log_in" type="submit" value="Log In">

            <div class="flex_container_row">
                <p>Don't have an account?</p>
                <div>
                    <input name="sign_up" type="submit" value="Sign Up">
                    <!--can also be just a button with link-->
                </div>
            </div>
        </form>
    </div>
</body>
</html>