<?php
    require "session.php";
    require "../connection.php";

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");

    function generateRandomString($length = 10) {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFHIJKLMNOPQRSTUVWXYZ";
        $charactersLength = strlen($characters);
        $randomString = "";
        for($i = 0; $i < $length; $i++) {
            $randomString = $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Tambah Produk</title>
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
                    <a href="../adminpanel/produk.php" class="text-decoration-none text-muted">
                        <span class="me-2"><i class="fas fa-briefcase fs-5"></i></span>
                        <span class="fs-6">Produk</span>
                    </a> 
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <span class="fs-6">Tambah Produk</span>
                </li>
            </ol>
        </nav>

        <h2 class="fw-semibold fs-3">Tambah Produk</h2>
        
        <div class="row mt-3">
            <div>
                <a href="produk.php" class="btn btn-secondary"><i class="fas fa-chevron-left me-2"></i></i>Batal</a>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="mt-3 col-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="produk" class="form-label">Nama Produk</label>
                                <input type="text" name="produk" id="produk" placeholder="Input nama produk" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="mt-3 col-md-6">
                                <label for="kadar" class="form-label">Kadar (k)</label>
                                <input type="number" name="kadar" id="kadar" placeholder="Input kadar produk" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control" required> 
                                    <option value="">-- Pilih Satu --</option>
                                    <?php
                                        while($data = mysqli_fetch_array($queryKategori)) {
                                            echo "
                                                <option value='{$data['kategori_id']}'>{$data['nama']}</option>
                                            ";
                                        }
                                        ?>
                                </select>
                            </div>
                            <div class="mt-3 col-md-6">
                                <label for="berat" class="form-label">Berat (gr)</label>
                                <input type="text" name="berat" id="berat" placeholder="Input berat produk" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="mt-3 col-md-6">
                                <label for="fotoProduk" class="form-label">Foto Produk</label>
                                <input type="file" name="fotoProduk" id="fotoProduk" class="form-control">
                            </div>
                            <div class="mt-3 col-md-6">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" id="harga" placeholder="Input harga produk" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="mt-3 col-md-6">
                                <label for="ketersediaan_stok" class="form-label">Ketersediaan Stok</label>
                                <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                                    <option value="tersedia">Tersedia</option>
                                    <option value="habis">Habis</option>
                                </select>
                            </div>
                            <div class="mt-3 col-12">
                                <label for="detailProduk" class="form-label">Detail</label>
                                <textarea name="detailProduk" id="detailProduk" cols="30" rows="6" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-1">
                    <button type="submit" class="btn btn-primary mt-4" name="simpan_produk"><i class="fas fa-save me-2"></i></i>Simpan</button>
                </div>
            </form>
        </div>
        <div class="row mt-2">
            <div>
                <?php
                    if(isset($_POST["simpan_produk"])) {
                        $produk = ucwords(htmlspecialchars($_POST["produk"]));
                        $kadar = htmlspecialchars($_POST["kadar"]);
                        $berat = htmlspecialchars($_POST["berat"]);
                        $kategori = htmlspecialchars($_POST["kategori"]);
                        $harga = htmlspecialchars($_POST["harga"]);
                        $ketersediaan_stok = htmlspecialchars($_POST["ketersediaan_stok"]);
                        $detail = htmlspecialchars($_POST["detailProduk"]);

                        $target_dir = "../img/";
                        $nama_file = basename($_FILES["fotoProduk"]["name"]);
                        $target_file = $target_dir . $nama_file;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        $image_size = $_FILES["fotoProduk"]["size"];
                        $random_name = generateRandomString(20);
                        $new_name = $random_name . "." . $imageFileType;

                        if($produk == "" && $kadar == "" && $berat == "" && $kategori == "" && $harga == "") {
                            echo "
                                <div class='alert alert-warning mt-3' role='alert'>
                                    Produk, Kadar, Berat, Kategori dan harga wajib diisi!
                                </div>
                            ";
                        }
                        else {
                            if($nama_file != "") {
                                if($image_size > 1000000) {
                                    echo "
                                        <div class='alert alert-warning mt-3' role='alert'>
                                            Tambah produk gagal, file Foto tidak boleh lebih dari 1 mb
                                        </div>
                                    ";
                                }
                                else {
                                    if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                                        echo "
                                            <div class='alert alert-warning mt-3' role='alert'>
                                                Tambah produk gagal, File wajib bertipe 'jpg' atau 'png' atau 'gif'
                                            </div>
                                        ";  
                                    }
                                    else {
                                        move_uploaded_file($_FILES["fotoProduk"]["tmp_name"], $target_dir . $new_name);

                                        $insertProduk = mysqli_query($conn,"INSERT INTO produk (kategori_id, nama, kadar, berat, harga, foto, detail, ketersediaan_stok)
                                                                VALUES ('$kategori', '$produk', '$kadar', '$berat', '$harga', 
                                                                '$new_name', '$detail', '$ketersediaan_stok')");

                                        if($insertProduk) {
                                            echo "
                                                <div class='alert alert-success mt-3' role='alert'>
                                                    Produk Berhasil Tersimpan
                                                    <meta http-equiv='refresh' content='2; url=produk.php'/>
                                                </div>
                                                ";
                                        }
                                        else {
                                            echo mysqli_error($conn);
                                        }
                                    }
                                }
                            }
                            else {
                                $insertProduk = mysqli_query($conn,"INSERT INTO produk (kategori_id, nama, kadar, berat, harga, foto, detail, ketersediaan_stok)
                                                                VALUES ('$kategori', '$produk', '$kadar', '$berat', '$harga', 
                                                                '$new_name', '$detail', '$ketersediaan_stok')");

                                if($insertProduk) {
                                    echo "
                                        <div class='alert alert-success mt-3' role='alert'>
                                            Produk Berhasil Tersimpan
                                            <meta http-equiv='refresh' content='2; url=produk.php'/>
                                        </div>
                                        ";
                                }
                                else {
                                    echo mysqli_error($conn);
                                }
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
    <script src="../js/jquery-3.7.1.min.js"></script>
</body>

</html>