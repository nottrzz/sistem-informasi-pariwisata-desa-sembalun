<?php
include "../db/connect.php";
$id = $_GET['id'];
$qw = mysqli_query($koneksi,"DELETE FROM fasilitas WHERE id_fasilitas = $id");

if($qw){
    echo "
    <script> alert('berhasil menghapus fasilitas'); location.href= ../admin/fasilitas.php </script>
    ";
}else{
      echo "
    <script> alert('Gagal menghapus fasilitas'); location.href= ../admin/fasilitas.php </script>
    ";
}


?>