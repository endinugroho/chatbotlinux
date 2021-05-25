

  <!-- =============================================== -->



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Dashboard

        <small>it all starts here</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Examples</a></li>

        <li class="active">Blank page</li>

      </ol>

    </section>



    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
      <?php 
          @session_start();
          if(@$_SESSION['idapp'] != 0){
            $aplikas = $this->db->query("SELECT * FROM aplikasi WHERE id = ".@$_SESSION['idapp'])->result_array();
          } else {
            $aplikas = $this->db->query("SELECT * FROM aplikasi")->result_array();
          }
          foreach($aplikas as $data):
        ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><strong><?= $data['nama'] ?></strong></span>
              <span class="info-box-text"><?= $data['alamat'] ?></span>
              <span class="info-box-text"><?= $data['nowaserver'] ?></span>
              <a href="<?= base_url().'index.php/Dashboard/leanmeore/'.$data['id'] ?>">More ........</a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <?php endforeach; ?>
        <!-- /.col -->
        
      </div>
      <!-- /.row -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

