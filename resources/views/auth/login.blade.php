 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Sistema Seguro de accidentes</title>
     <!-- Tell the browser to be responsive to screen width -->
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <!-- Bootstrap 3.3.7 -->
     <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/all.min.css') }}">
     <!-- Ionicons -->
     <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
     <link rel="shortcut icon" type="image/png" href="{{ asset('dist/img/logo-icon.png?2') }}">
     <!-- Theme style -->
     <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
     <!-- iCheck -->
     <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">

     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
  <script src="{{ asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
  <script src="{{ asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
  <![endif]-->

     <!-- Google Font -->
     <link rel="stylesheet"
         href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 </head>

 <body class="hold-transition login-page">
     <div class="login-box">
         <div class="login-logo">
             <a href="#">Sistema Seguro de <b>Accidentes</b></a>
         </div>
         <!-- /.login-logo -->
         <div class="login-box-body">
             <h1 class="login-box-msg">Inicio de session</h1>

             <form method="POST" action="{{ route('login') }}">
                 @csrf
                 <div class="form-group has-feedback">
                     <input id="username" type="text" name="username"
                         class="form-control @error('username') is-invalid @enderror" value="{{ old('email') }}"
                         autofocus placeholder="Usuario">
                     <span class="glyphicon glyphicon-user form-control-feedback"></span>
                     @error('username')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror

                 </div>
                 <div class="form-group has-feedback">
                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                         placeholder="Contraseña" name="password">
                     <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                     @error('password')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror

                 </div>
                 <div class="row ">
                     <div class="col-sm-12">
                         <div class="checkbox icheck">
                             <input id="remember" type="checkbox" name="remember"
                                 {{ old('remember') ? 'checked' : '' }}>
                             <label>
                                 Recuerdame
                             </label>

                         </div>
                     </div>
                     <!-- /.col -->
                     <div class="col-xs-12">
                         <button type="submit" class="btn btn-block btn-dropbox ">
                             <i class="fa fa-door-open"> </i> Iniciar session
                         </button>

                     </div>
                     <!-- /.col -->
                 </div>
             </form>


             <!-- /.social-auth-links -->

             {{-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> --}}

         </div>
         <!-- /.login-box-body -->
     </div>
     <!-- /.login-box -->

     <!-- jQuery 3 -->
     <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
     <!-- Bootstrap 3.3.7 -->
     <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
     <!-- iCheck -->
     <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
     <script>
         $(function() {
             $('input').iCheck({
                 checkboxClass: 'icheckbox_square-blue',
                 radioClass: 'iradio_square-blue',
                 increaseArea: '20%' /* optional */
             });
         });
     </script>
 </body>

 </html>
