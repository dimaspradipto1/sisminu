@extends('auth.template')

@section('content')
@include('auth.header')

  <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row">
  
        <div class="col-lg-6 d-flex justify-content-center">
          <div class="bg-image" style="background-image: url('{{ asset('assets/img/bg.png') }}');"></div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center" style="margin-left: 200px;">
          <h5 class="card-title text-center pb-0 fs-4 text-dark mb-2">Sitem Administrasi Umum<br>TNI AU</h5>
          <div class="card mb-3">
            <div class="card-body">
              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Register to Your Account</h5>
              </div>
              <form action="#" class="row g-3 needs-validation" novalidate>
                @csrf

                <div class="col-12">
                  <label for="yourUsername" class="form-label">Nama</label>
                  <div class="input-group has-validation">
                    <input type="text" name="name" class="form-control" id="yourname" required>
                    <div class="invalid-feedback">Please enter your yourname</div>
                  </div>
                </div>

                <div class="col-12">
                  <label for="yourUsername" class="form-label">Email</label>
                  <div class="input-group has-validation">
                    <input type="email" name="email" class="form-control" id="yourUsername" required>
                    <div class="invalid-feedback">Please enter your username.</div>
                  </div>
                </div>

                <div class="col-12">
                  <label for="yourPassword" class="form-label">Password</label>
                  <input type="password" name="password" id="myInput" class="form-control" id="yourPassword" required>
                  <div class="invalid-feedback">Please enter your password!</div>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" value="true" onclick="myFunction()">
                    <label class="form-check-label" for="rememberMe">show password</label>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit" style="background-color: #4C4DDC">Register</button>
                </div>
                <div class="col-12">
                  <p class="small mb-0">already have an account? <a href="{{route('login')}}">Login</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <style>
    .bg-image {
      width: 100vw; /* Sesuaikan dengan lebar yang diinginkan */
      height: 100vh; /* Sesuaikan dengan tinggi yang diinginkan */
      background-size: cover;
      {{--  background-position: center;  --}}
    }
  </style>
  

@endsection

@push('scripts')
  <script>
    function myFunction() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
@endpush

