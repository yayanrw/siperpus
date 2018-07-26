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
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $title; ?> <small>SI Perpustakaan</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />

                  <table class="table table-condensed">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Hari, tanggal</th>
                        <th>Pukul</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; foreach ($pengunjung as $key) {?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $key->nim ?></td>
                        <td><?php echo $key->nama ?></td>
                        <td><?php echo date('l', strtotime($key->date))?>, <?php echo date('d-M-Y', strtotime($key->date)); ?></td>
                        <td><?php echo date('G.i', strtotime($key->time)); ?> WIB</td>
                        <td>
                          <a href="<?php echo base_url('anggota/show/'.$key->nim) ?>" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Lihat data user</a>
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
