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
            $qw = mysqli_query($koneksi,"SELECT * FROM destinasi WHERE id_destinasi = '$id'");

            if($yy = mysqli_fetch_assoc($qw)):
            ?>

            <div class="max-w-4xl mx-auto mt-10 bg-white rounded-xl shadow-lg p-8 mb-9">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Destinasi</h2>
                
                <form action="../function/proses-edit-destinasi.php?id=<?= $yy['id_destinasi'] ?>" method="POST" enctype="multipart/form-data" class="space-y-6">

                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2" >Nama Destinasi</label>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan nama destinasi" value="<?= $yy['nama_destinasi'] ?>"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="5" placeholder="Masukkan deskripsi destinasi"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"><?= $yy['keterangan'] ?></textarea>
                    </div>

                    <div>
                        <img src="../img/<?= $yy['gambar'] ?>" alt="">
                        <label for="gambar" class="block text-sm font-medium text-gray-700 mb-2 mt-2">Ganti Gambar</label>
                        <input type="file" name="gambar" id="gambar" 
                            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>

                    <?php
                    endif;
                    ?>

                    <div class="text-center">
                        <button type="submit" name="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-3 rounded-lg shadow-md transition">
                            Simpan Destinasi
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>


