<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <title>Registration Peduli Diri</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css')}}" rel="stylesheet">
  </head>

  <body class="text-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center"> 
        
        <div class="pt-4 pb-2">
          
          <img src="{{ asset('img/logo.png') }}" alt="">
          <!-- <h2 class="card-title text-center pb-0 fs-4">Peduli Diri</h2> -->
          
        </div><!-- End Logo -->

        <div class="card mb-3">
          <div class="card-body">
            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Registration to Your Account</h5>
            </div>

            <form class="form-signin" method="POST" action="{{ route('register') }}">
              @csrf
              {{method_field('POST')}}
              
              <div class="form-group">
                <label for="inputNik" class="sr-only">NIK</label>
                <input type="text" maxlength="16" id="inputNik" autocomplete="off" class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}" name="nik" placeholder="NIK" required value="{{ old('nik') }}">
                @if ($errors->has('nik'))
                  <div class="invalid-feedback">
                    {{ $errors->first('nik') }}
                  </div>
                @endif
              </div>
              
              <div class="form-group">
                <label for="inputName" class="sr-only">Nama Lengkap</label>
                <input type="text" id="inputName" autocomplete="off" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Nama Lengkap" required value="{{ old('name') }}">
                @if ($errors->has('name'))
                <div class="invalid-feedback">
                  {{ $errors->first('name') }}
                </div>
                @endif
              </div>

             <div class="form-group">
                <label for="InputPassword" class="sr-only">Email</label>
                <input type="email" autocomplete="off" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="InputPassword" name="email" placeholder="Email" required>
                @if ($errors->has('email'))
                <div class="invalid-feedback">
                  {{ $errors->first('email') }}
                </div>
                @endif
              </div>

              <div class="form-group">
                <label for="InputPassword" class="sr-only">Password</label>
                <input type="password" maxlength="8" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="InputPassword" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                <div class="invalid-feedback">
                  {{ $errors->first('password') }}
                </div>
                @endif
              </div>
              
              <div class="form-group">
                <label for="InputPassword" class="sr-only">Password Confrimation</label>
                <input type="password" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" id="InputPassword" name="password_confirmation" placeholder="Password Confrimation" required>
                @if ($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                  {{ $errors->first('password_confirmation') }}
                </div>
                @endif
              </div>
              <button type="submit" class="btn btn-primary">Create Account</button>

              <div class="col-12">
                <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    
  </body>
</html>
