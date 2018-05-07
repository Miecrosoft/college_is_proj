<?php
session_start();
include_once "../along.php";
$msg = "";

if(!empty($_SESSION['username'])){
	header('location: /');
}

if(isset($_POST['masuk'])){

	$captcha = $_POST['g-recaptcha-response'];
	if(empty($captcha)){
		$msg = "Are you human ? Pass the reCaptcha !";
	}else{
		$uname = $_POST['username'];
		$uname_strip = stripslashes($uname);
		$username = mysql_real_escape_string($uname_strip);

		$passwd = $_POST['password'];
		$passwd_strip = stripslashes($passwd);
		$password = mysql_real_escape_string($passwd_strip);

		$query = mysql_query("SELECT * FROM comet WHERE username = '$username' AND password = '$password'");
		$getdata = mysql_fetch_assoc($query);

			if($getdata['username'] == $username AND $getdata['password'] == $password){
	      $_SESSION['lab'] = $getdata['lab'];
				$_SESSION['username'] = $getdata['username'];
				$_SESSION['admin'] = $getdata['admin'];
				$_SESSION['kordas'] = $getdata['kordas'];
				$_SESSION['lab'] = $getdata['lab'];
	        if($getdata['admin'] == 1 AND $getdata['kordas'] == 0){
	          header('location: /information');
	        }elseif ($getdata['admin'] == 0 AND $getdata['kordas'] == 1) {
	          header('location: /uploadproposal');
	        }else{
	          header('location: /logout');
	        }
			}else{
				$msg = "Gagal ! Username atau Password Salah !";
			}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Page</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="https://www.google.com/recaptcha/api.js?hl=id"></script>
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
      <!-- <div class="container"> -->
        <div class="navbar-header">
          <a class="navbar-brand"><b>account</b>Login</a>
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
                      <h3 class="box-title">Login Akun Lab</h3>
                    </div>
                    <div class="box-body">
                      <div class="form-group">
                        <label class="control-label" for="inputSuccess"><i class="fa fa-user"></i> Username</label>
                        <input type="text" class="form-control" name="username" id="inputWarning" placeholder="Username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '';?>" required/>
                      </div>
                      <div class="form-group">
                        <label class="control-label has-error" for="inputSuccess"><i class="fa fa-lock"></i> Password</label>
                        <input type="password" class="form-control" name="password" id="inputWarning" placeholder="Password" required/>
                      </div>
                      <div class="form-group">
                        <center><div class="g-recaptcha" data-sitekey="6LdaThMTAAAAAJzhsc3HrCKmVGwN-LbJTSQbu9f8" data-theme="dark"></div></center>
                      </div>
                    </div>
                    <div class="box-footer">
                      <input type="submit" name="masuk" class="btn btn-primary" value="LOG IN" />
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