<?php
// Koneksikan dengan database
$db = mysqli_connect("localhost", "root", "", "latihanmhs");

// query-kan database
function query($query){
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    
    return $rows;
}

function addMahasiswa($data){
    global $db;
    
    $nama = htmlspecialchars($data["nama"]);
    $npm = htmlspecialchars($data["npm"]);
    $email = htmlspecialchars($data["email"]);

    $gambar = upload();
    if ( !$gambar ) {
        return false;
    }

    // Cek, Jika npm sudah terdaftar, jangan masukan ke database
    $query = mysqli_query($db, "SELECT npm FROM mahasiswa WHERE npm = '$npm'");
    if(mysqli_fetch_assoc($query)) {
        echo "<script>
        alert('NPM sudah terdaftar');
        </script>";
        return false;
    }

    // ambil data dan masukan kedalam database
    mysqli_query($db, "INSERT INTO mahasiswa VALUES ('','$nama','$npm','$email','$gambar')");

    return mysqli_affected_rows($db);
}

function upload(){

    $namaGambar = $_FILES["gambar"]["name"];
    $ukGambar = $_FILES["gambar"]["size"];
    $tmpGambar = $_FILES["gambar"]["tmp_name"];
    $errorGambar = $_FILES["gambar"]["error"];

    // Cek, apakah ada file yang diupload?
    if($errorGambar === 4) {
        echo "<script>
        alert('Kamu belum upload gambar!');
        </script>";
        return false;
    }

    // Cek apakah yang diupload gambar?
    $gambarValid = ["jpg", "png", "jpeg"];
    $eksGambar = explode(".", $namaGambar);
    $eksGambar = strtolower(end($eksGambar));
    if( !in_array($eksGambar, $gambarValid)){
        echo "<script>
            alert('Yang kamu upload bukan gambar');
        </script>";
        return false;
    }

    // Cek ukuran gambar
    if($ukGambar > 2000000) {
        echo "<script>
            alert('Ukuran gambar yang kamu masukan terlalu besar');
        </script>";
        return false;
    }

    // Upload Gambar
    // Generate nama gambar baru
    $gambarBaru = uniqid();
    $gambarBaru .= ".";
    $gambarBaru .= $eksGambar;
    move_uploaded_file($tmpGambar, "img/" . $gambarBaru);

    return $gambarBaru;
}

function delete($id){
    global $db;
    mysqli_query($db, "DELETE FROM mahasiswa WHERE idmahasiswa = '$id'");
    return mysqli_affected_rows($db);
}

function editMahasiswa($data){
    global $db;
    
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $npm = htmlspecialchars($data["npm"]);
    $email = htmlspecialchars($data["email"]);
    $gambarLama = $data["gambarLama"];

    // Cek, apakah gambar diubah?
    if($_FILES["gambar"]["error"] === 4){
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // ambil data dan masukan kedalam database
    $query = "UPDATE mahasiswa SET nama ='$nama', npm = '$npm', email = '$email', gambar = '$gambar' WHERE idmahasiswa = $id";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function register($data) {
    // koneksikan dengan database
    global $db;

    // Tangkap semua key yang telah diketikan user
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);

    // Cek username sudah terdaftar atau belum
    $result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username telah terdaftar');
            </script>";
        return false;
    }

    // Konfirmasikan password
    if($password !== $password2) {
        echo "<script>
            alert('Konfirmasi password kamu salah');
            </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Jika lolos, masukan username dan pw ke database
    mysqli_query($db, "INSERT INTO users VALUES ('','$username','$password')");

    return mysqli_affected_rows($db);
}

function search($keyword){
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR npm LIKE '%$keyword%' OR email LIKE '%$keyword%'";

    return query($query);
}
?>