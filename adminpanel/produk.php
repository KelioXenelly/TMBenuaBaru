<?php
    require "session.php";
    require "../connection.php";

    $queryProduk = mysqli_query($conn, "SELECT *, produk.nama AS nama_produk, kategori.nama AS nama_kategori FROM produk 
                                        LEFT JOIN kategori ON produk.kategori_id = kategori.kategori_id");
    $rowProduk = mysqli_num_rows($queryProduk);

    // $sort = mysqli_query($conn, "SELECT * FROM ")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Produk</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="../DataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    .dt-input {
        margin-right: 10px;
    }
</style>

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
            </ol>
        </nav>

        <h2 class="fw-semibold fs-3">Daftar Produk</h2>

        <div class="row mt-3 mb-4">
            <div>
                <a href="tambah-produk.php" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Tambah Produk</a>
            </div>
        </div>
        
        <table class="table mt-2" id="datatables">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kadar</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Ketersediaan Stok</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                    if($rowProduk > 0) {
                        $number = 1;
                        while($dataProduk = mysqli_fetch_array($queryProduk)) {
                            echo '
                                <tr>
                                    <td>'.$number.'</td>
                                    <td>'.$dataProduk["nama_produk"].'</td>
                                    <td>'.$dataProduk["kadar"].'k</td>
                                    <td>'.str_replace('.', ',', $dataProduk["berat"]).' gr</td>
                                    <td>'.$dataProduk["nama_kategori"].'</td>
                                    <td>
                                        '.($dataProduk["foto"] != "" 
                                            ? '<img src="../img/'.$dataProduk["foto"].'" style="width: 150px; height: 100px;">'
                                            : '<img src="" "alt="foto belum dimasukkan" >"'
                                        ).'
                                    </td>
                                    <td>Rp'.str_replace(',', '.', number_format($dataProduk["harga"])).'</td>
                                    <td>'.ucwords($dataProduk["ketersediaan_stok"]).'</td>
                                    <td>
                                        <a href="edit-produk.php?id='.$dataProduk['produk_id'].'" class="btn btn-success">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <a href="delete-produk.php?id='.$dataProduk['produk_id'].'" class="delete-produk btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            ';
                            $number++;
                        }
                    } else {
                        echo '
                            <tr>
                                <td colspan="9" class="text-center">Produk tidak tersedia</td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
        
        <div class="mt-3">
            <?php require "footer.php" ?>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../DataTables/datatables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatables').DataTable();
        } );
    </script>
</body>

</html>