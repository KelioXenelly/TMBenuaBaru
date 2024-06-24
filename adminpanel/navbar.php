<style>
    :root {
        --topNavbarHeight: 56px;
    }

    @media (min-width: 992px) {
        body {
            overflow: auto;
        }

        .offcanvas-backdrop {
            display: none !important;
        }

        .main {
            padding-left: 300px;
            padding-right: 30px;
            padding-top: 80px;
            height: 100vh;
        }

        .sidebar-nav {
            transform: none !important;
            visibility: visible !important;
            height: calc(100% - var(--topNavbarHeight));
            position: fixed;
        }

        .sidebar-nav .offcanvas-header {
            display: none;
        }
        
        .side-link:hover {
            background-color: rgba(100, 100, 100, .2);
        }
    }
</style>
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <!-- Offcanvas Trigger -->
        <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
        </button>
        <!-- Offcanvas Trigger -->
        <a class="navbar-brand fw-bold text-uppercase me-auto" href="#">TokoMasBenuaBaru</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text-white-50 me-2">Admin</span>
                        <i class="fas fa-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="../index.php">Shop</a></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<!-- Offcanvas Start -->
<div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" style="width: 270px; top: 56px;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div class="navbar-dark">
            <ul class="navbar-nav my-2">
                <li>
                    <div class="text-white-50 small fw-bold px-3">HOME</div>
                </li>
                <li class="mt-2">
                    <a href="../adminpanel/" class="nav-link px-3 active side-link">
                        <span class="me-2"><i class="fas fa-tachometer-alt fs-5"></i></span>
                        <span class="ms-3 fs-6">Dashboard</span>
                    </a>
                </li>
                <li class="my-1">
                    <hr>
                </li>
                <li>
                    <li>
                        <div class="text-white-50 small fw-bold px-3">MENGELOLA</div>
                    </li>
                </li>
                <li class="mt-2">
                    <a href="kategori.php" class="nav-link px-3 active side-link">
                        <span class="me-2"><i class="fas fa-list fs-5"></i></span>
                        <span class="ms-3 fs-6">Kategori</span>
                    </a>
                    <a href="produk.php" class="nav-link px-3 mt-2 active side-link">
                        <span class="me-2"><i class="fas fa-briefcase fs-5"></i></span>
                        <span class="ms-3 fs-6">Produk</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Offcanvas End -->