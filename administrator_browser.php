<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Browser</title>
    <link rel="stylesheet" href="style.css">
    <!-- font style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
    if(isset($_POST["administrator_login"])){
        echo '
                <script>
                window.location.href = "administrator_login.php";
                </script>';
    }
    if(isset($_POST["user_log_in"])){
        echo '
                <script>
                window.location.href = "user_log_in.php";
                </script>';
    }
    if(isset($_POST["user_ordering_application"])){
        echo '
                <script>
                window.location.href = "user_ordering_application.php";
                </script>';
    }
    if(isset($_POST["user_browser"])){
        echo '
                <script>
                window.location.href = "user_browser.php";
                </script>';
    }
?>
<div>
    <img src="https://i.imgur.com/ZamKnxw.png" alt="Casan's Footwear Logo" width="400">
    <form action="" method="post">
        <div>
            <img src="https://i.imgur.com/6bUOFzN.png?1" alt="image" width="200" height="200" onclick="location.href='administrator_login.php'"><br>
            <input name="administrator_login" type="submit" value="Administrator Login">
        </div>
        <br>
        <div>
            <img src="https://i.imgur.com/6bUOFzN.png?1" alt="image" width="200" height="200" onclick="location.href='user_log_in.php'"><br>
            <input name="user_log_in" type="submit" value="Customer Login">
        </div>
        <br>
        <div>
            <img src="https://i.imgur.com/6bUOFzN.png?1" alt="image" width="200" height="200" onclick="location.href='user_ordering_application.php'"><br>
            <input name="user_ordering_application" type="submit" value="Admin POS">
        </div>
        <br>
        <div>
            <img src="https://i.imgur.com/6bUOFzN.png?1" alt="image" width="200" height="200" onclick="location.href='user_ordering_application.php'"><br>
            <input name="user_browser" type="submit" value="Customer Browser">
        </div>
    </form>
</div>
</body>
</html>
