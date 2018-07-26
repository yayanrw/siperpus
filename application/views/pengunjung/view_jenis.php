<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Daftar Buku</title>

	<!-- Bootstrap core CSS -->

	<!-- Custom styles for this template -->
	<link href="<?php echo base_url('public/assets/css/bootstrap2.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/assets/css/heroic-features.css') ?>" rel="stylesheet">

</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">SIPERPUS</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo base_url('daftarbuku/beranda') ?>">Beranda
							<span class="sr-only">(current)</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<!-- Page Content -->
	<div class="container">

		<!-- Jumbotron Header -->
		<header class="jumbotron my-4">
			<h1 class="">Selamat Datang</h1><h2>di Sistem Informasi Perpustakaan</h2>
			<p class="lead">Cari buku yang anda inginkan pada form dibawah ini.</p>
			<form action="" class="form-horizontal">
				<div class="form-grup ">
					<input type="text" class="form-control col-md-6" placeholder="Cari berdasarkan judul buku, pengarang dan penerbit">

					<button type="submit" class="btn btn-info col-md-2">Cari</button>
				</div>
			</form>
		</header>

		<!-- Page Features -->
		<div class="container-fluid">
			<h2>Buku </h2>
			<div class="row text-center">
				<?php foreach ($buku as $key): ?>
					<div class="col-lg-3 col-md-6 mb-4">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title"><?php echo $key->judul; ?></h4>
								<p class="card-text">
									<i class="fa fa-user"><?php echo $key->pengarang; ?></i><br>
									Penerbit <u><?php echo $key->penerbit; ?>.</u> <?php echo $key->tahun_terbit; ?>
								</p>
							</div>
							<div class="card-footer">
								<a href="<?php echo base_url('daftarbuku/show/'. $key->id_buku) ?>" class="btn btn-primary">Lihat detail</a>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<a href="" class="btn btn-default btn-xs">Lihat selengkapnya...</a>
		</div>
		

		<!-- /.row -->

	</div>
	<!-- /.container -->

	<!-- Footer -->
	<footer class="py-5 bg-dark">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; SIPERPUS 2017</p>
		</div>
		<!-- /.container -->
	</footer>

	<!-- Bootstrap core JavaScript -->
	<?php $this->load->view('assets/view_js'); ?>
	<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

</body>

</html>
