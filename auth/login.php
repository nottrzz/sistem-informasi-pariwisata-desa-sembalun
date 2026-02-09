<?php
session_start();
require "../db/connect.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $ambildlu = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password = '$password'");

    $cekrow = mysqli_num_rows($ambildlu);
    if($cekrow > 0 ){
        $fetch = mysqli_fetch_assoc($ambildlu);

        if($fetch['role'] == 1){
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 1;
            echo "
            <script> alert('berhasil login dan akan di arahkan ke halaman dashboard admin'); location.href = '../admin/index.php' </script>
            ";
        }elseif($fetch['role'] == 0){
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 0;
            echo "
            <script> alert('berhasil login dan akan di arahkan ke halaman dashboard operator'); location.href = '../operator/index.php' </script>
            ";
        }else{
               echo "
            <script> alert('username atau password salah!');</script>
            ";
        }
    }else{
         echo "
            <script> alert('username atau password salah!');</script>
            ";
    }

}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Desa Sembalun</title>
    <!-- tcsd -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- fa -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- gf -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        .login-to-agama-islam {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('../img/rinjani.webp');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body class="bg-gray-50">

<?php require "../component/navbar.php"; ?>

<section class="login-to-agama-islam min-h-screen flex items-center justify-center py-12">
        <div class="container mx-auto px-6">
            <div class="max-w-md mx-auto">
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                    <div class="bg-green-700 p-8 text-center text-white">
                        <h1 class="text-3xl font-bold mb-2">Selamat Datang</h1>
                        <p class="opacity-90">Login dlu ye!</p>
                    </div>
                    
                    <div class="p-8">
                        <form id="loginForm" method="post">
                            <div class="mb-6">
                                <label for="username" class="block text-gray-700 font-medium mb-2">
                                    Username
                                </label>
                                <input type="text" name="username" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent"
                                       placeholder="Enter Your Username" required>
                            </div>
                            
                            <div class="mb-6">
                                <label for="password" name="password" class="block text-gray-700 font-medium mb-2">
                                 Password
                                </label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-700 focus:border-transparent"
                                           placeholder="Masukkan password" required>
                                </div>
                            </div>
                            <button name="login" type="submit" class="w-full bg-gradient-to-r from-green-700 to-green-800 hover:from-green-700 hover:to-green-900 text-white py-3 rounded-lg font-medium text-lg transition-all shadow-lg">
                                <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                            </button>
                            
                            <div id="login-error" class="mt-4 p-3 bg-red-50 text-red-700 rounded-lg hidden text-center">
                                <i class="fas fa-exclamation-circle mr-2"></i>
                                <span id="error-message"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>