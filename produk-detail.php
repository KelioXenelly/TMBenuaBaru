<?php
    require "connection.php";

    $nama = htmlspecialchars($_GET['nama']);

    $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE nama = '$nama'");
    $dataProduk = mysqli_fetch_array($queryProduk);

    $queryProdukTerkait = mysqli_query($conn, "SELECT * FROM produk WHERE kategori_id = $dataProduk[kategori_id]
                                                AND produk_id != $dataProduk[produk_id] LIMIT 4");
    $numProdukTerkait = mysqli_num_rows($queryProdukTerkait);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benua Baru | Detail Produk</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    body {
        padding-top: 50px;
    }
</style>

<body>
    <?php require "navbar.php"; ?>    

    <!-- Detail Produk -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-5 border border-secondary p-4">
                    <img src="img/<?php echo $dataProduk['foto'] ?>" class="w-100" alt="" style="height: 400px;">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1 class=""><?php echo $dataProduk['nama'] ?></h1>
                    <div class="row">
                        <span class="col-5 fs-5">
                            <b>Kadar Produk: <span class="text-danger"><?php echo $dataProduk['kadar'] ?> k</span></b>
                        </span>
                        <span class="col-5 fs-5">
                            <b>Berat Produk: <span class="text-danger"><?php echo str_replace('.', ',', $dataProduk['berat']) ?> gr</span></b>
                        </span>
                    </div>
                    <br>
                    <p class="fs-5"><b>Deskripsi Produk:</b> <br> <?php echo $dataProduk['detail'] ?></p>
                    <p class="fs-3 text-warning">Rp<?php echo str_replace(',', '.', number_format($dataProduk["harga"])) ?></p>
                    <p class="fs-5">Status Ketersediaan: 
                        <?php
                            $status = $dataProduk['ketersediaan_stok'];
                            echo ($status == 'tersedia') ?
                                '<b class="text-success">'.$dataProduk['ketersediaan_stok'].'</b' :
                                '<b class="text-danger">'.$dataProduk['ketersediaan_stok'].'</b'
                            ;
                        ?>
                    </p>
                    <div>
                        <a href="https://wa.me/6289699926327?contact=tokomas_benuabaru" class="btn btn-secondary mt-3" target="_blank">
                            <i class="fa-solid fa-paper-plane me-2"></i></i>Mau Pesan? Hubungi Kami di WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Terkait -->
    <div class="container-fluid py-5 bg-warning">
        <div class="container">
            <h2 class="text-center text-white mb-5">Produk Terkait</h2>
            
            <div class="row">
                <?php
                    if($numProdukTerkait > 0) {
                        while($dataProdukTerkait = mysqli_fetch_array($queryProdukTerkait)) {
                            echo '
                                <div class="col-lg-3 col-md-6 mb-3">
                                    <a href="produk-detail.php?nama='.$dataProdukTerkait['nama'].'">
                                        <img src="img/'.$dataProdukTerkait['foto'].'" alt="" 
                                        class="img-fluid img-thumbnail w-100" style="height: 200px;">
                                    </a>
                                </div>
                            ';
                        }
                    }
                    else {
                        echo '<h3 class="text-center text-danger">Data produk terkait tidak tersedia :D</h3>';
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>