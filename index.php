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
  <title>Beranda</title>
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
        <a href="index.php" class="hover:text-blue-200 py-2 md:py-0">Beranda</a>
        <a href="#artikel" class="hover:text-blue-200 py-2 md:py-0">Artikel</a>
        <a href="#tentang_kami" class="hover:text-blue-200 py-2 md:py-0">Tentang Kami</a>
        <a href="#hubungi_kami" class="hover:text-blue-200 py-2 md:py-0">Hubungi Kami</a>
        <div class="flex flex-col md:flex-row items-center gap-4 w-full md:w-auto mt-4 md:mt-0">
          <a href="./auth/login.php" class="bg-white text-blue-600 text-md py-3 px-6 font-medium rounded-md w-full md:w-auto text-center">Login</a>
          <a href="./auth/register.php" class="border border-white text-white text-md py-3 px-6 font-medium rounded-md hover:bg-white hover:text-blue-600 w-full md:w-auto text-center">Registrasi</a>
        </div>
      </div>
    </div>
  </nav>



  <main>

    <div data-aos="fade-down">
      <section class="mt-50">
        <div class="container mx-auto max-w-7xl text-center flex flex-col gap-2">
          <h1 class="text-4xl text-white font-bold max-w-7xl mx-auto">Dunia Serba <span class="text-blue-600">Digital</span></h1>
          <p class="text-sm md:text-md sm:text-md text-gray-400 max-w-5xl mx-auto mb-6 pt-4 text-center">Wawasan, strategi, dan gagasan seputar Bidang IT dan produktivitas.</p>
          <div class="flex flex-row gap-4 justify-center">
            <a href="#artikel" class="bg-blue-600 text-white text-md py-3 px-6 font-medium rounded-md hover:bg-blue-700">Lihat Artikel</a>
            <a href="#tentang_kami" class="border border-blue-600 text-blue-600 text-md py-3 px-6 font-medium rounded-md hover:border-blue-400 hover:text-blue-400">Tentang Kami</a>
          </div>
        </div>
      </section>
    </div>


    <!-- card -->
    <div id="artikel"></div>
    <section class="mt-40 container mx-auto max-w-7xl py-8 px-4">
      <div data-aos="fade-down">
        <h1 class="text-center font-semibold text-white text-2xl mb-12">Artikel Terbaru mengenai Bidang IT</h1>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-6">

        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM posts");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>


          <div data-aos="zoom-in">
            <div class="bg-blue-600/5 border-2 border-blue-600/5 backdrop-blur-xl w-full h-auto rounded-md shadow-xl hover:bg-blue-600/10">
              <img src="img/<?= $row['gambar'] ?>" alt="img_project" class="w-full h-48 object-cover rounded-t-md">
              <div class="flex flex-col gap-3 py-4 px-6">
                <div class="flex flex-col gap-2">
                  <h1 class="text-base text-white font-semibold"><?= $row['judul'] ?></h1>
                  <p class="text-sm text-white/80 font-light leading-6 line-clamp-4 text-justify"><?= $row['isi'] ?>?></p>
                </div>
                <a href="./auth/login.php" class="flex flex-row items-center gap-2 text-white/80 font-semibold text-md hover:text-white hover:font-semibold">
                  <p>Detail</p>
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-move-right-icon lucide-move-right">
                    <path d="M18 8L22 12L18 16" />
                    <path d="M2 12H22" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        <?php } ?>

      </div>
    </section>
    <!-- card selesai -->


    <!-- tentang kami -->
    <div id="tentang_kami"></div>
    <section class="container max-w-7xl mx-auto mt-30">
      
    <div data-aos="fade-down">
      <div class="container max-w-7xl mx-auto mb-12 flex flex-col justify-center items-center gap-2">
        <h1 class="text-center font-semibold text-white text-2xl">Tentang Kami</h1>
        <p class="text-md text-gray-400 font-medium text-center">Menghubungkan Anda dengan Masa Depan Teknologi.</p>
      </div>
    </div>

    <div data-aos="fade-down">  
      <div class="container max-w-7xl mx-auto flex flex-col md:flex-row gap-8 px-8 items-center">
      <img src="./img_logo/tentang_kami.jpg" alt="tentang_kami" class="w-full md:w-full h-80 rounded-md">
      
        <div class="container max-w-7xl mx-auto flex flex-col md:flex-col gap-12 md:gap-17">
          <p class="text-white/80 font-medium text-lg text-justify">Go IT hadir sebagai jembatan informasi di tengah pesatnya perkembangan era digital. Kami menyadari bahwa teknologi bukan lagi sekadar alat, melainkan fondasi dari setiap inovasi masa kini.
            Melalui artikel yang dikurasi secara mendalam, Go IT berkomitmen untuk menyajikan konten berkualitas seputar pengembangan perangkat lunak (software development), tren industri IT, hingga tips efisiensi kerja. Misi kami sederhana: memberdayakan setiap individu dengan pengetahuan yang relevan agar siap bersaing di ekosistem digital global.
          </p>
          <div class="flex flex-row justify-between items-center">
            <div class="flex flex-row -space-x-2">
              <img src="https://plus.unsplash.com/premium_vector-1683141234968-b4f861c0546a?q=80&w=966&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="profile"
                class="w-8 h-8 object-cover rounded-full">
              <img src="https://plus.unsplash.com/premium_vector-1683141234968-b4f861c0546a?q=80&w=966&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="profile"
                class="w-8 h-8 object-cover rounded-full">
              <img src="https://plus.unsplash.com/premium_vector-1683141234968-b4f861c0546a?q=80&w=966&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="profile"
                class="w-8 h-8 object-cover rounded-full">
              <img src="https://plus.unsplash.com/premium_vector-1683141234968-b4f861c0546a?q=80&w=966&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="profile"
                class="w-8 h-8 object-cover rounded-full">
            </div>
            <div class="flex flex-row items-center gap-2 text-blue-600 font-semibold text-lg">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-building2-icon lucide-building-2">
                <path d="M10 12h4" />
                <path d="M10 8h4" />
                <path d="M14 21v-3a2 2 0 0 0-4 0v3" />
                <path d="M6 10H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-2" />
                <path d="M6 21V5a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v16" />
              </svg>
              <p>Go IT</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    </section>
    <!-- tentang kami selesai -->

    <!-- hubungi kami -->
    <div id="hubungi_kami"></div>
    <div data-aos="fade-down">
    <section class="container mx-auto max-w-7xl flex justify-center mt-30 px-4">

      <form action="https://formspree.io/f/mojqznln" method="POST" class="container mx-auto max-w-7xl text-white flex flex-col justify-center w-full gap-8 rounded-lg">

        <h1 class="font-semibold text-2xl text-center">Hubungi Kami</h1>

        <div class="flex flex-col gap-4">
          <h2 class="text-lg font-medium">Nama</h2>
          <input type="text" name="username" placeholder="Masukkan Nama"
            class="border border-blue-600 bg-transparent text-white/80 text-lg text-left w-full py-4 pl-4 pr-12 rounded-md " required />
        </div>

        <div class="flex flex-col gap-4">
          <h2 class="text-lg font-medium">Email</h2>
          <input type="email" name="email" placeholder="Masukkan Email"
            class="border border-blue-600 bg-transparent text-white/80 text-lg text-left w-full py-4 pl-4 pr-12 rounded-md " required />
        </div>

        <div class="flex flex-col gap-4">
          <h2 class="text-lg font-medium">Komentar</h2>
          <textarea name="message" placeholder="Masukkan Komentar"
            class="border border-blue-600 bg-transparent text-white/80 text-lg text-left w-full h-44
                py-4 pl-4 pr-12 rounded-md " required></textarea>
        </div>
        <input type="hidden" name="_next" value="http://localhost/web_blog/index.php">
        <button type="submit" class="bg-blue-600 text-white text-md w-26 py-3 px-6 text-center font-medium rounded-md hover:bg-blue-700">Kirim</button>

      </form>

    </section>
    </div>

    <!-- hubungi kami selesai  -->
  </main>

  <footer class="mt-24 w-full bg-blue-600/80 text-white">
    <div class="py-8">
      <div class="container mx-auto max-w-7xl flex flex-col justify-center gap-6">
        <h1 class="text-2xl text-center font-bold">Go IT</h1>
        <div class="flex flex-row justify-center items-center gap-2 md:gap-6">
          <a href="index.php" class="hover:text-blue-200">Beranda</a>
          <a href="#artikel" class="hover:text-blue-200">Artikel</a>
          <a href="$tentang_kami" class="hover:text-blue-200">Tentang Kami</a>
          <a href="#hubungi_kami" class="hover:text-blue-200">Hubungi Kami</a>
        </div>
      </div>
      <hr class="border-t border-white/40 mt-6 mb-4 w-full max-w-4xl mx-auto" />
      <div class="mt-2 flex-col text-center">
        <p class="text-md font-medium">&copy; 2025 <span class="text-white/80">Tim GO IT</span></p>
      </div>
    </div>
  </footer>

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