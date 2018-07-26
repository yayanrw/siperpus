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
								<a class="btn btn-primary btn-sm" data-toggle="modal" href='#modal-tambahuser'><i class="fa fa-user-plus"></i> Ubah Denda</a>

								<?php echo validation_errors(); ?>

								<div class="modal fade" id="modal-tambahuser">
									<div class="modal-dialog modal-xs">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title"><i class="fa fa-user-plus"></i> Tambah Anggota</h4>
											</div>
											<div class="modal-body">
												<br />
												<form action="<?= base_url('pendendaan/updateDenda/1'); ?>" method="post" class="form-horizontal form-label-left">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nim">Denda
														</label>
														<div class="col-md-6 col-sm-6 col-xs-12">
															<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
																<input type="number" name="denda" id="denda" class="form-control col-md-7 col-xs-12" required placeholder="Jumlah denda" size="10" value="<?php echo $denda->denda ?>">
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
											<th class="no-search">Jumlah Denda</th>
											<th class="no-search">Tanggal</th>
											<th class="no-sort no-search">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($pendendaan as $key) {?>
										<tr>
											<td><?= $key->nim; ?></td>
											<td><a href="<?= base_url('anggota/show/'.$key->nim); ?>"><i class="fa fa-user"></i> <?= $key->nama; ?></a></td>
											<td><?= $key->total; ?></td>
											<td><?= $key->tgl_kembali; ?></td>
											<td>
												<a href="<?= base_url('peminjaman/show/'.$key->id_peminjaman); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Lihat</a>
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
