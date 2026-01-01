<?php
session_start();
include __DIR__ . '/../koneksi.php';

// mengecek ada id di url
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // hapus gambar fisik
    // ambil nama file gambar dri db
    $cari_gambar = mysqli_query($koneksi,"SELECT gambar FROM posts WHERE id='$id' ");
    $data_gambar = mysqli_fetch_assoc($cari_gambar);

    // hapus gambar dri folder img
    if (!empty($data_gambar['gambar'])) {

        $folder = '../img/' . $data_gambar['gambar'];
        
        if (file_exists($folder)) {
            unlink($folder); //file fisik dihapus
        }
    }
}

$sql = "DELETE FROM posts WHERE id='$id'";
$run = mysqli_query($koneksi,$sql);

if ($run) {
    echo "<script>alert('Data Berhasil Dihapus!'); window.location='dashboard.php';</script>";
} else {
    echo "Gagal Menghapus Data: " . mysqli_error($koneksi);
}

?>