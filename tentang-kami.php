<?php
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benua Baru | Tentang Kami</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/icon-logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    body {
        padding-top: 50px;
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <!-- Banner -->
    <div class="container-fluid banner d-flex align-items-center" style="height: 40vh;">
        <div class="container text-center text-white">
            <h1>Tentang Kami</h1>
        </div>
    </div>

    <!-- Body -->
    <div class="container py-5">
        <h2 class="mb-4">Sejarah</h2>

        <div class="row">
            <div class="col-lg-6 mb-5">
                <p>
                    Toko Mas Benua Baru memiliki sejarah panjang yang dimulai pada tahun 1983 di kota Singkawang. 
                    Pendiri toko ini mengawali karirnya sebagai tukang emas dan mengabdikan diri selama 11 tahun di sana. 
                    Pada tahun 1994, ia memutuskan untuk pindah ke Pontianak demi mencari peluang yang lebih baik. 
                    Setelah menemukan ruko yang cocok, toko ini beroperasi di lokasi tersebut selama 2 tahun.
                </p>
                <p>
                    Namun, karena pemilik ruko tidak lagi ingin menyewakan tempatnya, toko ini harus berpindah lokasi. 
                    Pada tahun 1996, Toko Mas Benua Baru menemukan tempat baru di Sungai Jawi. Setahun kemudian, pada tahun 1997, 
                    toko ini akhirnya menetap di Parit Baru dan terus beroperasi hingga saat ini, tahun 2024.
                </p>
                <p>
                    Kami bangga dengan warisan kami dan berkomitmen untuk terus menyediakan perhiasan emas berkualitas tinggi serta 
                    layanan terbaik kepada pelanggan kami. Toko Mas Benua Baru dikenal karena dedikasinya dalam menyediakan perhiasan 
                    emas berkualitas tinggi dan layanan pelanggan yang ramah dan profesional. Kami berkomitmen untuk terus melayani 
                    pelanggan kami dengan produk dan layanan terbaik.
                </p>
            </div>
            <div class="col-lg-6 text-center">
                <img src="img/BenuaBaru_Logo.png" alt="" style="height: auto; width: 60%; border-radius: 50%;">
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require "footer.php" ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>

</body>

</html>