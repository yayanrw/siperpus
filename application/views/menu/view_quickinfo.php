<div class="profile clearfix">
  <div class="profile_pic">
    <img src="<?= base_url('public/img/admin/'. $this->session->userdata('foto')) ?>" class="img-circle profile_img">
  </div>
  <div class="profile_info">
    <span>Selamat Datang,</span>
    <h2><?= $this->session->userdata('nama'); ?></h2>
  </div>
</div>
