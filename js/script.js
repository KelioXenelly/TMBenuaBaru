$(document).ready(function() {
    $('a.delete-kategori').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.confirm({
            title: 'Konfirmasi!',
            content: 'Apakah anda yakin ingin menghapus kategori ini?',
            buttons: {
                confirm: {
                    text: 'Ya',
                    action: function() {
                        window.location.href = url;
                    }
                },
                cancel: {
                    text: 'Tidak',
                    action: function() {
                        $.alert('Kategori tidak dihapus.');
                    }
                }
            }
        });
    });
    
    $('a.delete-produk').on('click', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.confirm({
            title: 'Konfirmasi!',
            content: 'Apakah anda yakin ingin menghapus produk ini?',
            buttons: {
                confirm: {
                    text: 'Ya',
                    action: function() {
                        window.location.href = url;
                    }
                },
                cancel: {
                    text: 'Tidak',
                    action: function() {
                        $.alert('Produk tidak dihapus.');
                    }
                }
            }
        });
    });
});