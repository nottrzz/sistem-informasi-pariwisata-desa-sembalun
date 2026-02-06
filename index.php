<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sembalun Tourism - Wisata Terbaik Di Indonesia</title>
    <!-- Tcd-->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FAI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- GF -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        .hero-bg {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('img/hero.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .section-bg {
            background-color: #f8fafc;
        }
        .card-hover:hover {
            transform: translateY(-10px);
            transition: all 0.3s ease;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .transition-all {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50">
  <?php require "./component/navbar.php"; ?>

   <!-- hero -->
    <section id="home" class="hero-bg pt-24 pb-32 md:pt-32 md:pb-48 h-screen">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto text-center mt-12 text-white">
                <br>
                <br>
                <br>
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Jelajahi Keindahan Desa <span class="text-green-700">Sembalun</span></h1>
                <p class="text-xl mb-10 opacity-90">Temukan pesona alam, budaya, dan pengalaman unik yang hanya ada di Desa Sembalun.</p>
                <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-6">
                    <a href="#destinasi" class="bg-green-700 hover:bg-green-800 text-white px-8 py-4 rounded-full text-lg font-medium transition-all">
                    Lihat Destinasi
                    </a>
                    <a href="#paket" class="bg-transparent lg:px-7 hover:bg-white hover:text-green-700 text-white border-2 border-white px-8 py-4 rounded-full text-lg font-medium transition-all">
                    Lihat Fasilitas
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="py-20 section-bg" id="destinasi">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text4xl font-bold text-gray-800 mb-4">
                    Destinasi <span class="text-green-700">Populer</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Temukan tempat-tempat terbaik yang wajib dikunjungi di Desa Sembalun.</p>
            </div>

            <div class="grid grid-cols-1md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- dest 1 ye -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover transition-all">
                    <div class="h-56 overflow-hidden">
                        <img src="img/rinjani.webp" 
                             alt="Bali" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-800">Gunung Rinjani</h3>
                            <span class="bg-blue-100 text-green-700 text-sm font-medium px-3 py-1 rounded-full">Populer</span>
                        </div>
                        <p class="text-gray-600 mb-4">Pulau dewata dengan pantai menakjubkan, budaya Hindu yang kaya, dan suasana spiritual yang memikat.</p>
                        <div class="flex justify-between text-gray-500 text-sm">
                         
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>


       <section id="paket" class="py-20 bg-white">
        <div class="container mx-auto px-6">
         <div class="text-center mb-16">
            <h1 class="text-4xl text-gray-800 mb-4 font-bold">Akomodasi <span class="text-green-700">& </span>Fasilitas</h1>
            <p class="text-gray-600 mx-auto">Temukan penginapan nyaman dan fasilitas pendukung untuk perjalanan wisata Anda.</p>
         </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-purple-50 to-white rounded-2xl overflow-hidden shadow-xl border border-purple-100 transition-all hover:shadow-2xl">
                    <div class="p-8">
                        <div class="mb-6">
                            <span class="bg-purple-100 text-purple-600 text-sm font-bold px-4 py-2 rounded-full">The bess</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">Penginapan & Homestay</h3>
                        <p class="text-gray-600 mb-6">Tersedia berbagai pilihan homestay dan penginapan dengan suasana khas pedesaan dan udara sejuk pegunungan, cocok untuk wisatawan yang ingin menginap dengan nyaman dekat alam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php
    require "./component/footer.php";
    ?>


    
</body>
</html>