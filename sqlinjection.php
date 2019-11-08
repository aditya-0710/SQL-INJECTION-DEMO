<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'user_sqlinj';

$connect = @mysqli_connect($db_host, $db_username, $db_password, $db_database) or die('Connection Error:' . mysqli_connect_error());

$query = "SELECT * FROM UserDetails WHERE UserID = '" . $_POST[form_username] . "' AND Password = '" . $_POST[form_password] . "'";

$result = @mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Login Successful. Welcome to the Bank Details</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="login.css">
    </head>

    <body style="font-family: 'Ubuntu', sans-serif">

        <div class="main">
        <h1>Bank Details</h1>

        <table>
            <tr >
                <th>UserID</th>
                <th>Password</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>IBAN</th>
                <th>OTP</th>
            </tr>

            <?php 
            while($row = mysqli_fetch_array($result))
            {
            ?>
            <tr>
                <td><?php echo $row['UserID']; ?></td>
                <td><?php echo $row['Password']; ?></td>
                <td><?php echo $row['FirstName']; ?></td>
                <td><?php echo $row['LastName']; ?></td>
                <td><?php echo $row['IBAN']; ?></td>
                <td><?php echo $row['OTP']; ?></td>
            </tr>
            <?php
            }
            ?>
        </table>

        <a style="color:blue"  href="Login.html"> LOGOUT </a>
        </div>
    </body>
</html>     