<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="assets/img/favicon.png">

  <title><?php echo $sistem->title; ?></title>

  <!-- CSS -->
  <link href="<?php echo base_url('public/assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('public/assets/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('public/assets/css/absen.css'); ?>" rel="stylesheet">
  <!-- Fonts from Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
  <!-- End CSS -->

</head>

<div>
</div>

<body>
  <div id="headerwrap">
    <div class="container">
      <div class="row">

        <div class="col-lg-6"><br><br><br>
          <img class="img-responsive" style="margin-top:7px" src="<?php echo base_url('public/img/web/ipad-hand.png') ?>" alt="">
        </div>

        <div class="col-lg-6">
          <h1>Selamat Datang<br/>di <?php echo $sistem->subtitle; ?> <br/></h1>
          <h3> &copy; <?php echo $sistem->instansi; ?></h3><br><br>
          <form class="form-inline" role="form" method="post" action="<?php echo base_url('absenpengunjung/absen'); ?>">
            <div class="form-group">
              <input type="text" class="form-control" name="nim" placeholder="Nomor Induk Mahasiswa">
            </div>
            <button type="submit" class="btn btn-warning btn-lg">Absen Pengunjung</button>
          </form>
        </div>
      </div>
      </div>
      </div>

  <!-- JS -->
  <?php $this->load->view('assets/view_js'); ?>
  <!-- End JS -->

  <?php
  $notif = $this->session->flashdata('notif');
  if (isset($notif)) {
      ?>
    <script>
    $( document ).ready(function() {
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
          <h4 class="modal-title" id=""><i class="fa fa-info-circle"></i>  Pemberitahuan</h4>
        </div>
        <div class="modal-body text-center">
          <?php
          $foto = $this->session->flashdata('foto');
          if (isset($foto)) { ?>
            <img src="<?php echo base_url('public/img/anggota/'. $this->session->flashdata('foto'));  ?>" alt="Foto" class="img-circle" style="max-height: 200px;"><br>
          <?php } ?>
          <h2><?php echo $notif ?></h2>
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
