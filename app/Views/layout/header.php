
<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="<?= base_url('/');?>assets/favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap5" />

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="<?= base_url('/');?>assets/fonts/icomoon/style.css">
	<link rel="stylesheet" href="<?= base_url('/');?>assets/fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

	<link rel="stylesheet" href="<?= base_url('/');?>assets/css/tiny-slider.css">
	<link rel="stylesheet" href="<?= base_url('/');?>assets/css/aos.css">
	<link rel="stylesheet" href="<?= base_url('/');?>assets/css/glightbox.min.css">
	<link rel="stylesheet" href="<?= base_url('/');?>assets/css/style.css">

	<link rel="stylesheet" href="<?= base_url('/');?>assets/css/flatpickr.min.css">
	<link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


	<title>Informasi Gunung dan Kebutuhan Kalori</title>
</head>
<body>

	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav" style="position:fixed !important; z-index: 999;">
		<div class="container">
			<div class="menu-bg-wrap ">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="<?= base_url('../');?>" class="logo m-0 float-start">PENDAKIAN.ID<span class="text-primary">.</span></a>
						</div>
						<div class="col-8 text-center">
							<!-- <form action="#" class="search-form d-inline-block d-lg-none">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form> -->

							<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="<?= base_url('../');?>#sec-gunung">Informasi Gunung</a></li>
								<li><a href="<?= base_url('../');?>#sec-kalori">Perhitungan Kalori</a></li>
								<li><a href="<?= base_url('../');?>#sec-makanan">Saran Logistik Makanan</a></li>
								<li><a href="<?= base_url('../');?>#sec-footer">Tentang Kami</a></li>
								<?php if (session()->get('username')!== null) : ?>
								<li class="has-children">
											<a href="#">Tambah Data</a>
											<ul class="dropdown">
												<li><a href="<?= base_url('/form-tambah-data');?>">Form Tambah Data</a></li>
												<li><a href="<?= base_url('/status-gunung');?>">Status Gunung</a></li>
												<li><a href="<?= base_url('/status-jalur');?>">Status Jalur</a></li>
												<li><a href="<?= base_url('/status-pos');?>">Status Pos</a></li>
											</ul>
										</li>
								<?php endif; ?>
							</ul>
						</div>
						<div class="col-2 text-end">
						<?php if (session()->get('username')!== null) : ?>
							<button id="logout" class="btn btn-sm btn-outline-light ms-auto float-end d-none d-md-block" style="padding: 10px 20px; border-radius: 23px">Logout</button>
						 <?php else:?>
							
							<a href="<?= base_url('login');?>" class="btn btn-sm btn-outline-light ms-auto float-end d-none d-md-block" style="padding: 10px 20px; border-radius: 23px">Login</a>
							<?php endif; ?>
							
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
<script>
	const myButton = document.getElementById('logout');
        myButton.addEventListener('click', function() {
            Swal.fire({
                title: "Yakin mau keluar?",
                text: "Anda akan logout dari sistem",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya!",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Berhasil Keluar!",
                        text: "Anda logout dari sistem",
                        icon: "success"
                    });
                    window.location.href = "<?= base_url('logout')?>";
                }
            });
        });
</script>