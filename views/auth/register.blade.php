<!DOCTYPE html>
<html lang="en">
<head>
	<title>DINAS PARIWISATA KAB. BADUNG</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../dist/img/bg.png');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
				<span class="login100-form-title p-b-49">
						Tambah Pengguna
					</span>
				<center>
				<li class="user-header">
                  <img src="../dist/img/tul.png" class="img-circle" alt="User Image">
                </li>
				</center>

				<center>
					<div class="wrap-input100 validate-input m-b-23 row{{ $errors->has('name') ? ' has-error' : '' }}">
						<span class="label-input100">Nama Pengguna</span>
						<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
						<span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>
                    
                    <div class="wrap-input100 validate-input m-b-23 row{{ $errors->has('email') ? ' has-error' : '' }}">
						<span class="label-input100">E-Mail</span>
						<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input row{{ $errors->has('password') ? ' has-error' : '' }}">
						<span class="label-input100">Password</span>
						<input id="password" type="password" class="form-control" name="password" required>

                               @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
						<span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div><br>
                    </center>
                    <div class="wrap-input100 validate-input">
						<span class="label-input100">Konfirmasi Password</span>
						<input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>

						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div><br>


					<div class="form-group row{{ $errors->has('jabatan') ? ' has-error ' : '' }}">
                             <label for="jabatan" class="col-md-4 col-form-label text-md-right">Status Pengguna</label>

                             <div class="col-md-6">
                                <select name="jabatan" class="form-control">
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="PIMPINAN">PIMPINAN</option>
                                    <option value="PETUGAS">PETUGAS</option>
                                </select>
                            </div>
                        </div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								REGISTER
							</button>
						</div>
					</div>

					
					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../login/vendor/bootstrap/js/popper.js"></script>
	<script src="../login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../login/js/main.js"></script>

</body>
</html>



