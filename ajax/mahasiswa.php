<?php
require "../functions.php";

$keyword = $_GET["keyword"];

$mahasiswa = query("SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR npm LIKE '%$keyword%' OR email LIKE '%$keyword%'");
?>
<div id="container">
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
    </div>