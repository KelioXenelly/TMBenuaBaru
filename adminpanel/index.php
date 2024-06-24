<?php
    require "session.php";
    require "../connection.php";

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
    $rowKategori = mysqli_num_rows($queryKategori);

    $queryProduk = mysqli_query($conn, "SELECT * FROM produk");
    $rowProduk = mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php require "navbar.php" ?>

    <div class="main container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel" class="text-decoration-none text-muted">
                        <span class="me-2"><i class="fas fa-tachometer-alt fs-5"></i></span>
                        <span class="fs-6">Dashboard</span>
                    </a> 
                </li>
            </ol>
        </nav>

        <h2 class="fw-semibold fs-3">Halo <?php echo ucwords($_SESSION["username"]); ?></h2>

        <div class="row mt-3">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card bg-success text-white d-flex">
                    <div class="row px-3">
                        <div class="card-body col-6 text-center">
                            <i class="fas fa-align-justify fa-7x"></i>
                        </div>
                        <div class="card-body col-6 fs-5">
                            <h5 class="card-title">Kategori</h5>
                            <p class="card-text"><?php echo $rowKategori; ?> Kategori</p>
                            <a href="kategori.php" class="text-decoration-none text-white">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card bg-danger text-white d-flex">
                    <div class="row px-3">
                        <div class="card-body col-6 text-center">
                            <i class="fas fa-box fa-7x"></i>
                        </div>
                        <div class="card-body col-6 fs-5">
                            <h5 class="card-title">Produk</h5>
                            <p class="card-text"><?php echo $rowProduk; ?> Produk</p>
                            <a href="produk.php" class="text-decoration-none text-white">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <?php require "footer.php" ?>
        </div>
    </div>


    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
    <script src="../js/jquery-3.7.1.min.js"></script>
</body>

</html>