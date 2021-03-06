<?php
require "functions.php";

if( isset($_POST["register"]) ) {
    if(register($_POST) > 0) {
        echo "<script>
            alert('Successfully create account');
        </script>";
    } else {
        echo "<script>
            alert('Failed to add student');
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Register your account now!</h1>

    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="username">Username</label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="username" id="username" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password</label>
                </td>
                <td>:</td>
                <td>
                    <input type="password" name="password" id="password" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password2">Confirm Your Password</label>
                </td>
                <td>:</td>
                <td>
                    <input type="password" name="password2" id="password2" required>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="register">Register</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>