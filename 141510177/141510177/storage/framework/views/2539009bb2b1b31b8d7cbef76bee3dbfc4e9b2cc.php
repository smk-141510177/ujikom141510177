<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">
    .wrapper {    
    margin-top: 80px;
    margin-bottom: 20px;
}

.form-signin {
  max-width: 420px;
  padding: 30px 38px 66px;
  margin: 0 auto;
  background-color: #eee;
  border: 3px dotted rgba(0,0,0,0.1);  
  }

.form-signin-heading {
  text-align:center;
  margin-bottom: 30px;
}

.form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
}

input[type="text"] {
  margin-bottom: 0px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

input[type="password"] {
  margin-bottom: 20px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.colorgraph {
  height: 7px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}
</style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
    
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    
                    </a>
                   
                </div>
                
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                <ul class="nav navbar-nav navbar-right">
                    
              <?php if(Auth::guest()): ?>
              <?php elseif(Auth::user()->type_user == "Admin"): ?>
                    <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="assets/image/admin.jpg" width="26px" height="29px"  "><?php echo e(Auth::user()->name); ?><span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                 </ul>
                 <?php else: ?>
                    <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?><span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                 </ul>
                 <?php endif; ?>
                 <h2>Aplikasi Penggajian</h2>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-2 col-md-offset-0">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h1><center>Menu</center></h1></div>
                        <div class="panel-body">

                        
                           

                        <ul class="nav nav-pills nav-stacked nav-pills-stacked-example"> 
                        <!-- Authentication Links -->

                        <?php if(Auth::guest()): ?>
                            <li role="presentation" class="active form-control"><a href="<?php echo e(url('/login')); ?>"><font color="black"><strong>  Login </strong></font></a></li>
                        <?php else: ?>
                        <?php if(Auth::user()->type_user == 'Admin' ||  Auth::user()->type_user == 'HRD'): ?>
                            <li role="presentation" class="<?php echo $__env->yieldContent('golongan'); ?>" ><a href="<?php echo e(url('/golongan')); ?>"><font color="black"><strong> Golongan</strong></font></strong></font></a></li>
                            <li role="presentation" class="<?php echo $__env->yieldContent('jabatan'); ?>"><a href="<?php echo e(url('/jabatan')); ?>"><font color="black"><strong> Jabatan</strong></font></a></li>
                        <?php endif; ?>
                        <?php if(Auth::user()->type_user == 'Admin' || Auth::user()->type_user == 'HRD'): ?>
                        <li role="presentation" class="<?php echo $__env->yieldContent('pegawai'); ?>"><a href="<?php echo e(url('/pegawai')); ?>"><font color="black"><strong> Pegawai</strong></font></a></li>
                        <?php endif; ?>
                        <?php if(Auth::user()->type_user == 'Admin' || Auth::user()->type_user == 'Bagian Keuangan'): ?>
                            <li role="presentation" class="<?php echo $__env->yieldContent('kategori'); ?>"><a href="<?php echo e(url('/kategori')); ?>"><font color="black"><strong> Kategori Lembur</strong></font></a></li>
                            <li role="presentation" class="<?php echo $__env->yieldContent('lemburp'); ?>"><a href="<?php echo e(url('/lemburp')); ?>"><font color="black"><strong> Lembur Pegawai</strong></font></a></li>
                            <li role="presentation" class="<?php echo $__env->yieldContent('tunjangan'); ?>"><a href="<?php echo e(url('/tunjangan')); ?>"><font color="black"><strong> Kategori Tunjangan</strong></font></a></li>
                            <li role="presentation" class="<?php echo $__env->yieldContent('tunjanganp'); ?>"><a href="<?php echo e(url('/tunjanganp')); ?>"><font color="black"><strong> Tunjangan Pegawai</strong></font></a></li>
                            <li role="presentation" class="<?php echo $__env->yieldContent('penggajian'); ?>"><a href="<?php echo e(url('/gaji')); ?>"><font color="black"><strong> Penggajian</strong></font></a></li>
                        <?php endif; ?>
                        <?php if(Auth::user()->type_user == 'Karyawan'): ?>
                            <li role="presentation" class="<?php echo $__env->yieldContent('penggajian'); ?>"><a href="<?php echo e(url('/gaji')); ?>"><font color="black"><strong> Penggajian</strong></font></a></li>
                        <?php endif; ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <font color="black"><strong><?php echo e(Auth::user()->name); ?> </strong></font><span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(url('/logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-0">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h1><center><?php echo $__env->yieldContent('judul'); ?></center></h1></div>
                        <div class="panel-body">
                            <?php echo $__env->yieldContent('content'); ?>
                            <div class="col-md-15 col-md-offset-0">
                                <div class="panel panel-primary">
                                    <?php echo $__env->yieldContent('content1'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/creative.min.js"></script>
</body>
</html>
