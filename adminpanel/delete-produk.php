<?php
    require "session.php";
    require "../connection.php";

    $id = $_GET['id'];

    if (isset($id)) {
        $produk_id = $id;

        $queryDelete = "DELETE FROM produk WHERE produk_id = '$produk_id'";

        if (mysqli_query($conn, $queryDelete)) {
            // Jika berhasil, kembali ke halaman kategori dengan pesan sukses
            header("Location: produk.php?status=success&message=Produk berhasil dihapus");
        } else {
            // Jika gagal, kembali ke halaman kategori dengan pesan error
            header("Location: produk.php?status=error&message=Gagal menghapus produk");
        }
    } else {
        // Jika tidak ada ID yang diberikan, kembali ke halaman kategori
        header("Location: produk.php");
    }

    mysqli_close($conn);
?>
