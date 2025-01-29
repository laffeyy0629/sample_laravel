@extends('layout.main-master')

@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card shadow">
          <div class="card-header text-center border-bottom">
            <h2 class="card-title">Login</h2>
          </div>
          <div class="card-body">

            @if($errors->any())
              @foreach ($errors->all() as $error)
                <div class = "alert alert-danger">{{$error}}</div>
              @endforeach
            @endif

            <form method="POST" action = "{{route('login.submit')}}">
              @csrf
              <div class="mb-4">
                <label for="email" class="form-label">Username/Email</label>
                <input type="text" class="form-control" id="email" name = "email" />
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name = "password"/>
              </div>
              <div class="mb-4">
                <input type="checkbox" class="form-check-input" id="remember" name = "remember" />
                <label for="remember" class="form-label">Remember Me</label>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary text-light main-bg">Login</button>
              </div>
            </form>

            <div class="text-center mt-3">
              <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
