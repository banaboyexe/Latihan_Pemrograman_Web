<?php
require "functions.php";

if( isset($_POST["add"]) ){
    if(addMahasiswa($_POST) > 0) {
        echo "<script>
            alert('Successfully added student');
            document.location.href = 'index.php';
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
    <title>Add Student</title>
</head>
<body>
    <h1>Add Student on Here!</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label for="nama">Nama Lengkap</label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="nama" id="nama" size="50">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="npm">Npm</label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="npm" id="npm" size="50">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="email" id="email" size="50">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="gambar">Gambar</label>
                </td>
                <td>:</td>
                <td><input type="file" name="gambar" id="gambar"></td>
            </tr>

            <tr>
                <td>
                    <button type="submit" name="add">Submit</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>