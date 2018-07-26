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
                    if (isset($info)) {
                        ?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong><?php echo $info; ?></strong>
					</div>
					<?php
                    }
                ?>

				<!-- Panel -->
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2><i class="fa fa-tag"></i> <?php echo $title; ?><small>SI Perpustakaan</small></h2>
								<div class="clearfix"></div>
							</div>

							<div class="x_content">
								<table class="table table-condensed">
									<thead>
										<tr>
											<th>#</th>
											<th>Nama Jenis Buku</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php $no=1; foreach ($jenis as $key) {
                    ?>
										<tr>
											<td><?php echo $no++; ?>.</td>
											<td><i class="fa fa-tag"></i> <?php echo $key->jenis; ?></td>
											<td>
												<a href="<?= base_url('buku/editjenisbuku/'. $key->id_jenis); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Ubah</a>
												<a href="<?= base_url('buku/deletejenisbuku/'. $key->id_jenis); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Hapus</a>
											</td>
										</tr>
										<?php
                } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-xs-12">
						<div class="x_panel">
							<div class="x_title">
								<h2><i class="fa fa-plus-square"></i> <?php echo $title2; ?><small>SI Perpustakaan</small></h2>
								<div class="clearfix"></div>
							</div>

							<div class="x_content">
								<form action="<?php echo base_url('buku/addJenisBuku'); ?>" method="post" class="form-vertical">
									<div class="form-group">
										<div class="col-sm-12">
											<div class="input-group">
												<input type="text" name="jenis" placeholder="Jenis buku baru" class="form-control">
												<span class="input-group-btn">
													<button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambahkan</button>
												</span>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
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
<?php $this->load->view('assets/view_jscustom'); ?>
<!-- End JS -->

</body>

</html>
