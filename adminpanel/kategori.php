<?php
    require "session.php";
    require "../connection.php";

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
    $rowKategori = mysqli_num_rows($queryKategori);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css">
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
            </ol>
        </nav>
        
        <h2 class="fw-semibold fs-3">Daftar Kategori</h2>

        <div class="row mt-3">
            <div>
                <a href="tambah-kategori.php" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i>Tambah Kategori</a>
            </div>
        </div>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                    if($rowKategori > 0) {
                        $number = 1;
                        while($dataKategori = mysqli_fetch_array($queryKategori)) {
                            echo '
                                <tr>
                                    <td>'.$number.'</td>
                                    <td>'.$dataKategori["nama"].'</td>
                                    <td>
                                        <a href="edit-kategori.php?id='.$dataKategori['kategori_id'].'" class="btn btn-success">
                                            <i class="fa-solid fa-pencil"></i>
                                        </a>
                                        <a href="delete-kategori.php?id='.$dataKategori['kategori_id'].'" class="delete-kategori btn btn-danger">
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
                                <td colspan="3" class="text-center">Kategori tidak tersedia</td>
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
</body>

</html>