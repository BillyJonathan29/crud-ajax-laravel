@extends('layouts.menu.index')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <main class="form-registration w-100 m-auto">
            <form action="register" method="post">
              @csrf

              <img class="mb-4 d-block text-center" src="img/c-79.png" alt="" width="200" height="200" >
              <h1 class="h3 mb-3 fw-normal">Registration Form</h1>

              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name')is-invalid
                @enderror" id="name" placeholder="name" value="{{ old('name') }}" autofocus required>
                <label for="name">Name</label>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="form-floating">
                <input type="text" name="username" class="form-control  @error('username')is-invalid
                @enderror" id="username" placeholder="Username"  value="{{ old('username') }}"  autofocus required>
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="form-floating">
                <input type="email" name="email" class="form-control  @error('email')is-invalid
                @enderror" id="email" placeholder="name@example.com"  value="{{ old('email') }}"  autofocus required>
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control rounded-bottom  @error('password')is-invalid
                @enderror" id="password" placeholder="Password" autofocus required>
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>

              <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Register</button>

            </form>
            <small class="d-block text-center mt-3">Already Register? <a href="{{ url('login') }}" >Login</a></small>
        </main>
    </div>
</div>
@endsection
