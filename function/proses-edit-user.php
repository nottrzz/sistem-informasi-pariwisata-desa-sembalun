<?php
include "../db/connect.php";

    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    $id = $_GET['id'];

    if(!empty($nama) && $desk){
        $qwr = mysqli_query($koneksi,"UPDATE user SET nama='$nama',username='$username',password='$pass',role='$role' WHERE id_user = '$id' ");
    }


    if($qwr){
        echo "
        <script> alert('Berhasil Update Data'); location.href = '../crud/edit-user.php?id=$id' </script>
        ";
    }else{
            echo "
        <script> alert('Gagalll Update Data') </script>
        ";
    }
?>