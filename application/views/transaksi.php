
  <!-- =============================================== -->



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Transaksi

        <small>Daftar Transaksi sistem chatbot</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Transaksi</a></li>


      </ol>

    </section>



    <!-- Main content -->

    <section class="content">



    <div class="container" style="margin-top: 30px">

        <?php echo $this->session->flashdata('notif') ?>

		<div class="col-sm-11" style="background-color:white;">


    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Nama</th>
                  <th>Tanggal Jam</th>
                  <th>Message</th>
                </tr>
                <?php

                  foreach($dataperush as $hasil){
                ?>
                <tr>
                  <td><?php echo $hasil->name; ?></td>
                  <td><?php echo $hasil->tanggaljam; ?></td>
                  <td><?php echo $hasil->message; ?></td>
                </tr>
                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        </div>
        
        
        </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->