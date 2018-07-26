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
						<?php $info = $this->session->flashdata('info');
						if (isset($info)) {?>
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong><?php echo $info; ?></strong>
						</div>
						<?php } ?>

							<!-- Menu -->
							<div class="container-fluid">
								<div class="row">
									<div class="dropdown">
									<button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-filter"></i> Filter Peminjaman <span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="<?php echo base_url('peminjaman') ?>"><i class="fa fa-book"></i> Semua peminjaman</a></li>
											<li><a href="<?php echo base_url('peminjaman/sedangdipinjam') ?>"><i class="fa fa-clock-o"></i> Sedang Dipinjam</a></li>
											<li><a href="<?php echo base_url('peminjaman/sudahdikembalikan') ?>"><i class="fa fa-check"></i> Sudah Dikembalikan</a></li>
											<li><a href="<?php echo base_url('peminjaman/terlambat') ?>"><i class="fa fa-exclamation-circle"></i> Terlambat</a></li>
										</ul>
									<a class="btn btn-primary btn-sm" data-toggle="modal" href='#modal-inputpeminjaman'><i class="fa fa-refresh"></i> Input Peminjaman</a>
									</div>
								</div>
							</div>

							<!-- End Menu -->
									
							<!-- Panel -->
							<div class="x_panel">
								<div class="x_title">
									<h2>
										<?php echo $title; ?><small>SI Perpustakaan</small></h2>
									<div class="clearfix"></div>
								</div>

								<div class="x_content">
									<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"
									 style="font-size: 13px">
										<thead>
											<tr>
												<th>#</th>
												<th>Peminjam</th>
												<th>Buku</th>
												<th>Tanggal Pinjam</th>
												<th>Tanggal Kembali</th>
												<th>Status</th>
												<th class="no-sort no-search">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; foreach ($peminjaman as $key) {?>
											<tr>
												<td>
													<?= $i++; ?>
												</td>
												<td><a href="<?= base_url('anggota/show/'.$key->nim) ?>"><i class="fa fa-user"></i> <?php echo $key->nama; ?></a></td>
												<td><a href="<?= base_url('buku/show/'.$key->id_buku) ?>"><i class="fa fa-book"></i> <?php echo $key->judul; ?></a></td>
												<td><?= date('d-M-Y', strtotime($key->tgl_pinjam)); ?></td>
												<td><?= date('d-M-Y', strtotime($key->tgl_kembali)); ?></td>
												<td>
													<?php 
													if(date('Y-m-d') > $key->tgl_kembali && $key->status == 'Belum Kembali') {
														echo "<span class='label label-danger' style='font-size: 11px'>Terlambat</span>";
													} elseif ($key->status == 'Belum Kembali') {
														echo "<span class='label label-primary' style='font-size: 11px'>Sedang dipinjam</span>";
													} elseif($key->status == 'Sudah Kembali'){
														echo "<span class='label label-success' style='font-size: 11px'>".$key->status .'</span>';
													}
													 ?></td>
												<td>
													<a href="<?= base_url('peminjaman/show/'.$key->id_peminjaman); ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Lihat</a>
													<?php if ($key->status == 'Belum Kembali') { ?>
													<a class="btn btn-success btn-xs" href="<?= base_url('peminjaman/edit/'.$key->id_peminjaman) ?>"><i class="fa fa-check"></i> Kembalikan Buku</a>
													<?php } ?>
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
		$(function () {
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

	<?php
	$notif = $this->session->flashdata('notif');
	if (isset($notif)) { ?>
	<script>
		$(document).ready(function () {
			$('#notif').modal('show')
		});
	</script>
	<?php } ?>

	<!-- Modal Notif Pinjam -->
	<div class="modal fade" id="notif" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id=""><i class="fa fa-info-circle"></i> Pemberitahuan</h4>
				</div>
				<div class="modal-body text-center">
					
					<h2><?php echo $notif ?></h2>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal -->

	<!-- Modal Dikembalikan -->
	<div class="modal fade" id="modal-dipinjam">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-info-circle"></i> Konfirmasi</h4>
				</div>
				<div class="modal-body text-center">
					<h1 style="font-size:50px;"><i class="fa fa-info-circle"></i></h1>
					<h2>Kembalikan buku?</h2>
				</div>
				<div class="modal-footer">
					<form action="">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
					<button type="submit" class="btn btn-primary">Ya</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal -->

	<!-- Modal Menu -->
	<div class="modal fade" id="modal-inputpeminjaman">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><i class="fa fa-refresh"></i> Input Peminjaman</h4>
				</div>
				<div class="modal-body">
					<br />
					<form action="<?= base_url('peminjaman/store/pinjam'); ?>" method="post" class="form-horizontal form-label-left">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nim">Peminjam
					</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
									<input type="number" name="nim" id="nim" class="form-control col-md-7 col-xs-12" required placeholder="Nomor Induk Mahasiswa"
										size="10">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="id_buku" class="control-label col-md-3 col-sm-3 col-xs-12">ID Buku</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
									<input id="id_buku" class="form-control col-md-7 col-xs-12" type="number" name="id_buku" required placeholder="ID Buku" size="3">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Kembali</button>
							<button type="submit" class="btn btn-success" name="simpan">Input <i class="fa fa-arrow-circle-right"></i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal Menu -->

	<!-- End JS -->


</body>

</html>