 <!-- Sidebar -->
        <div class="sidebar w-64 bg-gray-900 text-white shadow-lg">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-800">
                <div class="flex items-center">
                    <span class="text-2xl font-bold">semb<i class="fas fa-mountain text-green-700"></i>lun</span>
                </div>
                <p class="text-gray-400 text-sm mt-2">Dashboard Admin</p>
            </div>
            
            <!-- Navigation -->
            <nav class="p-4">
                <div class="mb-6">
                    <h3 class="text-gray-400 text-xs uppercase font-bold tracking-wider mb-3">Menu Utama</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="../admin/index.php" id="dashboard-tab" class="flex items-center p-3 rounded-lg text-white">
                                <i class="fas fa-tachometer-alt mr-3"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="../admin/destinasi.php" id="wisata-tab" class="flex items-center p-3 rounded-lg hover:bg-gray-800 transition-all">
                                <i class="fas fa-map-marked-alt mr-3"></i>
                                <span>Manage Destinasi</span>
                            </a>
                        </li>
                        <li>
                            <a href="../admin/fasilitas.php" id="wisata-tab" class="flex items-center p-3 rounded-lg hover:bg-gray-800 transition-all">
                                <i class="fas fa-hotel mr-3"></i>
                                <span>Manage Fasilitas</span>
                            </a>
                        </li>
                        <li>
                            <a href="../admin/user.php" id="users-tab" class="flex items-center p-3 rounded-lg hover:bg-gray-800 transition-all">
                                <i class="fas fa-users mr-3"></i>
                                <span>Manage Users</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="mt-5 pt-6 border-t border-gray-800">
                    <div class="flex items-center p-3">
                        <div class="w-10 h-10 rounded-full bg-blue-500 p-5 flex items-center justify-center mr-3">
                            <span class="font-bold">A</span>
                        </div>
                        <div>
                            <p class="font-medium">Admin</p>
                            <p class="text-gray-400 text-sm">ochy</p>
                        </div>
                    </div>
                    <a href="../function.php/logout.php" onclick="return confirm('apa anda yakin ingin keluar?')" class="flex items-center p-3 mt-2 rounded-lg hover:bg-gray-800 transition-all">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </nav>
        </div>