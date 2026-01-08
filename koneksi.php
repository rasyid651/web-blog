<?php

$koneksi = mysqli_connect('localhost','root','','db_web_blog');
if (!$koneksi) {
    die("Koneksi gagal:  ") . mysqli_connect_errno();
}

?>
