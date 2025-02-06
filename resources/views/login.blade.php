@extends('Layout.master')
@section('content')

<div style="display: flex; justify-content: center; align-items: center;">
    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div style="display: flex; justify-content: center; align-items: center;">
  <form method="POST" action="{{ route('login'); }}" style="width: 500px; height: 650px; padding-top: 30px;">
    <h1>Login</h1><br>
    @csrf
  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="form2Example1">Email Address</label>
    <input type="email" name="email" class="form-control" />
  </div>

  <!-- Password input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" for="form2Example2">Password</label>
    <input type="password" name="password" class="form-control" />
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="remember" checked />
        <label class="form-check-label" for="form2Example31"> Remember me </label>
      </div>
    </div>

    <div class="col">
      <!-- Simple link -->
      <a href="#!">Forgot password?</a>
    </div>
  </div>

  <!-- Submit button -->
  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center" style="padding: 0; line-height:1.2;">
    <p>Not a member? <a href="#!">Register</a></p>
    <p>or sign up with:</p>
    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
    <i class="bi bi-facebook"></i>
    </button>

    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
    <i class="bi bi-google"></i>
    </button>

    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
    <i class="bi bi-twitter-x"></i>
    </button>

    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
    <i class="bi bi-github"></i>
    </button>
  </div>
  </form>
</div>


@endsection