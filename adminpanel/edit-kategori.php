<?php
    require "session.php";
    require "../connection.php";

    $id = $_GET['id'];

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori WHERE kategori_id = '$id'");
    $data = mysqli_fetch_array($queryKategori);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Edit Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require "navbar.php"; ?>

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
                    <span class="fs-6">Edit Kategori</span>
                </li>
            </ol>
        </nav>

        <h2 class="fw-semibold fs-3">Edit Kategori</h2>
        
        <div class="row mt-3">
            <form action="" method="POST">
                <div>
                    <a href="kategori.php" class="btn btn-secondary"><i class="fas fa-chevron-left me-2"></i></i>Batal</a>
                </div>
                <div class="row">
                    <div class="my-3 col-12">
                        <div class="row">
                            <div class="col-6">
                                <label for="kategoriLama" class="form-label">Kategori Lama</label>
                                <input type="text" name="kategoriLama" id="kategoriLama" value="<?php echo $data["nama"] ?>" class="form-control" autocomplete="off" required disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mt-1 col-12">
                        <div class="row">
                            <div class="col-6">
                                <label for="kategori" class="form-label">Kategori Baru</label>
                                <input type="text" name="kategori" id="kategori" placeholder="Input nama kategori" class="form-control" autocomplete="off" require>
                            </div>
                        <div class="mt-2 mb-3 col-4 ps-0">
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
                        $kategori = ucfirst(htmlspecialchars($_POST["kategori"]));
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
                            if($kategori == $data["nama"]) {
                                echo '
                                    <div>
                                        <div class="alert alert-warning col-7 text-center" role="alert">
                                            Nama kategori harus diganti, tidak boleh sama
                                        </div>
                                    </div>
                                ';
                            }
                            else {
                                $queryKategoriGlobal = mysqli_query($conn,'SELECT nama FROM kategori');
                                $kategoriTersedia = false;
                                
                                while($dataKategoriGlobal = mysqli_fetch_array($queryKategoriGlobal)) {
                                    if($kategori == $dataKategoriGlobal['nama']) {
                                        $kategoriTersedia = true;
                                        break;
                                    }
                                }
                                if($kategoriTersedia) {
                                    echo '
                                        <div>
                                            <div class="alert alert-warning col-7 text-center" role="alert">
                                                Kategori sudah tersedia, pakai nama yang lain
                                            </div>
                                        </div>
                                    ';
                                }
                                else {
                                    $editKategori = mysqli_query($conn, "UPDATE kategori SET nama = '$kategori' WHERE kategori_id = '$id'");
                                    if($editKategori) {
                                        echo '
                                            <div>
                                                <div class="alert alert-success col-7 text-center" role="alert">
                                                    Kategori berhasil di update
                                                </div>
                                                <meta http-equiv="refresh" content="2; url=kategori.php">
                                            </div>
                                        ';
                                    }
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