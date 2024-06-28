<?php
    require "connection.php";

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
    $numKategori = mysqli_num_rows($queryKategori);

    // Get Product by Search/keyword
    if(isset($_GET['keyword'])) {
        $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
        $numProduk = mysqli_num_rows($queryProduk);
    }
    // Get Product by Select Category
    else if(isset($_GET['kategori'])) {
        $queryGetKategoriId = mysqli_query($conn, "SELECT kategori_id FROM kategori WHERE nama = '$_GET[kategori]'");
        $kategoriId = mysqli_fetch_array($queryGetKategoriId);
        $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE kategori_id = '$kategoriId[kategori_id]'");
        $numProduk = mysqli_num_rows($queryProduk);
    }
    // Get Product by Default
    else {
        $queryProduk = mysqli_query($conn, "SELECT * FROM produk");
        $numProduk = mysqli_num_rows($queryProduk);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benua Baru | Produk</title>
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
            <h1>Produk</h1>
        </div>
    </div>
    
    <!-- Body -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <h3>Kategori</h3>
                <p class="mb-3">Total <b><span class="text-success"><?php echo $numKategori; ?></b></span> kategori tersedia</p>
                <ul class="list-group">
                    <?php
                        while($dataKategori = mysqli_fetch_array($queryKategori)) {
                            echo '
                                <a href="produk.php?kategori='.$dataKategori['nama'].'" class="text-decoration-none">
                                    <li class="list-group-item">'.$dataKategori['nama'].'</li>
                                </a>
                            ';
                        }
                    ?>
                </ul>
            </div>
            <div class="col-lg-9">
                <h3 class="text-center">Produk</h3>
                <p class="text-center mb-3">Total <b><span class="text-success"><?php echo $numProduk; ?></b></span> produk tersedia</p>
                <div class="row">
                    <?php
                        if($numProduk > 0) {
                            while($produk = mysqli_fetch_array($queryProduk)) {
                                echo '
                                    <div class="col-sm-6 col-md-4 mb-4">
                                        <div class="card h-100">
                                            <div class="image-box">
                                                <img src="img/'.$produk['foto'].'" class="card-img-top" alt="..." style="height: 200px;">
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title fs-4">'.$produk['nama'].'</h4>
                                                <h5 class="card-title fs-5">'.$produk['kadar'].'k / '.str_replace(".", ",", $produk['berat']).' gr</h5>
                                                <p class="card-text text-truncate">'.$produk['detail'].'</p>
                                                <p class="card-text fs-5 text-warning">Rp'.str_replace(',', '.', number_format($produk["harga"])).'</p>
                                ';
                    ?>
                    <?php
                                echo ($produk['ketersediaan_stok'] == 'tersedia') ? 
                                '<p class="card-text fs-6">Status: <b class="text-success">'.$produk['ketersediaan_stok'].'</b></p>' :
                                '<p class="card-text fs-6">Status: <b class="text-danger">'.$produk['ketersediaan_stok'].'</b></p>';
                                echo '
                                                <a href="produk-detail.php?nama='.$produk['nama'].'" class="btn btn-warning text-white mt-2 fs-6">Lihat Detail</a>
                                            </div>
                                        </div>
                                    </div>        
                                ';
                            }
                        }
                        else {
                            echo '
                                <h4 class="text-center text-danger my-5">Produk yang dicari tidak tersedia</h4>
                            ';
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require "footer.php" ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>