<?php
    require "session.php";
    require "../connection.php";

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Tambah Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require "navbar.php" ?>

    <div class="main container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel/kategori.php" class="text-decoration-none text-muted">
                        <span class="me-2"><i class="fas fa-list fs-5"></i></span>
                        <span class="fs-6">Kategori</span>
                    </a> 
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <span class="fs-6">Tambah Kategori</span>
                </li>
            </ol>
        </nav>

        <h2 class="fw-semibold fs-3">Tambah Kategori</h2>
        
        <div class="row mt-3">
            <form action="" method="POST">
                <div>
                    <a href="kategori.php" class="btn btn-secondary"><i class="fas fa-chevron-left me-2"></i></i>Batal</a>
                </div>
                <div class="row">
                    <div class="my-3 col-12">
                        <div class="row">
                            <div class="col-6">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" name="kategori" id="kategori" placeholder="Input nama kategori" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="col-4 mt-2 ps-0">
                                <button type="submit" class="btn btn-primary mt-4" name="simpan_kategori"><i class="fas fa-save me-2"></i></i>Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row mt-2">
                <?php
                    if(isset($_POST["simpan_kategori"])) {
                        $kategori = ucwords(htmlspecialchars($_POST["kategori"]));
                        if($kategori == "") {
                            echo '
                                <div>
                                    <div class="alert alert-warning col-7 text-center" role="alert">
                                        Anda belum memasukkan nama kategori
                                    </div>
                                </div>
                            ';
                        }
                        else {
                            $cekKategori = mysqli_query($conn, "SELECT nama FROM kategori WHERE nama = '$kategori'");
                            $rowCekKategori = mysqli_num_rows($cekKategori); 
                            if($rowCekKategori > 0) {
                                echo '
                                    <div>
                                        <div class="alert alert-warning col-7 text-center" role="alert">
                                            Kategori sudah tersedia
                                        </div>
                                    </div>
                                ';
                            }
                            else {
                                $insertKategori = mysqli_query($conn, "INSERT INTO kategori (nama) VALUES ('$kategori')");
                                if($insertKategori) {
                                    echo '
                                        <div>
                                            <div class="alert alert-success col-7 text-center" role="alert">
                                                Kategori '.$kategori.' berhasil di tambahkan
                                            </div>
                                            <meta http-equiv="refresh" content="2; url=kategori.php">
                                        </div>
                                    ';
                                }
                            }
                        }
                        
                    }
                ?>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>