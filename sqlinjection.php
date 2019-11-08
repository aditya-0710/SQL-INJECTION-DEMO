<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'user_sqlinj';

$connect = @mysqli_connect($db_host, $db_username, $db_password, $db_database) or die('Connection Error:' . mysqli_connect_error());

$query = "SELECT * FROM UserDetails WHERE UserID = '" . $_POST[form_username] . "'";

$result = @mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Login Successful. Welcome to the Bank Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <h1>Bank Details</h1>

        <table border=2>
            <tr>
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
            </tr>
            }
        </table>

        <a href="Login.html"> LOGOUT </a>
    </body>
</html>      