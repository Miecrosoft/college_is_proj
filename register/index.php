<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration Page</title>
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
          <a href="/information" class="navbar-brand"><b>SiS</b>IF</a>
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
                      <h3 class="box-title">Registrasi Akun Lab</h3>
                    </div>
                    <div class="box-body">
                      <div class="form-group">
                        <label class="control-label" for="inputSucces"><i class="fa fa-user"></i> Username</label>
                        <input type="text" class="form-control" name="username" id="inputWarning" placeholder="NIK" required/>
                      </div>
                      <div class="form-group">
                        <label class="control-label has-error" for="inputSuccess"><i class="fa fa-lock"></i> Password</label>
                        <input type="password" class="form-control" name="password" id="inputWarning" placeholder="Passowrd" required/>
                      </div>
                    </div>
                    <div class="box-footer">
                      <input type="submit" name="signin" class="btn btn-primary" value="DAFTAR" />
                      <div class="form-group has-error"></div>
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
      <strong>Copyright &copy; 2014-2015 <a href="http://sandiwara.net">Sandiwara</a></strong> All rights reserved.
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