<?php
session_start();
include __DIR__ . '/../koneksi.php';
if ($_SESSION['role'] != "admin") {
    header('location: ./auth/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="icon" type="image/x-icon" href="../img_logo/go_it.ico">
    <title>Dashboard</title>
    <link href="../src/output.css" rel="stylesheet">
</head>

<body class="bg-neutral-900 text-white">

    <nav class="fixed top-0 left-0 w-full bg-blue-600/80 backdrop-blur-md text-white py-4 px-5 z-10">
        <div class="container mx-auto max-w-7xl flex justify-between items-center">
            <h1 class="text-2xl font-bold">Go IT</h1>
            <div class="flex flex-row items-center gap-6">
                <a href="dashboard.php" class="hover:text-blue-200">Dashboard</a>
                <a href="tambah.php" class="hover:text-blue-200">Tambah</a>
                <div class="flex flex-row items-center gap-4">
                    <div class="bg-white text-blue-600 py-3 px-6 text-md font-semibold rounded-md w-full md:w-auto flex flex-row gap-2 justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-icon lucide-user">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                        <p><?= $_SESSION['username'] ?></p>
                    </div>
                    <a href="../logout.php" class="border border-white text-white text-md py-3 px-6 font-semibold rounded-md hover:bg-white hover:text-blue-600 w-full md:w-auto flex flex-row gap-2 justify-center items-center">
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

    <div data-aos="fade-down">
    <main class="mt-30 py-20 container mx-auto max-w-7xl flex flex-col gap-6">
            <h1 class="text-2xl font-bold text-center">Dashboard</h1>
            <table class="bg-blue-600/5 border-2 border-blue-600/5 backdrop-blur-xl rounded-md shadow-xl">
                <thead>
                    <tr>
                        <th class="border border-white py-2 px-8">No</th>
                        <th class="border border-white py-2 px-8">Gambar</th>
                        <th class="border border-white py-2 px-8">Judul</th>
                        <th class="border border-white py-2 px-8">Isi</th>
                        <th class="border border-white py-2 px-8">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM posts");
                    while ($data = mysqli_fetch_array($tampil)) {
                    ?>

                        <tr class="hover:bg-blue-600/10">
                            <td class="border border-white py-2 px-8 text-center"><?= $no++; ?></td>
                            <td class="border border-white py-2 px-8 align-center">
                                <img src="../img/<?= $data['gambar']; ?>" alt="gambar" class="w-28 h-25 rounded-b-md object-cover">
                            </td>
                            <td class="border border-white py-2 px-8 text-center"><?= $data['judul'] ?></td>
                            <td class="border border-white py-2 px-8 text-justify text-sm"><?= $data['isi'] ?></td>
                            <td class="border border-white py-2 px-8">
                                <div class="flex flex-row gap-4 items-center">
                                    <a href="edit.php?id=<?= $data['id'] ?>" class="bg-blue-600 py-3 px-6 text-center text-white/80 font-semibold text-md rounded-md hover:bg-blue-700">Edit</a>
                                    <a href="delete.php?id=<?= $data['id'] ?>" class="bg-red-600 py-3 px-6 text-center text-white/80 font-semibold text-md rounded-md hover:bg-red-700 onclick=" return confirm('Yakin Ingin Hapus?');">Hapus</a>
                                </div>
                            </td>
                        </tr>

                    <?php }  ?>
                </tbody>

            </table>
        </main>
    </div>

    <script>
        AOS.init({
            once: true, // agar animasi hanya berjalan sekali saat scroll ke bawah
            duration: 1000, // durasi animasi
        });
    </script>
</body>

</html>