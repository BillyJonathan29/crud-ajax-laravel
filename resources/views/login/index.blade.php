@extends('layouts.menu.index')

@section('konten')
<div class="row justify-content-center">
    <div class="col-md-4">

        @if(session()->has('success'))
            {{ session('success') }}
            <div class="alert-alert-success alert-dissmisble fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session()->has('loginError'))
            {{ session('loginError') }}
            <div class="alert-alert-danger alert-dissmisble fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <main class="form-signin w-100 m-auto">
            <form action="login" method="post">
               @csrf
              <img class="mb-4 d-block text-center" src="img/c-79.png" alt="" width="200" height="200" >
              <h1 class="h3 mb-3 fw-normal">Please Login</h1>

              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror " id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" autofocus required>
                <label for="password">Password</label>
              </div>

              <button class="btn btn-primary w-100 py-2" type="submit">Login</button>

            </form>
            <small class="d-block text-center mt-3">Not Register? <a href="{{ url('register') }}" >Register</a></small>

        </main>
    </div>
</div>
@endsection

