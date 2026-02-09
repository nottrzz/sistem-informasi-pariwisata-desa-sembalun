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
    <div class="flex min-h-screen">
       <?php require "../component/sidebar.php"; ?>
       
       <div class="main-content flex-1 flex flex-col overflow-hidden">
            <?php require "../component/top-header.php";
            $id = $_GET['id'];
            $qw = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$id'");

            if($yy = mysqli_fetch_assoc($qw)):
            ?>

            <div class="max-w-7xl mx-auto mt-10 bg-white rounded-xl shadow-lg p-8 mb-9">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">---- Edit Fasilitas desa sembalun ----</h2>
                
                <form action="../function/proses-edit-user.php?id=<?= $yy['id_user'] ?>" method="POST" enctype="multipart/form-data" class="space-y-6">

                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2" >Nama User</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan nama " value="<?= $yy['nama'] ?>"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2" >username</label>
                        <input type="text" name="username" id="nama" placeholder="Masukkan username" value="<?= $yy['username'] ?>"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2" >password</label>
                        <input type="text" name="password" id="nama" placeholder="Masukkan password" value="<?= $yy['password'] ?>"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-2" >role/level</label>
                        <select name="role" id="">
                            <option value="<?= $yy['role'] ?>"><?= $yy['role'] ?></option>
                            <option value="admin">admin</option>
                            <option value="operator">operator</option>
                        </select>
                    </div>

                    <?php
                    endif;
                    ?>

                    <div class="text-center">
                        <button type="submit" name="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-3 rounded-lg shadow-md transition">
                            Simpan Hasil Edit
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>


