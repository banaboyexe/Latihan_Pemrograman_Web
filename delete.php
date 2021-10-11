<?php
require "functions.php";

$id = $_GET["id"];

if(delete($id) > 0) {
    echo "<script>
            confirm('Yakin dihapus?');
        </script>";
        header("Location: index.php");
}
?>