<?php
session_start();

if(isset($_SESSION["login"])){
    header("Location: index.php");
}
require "functions.php";

if(isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Cek username
    $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) == 1){
        // Cek validasi password
        if(password_verify($password, $row["password"])){
            // Buat session
            $_SESSION["login"] = true;

            header('Location: index.php');
            exit;
        } 
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login your account in here!</h1>

    <form action="" method="post">
        <table>
            <?php if(isset($error)) : ?>
                <p style="color: red;"><i>Username atau password kamu salah</i></p>
            <?php endif; ?>
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
                    <button type="submit" name="login">Login</button>
                </td>
            </tr>
        </table>
</body>
</html>