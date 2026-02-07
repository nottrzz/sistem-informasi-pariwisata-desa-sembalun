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
    <!-- Sidebar -->
    <?php require "../component/sidebar.php"; ?>

    <!-- Main Content -->
    <div class="main-content flex-1 flex flex-col overflow-hidden">
        <?php require "../component/top-header.php"; ?>

        <div class="overflow-x-auto mt-20 px-8 md:px-8">

            <!-- Button Tambah -->
            <button class="bg-green-700 hover:bg-green-900 transition text-white font-bold px-8 py-3 rounded-2xl shadow-md my-5">
              <a href="../crud/tambah-fasilitas.php">Tambah Fasilitas</a>  
            </button>

            <!-- Table -->
            <div class="overflow-hidden rounded-lg shadow-md">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-green-700 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Nama Fasilitas</th>
                            <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Keterangan</th>
                            <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        include "../db/connect.php";
                        $no = 1;
                        
                        $ambildata= mysqli_query($koneksi,"SELECT * FROM fasilitas order by id_fasilitas DESC");

                        while($res = $tampilkan = mysqli_fetch_assoc($ambildata)):
                        ?>
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4 whitespace-nowrap"><?= $no++ ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= $res['nama_fasilitas'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap max-w-md truncate"><?= $res['keterangan'] ?></td>
                            <td class="px-6 py-4 flex gap-4 text-xl">
                                <a href="edit.php?id=1" class="text-blue-600 hover:text-blue-800 transition">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="delete.php?id=1" onclick="return confirm('Apakah anda yakin mau hapus data ini?')" class="text-red-600 hover:text-red-800 transition">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile;
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>