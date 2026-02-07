<?php
include "../db/connect.php";
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Desa Sembalun</title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Chart.js for simple charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar {
            transition: all 0.3s ease;
        }
        .main-content {
            transition: all 0.3s ease;
        }
        .table-row-hover:hover {
            background-color: #f8fafc;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }
        .active-tab {
            background-color: #3b82f6;
            color: white;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Main Container -->
    <div class="flex h-screen">
       <?php require "../component/sidebar.php"; ?>
       
       <div class="main-content flex-1 flex flex-col overflow-hidden">
            <?php require "../component/top-header.php"; ?>

            <div class="max-w-4xl mx-auto mt-10 bg-white rounded-xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Tambah User baru</h2>
                
                <form action="tambah-user.php" method="POST" class="space-y-6">

                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan nama fasilitas" 
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">username</label>
                        <input type="text" name="username" id="nama" placeholder="Masukkan username" 
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" name="password" id="nama" placeholder="Masukkan password" 
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                        <select name="role">
                            <option value="">--default role--</option>
                            <option value="1">admin</option>
                            <option value="0">operator</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-3 rounded-lg shadow-md transition">
                            Tambah Data User
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>


<?php


if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $qwy = mysqli_query($koneksi,"INSERT INTO user(nama,username,password,role) VALUES('$nama','$username','$password','$role')");

    if($qwy){
         echo "
                    <script>
                        alert('BERHASIL menambahkan user baru');
                    </script>
                    ";
        exit;
    }else{
         echo "
                    <script>
                        alert('Gagal Menambahkan data user');
                    </script>
                    ";
    }
}
    


?>