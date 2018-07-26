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
          <div class="row top_tiles">
            <a href="<?php echo base_url(); ?>pegawai">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user" style="padding-top: 15px"></i></div>
                  <div class="count">
                    <?php echo $jumlah_pegawai; ?>
                  </div>
                  <h3>Total Pegawai</h3>
                  <p>hingga saat ini</p>
                </div>
              </div>
            </a>
            <a href="<?php echo base_url(); ?>anggota">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-users" style="padding-top: 15px"></i></div>
                  <div class="count">
                    <?php echo $jumlah_anggota; ?>
                  </div>
                  <h3>Total Anggota</h3>
                  <p>hingga saat ini</p>
                </div>
              </div>
            </a>
            <a href="<?php echo base_url(); ?>buku">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-book" style="padding-top: 15px"></i></div>
                  <div class="count">
                    <?php echo $jumlah_buku; ?>
                  </div>
                  <h3>Total Buku</h3>
                  <p>hingga saat ini</p>
                </div>
              </div>
            </a>
            <a href="<?php echo base_url(); ?>">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-group" style="padding-top: 15px"></i></div>
                  <div class="count"><?php echo $jumlah_pengunjung; ?></div>
                  <h3>Total Pengunjung</h3>
                  <p>pada hari ini</p>
                </div>
              </div>
            </a>
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