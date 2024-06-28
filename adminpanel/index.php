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
    <link rel="icon" href="../img/icon-logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>