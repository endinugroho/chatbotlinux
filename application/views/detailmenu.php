  <!-- =============================================== -->



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Menu

        <small>Daftar menu sistem chatbot</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Menu</a></li>


      </ol>

    </section>



    <!-- Main content -->

    <section class="content">



      <!-- Default box -->

      <div class="container" style="margin-top: 30px; width:1092px; background-color:white;"><br>

        <div class="col-md-12">
<?php if ($method=="Edit") $hasil="update"; else $hasil="simpan"; ?>
        <form method="post" enctype="multipart/form-data" action="http://localhost/chatbotnew/index.php/Menu/<?php echo $hasil; ?>">

              <div class="form-group">

                <label for="text">Command</label>

                <input type="text" name="command" value="<?php if ($method=="Edit") echo $dataperush->command; ?>" class="form-control" placeholder="Masukkan Command">

              </div>
              <div class="form-group">

                <label for="text">Pertanyaan </label>

                <input type="text" name="pertanyaan" value="<?php if ($method=="Edit") echo $dataperush->pertanyaan; ?>" class="form-control" placeholder="Masukkan Pertanyaan">

                <input type="hidden" value="<?php if ($method=="Edit") echo $dataperush->id;  ?>" name="id">
                <input type="hidden" value="1" name="grupperusahaan_id">

              </div>

              <div class="form-group">

                <label for="text">Punya Jawaban ?</label>
                <select name="isjawaban" id="isjawaban" class="form-control">
                <option value="0">Tidak</option>
                <option value="1">Ya</option>
              </select>
              </div>
 

              <div class="form-group">

                <label for="text">Jawaban Text</label>

                <!-- <input type="text" name="jawaban" value="<?php //if ($method=="Edit") echo $dataperush->jawaban; ?>" class="form-control" placeholder="Masukkan Jawaban"> -->
                <textarea id="jawaban" name="jawabantext" rows="4" cols="50" class="form-control" placeholder="Masukkan Jawaban"><?php if ($method=="Edit") echo $dataperush->jawabantext; ?></textarea>
              </div>

              <div class="form-group">

                <label for="text">Jawaban Gambar</label>

                <!-- <input type="text" name="jawaban" value="<?php //if ($method=="Edit") echo $dataperush->jawaban; ?>" class="form-control" placeholder="Masukkan Jawaban"> -->
                <input type="file" name="jawabangambar">
              </div>


 



              <div class="form-group">

                <label for="text">Parent</label>
                <select name="parent" id="parent" class="form-control">
                <option value="0">0</option>
                <?php
                    foreach($datamenu as $hasil){
                ?>
                <option value="<?php echo $hasil->id; ?>"><?php echo $hasil->command; ?></option>
                <?php
                    }
                ?>
              </select>

              </div>


              <button type="submit" class="btn btn-md btn-success"><?php if ($method=="Add") echo "Add"; else echo "Update"?></button>

              <button type="reset" class="btn btn-md btn-warning">reset</button>
              <a href="<?= base_url()."index.php/Menu"?>" class="btn btn-md btn-primary">Cancel</a>
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

