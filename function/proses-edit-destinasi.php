<?php
include "../db/connect.php";

    $nama = $_POST['nama'];
    $desk = $_POST['deskripsi'];
    $foto = $_FILES['gambar'];

    $id = $_GET['id'];

    if(!empty($foto['name'])){
        $nama_sementara = $foto['tmp_name'];
        $nama_asli = $foto['name'];
        $pth = "../img/" . $nama_asli;

        move_uploaded_file($nama_sementara,$pth);

        $qwr = mysqli_query($koneksi,"UPDATE destinasi SET nama_destinasi='$nama',keterangan='$desk',gambar='$nama_asli' WHERE id_destinasi = '$id' ");

    }else{
        $qwr = mysqli_query($koneksi,"UPDATE destinasi SET nama_destinasi='$nama',keterangan='$desk' WHERE id_destinasi = '$id' ");

    }


    if($qwr){
        echo "
        <script> alert('Berhasil Update Data'); location.href = '../crud/edit-destinasi.php?id=$id' </script>
        ";
    }else{
            echo "
        <script> alert('Gagalll Update Data') </script>
        ";
    }


   


?>