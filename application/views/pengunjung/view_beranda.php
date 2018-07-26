<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Daftar Buku</title>

	<!-- Bootstrap -->
	<link href="<?= base_url('public/assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?= base_url('public/assets/css/font-awesome.min.css') ?>" rel="stylesheet">
	<!-- End CSS -->


</head>

<body>
	<div id="app">
		<!-- Navbar -->
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url('daftarbuku') ?>">SIPERPUS</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">	
					<ul class="nav navbar-nav navbar-right">
						<li><button type="button" class="btn btn-default" style="margin-top: 7px" @click="getBuku()">Beranda</button></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
		<!-- End Navbar -->

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<center>
						<div class="form-group col-md-4 col-md-offset-4">
							<input type="text" class="form-control" placeholder="Cari berdasarkan judul, pengarang dan penerbit" v-model="search"> 
							<br>
							<button type="button" class="btn btn-default" @click="searchBuku(search)"><i class="fa fa-search"></i> Cari</button>
						</div>


						<br><br><br><br><br>
						<h4>Tampilkan berdasarkan inisial judul buku</h4>
						<div class="btn-group">
							<?php foreach ($alfabet as $key): ?>
								<button type="button" class="btn btn-default" @click="getInisial('<?php echo $key; ?>')" value="<?php echo $key; ?>"><?php echo $key; ?></button>	
							<?php endforeach ?>			
						</div>
						<br><br>
						<h4>Jenis buku</h4>
						<div class="btn-group">
							<button type="button" class="btn btn-default" v-for="jenis in jenis" @click="getJenisBy(jenis.jenis)">{{ jenis.jenis }} </button>
						</div>
					</center>
				</div>
			</div>

			<br>

			<div class="row">
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" v-for="buku in buku">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-book"></i> {{ buku.judul }}</h3>
						</div>
						<div class="panel-body">
							<ul style="list-style-type: none; padding: 0;">
								<li>Pengarang: {{ buku.pengarang }}</li>
								<li>Penerbit: {{ buku.penerbit }}</li>
								<li>Tahun Terbit: {{ buku.tahun_terbit }}</li>
								<li>Jumlah: {{ buku.jumlah }}
									<span class="label label-default pull-right">Tersedia {{ buku.jumlah - buku.dipinjam }}</span>
								</li>
								<li>Lokasi: {{ buku.lokasi }}
									<span class="label label-default pull-right">{{ buku.jenis }}</span>
								</li>
							</ul>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<?php $this->load->view('assets/view_js'); ?>
	<script src="<?= base_url('public/assets/js/axios.min.js') ?>"></script>
	<script src="<?= base_url('public/assets/js/vue.min.js') ?>"></script>
	<script>
		var vm = new Vue( {
			el: '#app',
			data: {
				buku: [],
				jenis: [],
				search: ''
			},

			mounted() {
				this.getBuku(),
				this.getJenis()
			},

			methods: {
				getBuku: function(){
					axios.get('<?php echo base_url('api/buku') ?>')
					.then(response => {this.buku = response.data})
					.catch(function (error) {
						console.log(error);
					})
				},
				getInisial: function(inisial){
					axios.get('<?php echo base_url('api/inisial/') ?>' + inisial)
					.then(response => {this.buku = response.data})
					.catch(function (error) {
						console.log(error);
					})
				},
				getJenis: function(){
					axios.get('<?php echo base_url('api/jenis') ?>')
					.then(response => {this.jenis = response.data})
					.catch(function (error) {
						console.log(error);
					})	
				},
				getJenisBy: function(jenis) {
					axios.get('<?php echo base_url('api/jenisBy/') ?>' + jenis)
					.then(response => {this.buku = response.data
					})
					.catch(function (error) {
						console.log(error);
					})
				},
				searchBuku: function (search) {
					axios.get('<?php echo base_url('api/searchBuku/') ?>' + search)
					.then(response => {this.buku = response.data
					})
					.catch(function (error) {
						console.log(error);
					})
				}
			}
		});
	</script>
	<!-- End JS -->
</body>
</html>