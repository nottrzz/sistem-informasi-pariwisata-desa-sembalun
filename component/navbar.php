    <nav class="fixed w-full bg-white shadow-lg z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-gray-800">Semb<i class="fas fa-mountain text-3xl text-green-700"></i>lun</span>
                </div>
                
                <div class="hidden md:flex space-x-8">
                    <a href="../index.php" class="text-gray-700 hover:text-green-700 font-medium transition-all">Home</a>
                    <a href="#destinasi" class="text-gray-700 hover:text-green-700 font-medium transition-all">Destinasi</a>
                    <a href="#paket" class="text-gray-700 hover:text-green-700 font-medium transition-all">Fasilitas</a>
                    <a href="#kontak" class="text-gray-700 hover:text-green-700 font-medium transition-all">Kontak</a>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="auth/login.php" class="bg-green-700 hover:bg-green-800 hidden md:block text-white px-6 py-2 rounded-full font-medium transition-all">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                    <button id="mobile-menu-button" class="md:hidden text-gray-700">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-4">
                    <a href="#home" class="text-gray-700 hover:text-green-700 font-medium">Home</a>
                    <a href="#destinasi" class="text-gray-700 hover:text-green-700font-medium">Destinasi</a>
                    <a href="#paket" class="text-gray-700 hover:text-green-700 font-medium">Fasilitas</a>
                    <a href="#kontak" class="text-gray-700 hover:text-green-700 font-medium">Kontak</a>
                      <a href="login.html" class="bg-green-700 hover:text-green-800 text-white px-6 py-2 rounded-full font-medium transition-all">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                </div>
            </div>
        </div>
    </nav>
 <!--js tipis tipis  -->
 <script>
      document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
 </script>
