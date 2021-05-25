<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Sistem Antrean Dokter</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->

  <link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/dist/css/skins/_all-skins.min.css">



  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  

    



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->



  <!-- Google Font -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-blue sidebar-mini">

<!-- Site wrapper -->

<div class="wrapper">



  <header class="main-header">

    <!-- Logo -->

    <a href="" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini"><b>S</b>AK</span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><b>System </b>PMB</span>

    </a>

    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

        <span class="sr-only">Toggle navigation</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

      </a>



      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <!-- Messages: style can be found in dropdown.less-->

          <li class="dropdown messages-menu">

            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-envelope-o"></i>

              <span class="label label-success">4</span>

            </a> -->

            <ul class="dropdown-menu">

              <!-- <li class="header">You have 4 messages</li>

              <li>

                <!-- inner menu: contains the actual data -->

                <ul class="menu">

                  <li><!-- start message -->

                    <a href="#">

                      <div class="pull-left">

                        <img src="<?php echo base_url();?>assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                      </div>

                      <h4>

                        Support Team

                        <small><i class="fa fa-clock-o"></i> 5 mins</small>

                      </h4>

                      <p>Why not buy a new awesome theme?</p>

                    </a>

                  </li>

                  <!-- end message -->

                </ul>

              </li>

              <li class="footer"><a href="#">See All Messages</a></li> -->

            </ul>

          </li>

          <!-- Notifications: style can be found in dropdown.less -->

          <li class="dropdown notifications-menu">

            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-bell-o"></i>

              <span class="label label-warning">10</span>

            </a> -->

            <ul class="dropdown-menu">

              <li class="header">You have 10 notifications</li>

              <li>

                <!-- inner menu: contains the actual data -->

                <ul class="menu">

                  <li>

                    <a href="#">

                      <i class="fa fa-users text-aqua"></i> 5 new members joined today

                    </a>

                  </li>

                </ul>

              </li>

              <li class="footer"><a href="#">View all</a></li>

            </ul>

          </li>

          <!-- Tasks: style can be found in dropdown.less -->

          <li class="dropdown tasks-menu">

            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <i class="fa fa-flag-o"></i>

              <span class="label label-danger">9</span>

            </a> -->

            <ul class="dropdown-menu">

              <li class="header">You have 9 tasks</li>

              <li>

                <!-- inner menu: contains the actual data -->

                <ul class="menu">

                  <li><!-- Task item -->

                    <a href="#">

                      <h3>

                        Design some buttons

                        <small class="pull-right">20%</small>

                      </h3>

                      <div class="progress xs">

                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"

                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">

                          <span class="sr-only">20% Complete</span>

                        </div>

                      </div>

                    </a>

                  </li>

                  <!-- end task item -->

                </ul>

              </li>

              <li class="footer">

                <a href="#">View all tasks</a>

              </li>

            </ul>

          </li>

          <!-- User Account: style can be found in dropdown.less -->

          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <img src="<?php echo base_url();?>assets/foto/<?php echo $_COOKIE['username']; ?>.png" class="user-image" alt="User Image">

              <span class="hidden-xs"><?php echo $_COOKIE['nama']; ?></span>

            </a>

            <ul class="dropdown-menu">

              <!-- User image -->

              <li class="user-header">

                <img src="<?php echo base_url();?>assets/foto/<?php echo $_COOKIE['username']; ?>.png" class="img-circle" alt="User Image">



                <p>

                <?php echo $_COOKIE['nama']; ?> - <?php echo $_COOKIE['jabatan']; ?>

                  <small>Member since Nov. 2012</small>

                </p>

              </li>

              <!-- Menu Body -->

              <li class="user-body">

                <div class="row">

                  <div class="col-xs-4 text-center">

                    <a href="#">Followers</a>

                  </div>

                  <div class="col-xs-4 text-center">

                    <a href="#">Sales</a>

                  </div>

                  <div class="col-xs-4 text-center">

                    <a href="#">Friends</a>

                  </div>

                </div>

                <!-- /.row -->

              </li>

              <!-- Menu Footer-->

              <li class="user-footer">

                <div class="pull-left">

                  <a href="#" class="btn btn-default btn-flat">Profile</a>

                </div>

                <div class="pull-right">

                  <a href="#" class="btn btn-default btn-flat">Sign out</a>

                </div>

              </li>

            </ul>

          </li>

          <!-- Control Sidebar Toggle Button -->

          <li>

            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>

          </li>

        </ul>

      </div>

    </nav>

  </header>



  <!-- =============================================== -->



  <!-- Left side column. contains the sidebar -->

  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

      <!-- Sidebar user panel -->

      <div class="user-panel">

        <div class="pull-left image">

          <img src="<?php echo base_url();?>assets/foto/<?php echo $_COOKIE['username']; ?>.png" class="img-circle" alt="User Image">

        </div>

        <div class="pull-left info">

          <p><?php echo $_COOKIE['nama']; ?></p>

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

        </div>

      </div>

      <!-- search form -->

      <form action="#" method="get" class="sidebar-form">

        <div class="input-group">

          <input type="text" name="q" class="form-control" placeholder="Search...">

          <span class="input-group-btn">

                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>

                </button>

              </span>

        </div>

      </form>

      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MAIN NAVIGATION</li>

        <!-- <li class="treeview">

          <a href="#">

            <i class="fa fa-dashboard"></i> <span>Tabel Master</span>

            <span class="pull-right-container">

              <i class="fa fa-angle-left pull-right"></i>

            </span>

          </a>

          <ul class="treeview-menu">

            <li><a href="<?php echo base_url();?>assets/AdminLTE/index.html"><i class="fa fa-circle-o"></i>Master Sopir</a></li>

            <li><a href="<?php echo base_url();?>assets/AdminLTE/index2.html"><i class="fa fa-circle-o"></i>Master Customer</a></li>

            <li><a href="<?php echo base_url();?>assets/AdminLTE/index2.html"><i class="fa fa-circle-o"></i>Master Informasi</a></li>

          </ul>

        </li> -->

        <?php

        // data main menu

        $main_menu = $this->db->get_where('menuapp3', array('ismainmenu' => 0));

        foreach ($main_menu->result() as $main) {

            // Query untuk mencari data sub menu

            $sub_menu = $this->db->get_where('menuapp3', array('ismainmenu' => $main->id));

            // periksa apakah ada sub menu

            if ($sub_menu->num_rows() > 0) {

                // main menu dengan sub menu

                echo "<li class='treeview'>" . anchor($main->url, '<i class="fa fa-dashboard"></i>  ' . $main->judul_menu .

                        '<span class="pull-right-container">

                                <i class="fa fa-angle-left pull-right"></i>

                            </span>');

                // sub menu nya disini

                echo "<ul class='treeview-menu'>";

                foreach ($sub_menu->result() as $sub) {

                    echo "<li>" . anchor($sub->url, '<i class="fa fa-dashboard"></i>  ' . $sub->judul_menu) . "</li>";

                }

                echo"</ul></li>";

            } else {

                // main menu tanpa sub menu

                echo "<li>" . anchor($main->url, '<i class="fa fa-dashboard"></i>  ' . $main->judul_menu) . "</li>";

            }

        }

        ?>        

        

      </ul>

    </section>

    <!-- /.sidebar -->

  </aside>



  <!-- =============================================== -->



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

      <h1>

        Sekolah

        <small>Daftar sekolah sistem pmb</small>

      </h1>

      <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        <li><a href="#">Sekolah</a></li>


      </ol>

    </section>



    <!-- Main content -->

    <section class="content">



      <!-- Default box -->

      <div class="container" style="margin-top: 30px;background-color:white;"><br>

        <div class="col-md-12">
<?php if ($method=="Edit") $hasil="update"; else $hasil="simpan"; ?>
            <?php echo form_open('DaftarPasien/'.$hasil); ?> 

 
            <div class="form-group">

            <label for="text">Tanggal</label>

            <input class="form-control" type="date" value="<?php echo date("Y-m-d"); ?>" name="tanggal">


            </div>

            <div class="form-group">

            <label for="text">Sesi</label>

            <select name="sesi" class="form-control" >
              <option value="Pagi">Pagi</option>
              <option value="Sore">Sore</option>
            </select>
            </div>

              <div class="form-group">

                <label for="text">Nama </label>

                <input type="text" name="nama" value="<?php if ($method=="Edit") echo $dataperush->nama; ?>" class="form-control" placeholder="Nama Pasien">

              </div>

 

              <div class="form-group">

                <label for="text">No HP</label>

                <input type="text" name="nohp" value="<?php if ($method=="Edit") echo $dataperush->alanohpmat; ?>" class="form-control" placeholder="Masukkan Alamat">

              </div>

 
             <!-- <div class="form-group">

                <label for="text">No Antrean</label>

                <input type="text" name="noantrian" value="<?php if ($method=="Edit") echo $dataperush->noantrian; ?>" class="form-control" placeholder="Masukkan No Antrian">

              </div> -->


 


              <button type="submit" class="btn btn-md btn-success">Update</button>

              <button type="reset" class="btn btn-md btn-warning">reset</button>

            <?php echo form_close() ?><br>

        </div>

 

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>

    </div>

 

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>

      </div>

      <!-- /.box -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->



  <footer class="main-footer">

    <div class="pull-right hidden-xs">

      <b>Version</b> 2.4.18

    </div>

    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights

    reserved.

  </footer>



  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">

    <!-- Create the tabs -->

    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>



      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>

    </ul>

    <!-- Tab panes -->

    <div class="tab-content">

      <!-- Home tab content -->

      <div class="tab-pane" id="control-sidebar-home-tab">

        <h3 class="control-sidebar-heading">Recent Activity</h3>

        <ul class="control-sidebar-menu">

          <li>

            <a href="javascript:void(0)">

              <i class="menu-icon fa fa-birthday-cake bg-red"></i>



              <div class="menu-info">

                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>



                <p>Will be 23 on April 24th</p>

              </div>

            </a>

          </li>

          <li>

            <a href="javascript:void(0)">

              <i class="menu-icon fa fa-user bg-yellow"></i>



              <div class="menu-info">

                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>



                <p>New phone +1(800)555-1234</p>

              </div>

            </a>

          </li>

          <li>

            <a href="javascript:void(0)">

              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>



              <div class="menu-info">

                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>



                <p>nora@example.com</p>

              </div>

            </a>

          </li>

          <li>

            <a href="javascript:void(0)">

              <i class="menu-icon fa fa-file-code-o bg-green"></i>



              <div class="menu-info">

                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>



                <p>Execution time 5 seconds</p>

              </div>

            </a>

          </li>

        </ul>

        <!-- /.control-sidebar-menu -->



        <h3 class="control-sidebar-heading">Tasks Progress</h3>

        <ul class="control-sidebar-menu">

          <li>

            <a href="javascript:void(0)">

              <h4 class="control-sidebar-subheading">

                Custom Template Design

                <span class="label label-danger pull-right">70%</span>

              </h4>



              <div class="progress progress-xxs">

                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>

              </div>

            </a>

          </li>

          <li>

            <a href="javascript:void(0)">

              <h4 class="control-sidebar-subheading">

                Update Resume

                <span class="label label-success pull-right">95%</span>

              </h4>



              <div class="progress progress-xxs">

                <div class="progress-bar progress-bar-success" style="width: 95%"></div>

              </div>

            </a>

          </li>

          <li>

            <a href="javascript:void(0)">

              <h4 class="control-sidebar-subheading">

                Laravel Integration

                <span class="label label-warning pull-right">50%</span>

              </h4>



              <div class="progress progress-xxs">

                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>

              </div>

            </a>

          </li>

          <li>

            <a href="javascript:void(0)">

              <h4 class="control-sidebar-subheading">

                Back End Framework

                <span class="label label-primary pull-right">68%</span>

              </h4>



              <div class="progress progress-xxs">

                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>

              </div>

            </a>

          </li>

        </ul>

        <!-- /.control-sidebar-menu -->



      </div>

      <!-- /.tab-pane -->

      <!-- Stats tab content -->

      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>

      <!-- /.tab-pane -->

      <!-- Settings tab content -->

      <div class="tab-pane" id="control-sidebar-settings-tab">

        <form method="post">

          <h3 class="control-sidebar-heading">General Settings</h3>



          <div class="form-group">

            <label class="control-sidebar-subheading">

              Report panel usage

              <input type="checkbox" class="pull-right" checked>

            </label>



            <p>

              Some information about this general settings option

            </p>

          </div>

          <!-- /.form-group -->



          <div class="form-group">

            <label class="control-sidebar-subheading">

              Allow mail redirect

              <input type="checkbox" class="pull-right" checked>

            </label>



            <p>

              Other sets of options are available

            </p>

          </div>

          <!-- /.form-group -->



          <div class="form-group">

            <label class="control-sidebar-subheading">

              Expose author name in posts

              <input type="checkbox" class="pull-right" checked>

            </label>



            <p>

              Allow the user to show his name in blog posts

            </p>

          </div>

          <!-- /.form-group -->



          <h3 class="control-sidebar-heading">Chat Settings</h3>



          <div class="form-group">

            <label class="control-sidebar-subheading">

              Show me as online

              <input type="checkbox" class="pull-right" checked>

            </label>

          </div>

          <!-- /.form-group -->



          <div class="form-group">

            <label class="control-sidebar-subheading">

              Turn off notifications

              <input type="checkbox" class="pull-right">

            </label>

          </div>

          <!-- /.form-group -->



          <div class="form-group">

            <label class="control-sidebar-subheading">

              Delete chat history

              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>

            </label>

          </div>

          <!-- /.form-group -->

        </form>

      </div>

      <!-- /.tab-pane -->

    </div>

  </aside>

  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed

       immediately after the control sidebar -->

  <div class="control-sidebar-bg"></div>

</div>

<!-- ./wrapper -->



<!-- jQuery 3 -->

<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->

<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- SlimScroll -->

<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->

<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->

<script src="<?php echo base_url();?>assets/AdminLTE/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->

<script  type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>



<script>

  $(document).ready(function () {

    $('#tablesopir').DataTable();

  })

</script>

</body>

</html>

