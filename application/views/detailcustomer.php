

  <!-- =============================================== -->



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        <?= $title ?>

        <small><?= $method ?></small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Customer</a></li>


      </ol>

    </section>



    <!-- Main content -->

    <section class="content">
      <!-- Default box -->

      <div class="container" style="margin-top: 30px; width:1092px; background-color:white;"><br>

        <div class="col-md-12">
          <?php if ($method=="Edit") $hasil="update"; else $hasil="simpan"; ?>
            <?php echo form_open('Customer/'.$hasil); ?> 

 

              <div class="form-group">

                <label for="text">Name </label>
                <input type="text" name="nama" value="<?php if ($method=="Edit") echo $dataperush->name; ?>" class="form-control" placeholder="Name">
                <input type="hidden" value="<?php if ($method=="Edit") echo $dataperush->id;  ?>" name="id">
                <!-- <input type="hidden" value="1" name="grupperusahaan_id"> -->
              </div>

              <div class="form-group">

                <label for="text">No Telpon </label>
                <input type="text" name="tlp" value="<?php if ($method=="Edit") echo $dataperush->number; ?>" class="form-control" placeholder="No. Telp">

              </div>
              <div class="form-group">

                <label for="text">NIK </label>
                <input type="text" name="nik" value="<?php if ($method=="Edit") echo $dataperush->ktp; ?>" class="form-control" placeholder="NIK">

              </div>

              <button type="submit" class="btn btn-md btn-success"><?php if($method=='Tambah') echo "Add"; else echo "Update" ?></button>

              <button type="reset" class="btn btn-md btn-warning">reset</button>

              <a href="<?= base_url()."index.php/Customer" ?>" class="btn btn-md btn-primary"> Cancel</a>

            <?php echo form_close() ?><br>

        </div>

 


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>

      </div>

      <!-- /.box -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->


