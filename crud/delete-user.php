<?php
include "../db/connect.php";

$id = $_GET['id'];

$qw = mysqli_query($koneksi,"DELETE FROM `user` WHERE id_user = $id");

if($qw){
    echo "
    <script>
      alert('berhasil menghapus data user');
      location.href = '../admin/user.php';
    </script>
    ";
}else{
    echo "
    <script>
      alert('Gagal menghapus data user');
      location.href = '../admin/user.php';
    </script>
    ";
}
?>
