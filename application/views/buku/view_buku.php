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
						<a href="<?= base_url('beranda') ?>" class="site_title"><i class="fa fa-laptop"></i> <span>SI Perpustakaan</span></a>
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

						<!-- Notification -->
						<?php
                        $info = $this->session->flashdata('info');
                        if (isset($info)) {
                            ?>
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<strong><?php echo $info; ?></strong>
							</div>
							<?php
                        } ?>

								<!-- Menu -->
								<div class="container-fluid">
									<div class="row">

										<!-- Button modal -->

										<a class="btn btn-primary btn-sm" data-toggle="modal" href='#modal-tambahuser'><i class="fa fa-book"></i> Tambah Buku</a>
										<a class="btn btn-primary btn-sm" data-toggle="modal" href='#modal-jenisbuku'><i class="fa fa-tag"></i> Tambah Jenis Buku</a>

										<!-- Modal -->
										<div class="modal fade" id="modal-jenisbuku">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title"><i class="fa fa-tag"></i> Tambah Jenis Buku</h4>
													</div>
													<div class="modal-body">
														<form action="<?php echo base_url('buku/addJenisBuku'); ?>" method="post" class="form-horizontal form-label-left">
															<div class="form-group">
																<label class="control-label col-md-3 col-sm-3 col-xs-12" for="jenis">Jenis Buku
														</label>
																<div class="col-md-6 col-sm-6 col-xs-12">
																	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
																		<input type="text" name="jenis" id="jenis" class="form-control col-md-7 col-xs-12" required placeholder="Jenis buku" size="50">
																	</div>
																</div>
															</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-angle-double-left"></i> Kembali</button>
														<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
														</form>
													</div>
												</div>
											</div>
										</div>

										<div class="modal fade" id="modal-tambahuser">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title"><i class="fa fa-book"></i> Tambah Buku</h4>
													</div>
													<div class="modal-body">
														<br />
														<form action="<?= base_url(); ?>buku/add" method="post" class="form-horizontal form-label-left">
															<div class="form-group">
																<label class="control-label col-md-3 col-sm-3 col-xs-12" for="judul">Judul
														</label>
																<div class="col-md-6 col-sm-6 col-xs-12">
																	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
																		<input type="text" name="judul" id="judul" class="form-control col-md-7 col-xs-12" required placeholder="Judul buku" size="50">
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label for="jenis" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis</label>
																<div class="col-md-6 col-sm-6 col-xs-12">
																	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
																		<select name="jenis" id="jenis" class="form-control" required>
																	<option value="">Pilih jenis</option>
																	<?php
                                                                    foreach ($jenis as $key) {
                                                                        ?>
																	<option value="<?php echo $key->jenis; ?>"><?php echo $key->jenis; ?></option>
																	<?php
                                                                    } ?>
																</select>
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label for="pengarang" class="control-label col-md-3 col-sm-3 col-xs-12">Pengarang</label>
																<div class="col-md-6 col-sm-6 col-xs-12">
																	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
																		<input id="pengarang" class="form-control col-md-7 col-xs-12" type="text" name="pengarang" required placeholder="Pengarang buku"
																		 size="40">
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label for="penerbit" class="control-label col-md-3 col-sm-3 col-xs-12">Penerbit</label>
																<div class="col-md-6 col-sm-6 col-xs-12">
																	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
																		<input id="penerbit" class="form-control col-md-7 col-xs-12" type="text" name="penerbit" required placeholder="Penerbit buku"
																		 size="40">
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label for="tahun_terbit" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Terbit</label>
																<div class="col-md-6 col-sm-6 col-xs-12">
																	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
																		<input id="tahun_terbit" class="form-control col-md-7 col-xs-12" type="number" name="tahun_terbit" required placeholder="Tahun terbit buku"
																		 size="4">
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label for="jumlah" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah</label>
																<div class="col-md-6 col-sm-6 col-xs-12">
																	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
																		<input id="jumlah" class="form-control col-md-7 col-xs-12" type="number" name="jumlah" required placeholder="Jumlah Buku"
																		 size="2">
																	</div>
																</div>
															</div>
															<div class="form-group">
																<label for="lokasi" class="control-label col-md-3 col-sm-3 col-xs-12">Lokasi Buku</label>
																<div class="col-md-6 col-sm-6 col-xs-12">
																	<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
																		<input id="lokasi" class="form-control col-md-7 col-xs-12" type="text" name="lokasi" required placeholder="Lokasi rak buku"
																		 size="30">
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
										<h2><i class="fa fa-book"></i>
											<?php echo $title; ?><small>SI Perpustakaan</small></h2>
										<div class="clearfix"></div>
									</div>

									<div class="x_content">
										<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"
										 style="font-size: 13px">
											<thead>
												<tr>
													<th>#</th>
													<th>Judul</th>
													<th>Jenis</th>
													<th>Pengarang</th>
													<th>Penerbit</th>
													<th>Jumlah</th>
													<th>Lokasi</th>
													<th class="no-search">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; foreach ($buku as $key) {
                                                                        ?>
												<tr>
													<td>
														<?= $i++; ?>
													</td>
													<td><a href="<?= base_url('buku/show/'.$key->id_buku) ?>"><i class="fa fa-book"></i> <?= $key->judul; ?></a></td>
													<td><?= $key->jenis; ?></td>
													<td><?= $key->pengarang; ?></td>
													<td><?= $key->penerbit; ?></td>
													<td><?= $key->jumlah; ?></td>
													<td><?= $key->lokasi; ?></td>
													<td>
														<a href="<?= base_url('buku/show/'.$key->id_buku) ?>" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Lihat</a>
														<a href="<?= base_url('buku/edit/'.$key->id_buku) ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Ubah</a>
														<a href="<?= base_url('buku/delete/'.$key->id_buku) ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</a>
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