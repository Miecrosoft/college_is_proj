<?php
session_start();
include_once "../along.php";
global $msg,$loginbutton;

$getlink = $_GET['LinkID'];
$linkstrip = stripslashes($getlink);
$LinkID = mysql_real_escape_string($linkstrip);

if(!empty($_SESSION['username'])){
	$loginbutton = '<a href="/listproposal">MENU</a>';
}else{
	$loginbutton = '<a href="/login">LOG IN</a>';
}

$query = mysql_query("SELECT * FROM news WHERE id = '$LinkID'");
$getdat = mysql_fetch_assoc($query);


if(isset($_POST['komens'])){

  $id = substr(str_shuffle("WHcVwXABd126mzLYk59CPlrtxgiMFSbD0GhyNOZ4aoeUJjQEIKqn7pR8fsuvT3"), 0, 40);

  if(empty($_SESSION['lab'])){
  	$lab = "Anonymous - Public Visitor";
  }else{
    $lab = $_SESSION['lab'];
  }

  $getkomenmu = $_POST['komenmu'];
  $komenmustrip = stripslashes($getkomenmu);
  $komen = mysql_real_escape_string($komenmustrip);
  $tgl_komen = date('d/m/Y H:i');

  mysql_query("INSERT INTO komentar (id,id_news,lab,isikomen,tgl_komen) VALUES ('$id','$LinkID','$lab','$komen','$tgl_komen')");
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $getdat['judul']; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/dist/css/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/dist/css/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/dist/css/skins/skin-blue.min.css">
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="navbar-header">
          <a href="/" class="navbar-brand"><b>SiS</b>IF</a>
        </div>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <?php echo $loginbutton; ?>
            </li>
          </ul>
        </div>
    </nav>
  </header>

  <div class="content-wrapper">

    <section class="content">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">News</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#"><?php echo $getdat['judul']; ?></a>
                        </span>
                    <span class="description">Posted by <?php echo $getdat['lab']." on ".$getdat['tgl_post']; ?></span>
                  </div>
                  <p><?php echo $getdat['berita']; ?></p>
                  <ul class="list-inline">
                    <li></li>
                    <li></li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments</a></li>
                  </ul>
                  
                  <form class="form-horizontal" method="POST">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        <input type="text" class="form-control input-sm" name="komenmu" placeholder="Post your comment" />
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm" name="komens">Send</button>
                      </div>
                    </div>
                  </form>
                </div>

                <!-- Komentar -->
                <?php
                  $result = mysql_query("SELECT * FROM komentar WHERE id_news = '$LinkID' ORDER BY tgl_komen ASC");
                  while ($getres = mysql_fetch_assoc($result)) {
                ?>
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#"><?php echo $getres['lab']; ?></a>
                        </span>
                    <span class="description"><?php echo $getres['tgl_komen']; ?></span>
                  </div>
                  <p><?php echo $getres['isikomen']; ?></p>
                  <ul class="list-inline">
                    <li></li>
                    <li></li>
                    <li class="pull-right">
                      <a href="/deletekomentar/<?php echo $getres['id']; ?>" class="link-black text-sm"><i class="fa fa-times margin-r-5"></i> Hapus</a></li>
                  </ul>
                </div>
                <?php
              }
              ?>
                <!-- Komentar -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <!-- <div class="container"> -->
      <div class="pull-right hidden-xs">
        <b>Anything</b> You want
      </div>
      <strong>Copyright &copy; 2015 <a href="http://sandiwara.net">Sandiwara</a></strong> All rights reserved.
    <!-- </div> -->
  </footer>
</div>

<script src="/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="/plugins/fastclick/fastclick.js"></script>
<script src="/dist/js/app.min.js"></script>
</body>
</html>