<style>
    .login-box-msg{
        padding: 0 !important;
        text-align: justify !important;
        margin-bottom: 20px !important;
    }
</style>

@extends('Backend.Layouts.backend_primary')

@section('title', 'Admin | Forget Password')

@section('Primary-content')
    <div class="hold-transition login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card">
              <div class="card-body login-card-body">
                <p class="login-box-msg">
                    Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                </p>

                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                  <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus >
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                  </div>
                  @error('email')
                      <span class="text-dander">{{ $message }}</span>
                  @enderror
                    <div class="input-group mb-3">
                      <button type="submit" class="btn btn-primary btn-block">Email Password Reset Link</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
              </div>
              <!-- /.login-card-body -->
            </div>
          </div>
          <!-- /.login-box -->
        </div>
    </div>
@endsection

