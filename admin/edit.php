<?php
session_start();
include __DIR__ . '/../koneksi.php';

$id = $_GET['id'];

// logika upload gambar

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT judul,isi,gambar FROM posts WHERE id=$id"));
if (isset($_POST['perbarui'])) {

    $judul = $_POST['judul'];
    $isi = $_POST['isi'];

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
        $gambar_db = $data['gambar'];
    }

    $sql = "UPDATE posts SET
    judul='$judul',isi='$isi',gambar='$gambar_db' WHERE id=$id";
    mysqli_query($koneksi, $sql);
    header('location: dashboard.php');
    exit();
}
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

    <main class="h-lvh container mx-auto max-w-7xl flex justify-center items-center">

        <form method="POST" action="" enctype="multipart/form-data"
            class="bg-blue-600 text-white flex flex-col justify-center w-100 mx-auto max-w-3xl items-center py-10 px-8 gap-8 rounded-lg">
            <h1 class="text-2xl font-semibold">Tambah</h1>
            <!-- input field -->
            <div class="flex flex-col gap-4">

                <!-- input field 1 -->
                <div class="flex flex-col gap-4">
                    <h2 class="text-lg font-medium">Judul</h2>
                    <input type="text" name="judul" placeholder="Masukkan Judul" value="<?= $data['judul'] ?>"
                        class="bg-white/80 text-black/90 text-md text-left w-full py-2 pl-4 pr-14 rounded-md" required />
                </div>

                <!-- input field 2 -->
                <div class="flex flex-col gap-2">
                    <h2 class="text-lg font-medium">Deskripsi</h2>
                    <textarea name="isi" placeholder="Masukkan Deskripsi" class="bg-white/80 text-black/90 text-md text-left w-full h-32 
                    py-4 pl-4 pr-12 rounded-md" required><?= $data['isi'] ?></textarea>
                </div>

                <!-- upload gambar -->
                <div class="flex flex-col gap-2">
                    <h2 class="text-lg font-medium">Upload</h2>
                    <div class="flex flex-col gap-2">
                        <img src="../img/<?= $data['gambar'] ?>" class="bg-white/80  w-full py-4 pl-4 pr-14 rounded-md hover:cursor-pointer">
                        <input type="file" name="gambar" class="bg-white/80 text-black/90 text-md text-left w-full py-4 pl-4 pr-14 rounded-md hover:cursor-pointer">
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-3 w-full items-center">
                <button type="submit" name="perbarui" class="bg-white text-blue-600 w-full py-2 px-6 rounded-md hover:cursor-pointer hover:font-semibold
                transition delay-150 duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">Simpan</button>
            </div>

        </form>

    </main>

</body>

</html>