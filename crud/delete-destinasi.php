<?php
include "../db/connect.php";

$id = $_GET['id'];

$ambildlu = mysqli_query($koneksi,"SELECT * FROM destinasi WHERE id_destinasi = $id");
$arr = mysqli_fetch_assoc($ambildlu);
$target = "../img/" . $arr['gambar'];

if(file_exists($target) && is_file($target)){
    unlink($target);

    $qw = mysqli_query($koneksi, "DELETE FROM destinasi WHERE id_destinasi = $id");

    if($qw){
        echo "
        <script> alert('berhasil menghapus destinasi') </script>
        ";
    }else{
        echo "
        <script> alert('berhasil menghapus destinasi') </script>
        ";
    }
}

?>