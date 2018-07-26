 <!-- sidebar menu Admin -->
 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3 style="padding-top: 6px; padding-bottom: 6px; background-color: #172D44">Menu Utama</h3>
    <ul class="nav side-menu">
      <li><a href="<?= base_url(); ?>beranda"><i class="fa fa-home"></i> Beranda </a></li>

      <?php if ($this->session->userdata('level') == 'admin') { ?>
      <li><a href="<?= base_url(); ?>pegawai"><i class="fa fa-user"></i> Pegawai </a></li>
      <?php } ?>
      <?php if ($this->session->userdata('level') == 'pegawai') { ?>
      <li><a href="<?= base_url('anggota'); ?>"><i class="fa fa-user"></i> Data Anggota</a></li>
      <?php } ?>
      <?php if ($this->session->userdata('level') == 'admin') { ?>
      <li><a href="<?= base_url('jurusan'); ?>"><i class="fa fa-graduation-cap"></i> Jurusan / Prodi</a></li>
      <?php } ?>
      <?php if ($this->session->userdata('level') == 'pegawai') { ?>
      <li><a><i class="fa fa-book"></i> Buku <span class="fa fa-chevron-down"></span></a>
       <ul class="nav child_menu">
        <li><a href="<?= base_url('buku'); ?>">Data Buku</a></li>
        <li><a href="<?= base_url('buku/jenisbuku'); ?>">Data Jenis Buku</a></li>
      </ul>
    </li>
    <li><a href="<?= base_url('peminjaman'); ?>"><i class="fa fa-refresh"></i> Peminjaman Buku</a></li>
    <li><a><i class="fa fa-group"></i> Pengunjung <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu">
        <li><a href="<?= base_url('pengunjung'); ?>">Data Pengunjung Hari Ini</a></li>
        <li><a href="<?= base_url('pengunjung/histori'); ?>">Histori</a></li>
      </ul>
    </li>
    <li><a href="<?= base_url('pendendaan'); ?>"><i class="fa fa-money"></i> Pendendaan</a></li>
    
    <?php }  ?>
  </ul>
</div>
</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Pengaturan" href="<?php echo base_url('pengaturan'); ?>">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Keluar" href="<?php echo base_url('logout'); ?>">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->
