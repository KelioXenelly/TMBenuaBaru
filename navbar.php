<style>
	.navbar {
		position: fixed;
		width: 100%;
		z-index: 1000;
		top: 0;
	}
</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand fw-bold text-uppercase ms-3 me-auto" href="#">TokoMasBenuaBaru</a>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link me-3" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link me-3" href="tentang-kami.php">Tentang Kami</a>
				</li>
				<li class="nav-item">
					<a class="nav-link me-3" href="produk.php">Produk</a>
				</li>
				<li class="nav-item">
					<a class="btn btn-outline-light me-3" href="adminpanel/">Login</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<script>
	document.querySelectorAll(".nav-link").forEach((link) => {
		if (link.href === window.location.href) {
			link.classList.toggle("active");
			link.setAttribute("aria-current", "page");
		}
	});
</script>