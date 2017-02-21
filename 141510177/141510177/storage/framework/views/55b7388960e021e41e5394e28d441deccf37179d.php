<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway';
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
             <?php if(Auth::guest()): ?>
                    <div class="top-right links">
                        <a href="<?php echo e(url('/login')); ?>">Login</a>
                        <a href="<?php echo e(url('/register')); ?>">Register</a>
                    </div>
            <?php else: ?>
                    <div class="top-right links">

                        <a class="navbar-brand btn btn-success" href="<?php echo e(url('/golongan')); ?>">
                            Golongan
                        </a>
                        <a class="navbar-brand btn btn-success" href="<?php echo e(url('/jabatan')); ?>">
                            Jabatan
                        </a>
                        <a class="navbar-brand btn btn-success" href="<?php echo e(url('/kategori')); ?>">
                            Kategori Lembur
                        </a>
                        <a class="navbar-brand btn btn-success" href="<?php echo e(url('/tunjangan')); ?>">
                            Tunjangan
                        </a>
                        <a class="navbar-brand btn btn-success" href="<?php echo e(url('/pegawai')); ?>">
                            Pegawai
                        </a>
                        <a class="navbar-brand btn btn-success" href="<?php echo e(url('/lemburp')); ?>">
                            Lembur Pegawai
                        </a>
                        <a class="navbar-brand btn btn-success" href="<?php echo e(url('/tunjanganp')); ?>">
                            Tunjangan Pegawai
                        </a>
                        <a class="navbar-brand btn btn-success" href="<?php echo e(url('/penggajian')); ?>">
                            Penggajian
                        </a>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
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
                    </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
