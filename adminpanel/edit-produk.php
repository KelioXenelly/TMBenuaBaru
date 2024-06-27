<?php
    require "session.php";
    require "../connection.php";

    $id = $_GET["id"];
    
    $queryProduk = mysqli_query($conn, "SELECT *, produk.nama AS nama_produk, kategori.nama AS nama_kategori FROM produk 
                                        LEFT JOIN kategori ON produk.kategori_id = kategori.kategori_id WHERE produk_id = '$id'");
    $dataProduk = mysqli_fetch_array($queryProduk);
    
    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori WHERE kategori_id != {$dataProduk['kategori_id']}");

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
    <title>Admin | Edit Produk</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                    <span class="fs-6">Edit Produk</span>
                </li>
            </ol>
        </nav>

        <h2 class="fw-semibold fs-3">Edit Produk</h2>
        
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
                                <input type="text" name="produk" value="<?php echo $dataProduk["nama_produk"] ?>" id="produk" placeholder="Input nama produk" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="kadar" class="form-label">Kadar (k)</label>
                                <input type="number" name="kadar" value="<?php echo $dataProduk["kadar"] ?>" id="kadar" placeholder="Input kadar produk" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="berat" class="form-label">Berat (gr)</label>
                                <input type="number" step="0.001" name="berat" value="<?php echo $dataProduk["berat"] ?>" id="berat" placeholder="Input berat produk" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="mt-3">
                                <label for="currentFoto">Foto Produk Sekarang</label>
                                <?php
                                    echo ($dataProduk["foto"] != "" 
                                    ? '<img src="../img/'.$dataProduk["foto"].'" style="width: 300px; height: 200px;" class="d-block mt-2">'
                                    : '<img src="" "alt="foto belum dimasukkan" >"');
                                    ?>
                            </div>
                            <div class="mt-3 col-md-6">
                                <label for="fotoProduk" class="form-label">Ganti Foto Produk</label>
                                <input type="file" name="fotoProduk" id="fotoProduk" class="form-control">
                            </div>
                            <div class="mt-3 col-md-6">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control" required> 
                                    <option value="<?php echo $dataProduk['kategori_id'] ?>"><?php echo $dataProduk['nama_kategori'];?></option>
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
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" value="<?php echo $dataProduk['harga'] ?>" id="harga" placeholder="Input harga produk" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="mt-3 col-md-6">
                                <label for="ketersediaan_stok" class="form-label">Ketersediaan Stok</label>
                                <select name="ketersediaan_stok" id="ketersediaan_stok" class="form-control">
                                    <?php
                                        if($dataProduk["ketersediaan_stok"] == 'tersedia') {
                                            echo '
                                                <option value="tersedia">Tersedia</option>
                                                <option value="habis">Habis</option>
                                            ';
                                        }
                                        else {
                                            echo '
                                                <option value="habis">Habis</option>
                                                <option value="tersedia">Tersedia</option>
                                            ';
                                        }
                                    ?>
                                    
                                </select>
                            </div>
                            <div class="mt-3 col-12">
                                <label for="detailProduk">Detail</label>
                                <textarea name="detailProduk" id="detailProduk" cols="30" rows="6" class="form-control">
                                    <?php echo $dataProduk['detail'] ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-1 mb-3">
                    <button type="submit" class="btn btn-primary mt-4" name="simpan_produk"><i class="fas fa-save me-2"></i></i>Simpan</button>
                </div>
            </form>
        </div>
        <div class="row mt-2">
            <div>
                <?php
                    if(isset($_POST["simpan_produk"])) {
                        $produk = htmlspecialchars($_POST["produk"]);
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

                        if($produk == "" && $kadar == "" && $berat = "" && $kategori == "" && $harga == "") {
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
                                            Edit produk gagal, File foto tidak boleh lebih dari 1 mb
                                        </div>
                                    ";
                                }
                                else {
                                    if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif') {
                                        echo "
                                            <div class='alert alert-warning mt-3' role='alert'>
                                                Edit produk gagal, File wajib bertipe 'jpg' atau 'png' atau 'gif'
                                            </div>
                                        ";  
                                    }
                                    else {
                                        move_uploaded_file($_FILES["fotoProduk"]["tmp_name"], $target_dir . $new_name);

                                        $queryUpdateFoto = mysqli_query($conn, "UPDATE produk SET foto = '$new_name'
                                                                                WHERE produk_id = '$id'");

                                        if($queryUpdateFoto) {
                                            echo "
                                                <div class='alert alert-success mt-3' role='alert'>
                                                    Produk dan Foto Berhasil Diupdate
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
                                $updateProduk = mysqli_query($conn,"UPDATE produk SET nama = '$produk', 
                                                                    kadar = '$kadar', berat = '$berat',
                                                                    kategori_id = '$kategori', harga='$harga',
                                                                    ketersediaan_stok = '$ketersediaan_stok',
                                                                    detail = '$detail' WHERE produk_id = '$id'");
                                echo "
                                    <div class='alert alert-success mt-3' role='alert'>
                                        Produk Berhasil Diupdate
                                        <meta http-equiv='refresh' content='2; url=produk.php'/>
                                    </div>
                                    ";
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>