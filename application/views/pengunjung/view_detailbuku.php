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

	<link href="<?php echo base_url('public/assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<!-- <link href="<?php echo base_url('public/assets/css/bootstrap2.min.css') ?>" rel="stylesheet"> -->
	<link href="<?php echo base_url('public/assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('public/assets/css/heroic-features.css') ?>" rel="stylesheet">

</head>

<body>

	<!-- Page Content -->
	<div class="container">
		<!-- Page Features -->
		<div class="container-fluid">
			<h2>Detail Buku </h2>
			<div class="row text-center">
				<form class="form-horizontal form-label-left">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="judul">Judul</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
								<input class="form-control col-md-7 col-xs-12" value="<?= $buku->judul ?>" readonly>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis">Jenis</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
								<input class="form-control col-md-7 col-xs-12" value="<?= $buku->jenis ?>" readonly>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pengarang">Pengarang</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
								<input class="form-control col-md-7 col-xs-12" value="<?= $buku->pengarang ?>" readonly>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="penerbit">Penerbit</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
								<input class="form-control col-md-7 col-xs-12" value="<?= $buku->penerbit ?>" readonly>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tahun_terbit">Tahun Terbit</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
								<input class="form-control col-md-7 col-xs-12" value="<?= $buku->tahun_terbit ?>" readonly>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="jumlah">Jumlah</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
								<input class="form-control col-md-7 col-xs-12" value="<?= $buku->jumlah ?>" readonly><br><br>
								<span class="label label-primary">*Tersedia <?= $buku->jumlah - $buku->dipinjam ?> buku</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi">Lokasi</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
								<input class="form-control col-md-7 col-xs-12" value="<?= $buku->lokasi ?>" readonly>
							</div>
						</div>
					</div>
				</form>
			</div>
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
