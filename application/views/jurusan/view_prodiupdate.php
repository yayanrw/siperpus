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
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $title; ?> <small>SI Perpustakaan</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form action="<?= base_url('jurusan/updateprodi/'.$id_jurusan.'/'.$prodi->id_prodi); ?>" method="post" class="form-horizontal form-label-left">
                   <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id">ID Prodi
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <input type="text" name="id" id="id" class="form-control col-md-7 col-xs-12" required value="<?php echo $prodi->id_prodi; ?>" size="50" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="jenis" class="control-label col-md-3 col-sm-3 col-xs-12">Prodi</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                        <input type="text" name="prodi" id="prodi" class="form-control col-md-7 col-xs-12" placeholder="Prodi" value="<?php echo $prodi->prodi; ?>">
                      </div>
                    </div>
                  </div>

                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <a href="<?= base_url('jurusan/prodi/'.$id_jurusan); ?>" class="btn btn-primary" type="button"><i class="fa fa-angle-double-left"></i> Kembali</a>
                      <a href="<?= base_url('jurusan/deleteprodi/'.$id_jurusan.'/'.$prodi->id_prodi); ?>" class="btn btn-danger" type="button"><i class="fa fa-trash-o"></i> Hapus</a>
                      <button type="submit" class="btn btn-success" name="simpan"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                  </div>
                </form>
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
