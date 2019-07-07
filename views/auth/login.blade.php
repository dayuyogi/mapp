
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DISPAR KAB. BADUNG</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ url('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ url('dist/css/AdminLTE.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/CodeSeven-toastr-61c48a6/build/toastr.min.css') }}">
  


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
      .login-page{
          background-image:url('../dist/img/bg.png');
          background-position: center center;
          background-repeat: no-repeat;
          background-size: cover;
          /*opacity: 0.5;*/
          content: "";
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
          position: absolute;
          z-index: -1;   
      }
  </style>
  </head>
<body>
    <body class="hold-transition login-page">
  <div class="login-box">

    <div class="login-logo" style="color: #FFF">
      <a href="#" style="color: #FFF"><b>PARIWISATA BADUNG<b></a>
    </div>

     <div class="login-box-body">
    <form method="POST" action="{{ route('login') }}">
    @csrf
      <div class="text-center">
        <img src="../dist/img/tul.png" style="width: 25%">
      </div>

        <div class="form-group has-feedback">
          <input type="email" name="email" placeholder="Username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
          <span class="fa fa-user form-control-feedback"></span>
        </div>
                          
        <div class="form-group has-feedback">
          <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <button type="submit" class="btn btn-success btn-block"  {{ __('Login') }}>Login</button> 

    </form>
    </div>
     

     {{--  </div> --}}
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ url('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ url('plugins/CodeSeven-toastr-61c48a6/build/toastr.min.js') }}"></script>
<script type="text/javascript">
  @if(Session::has('flash_message'))
      <?php
          $error_tipe = Session::get('flash_message')['tipe'];
      ?>
      $(function(){
          toastr["{{ $error_tipe }}"]("{!! Session::get('flash_message')['pesan'] !!}");
      });

  @endif
</script>
</html>
    
  