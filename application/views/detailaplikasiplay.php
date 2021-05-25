  <!-- =============================================== -->



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Aplikasi

        <small>Daftar Aplikasi sistem chatbot</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Aplikasi</a></li>


      </ol>

    </section>



    <!-- Main content -->

    <section class="content">



    <div class="container" style="margin-top: 30px">

        <?php echo $this->session->flashdata('notif') ?>

		<div class="col-sm-11" style="background-color:white;">


    <div class="row">
    <style>
.container {
    position: relative;
    left: -300px;
    top : -100px;
}
#clip {
  position: absolute;
  clip: rect(154px,1073px,425px,800px);
  /* clip: shape(top, right, bottom, left); NB 'rect' is the only available option */
}
</style>
<div class="container">
  <div>Silakan scan melalui wa - whatsappweb</div>
  <img id="clip" src="<?php echo base_url() ?>qrcode.png" />
</div>
        
    </div>

    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->


