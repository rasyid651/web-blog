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
</head>

<body class="bg-neutral-900">

    <nav class="fixed top-0 left-0 w-full bg-blue-600/80 backdrop-blur-md text-white py-4 px-5 z-10">
        <div class="container mx-auto max-w-7xl flex justify-between items-center">
            <h1 class="text-2xl font-bold">Go IT</h1>
            <div class="flex flex-row items-center gap-6">
                <a href="index.php" class="hover:text-blue-200">Beranda</a>
                <a href="" class="hover:text-blue-200">Artikel</a>
                <div class="flex flex-row items-center gap-4">
                    <a href="" class="bg-white text-blue-600 text-md py-3 px-6 font-medium rounded-md">Login</a>
                    <a href="" class="border border-white text-white text-md py-3 px-6 font-medium rounded-md hover:bg-white hover:text-blue-600">Registrasi</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
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
            <section class="mt-50">
                <div class="container mx-auto max-w-7xl flex flex-col justify-center gap-10">
                    <div class="flex flex-col gap-8">
                        <h1 class="text-4xl text-white font-semibold text-center"><?= $row['judul']  ?></h1>
                        <img src="img/<?= $row['gambar'] ?>" alt="img1" class="w-full h-140 object-cover rounded-t-md">
                    </div>
                    <div class="flex flex-col gap-6">
                        <p class="text-white/70 text-lg font-medium text-justify"><?= $row['isi'] ?></p>
                    </div>
                </div>
        
            </section>

    </main>