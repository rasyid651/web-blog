<?php
session_start();
include __DIR__ . '/../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href= "../src/output.css" rel="stylesheet">
</head>

<body class="bg-neutral-900 text-white">
    
<nav class="fixed top-0 left-0 w-full bg-blue-600/80 backdrop-blur-md text-white py-4 px-5 z-10">
    <div class="container mx-auto max-w-7xl flex justify-between items-center">
      <h1 class="text-2xl font-bold">Go IT</h1>
      <div class="flex flex-row items-center gap-6">
          <a href="../index.php" class="hover:text-blue-200">Beranda</a>
          <a href="dashboard.php" class="hover:text-blue-200">Dashboard</a>
        <a href="tambah.php" class="hover:text-blue-200">Tambah</a>
        <div class="flex flex-row items-center gap-4">
          <a href="" class="border-1 border-white text-white text-md py-3 px-6 font-medium rounded-md hover:bg-white hover:text-blue-600">Registrasi</a>
        </div>
      </div>
    </div>
  </nav>

    <main class="mt-50 container mx-auto max-w-7xl flex flex-col gap-6">
    <h1 class="text-2xl font-bold text-center">Dashboard</h1>
    <table class="bg-blue-600/5 border-2 border-blue-600/5 backdrop-blur-xl rounded-md shadow-xl">
        <thead>
            <tr>
                <th class="border-1 border-white py-2 px-8">No</th>
                <th class="border-1 border-white py-2 px-8">Gambar</th>
                <th class="border-1 border-white py-2 px-8">Judul</th>
                <th class="border-1 border-white py-2 px-8">Isi</th>
                <th class="border-1 border-white py-2 px-8">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * FROM posts");
            while ($data = mysqli_fetch_array($tampil)) {
            ?>

                <tr class="hover:bg-blue-600/10">
                    <td class="border-1 border-white py-2 px-8 text-center"><?= $no++; ?></td>
                    <td class="border-1 border-white py-2 px-8 align-center">
                        <img src="../img/<?= $data['gambar']; ?>" alt="gambar" class="w-28 h-25 rounded-b-md object-cover">
                    </td>
                    <td class="border-1 border-white py-2 px-8 text-center"><?= $data['judul'] ?></td>
                    <td class="border-1 border-white py-2 px-8 text-justify text-sm"><?= $data['isi'] ?></td>
                    <td class="border-1 border-white py-2 px-8">
                        <div class="flex flex-row gap-4 items-center">
                            <a href="edit.php?id=<?= $data['id'] ?>" class="bg-blue-600 py-3 px-6 text-center text-white/80 font-semibold text-md rounded-md hover:bg-blue-700">Edit</a>
                            <a href="delete.php?id=<?= $data['id'] ?>" class="bg-red-600 py-3 px-6 text-center text-white/80 font-semibold text-md rounded-md hover:bg-red-700 onclick="return confirm('Yakin Ingin Hapus?');">Hapus</a>
                        </div>
                    </td>
                </tr>

            <?php }  ?>
        </tbody>

    </table>
    
</main>
</body>

</html>
