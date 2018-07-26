<html lang="id">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SI Perpustakaan</title>

	<!-- CSS -->
	<?php $this->load->view('assets/view_css'); ?>
	<?php $this->load->view('assets/view_cssdatatable'); ?>
	<!-- End CSS -->

</head>

<body class="nav-md footer_fixed">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="<?= base_url() ?>beranda" class="site_title"><i class="fa fa-laptop"></i> <span>SI Perpustakaan</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<?php $this->load->view('menu/view_quickinfo'); ?>
					<!-- /menu profile quick info -->
					<br />

					<!-- Menu Sidebar -->
					<?php $this->load->view('menu/view_sidebar'); ?>
					<!-- End Menu Sidebar -->

				</div>
			</div>
			
			<!-- Top Nav -->
			<?php $this->load->view('menu/view_topnav'); ?>
			<!-- End Top Nav -->


			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php
						$info = $this->session->flashdata('info');
						if (isset($info)) {?>
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong><?php echo $info; ?></strong>
						</div>
						<?php } ?>

					<!-- Menu -->
					<div class="container-fluid">
						<div class="row">
							<a class="btn btn-primary btn-sm" data-toggle="modal" href='#modal-tambahuser'><i class="fa fa-user-plus"></i> Tambah Anggota</a>

							<?php echo validation_errors(); ?>

							<div class="modal fade" id="modal-tambahuser">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title"><i class="fa fa-user-plus"></i> Tambah Anggota</h4>
										</div>
										<div class="modal-body">
											<br />
											<form action="<?= base_url('anggota/store'); ?>" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nim">NIM
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
															<input type="number" name="nim" id="nim" class="form-control col-md-7 col-xs-12" required placeholder="Nomor Induk Mahasiswa" size="10">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label for="nama" class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
															<input id="nama" class="form-control col-md-7 col-xs-12" type="text" name="nama" required placeholder="Nama lengkap" size="40">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label for="jurusan" class="control-label col-md-3 col-sm-3 col-xs-12">Jurusan / Prodi</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="col-md-4 col-xs-6 col-lg-6">
															<select name="jurusan" id="jurusan" class="form-control" required>
																<option value="">Pilih Jurusan</option>
																<?php
																foreach ($jurusan as $key) {?>
																<option value="<?php echo $key->jurusan; ?>"><?php echo $key->jurusan; ?></option>
																<?php } ?>
															</select>
														</div>
														<div class="col-md-4 col-xs-6 col-lg-6">
															<select name="prodi" id="prodi" class="form-control" required>
																<option value="">Pilih Prodi</option>
																<?php
																foreach ($prodi as $key) {?>
																<option value="<?php echo $key->prodi; ?>"><?php echo $key->prodi; ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="col-md-6 col-sm-6 col-xs-12">
															<input type="radio" name="jk" value="Laki-laki" required> &nbsp; Laki-laki &nbsp;
															<input type="radio" name="jk" value="Perempuan" required> Perempuan
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat dan Tanggal Lahir</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="col-md-4 col-xs-6 col-lg-6">
															<input type="text" name="tempat" id="tempat" class="form-control" required placeholder="Tempat lahir" size="25">
														</div>
														<div class="col-md-4 col-xs-6 col-lg-6">
															<input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label for="no_telp" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Telepon</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
															<input id="no_telp" class="form-control col-md-7 col-xs-12" type="number" name="no_telp" required placeholder="08**********" size="12">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label for="alamat" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
															<textarea id="alamat" class="form-control col-md-7 col-xs-12" type="text" name="alamat" required placeholder="Alamat saat ini" size="120"></textarea>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label for="foto" class="control-label col-md-3 col-sm-3 col-xs-12">Foto Profil</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
															<input id="foto" class="col-md-7 col-xs-12" type="file" name="foto" required size="100">
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-angle-double-left"></i> Kembali</button>
													<button type="submit" class="btn btn-success" name="simpan"><i class="fa fa-save"></i> Simpan</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Panel -->
					<div class="x_panel">
						<div class="x_title">
							<h2><?php echo $title; ?><small>SI Perpustakaan</small></h2>
							<div class="clearfix"></div>
						</div>

						<div class="x_content">
							<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" style="font-size: 13px">
								<thead>
									<tr>
										<th>NIM</th>
										<th>Nama</th>
										<th class="no-search">Jurusan</th>
										<th class="no-search">Jenis Kelamin</th>
										<th class="no-search">Tanggal Lahir</th>
										<th>No. Telp</th>
										<th class="no-sort no-search">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($anggota as $key) {?>
									<tr>
										<td><?= $key->nim; ?></td>
										<td><a href="<?= base_url('anggota/show/'.$key->nim); ?>"><i class="fa fa-user"></i> <?= $key->nama; ?></a></td>
										<td><?= $key->jurusan; ?></td>
										<td><?= $key->jk; ?></td>
										<td><?= $key->tgl_lahir; ?></td>
										<td><?= $key->no_telp; ?></td>
										<td>
											<a href="<?= base_url('anggota/show/'.$key->nim); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Lihat</a>
											<a href="<?= base_url('anggota/edit/'.$key->nim); ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Ubah</a>
											<a href="<?= base_url('anggota/delete/'.$key->nim); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /page content -->

		<!-- Footer -->
		<?php $this->load->view('menu/view_footer'); ?>
		<!-- End Footer -->

	</div>
</div>

<!-- JS -->
<?php $this->load->view('assets/view_js'); ?>
<?php $this->load->view('assets/view_jsdatatable'); ?>
<script type="text/javascript">
	$(function() {
		$("#datatable-responsive").DataTable({
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false,
				"searchable": false,
				"targets": 'no-search'
			}]
		});
	});
</script>
<?php $this->load->view('assets/view_jscustom'); ?>
<!-- End JS -->


</body>
</html>
