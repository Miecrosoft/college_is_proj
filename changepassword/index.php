<?php
session_start();
include_once "../along.php";
global $msg;

if(empty($_SESSION['username'])){
	header('location: /login');
}

$username = $_SESSION['username'];

if(isset($_POST['changenow'])){
	$oldpass = $_POST['oldpass'];
	$oldpass = stripslashes($oldpass);
	$oldpass = mysql_real_escape_string($oldpass);

	$newpass = $_POST['newpass'];
	$newpass = stripslashes($newpass);
	$newpass = mysql_real_escape_string($newpass);

  $repass = $_POST['repass'];
  $repass = stripslashes($repass);
  $repass = mysql_real_escape_string($repass);

  if($newpass == $repass){
    $query = mysql_query("SELECT * FROM comet WHERE username = '$username'");
    $getdata = mysql_fetch_assoc($query);

    if($getdata['username'] == $username AND $getdata['password'] == $oldpass){
      mysql_query("UPDATE comet SET password = '$newpass' WHERE username = '$username'");
      $msg = "Password berhasil diganti !";
    }else{
      $msg = "Password lama salah !";
    }
  }else{
    $msg = "Password baru dan re-type password tidak tepat !";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Change Password</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/dist/css/skins/skin-blue.min.css">
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <!-- <div class="container"> -->
        <div class="navbar-header">
          <a class="navbar-brand"><b>change</b>Password</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
      <!-- </div> -->
    </nav>
  </header>
  <div class="content-wrapper">
    <!-- <div class="container"> -->
      <section class="content">

        <div class="row">
          <form role="form" method="POST">
            <div class="col-md-4"></div>
              <div class="col-md-4">
                  <div class="box box-danger">
                    <div class="box-header">
                      <h3 class="box-title">Ganti Password</h3>
                    </div>
                    <div class="box-body">
                      <div class="form-group">
                        <label class="control-label has-error" for="inputSuccess"><i class="fa fa-lock"></i> Password Lama</label>
                        <input type="password" class="form-control" name="oldpass" id="inputWarning" placeholder="Password" required/>
                      </div>
                      <div class="form-group">
                        <label class="control-label has-error" for="inputSuccess"><i class="fa fa-lock"></i> Password Baru</label>
                        <input type="password" class="form-control" name="newpass" id="inputWarning" placeholder="Password" required/>
                      </div>
                      <div class="form-group">
                        <label class="control-label has-error" for="inputSuccess"><i class="fa fa-lock"></i> Re-type Password Baru</label>
                        <input type="password" class="form-control" name="repass" id="inputWarning" placeholder="Password" required/>
                      </div>
                    </div>
                    <div class="box-footer">
                      <input type="submit" name="changenow" class="btn btn-primary" value="Change Now !" />
                      <div class="form-group has-error">
                      	<p class="help-block"><strong><?php echo $msg; ?></strong></p>
                      </div>
                    </div>
                  </div>
              </div>
          </form>
        </div>

      </section>
  </div>
  <footer class="main-footer">
    <!-- <div class="container"> -->
      <div class="pull-right hidden-xs">
        <b>Anything</b> You want
      </div>
      <strong>Copyright &copy; 2015 <a>SiSFO</a>.</strong> All rights reserved.
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