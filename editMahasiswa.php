<?php
require "functions.php";

$id = $_GET["id"];
$mahasiswa = query("SELECT * FROM mahasiswa WHERE idmahasiswa=$id")[0];

if( isset($_POST["edit"]) ){
    if(editMahasiswa($_POST) > 0) {
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
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student on Here!</h1>

    <a href="index.php">&lt; Back</a><br>

    <form action="" method="post" enctype="multipart/form-data">

        <input type="hidden" name="gambarLama" value="<?= $mahasiswa["gambar"]; ?>">
        <input type="hidden" name="id" value="<?= $mahasiswa["idmahasiswa"]; ?>">

        <table>
            <tr>
                <td>
                    <label for="nama">Nama Lengkap</label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="nama" id="nama" size="50" value="<?= $mahasiswa["nama"]; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="npm">Npm</label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="npm" id="npm" size="50" value="<?= $mahasiswa["npm"]; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="email" id="email" size="50" value="<?= $mahasiswa["email"]; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="gambar">Gambar</label>
                </td>
                <td>:</td>
                <td>
                    <input type="file" name="gambar" id="gambar" class="gambar">
                    <img src="img/<?= $mahasiswa["gambar"]; ?>" width="50">
                </td>
            </tr>

            <tr>
                <td>
                    <button type="submit" name="edit">Submit</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>