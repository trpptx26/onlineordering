<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHECK OUTn</title>
    <link rel="stylesheet" href="eps.css">
    </head>
    <body>
        <?php
            $conn = new mysqli('localhost','root','','employee');
            $sql = "SELECT * FROM customer";    
            $result = mysqli_query($conn, $sql);
            $row = $result->fetch_assoc();
        ?>
        <div class="subform">
            <form action="" method="post">
                <div>
                    <label for="total_bills">Total Bills:</label>
                    <input type="text" name="total_bills" value="<?php echo($total_bills);?>"><br>
                </div>
            </form>
        </div>
    </body>
</html>