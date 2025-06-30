@extends("layouts.default")

@section("style")
<style>
  html, body {
    height: 100%;
  }

  .form-signin {
    max-width: 330px;
    padding: 1rem;
    margin: auto;
  }

  .form-signin .form-floating:focus-within {
    z-index: 2;
  }

  .form-signin input {
    margin-bottom: 10px;
  }

  .text-danger {
    font-size: 0.875em;
    margin-top: -8px;
    margin-bottom: 8px;
    display: block;
  }
</style>
@endsection

@section("content")
<main class="form-signin">
  <form method="POST" action="{{ route('register.post') }}">
    @csrf

    <img class="mb-4" src="{{ asset('assets/img/ToDo.jpeg') }}" alt="ToDo Logo" width="100" height="100">
    <h1 class="h3 mb-3 fw-normal text-center">Register</h1>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
      <div class="alert alert-danger mb-3">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Success Message --}}
    @if (session('success'))
      <div class="alert alert-success mb-3">
        {{ session('success') }}
      </div>
    @endif

    {{-- Error Message --}}
    @if (session('error'))
      <div class="alert alert-danger mb-3">
        {{ session('error') }}
      </div>
    @endif

    <div class="form-floating">
      <input name="name" type="text" class="form-control" id="floatingName" placeholder="Your Name" value="{{ old('name') }}" required autofocus>
      <label for="floatingName">Full Name</label>
      @error('name')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-floating">
      <input name="email" type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" value="{{ old('email') }}" required>
      <label for="floatingEmail">Email address</label>
      @error('email')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-floating">
      <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
      @error('password')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="form-floating">
      <input name="password_confirmation" type="password" class="form-control" id="floatingConfirm" placeholder="Confirm Password" required>
      <label for="floatingConfirm">Confirm Password</label>
    </div>

    <button class="btn btn-success w-100 py-2 mt-2" type="submit">Register</button>

    <div class="text-center mt-3">
      Already have an account? <a href="{{ route('login') }}">Login here</a>
    </div>
  </form>
</main>
@endsection
