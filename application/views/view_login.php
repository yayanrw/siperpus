<!DOCTYPE html>
<html lang="id">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo $sistem->subtitle; ?></title>

  <!-- Bootstrap -->
  <?php $this->load->view('assets/view_css'); ?>
  <!-- End BS -->
</head>

<body class="login">
  <div>

    <div class="login_wrapper">
      <div class="form login_form">
        <section class="login_content">
          <form action="<?= base_url(); ?>login/ceklogin" method="post">
            <h1><?php echo $sistem->subtitle; ?></h1>
            <div>
              <input type="text" class="form-control" placeholder="Username atau ID" name="username" required/>
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" name="password" required/>
            </div>
            <?php 
              $notif = $this->session->flashdata('notif');
              if (isset($notif)) {
                echo "<p class='text-danger'> $notif </p>";
              }
             ?>
            <div>
              <button type="submit" name="login" class="btn btn-default submit">Masuk</button>
              <a class="reset_pass" href="#">Lupa Password?</a>
            </div>
            <div class="separator">
              <div class="clearfix"></div>
              <br/>
              <div>
                <h1><i class="<?php echo $sistem->icon; ?>"></i> <?php echo $sistem->title; ?></h1>
                <p>© <?php echo date("Y"); ?> <?php echo $sistem->subinstansi; ?>. <br> <?php echo $sistem->instansi; ?></p>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
  <!-- jQuery -->
  <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
</body>
</html>
