<!doctype html>
<html lang="en">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('signin/css/style.css')}}">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <img src="{{asset('signin/img/logo-mini.png')}}" alt="logo" width="80px">
                        </div>
                        <h3 class="text-center mb-4">Tech-Trendz</h3>
                        @if (session('status'))
                        <div class="alert alert-success mb-3 rounded-0" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        @if($errors->any())
                        <div class="alert alert-danger mb-3 rounded-0" role="alert">
                            {{$errors->first()}}
                        </div>
                        
                        @endif
                        <form action="{{ route('login') }}" method="POST" class="login-form">
                            @csrf
                            <div class="form-group">
                                <x-jet-label>Username</x-jet-label>
                                <x-jet-input class="{{ $errors->has('username') ? 'is-invalid' : '' }}" type="username"
                                    name="username" :value="old('username')" required />
                                <x-jet-input-error for="username"></x-jet-input-error>
                            </div>
                            <x-jet-label>Password</x-jet-label>
                            <div class="form-group d-flex">
                                <x-jet-input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    type="password" name="password" required autocomplete="current-password" />
                                <x-jet-input-error for="password"></x-jet-input-error>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input id="remember_me" name="remember" type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">LOGIN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>