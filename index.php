<?php
session_start();
include_once "along.php";
global $msg,$loginbutton;

if(!empty($_SESSION['username'])){
	$loginbutton = '<a href="/listproposal">MENU</a>';
}else{
	$loginbutton = '<a href="/login">LOG IN</a>';
}

// if(isset($_POST['komen'])){

// }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home Page</title>
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
            <?php
            $query = mysql_query("SELECT * FROM news");
            while ($getdat = mysql_fetch_assoc($query)){
              $berita = $getdat['berita'];
              $moreberita = substr(strip_tags($berita), 0, 300);
            ?>
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
                          <a href="/viewberita/<?php echo $getdat['id']; ?>"><?php echo $getdat['judul']; ?></a>
                        </span>
                    <span class="description">Posted by <?php echo $getdat['lab']." on ".$getdat['tgl_post']; ?></span>
                  </div>
                  <p><?php echo $moreberita.' '.'<a href="/viewberita/'.$getdat['id'].'">'.' Baca Selanjutnya</a>'; ?></p>
                  <ul class="list-inline">
                    <li></li>
                    <li></li>
                    <li class="pull-right">
                      <a href="/viewberita/<?php echo $getdat['id']; ?>" class="link-black text-sm"><i target="_blank" class="fa fa-comments-o margin-r-5"></i> Comments</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
            <?php
            }
            ?>
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