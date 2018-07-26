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
                  <form action="<?= base_url('pegawai/update/'.$pegawai->id_pegawai); ?>" enctype="multipart/form-data" method="post" class="form-horizontal form-label-left">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_pegawai">ID Pegawai</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                          <input type="texy" name="id_pegawai" id="id_pegawai" class="form-control col-md-7 col-xs-12" value="<?= $pegawai->id_pegawai ?>" readonly required>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                          <input id="password" class="form-control col-md-7 col-xs-12" type="text" name="password" required value="<?= $password ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nama" class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                          <input id="nama" class="form-control col-md-7 col-xs-12" type="text" name="nama" required value="<?= $pegawai->nama ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="jk" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default
                            <?php
                            if ($pegawai->jk == 'Laki-laki') {
                              echo "active";
                            }
                            ?>
                            " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                            <input type="radio" name="jk" value="Laki-laki" required
                            <?php
                            if ($pegawai->jk == 'Laki-laki') {
                              echo "checked";
                            }
                            ?>
                            > &nbsp;  Laki-laki &nbsp;
                          </label>
                          <label class="btn btn-primary
                          <?php
                          if ($pegawai->jk == 'Perempuan') {
                            echo "active";
                          }
                          ?>
                          " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="jk" value="Perempuan" required
                          <?php
                          if ($pegawai->jk == 'Perempuan') {
                            echo "checked";
                          }
                          ?>
                          > Perempuan
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat dan Tanggal Lahir</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="col-md-4 col-xs-6 col-lg-6">
                      <input type="text" name="tempat" id="tempat" class="form-control" required value="<?= $pegawai->tempat ?>">
                    </div>
                    <div class="col-md-4 col-xs-6 col-lg-6">
                      <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required value="<?= $pegawai->tgl_lahir ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="no_telp" class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Telepon</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                      <input id="no_telp" class="form-control col-md-7 col-xs-12" type="number" name="no_telp" required value="<?= $pegawai->no_telp ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                      <textarea id ="alamat" class="form-control col-md-7 col-xs-12" type="text" name="alamat" required ><?=
                        $pegawai->alamat ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="foto" class="control-label col-md-3 col-sm-3 col-xs-12">Foto Profil</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center">
                        <img style="max-height:150px;" class="img-thumbnail" src="<?php echo base_url('public/img/admin/'. $pegawai->foto); ?>" alt="<?php echo $pegawai->foto; ?>">
                        <p><?php echo $pegawai->foto; ?></p>
                        <input id="foto" class="col-md-7 col-xs-12" type="file" name="foto">
                      </div>
                    </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <a href="<?= base_url(); ?>pegawai" class="btn btn-primary" type="button"><i class="fa fa-angle-double-left"></i> Kembali</a>
                      <a href="<?= base_url(); ?>pegawai/delete/<?php echo $pegawai->id_pegawai; ?>" class="btn btn-danger" type="button"><i class="fa fa-trash-o"></i> Hapus</a>
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
    <div class="clearfix"></div>
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
