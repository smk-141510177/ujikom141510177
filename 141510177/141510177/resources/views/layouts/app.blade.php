<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
                    <a class="navbar-brand" href="{{ url('/') }}">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    
                        
                    
                    <center>
                        
                        <h1><strong>Aplikasi Penggajian</strong></h1>
                    </center>
                    
                    

                    <!-- Right Side Of Navbar -->
                 
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

                        @if (Auth::guest())
                            <li role="presentation" class="active form-control"><a href="{{ url('/login') }}"><font color="black"><strong>  Login </strong></font></a></li>
                        @else
                        @if(Auth::user()->type_user == 'Admin')
                        <li role="presentation" class="@yield('golongan')" ><a href="{{ url('/golongan') }}"><font color="black"><strong> Golongan</strong></font></strong></font></a></li>
                        <li role="presentation" class="@yield('jabatan')"><a href="{{ url('/jabatan') }}"><font color="black"><strong> Jabatan</strong></font></a></li>
                        @endif
                        @if(Auth::user()->type_user == 'Admin')
                        <li role="presentation" class="@yield('pegawai')"><a href="{{ url('/pegawai') }}"><font color="black"><strong> Pegawai</strong></font></a></li>
                        @endif
                        <li role="presentation" class="@yield('kategori')"><a href="{{ url('/kategori') }}"><font color="black"><strong> Kategori Lembur</strong></font></a></li>
                        <li role="presentation" class="@yield('lemburp')"><a href="{{ url('/lemburp') }}"><font color="black"><strong> Lembur Pegawai</strong></font></a></li>
                        <li role="presentation" class="@yield('tunjangan')"><a href="{{ url('/tunjangan') }}"><font color="black"><strong> Kategori Tunjangan</strong></font></a></li>
                        <li role="presentation" class="@yield('tunjanganp')"><a href="{{ url('/tunjanganp') }}"><font color="black"><strong> Tunjangan Pegawai</strong></font></a></li>
                        <li role="presentation" class="@yield('penggajian')"><a href="{{ url('/penggajian') }}"><font color="black"><strong> Penggajian</strong></font></a></li>
                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <font color="black"><strong>{{ Auth::user()->name }} </strong></font><span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-0">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h1><center>@yield('judul')</center></h1></div>
                        <div class="panel-body">
                            @yield('content')
                            <div class="col-md-15 col-md-offset-0">
                                <div class="panel panel-primary">
                                    @yield('content1')
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
