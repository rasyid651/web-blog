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
    <title>Login</title>
    <link href= "../src/output.css" rel="stylesheet">
</head>
<body class="bg-neutral-900 scroll-smooth">

    <main class="h-lvh flex justify-center items-center">

        <form method="POST" action="login.php" class="bg-blue-600 text-white flex flex-col justify-center items-center py-10 px-14 gap-8 rounded-lg">
            <h1 class="text-2xl font-semibold">Login</h1>
            <!-- input field -->
            <div class="flex flex-col gap-4">
                <!-- input field 1 -->
                <div class="flex flex-col gap-4">
                    <h2 class="text-lg font-medium">Username</h2>
                    <input type="text" name="username" placeholder="Masukkan Username"
                    class="bg-white/80 text-black/90 text-lg text-left w-full py-2 pl-4 pr-12 rounded-md" required/>
                </div>
                <!-- input field 2 -->
              <div class="flex flex-col gap-2">
                  <h2 class="text-lg font-medium">Password</h2>
                  <input type="password" name="password" placeholder="*****"
                  class="bg-white/80 text-black/90 text-lg text-left w-full py-2 pl-4 pr-12 rounded-md" required/>
                </div>
            </div>
            <div class="flex flex-col gap-3 w-full items-center">
                <button type="submit" name="login" class="bg-white text-blue-600 w-full py-2 px-6 rounded-md hover:cursor-pointer hover:font-semibold
                transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">Login</button>
                <p class="text-sm">Belum punya akun?
                    <a href="register.php" class="font-bold underline">Register</a>
                </p>
            </div>
        
             <?php 
             if (isset($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // mencari user berdasarkan username 
                $query = "SELECT * FROM users WHERE username = '$username'";
                $result = mysqli_query($koneksi,$query); 

                // cek apakah username ditemukan
                if (mysqli_num_rows($result) === 1) {

                    // ambil data user dari db
                    $data = mysqli_fetch_assoc($result);
                    

                    // || ($password == $data['password'])
                    // agar menerima 2 kondisi sekaligus pw hash/biasa (insert dri db)

                    // verifikasi password
                    if (password_verify($password, $data['password']) || $password == $data['password']) {
                        
                        // set session
                        $_SESSION['username'] = $username;
                        $_SESSION['role'] = $data['role'];
                        $_SESSION['login'] = 'true';

                        // cek role admin atau user 
                        if ($data['role'] === "admin" ) {
                            // jika admin , makan di arahkan ke dashboard admin
                            header('location: ../admin/dashboard.php');
                            exit();
                        } else if($data['role'] === "user") {
                            header('location: ../user.php');
                            exit();
                        } else {
                            echo "<p>Username atau Password salah! <a href='login.php'>Coba Lagi</a> </p>";
                        }
                    }

                }
            }
             ?>

            </form>

    </main>

</body>

</html>