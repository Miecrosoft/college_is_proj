<?php
session_start();
include_once "../along.php";
global $upload_proposal,$msg;

if($_SESSION['admin'] == 0 AND $_SESSION['kordas'] == 1){
  $upload_proposal = '<li><a href="/uploadproposal"><i class="fa fa-file"></i><span>Upload Proposal</span></a></li>';
}elseif ($_SESSION['admin'] == 1 AND $_SESSION['kordas'] == 0){

}

$LinkID = $_GET['LinkID'];
$LinkID = stripslashes($LinkID);
$LinkID = mysql_real_escape_string($LinkID);

if(empty($LinkID)){
	header('location: /listproposal');
}

$query = mysql_query("SELECT * FROM proposal WHERE id = '$LinkID'");
$getdat = mysql_fetch_assoc($query);

if(empty($_SESSION['username'])){
  header('location: /login');
}

if(isset($_POST['savepro'])){

  $statuspro_strip = stripslashes($_POST['statuspro']);
  $statuspro = mysql_real_escape_string($statuspro_strip);

  $res = mysql_query("UPDATE proposal SET status = '$statuspro' WHERE id = '$LinkID'");
}elseif (isset($_POST['sendchat'])){

  $id = substr(str_shuffle("LYk59CPlrtxgiMFSbD0GhyNOZ4aoeUJjQWHcVwXABd126mzEIKqn7pR8fsuvT3"), 0, 40);

  $pesanget = $_POST['pesan'];
  $pesanstrip = stripslashes($pesanget);
  $pesan = mysql_real_escape_string($pesanstrip);
  $lab = $_SESSION['lab'];
  $date = date('d/m/Y H:i');

  mysql_query("INSERT INTO pesanproposal (id,id_proposal,lab,pesan,tgl_pesan) VALUES ('$id','$LinkID','$lab','$pesan','$date')");
}
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>View Proposal</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/dist/css/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/dist/css/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/dist/css/skins/skin-blue.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <a href="/information" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>SiS</b>FO</span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <ul class="menu">
                    <a href="#">
                      <div class="pull-left">
                        <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
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
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $_SESSION['lab']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['lab']; ?>
                  <small>-</small>
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
                  <a href="/changepassword" class="btn btn-default btn-flat">Ganti Password</a>
                </div>
                <div class="pull-right">
                  <a href="/logout" class="btn btn-default btn-flat">Log out</a>
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
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['lab']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
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

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <li><a href="/information"><i class="fa fa-life-ring"></i><span>Information</span></a></li>
        <li><a href="/listproposal"><i class="fa fa-table"></i><span>List Proposal</span></a></li>
        <?php echo $upload_proposal; ?>
        <li><a href="/postberita"><i class="fa fa-newspaper-o"></i><span>Post Berita</span></a></li>
        <li><a href="/listberita"><i class="fa fa-table"></i><span>List Berita</span></a></li>
        <li><a href="/postinventaris"><i class="fa fa-newspaper-o"></i><span>Input Inventaris</span></a></li>
        <li><a href="/listinventaris"><i class="fa fa-table"></i><span>List Inventaris</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i><span>Multilevel</span><i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <section class="content">
     <form role="form" method="POST">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Proposal</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
          </div>
        </div>

        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="judul">Judul Proposal</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Proposal" value="<?php echo $getdat['judul']; ?>" disabled />
              </div>
              <div class="form-group">
                <label for="judul">Tanggal Upload</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Tanggal Upload" value="<?php echo $getdat['tgl_upload']; ?>" disabled />
              </div>
              <div class="form-group">
                <label for="judul">Download Proposal</label><br />
                <a href="/proposal/<?php echo $getdat['filepro']; ?>"><img src="/dist/img/blackpdf.png" /></a>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                	<label for="judul">Nama Laboratorium</label>
                	<input type="text" class="form-control" id="judul" name="judul" placeholder="Nama Laboratorium" value="<?php echo $getdat['lab']; ?>" disabled />
              </div>
              <div class="form-group">
                <label for="judul">Status</label>
                <select class="form-control select2" style="width: 100%;" name="statuspro">
                  <option value="1" <?php echo ($getdat['status'] == 1) ? 'selected="selected"' : ''; ?>>Accepted</option>
                  <option value="2" <?php echo ($getdat['status'] == 2) ? 'selected="selected"' : ''; ?>>Pending</option>
                  <option value="3" <?php echo ($getdat['status'] == 3) ? 'selected="selected"' : ''; ?>>Rejected</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <?php
            if($_SESSION['admin'] == 1 AND $_SESSION['kordas'] == 0){
              echo '<button type="submit" class="btn btn-primary" name="savepro">Save</button>';
            }
          ?>
        </div>
      </div>
     </form>

     <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Pesan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
          </div>
        </div>

        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <?php
              $getquery = mysql_query("SELECT * FROM pesanproposal WHERE id_proposal = '$LinkID' ");
              while ($getmsg = mysql_fetch_assoc($getquery)){
              ?>
              <div class="form-group">
                <label for="judul"><?php echo $getmsg['lab']." - ".$getmsg['tgl_pesan']; ?></label>
                <p><?php echo $getmsg['pesan']; ?></p>
              </div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>

     <form role="form" method="POST">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Chat Admin</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button> -->
          </div>
        </div>

        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="judul">Tulis Pesan</label>
                <textarea class="form-control" rows="3" name="pesan" placeholder="Tulis Pesan kepada Administrator"></textarea>
              </div>
            </div>
            <!-- /.col -->

          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary" name="sendchat">Send</button>
        </div>
      </div>
     </form>

    </section>
  </div>

  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2015 <a href="http://sandiwara.net">Sandiwara</a></strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>

      </div>
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
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
        </form>
      </div>
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>
<script src="/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/plugins/select2/select2.full.min.js"></script>
<script src="/plugins/fastclick/fastclick.js"></script>
<script src="/dist/js/app.min.js"></script>
<!-- select2 -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
</body>
</html>
