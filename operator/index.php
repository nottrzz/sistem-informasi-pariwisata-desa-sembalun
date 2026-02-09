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
       <?php require "../component/sidebar-operator.php"; ?>
       
       <div class="main-content flex-1 flex flex-col overflow-hidden">
            <?php require "../component/top-header-operator.php"; ?>


            
            <main class="flex-1 overflow-y-auto p-6">
                <!-- Dashboard Content (Default) -->
                <div id="dashboard-content" class="content-section">
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <div class="stat-card bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-gray-500 text-sm">Total Destinasi</p>
                                    <?php
                                    include "../db/connect.php";

                                $q = mysqli_query($koneksi, "
                                                            SELECT
                                                                (SELECT COUNT(*) FROM destinasi) AS total_destinasi,
                                                                (SELECT COUNT(*) FROM user) AS total_user,
                                                                (SELECT COUNT(*) FROM fasilitas) AS total_fasilitas
                                                            ");
                                    $ye = mysqli_fetch_assoc($q);
                                    ?>
                                    <p class="text-3xl font-bold text-gray-800 mt-2"><?php echo $ye['total_destinasi'] ?></p>
                                </div>
                                <div class="bg-blue-100 p-3 rounded-lg">
                                    <i class="fas fa-map-marked-alt text-blue-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-green-600 text-sm font-medium">
                                    <i class="fas fa-arrow-up mr-1"></i> 12% dari bulan lalu
                                </p>
                            </div>
                        </div>
                        
                        <div class="stat-card bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-gray-500 text-sm">Fasilitas</p>
                                    <p class="text-3xl font-bold text-gray-800 mt-2"><?php echo $ye['total_fasilitas'] ?></p>
                                </div>
                                <div class="bg-purple-100 p-3 rounded-lg">
                                    <i class="fas fa-hotel text-purple-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-green-600 text-sm font-medium">
                                    <i class="fas fa-arrow-up mr-1"></i> 15% dari bulan lalu
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- Manage Wisata Content (Hidden by default) -->
                <div id="wisata-content" class="content-section hidden">
                    <div class="mb-6 flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-gray-800">Manage Data Wisata</h2>
                        <button id="add-wisata-btn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium flex items-center">
                            <i class="fas fa-plus mr-2"></i> Tambah Wisata
                        </button>
                    </div>
                    
                    <!-- Filter & Search -->
                    <div class="bg-white rounded-xl shadow-md p-4 mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Cari Wisata</label>
                                <input type="text" id="search-wisata" placeholder="Nama wisata, lokasi..." 
                                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                                <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Semua Kategori</option>
                                    <option value="pantai">Pantai</option>
                                    <option value="gunung">Gunung</option>
                                    <option value="budaya">Budaya</option>
                                    <option value="kuliner">Kuliner</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Semua Status</option>
                                    <option value="active">Aktif</option>
                                    <option value="inactive">Non-Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Wisata Table -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Wisata</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200" id="wisata-table-body">
                                    <!-- Data wisata akan dimuat di sini via JS -->
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                            <div class="text-sm text-gray-700">
                                Menampilkan <span id="wisata-start">1</span> - <span id="wisata-end">6</span> dari <span id="wisata-total">24</span> wisata
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm disabled:opacity-50" id="wisata-prev" disabled>Sebelumnya</button>
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm bg-blue-600 text-white">1</button>
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm">2</button>
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm">3</button>
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm">4</button>
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm" id="wisata-next">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Manage Users Content (Hidden by default) -->
                <div id="users-content" class="content-section hidden">
                    <div class="mb-6 flex justify-between items-center">
                        <h2 class="text-2xl font-bold text-gray-800">Manage Data Users</h2>
                        <button id="add-user-btn" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium flex items-center">
                            <i class="fas fa-user-plus mr-2"></i> Tambah User
                        </button>
                    </div>
                    
                    <!-- Filter & Search -->
                    <div class="bg-white rounded-xl shadow-md p-4 mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Cari User</label>
                                <input type="text" id="search-user" placeholder="Nama, email..." 
                                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                                <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Semua Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Semua Status</option>
                                    <option value="active">Aktif</option>
                                    <option value="inactive">Non-Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Users Table -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Daftar</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                            <div class="text-sm text-gray-700">
                                Menampilkan <span id="users-start">1</span> - <span id="users-end">6</span> dari <span id="users-total">1,254</span> users
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm disabled:opacity-50" id="users-prev" disabled>Sebelumnya</button>
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm bg-blue-600 text-white">1</button>
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm">2</button>
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm">3</button>
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm">4</button>
                                <button class="px-3 py-1 border border-gray-300 rounded text-sm" id="users-next">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


</body>
</html>