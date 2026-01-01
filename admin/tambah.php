<?php
session_start();
include __DIR__ . '/../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../src/output.css" rel="stylesheet">
</head>

<body class="bg-neutral-900 scroll-smooth">



    <main class="mt-30 container mx-auto max-w-7xl flex flex-col gap-8">

        <div class="flex flex-row gap-2 items-center  text-white/80  hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-left-icon lucide-move-left">
                <path d="M6 8L2 12L6 16" />
                <path d="M2 12H22" />
            </svg>
            <a href="dashboard.php" class="text-xl font-semibold">Kembali</a>
        </div>
        <section class=" flex justify-center items-center">

            <form method="POST" action="" enctype="multipart/form-data"
                class="bg-blue-600 text-white flex flex-col justify-center w-100 mx-auto max-w-3xl items-center py-10 px-8 gap-8 rounded-lg">
                <h1 class="text-2xl font-semibold">Tambah</h1>
                <!-- input field -->
                <div class="flex flex-col gap-4">

                    <!-- input field 1 -->
                    <div class="flex flex-col gap-4">
                        <h2 class="text-lg font-medium">Judul</h2>
                        <input type="text" name="judul" placeholder="Masukkan Judul"
                            class="bg-white/80 text-black/90 text-md text-left w-full py-2 pl-4 pr-14 rounded-md" required />
                    </div>

                    <!-- input field 2 -->
                    <div class="flex flex-col gap-2">
                        <h2 class="text-lg font-medium">Deskripsi</h2>
                        <textarea name="isi" placeholder="Masukkan Deskripsi" class="bg-white/80 text-black/90 text-md text-left w-full h-32 
                    py-4 pl-4 pr-12 rounded-md" required></textarea>
                    </div>

                    <!-- upload gambar -->
                    <d class="flex flex-col gap-2">
                        <h2 class="text-lg font-medium">Upload</h2>
                        <input type="file" name="gambar" class="bg-white/80 text-black/90 text-md text-left w-full py-4 pl-4 pr-14 rounded-md hover:cursor-pointer">
                </div>
                </div>

                <div class="flex flex-col gap-3 w-full items-center">
                    <button type="submit" name="simpan" class="bg-white text-blue-600 w-full py-2 px-6 rounded-md hover:cursor-pointer hover:font-semibold
                transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">Simpan</button>
                </div>

                <?php
                if (isset($_POST['simpan'])) {

                    // ambil data teks
                    $judul = ($_POST['judul']);
                    $isi = ($_POST['isi']);

                    // logika upload gambar

                    // ambil info dari gambar 
                    $nama_file = $_FILES['gambar']['name'];
                    $tmp_file = $_FILES['gambar']['tmp_name'];  //lok sem di server
                    $folder = '../img/';

                    // cek apakah ada file yang dipilih
                    if ($nama_file != '') {
                        // agar file jdi unik (kita tambah waktu di depanya)
                        $nama_file_unik = time() . '_' . $nama_file;

                        // pindahkan nama file dri temp ke folder 'penyimpanan'
                        move_uploaded_file($tmp_file, $folder . $nama_file_unik);

                        // simpan file yg sdh di rename ke variabel untuk dipindahkan ke db
                        $gambar_db = $nama_file_unik;
                    } else {
                        $gambar_db = '';
                    }

                    // insert ke db
                    $query = "INSERT INTO posts (judul, isi, gambar, tanggal_dibuat) 
          VALUES ('$judul', '$isi', '$gambar_db', NOW())";

                    $run = mysqli_query($koneksi, $query);

                    if ($run) {
                        echo "<script>alert('Data Berhasil Disimpan'); window.location='dashboard.php' </script>";
                    } else {
                        echo "Data gagal disimpan" . mysqli_error($koneksi);
                    }
                }
                ?>


            </form>
        </section>

    </main>

</body>

</html>