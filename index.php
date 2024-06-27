<?php
    require "connection.php";

    $query6Produk = mysqli_query($conn,"SELECT * FROM produk LIMIT 6");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benua Baru | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php echo require "navbar.php" ?>

    <!-- Banner -->
    <div class="container-fluid banner d-flex align-items-center mt-4">
        <div class="container text-center text-white">
            <h1>Toko Mas Benua Baru</h1>
            <h3>Mau cari apa?</h3>
            <div class="col-md-8 offset-md-2">
                <form action="produk.php" method="GET">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Cari nama barang" 
                        aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button class="btn btn-warning text-white" type="submit">Telusuri</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3 class="fs-2">Produk Utama</h3>

            <div class="row mt-5">
                <?php
                    while($data6Produk = mysqli_fetch_array($query6Produk)) {
                        echo '
                            <div class="col-md-4 mb-3">
                                <div class="card" style="height: 500px;">
                                    <img src="img/'.$data6Produk['foto'].'" class="card-img-top" alt="Foto Belum Ditambahkan" style="height: 250px;">
                                    <div class="card-body d-flex flex-column justify-content-center px-5">
                                        <h5 class="card-title fs-4">'.$data6Produk['nama'].'</h5>
                                        <h5 class="card-title fs-5">'.$data6Produk['kadar'].'k / '.$data6Produk['berat'].' gr</h5>
                                        <p class="card-text text-truncate fs-6">'.$data6Produk['detail'].'</p>
                                        <p class="card-text fs-4 text-warning">Rp'.str_replace(',', '.', number_format($data6Produk["harga"])).'</p>
                                        <div>
                                            <a href="produk-detail.php?nama='.$data6Produk['nama'].'" class="btn btn-warning text-white mt-2 fs-5">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
            </div>

            <div>
                <a href="produk.php" class="btn btn-outline-warning mt-4 fs-4">Lihat Lainnya</a>
            </div>
            
        </div>
    </div>

    <!--  -->

    <!-- Footer -->
    <?php require "footer.php" ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>