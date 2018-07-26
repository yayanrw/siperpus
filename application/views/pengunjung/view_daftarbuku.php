<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.png">

  <title>
    Daftar Buku
  </title>

  <!-- CSS -->
  <link href="<?php echo base_url('public/assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('public/assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <!-- Custom styles for this template -->
  <!--<link href="<?php echo base_url('public/assets/css/absen.css'); ?>" rel="stylesheet">-->
  <!-- Fonts from Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

	<?php $this->load->view('assets/view_cssdatatable'); ?>
  <!-- End CSS -->

</head>

<div>
</div>

<body style="background:#fff;">
  <div id="headerwrap">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
													<th>Tersedia</th>
													<th>Lokasi</th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 1; foreach ($buku as $key) {
                                                                        ?>
												<tr>
													<td>
														<?= $i++; ?>
													</td>
													<td><i class="fa fa-book"></i> <?= $key->judul; ?></td>
													<td><?= $key->jenis; ?></td>
													<td><?= $key->pengarang; ?></td>
													<td><?= $key->penerbit; ?></td>
													<td><?= $key->jumlah - $key->dipinjam ?></td>
													<td><?= $key->lokasi; ?></td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
        </div>
      </div>
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

  <?php
  $notif = $this->session->flashdata('notif');
  if (isset($notif)) {
      ?>
    <script>
      $(document).ready(function () {
        $('#notif').modal('show')
      });
    </script>
    <?php
  } ?>

      <!-- Modal -->
      <div class="modal fade" id="notif" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id=""><i class="fa fa-info-circle"></i> Pemberitahuan</h4>
            </div>
            <div class="modal-body text-center">
              <?php
          $foto = $this->session->flashdata('foto');
          if (isset($foto)) { ?>
                <img src="<?php echo base_url('public/img/anggota/'. $this->session->flashdata('foto'));  ?>" alt="Foto" class="img-circle"
                  style="max-height: 200px;"><br>
                <?php } ?>
                <h2>
                  <?php echo $notif ?>
                </h2>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Modal -->

</body>

</html>