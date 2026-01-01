<?php
session_start();
include __DIR__ . '/../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../img_logo/go_it.ico">
    <title>Registrasi</title>
    <link href="../src/output.css" rel="stylesheet">
</head>

<body class="bg-neutral-900 scroll-smooth">

    <main class="h-lvh flex justify-center items-center">

        <form method="POST" action="./register.php" class="bg-blue-600 text-white flex flex-col justify-center items-center py-10 px-14 gap-8 rounded-lg">
            <h1 class="text-2xl font-semibold">Register</h1>
            <!-- input field -->
            <div class="flex flex-col gap-4">
                <!-- input field 1 -->
                <div class="flex flex-col gap-4">
                    <h2 class="text-lg font-medium">Username</h2>
                    <input type="text" name="username" placeholder="Masukkan Username"
                        class="bg-white/80 text-black/90 text-lg text-left w-full py-2 pl-4 pr-12 rounded-md" required />
                </div>
                <!-- input field 2 -->
                <div class="flex flex-col gap-2">
                    <h2 class="text-lg font-medium">Password</h2>
                    <input type="password" name="password" placeholder="*****"
                        class="bg-white/80 text-black/90 text-lg text-left w-full py-2 pl-4 pr-12 rounded-md" required />
                </div>
            </div>
            <div class="flex flex-col gap-3 w-full items-center">
                <button type="submit" name="registrasi" class="bg-white text-blue-600 w-full py-2 px-6 rounded-md hover:cursor-pointer hover:font-semibold
                transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">Register</button>
                <p class="text-sm">Sudah punya akun?
                    <a href="login.php" class="font-bold underline">Login</a>
                </p>
            </div>

            <?php
            // memeriksa btn registrasi telah di tekan(kirim)
            if (isset($_POST['registrasi'])) {
                $username = $_POST['username'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $insert = mysqli_query($koneksi, "INSERT INTO users (username,password,role) VALUES ('$username','$password','user')");

                // $hash_password = password_hash($password, PASSWORD_DEFAULT);
                if ($insert) {
                    // jika insert berhasil , langsung set session
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = "user";
                    
                    header('location: ../user.php');
                    exit();
                }
            }
            ?>

</body>

</html>