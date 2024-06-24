<?php
    require "session.php";
    require "../connection.php";

    $id = $_GET['id'];

    if (isset($id)) {
        $kategori_id = $id;

        $queryDelete = "DELETE FROM kategori WHERE kategori_id = '$kategori_id'";

        if (mysqli_query($conn, $queryDelete)) {
            // Jika berhasil, kembali ke halaman kategori dengan pesan sukses
            header("Location: kategori.php?status=success&message=Kategori berhasil dihapus");
        } else {
            // Jika gagal, kembali ke halaman kategori dengan pesan error
            header("Location: kategori.php?status=error&message=Gagal menghapus kategori");
        }
    } else {
        // Jika tidak ada ID yang diberikan, kembali ke halaman kategori
        header("Location: kategori.php");
    }

    mysqli_close($conn);
?>
