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
  <form method="POST" action="{{ route('signup'); }}" style="width: 500px; height: 650px; padding-top: 30px;">
    <h1>Sign Up</h1><br>
    @csrf
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label">Full Name</label>
        <input type="text" id="email" class="form-control" name="name" required/>
    </div>
  <!-- Email input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label">Email</label>
    <input type="email" id="email" class="form-control" name="email" required/>
  </div>

  <!-- Password input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" name="password" required>Password</label>
    <input type="password" id="password" class="form-control" name="password" />
  </div>

  <div data-mdb-input-init class="form-outline mb-4">
    <label class="form-label" name="password" required>Confirm Password</label>
    <input type="password" id="password" class="form-control" name="password_confirmation" />
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <div class="col d-flex justify-content-center">
      <!-- Checkbox -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="remember" checked />
        <label class="form-check-label" for="form2Example31"> I have agreed to Terms & Conditions </label>
      </div>
    </div>
  </div>

  <!-- Submit button -->
  <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>

  <!-- Register buttons -->
  <div class="text-center" style="padding: 0; line-height:1.2;">
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