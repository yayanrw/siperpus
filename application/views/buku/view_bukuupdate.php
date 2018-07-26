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
                  <form action="<?= base_url(); ?>buku/update/<?= $buku->id_buku ?>" method="post" class="form-horizontal form-label-left">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_buku">ID Buku
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                          <input type="text" name="id_buku" id="id_buku" class="form-control col-md-7 col-xs-12" required value="<?php echo $buku->id_buku; ?>" size="50" readonly  >
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="judul">Judul
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                          <input type="text" name="judul" id="judul" class="form-control col-md-7 col-xs-12" required value="<?php echo $buku->judul; ?>" size="50">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jenis" class="control-label col-md-3 col-sm-3 col-xs-12">Jenis</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                          <select name="jenis" id="jenis" class="form-control" required>
                            <option value="">Pilih jenis</option>
                            <?php foreach ($jenis as $key) {?>
                            <option value="<?php echo $key->jenis;?>"
                             <?php
                             if ($buku->jenis ==  $key->jenis) {
                              echo "selected";
                            } ?>
                            ><?php echo $key->jenis; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="pengarang" class="control-label col-md-3 col-sm-3 col-xs-12">Pengarang</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                          <input id="pengarang" class="form-control col-md-7 col-xs-12" type="text" name="pengarang" required value="<?php echo $buku->pengarang; ?>" size="40">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="penerbit" class="control-label col-md-3 col-sm-3 col-xs-12">Penerbit</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                          <input id="penerbit" class="form-control col-md-7 col-xs-12" type="text" name="penerbit" required value="<?php echo $buku->penerbit; ?>" size="40">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="tahun_terbit" class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Terbit</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                          <input id="tahun_terbit" class="form-control col-md-7 col-xs-12" type="number" name="tahun_terbit" required value="<?php echo $buku->tahun_terbit; ?>" size="4">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jumlah" class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                          <input id="jumlah" class="form-control col-md-7 col-xs-12" type="number" name="jumlah" required value="<?php echo $buku->jumlah; ?>" size="2">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="lokasi" class="control-label col-md-3 col-sm-3 col-xs-12">Lokasi Buku</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                          <input id="lokasi" class="form-control col-md-7 col-xs-12" type="text" name="lokasi" required value="<?php echo $buku->lokasi; ?>" size="30">
                        </div>
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a href="<?= base_url(); ?>buku" class="btn btn-primary" type="button"><i class="fa fa-angle-double-left"></i> Kembali</a>
                        <a href="<?= base_url(); ?>buku/delete/<?php echo $buku->id_buku; ?>" class="btn btn-danger" type="button"><i class="fa fa-trash-o"></i> Hapus</a>
                        <button type="submit" class="btn btn-success" name="simpan"><i class="fa fa-save"></i> Simpan</button>
                      </div>
                    </div>
                  </form>
                  <br />
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
