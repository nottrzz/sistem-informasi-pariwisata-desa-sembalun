<?php
include "../db/connect.php";

    $nama = $_POST['nama'];
    $desk = $_POST['deskripsi'];

    $id = $_GET['id'];

    if(!empty($nama) && $desk){
        $qwr = mysqli_query($koneksi,"UPDATE fasilitas SET nama_fasilitas='$nama',keterangan='$desk' WHERE id_fasilitas = '$id' ");
    }


    if($qwr){
        echo "
        <script> alert('Berhasil Update Data'); location.href = '../crud/edit-fasilitas.php?id=$id' </script>
        ";
    }else{
            echo "
        <script> alert('Gagalll Update Data') </script>
        ";
    }


   


?>