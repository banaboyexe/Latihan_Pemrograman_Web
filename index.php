<?php
require "functions.php";

$mahasiswa = query("SELECT * FROM mahasiswa");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <a href="logout.php">Log Out</a><br><br>

    <form action="" method="post">
        <input type="text" name="keyword" id="keyword" placeholder="Ketikan disini.." autocomplete="off">
        <button type="submit" name="search" id="search-button">Search</button>
    </form>
    <br>
    <a href="addmahasiswa.php">Add Student</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Email</th>
            <th>Foto</th>
            <th>Action</th>
        </tr>

        <?php $i = 1 ?>
        <?php foreach($mahasiswa as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?php echo $row["nama"]; ?></td>
            <td><?php echo $row["npm"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td>
                <img src="img/<?php echo $row["gambar"]; ?>" width="50">
            </td>
            <td>
                <a href="editMahasiswa.php?id=<?php echo $row["idmahasiswa"]; ?>">Edit</a> |
                <a href="delete.php?id=<?php echo $row["idmahasiswa"]; ?>">Delete</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>