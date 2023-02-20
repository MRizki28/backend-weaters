<!DOCTYPE html>
<html lang="en">

<head>

	<title>A</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  
</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<form action="{{route('auth.login')}}" method="POST">
              @csrf
              <h4 class="mb-3 f-w-400">Signin</h4>
              @if (session('status'))
                <div class="mt-4">
                    <p class="text-success text-center">{{ session('status') }}</p>
                </div>
              @endif
              @if (session('error'))
                <div class="mt-4">
                    <p class="text-danger text-center">{{ session('error') }}</p>
                </div>
              @endif
              <div class="form-group mb-3">
                <label class="floating-label" for="username">Email</label>
                <input type="text" class="form-control" id="username" name="username" autocomplete="off">
                @error('username')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group mb-4">
                <label class="floating-label" for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <button class="btn btn-block btn-primary mb-4">Signin</button>
            </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/ripple.js') }}"></script>
<script src="{{ asset('assets/js/pcoded.min.js') }}"></script>

</body>

</html>
