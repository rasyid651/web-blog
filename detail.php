<?php
session_start();
include 'koneksi.php';
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="icon" type="image/x-icon" href="./img_logo/go_it.ico">
    <title>Detail</title>
</head>

<body class="bg-neutral-900">

    <nav class="fixed top-0 left-0 w-full bg-blue-600/80 backdrop-blur-md text-white py-4 px-5 z-10">
        <div class="container mx-auto max-w-7xl flex justify-between items-center">
            <h1 class="text-2xl font-bold">Go IT</h1>

            <a href="javascript:void(0);" class="text-2xl md:hidden cursor-pointer" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>

            <div class="hidden md:flex flex-col md:flex-row absolute md:static top-full left-0 w-full md:w-auto  bg-blue-600 md:bg-transparent items-center gap-6  p-6 md:p-0 shadow-lg md:shadow-none transition-all duration-300"
                id="hamburger">
                <a href="user.php" class="hover:text-blue-200 py-2 md:py-0">Beranda</a>
                <a href="#artikel" class="hover:text-blue-200 py-2 md:py-0">Artikel</a>
                <a href="#tentang_kami" class="hover:text-blue-200 py-2 md:py-0">Tentang Kami</a>
                <a href="#hubungi_kami" class="hover:text-blue-200 py-2 md:py-0">Hubungi Kami</a>
                <div class="flex flex-col md:flex-row items-center gap-4 w-full md:w-auto mt-4 md:mt-0">
                    <div class="bg-white text-blue-600 py-3 px-6 text-md font-semibold rounded-md w-full md:w-auto flex flex-row gap-2 justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-icon lucide-user">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                        <p><?= $_SESSION['username'] ?></p>
                    </div>
                    <a href="index.php" class="border border-white text-white text-md py-3 px-6 font-semibold rounded-md hover:bg-white hover:text-blue-600 w-full md:w-auto flex flex-row gap-2 justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out">
                            <path d="m16 17 5-5-5-5" />
                            <path d="M21 12H9" />
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        </svg>
                        <p>Logout</p>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="mt-30 py-20">
        <?php
        $id = $_GET['id'];

        $query = mysqli_query($koneksi, "SELECT * FROM posts WHERE id='$id'");
        $row = mysqli_fetch_assoc($query);

        // jika id tidak ditemukan
        if (!$row) {
            echo "Artikel Tidak ditemukan";
            echo "ID yang dicari" . $id;
            exit();
        }
        ?>
        <div data-aos="fade-down">
            <section>
                <div class="container mx-auto max-w-7xl flex flex-col justify-center gap-6 md:gap-10 px-4 md:px-0">

                    <div class="flex flex-col gap-4 md:gap-8">
                        <h1 class="text-2xl md:text-4xl text-white font-semibold text-center leading-tight">
                            <?= $row['judul'] ?>
                        </h1>

                        <img src="img/<?= $row['gambar'] ?>" alt="img1"
                            class="w-full h-64 md:h-140 object-cover rounded-md shadow-lg">
                    </div>

                    <div class="flex flex-col gap-6">=
                        <p class="text-white/70 text-base md:text-lg font-medium text-justify leading-relaxed">
                            <?= $row['isi'] ?>
                        </p>
                    </div>
                </div>

            </section>
        </div>

    </main>

    <script>
        // Logika: Jika classnya mengandung 'hidden', hapus 'hidden' (biar muncul)
        // Jika tidak ada 'hidden', tambahkan 'hidden' (biar sembunyi)

        function myFunction() {
            var x = document.getElementById("hamburger");
            if (x.classList.contains('hidden')) {
                x.classList.remove('hidden');
            } else {
                x.classList.add('hidden');
            }
        }

        AOS.init({
            once: true, // agar animasi hanya berjalan sekali saat scroll ke bawah
            duration: 1000, // durasi animasi
        });
    </script>

</body>

</html>