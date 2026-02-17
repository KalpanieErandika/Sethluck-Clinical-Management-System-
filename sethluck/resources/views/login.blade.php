<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <head>

    <body>
        <div class="img">
            <nav>
                <img src="{{ asset('images/logo4.png') }}" class="positioned-image">
            </nav>

            <div class="wrapper">
                <div class="login_box">
                    <div class="login-header">
                        <span> Login <span>

                    </div>
                    <form action="{{ route('login.attempt') }}" method="post">
                        @csrf
                        <div class="input_box">
                            <label class="label">Username</label>
                            <input type="text" name="username" class="input-field" required>
                        </div>

                        <div class="input_box">
                            <label class="label">Password</label>
                            <input type="password" name="password" class="input-field" required>
                        </div>

                        <div class="input_box">
                            <button type="submit" class="input-login"><span>Login</span></button>
                        </div>

                        <div class="register">
                            <span>Don't have an account? Contact Admin</a></span>
                        </div>
                    </form>

                    @if ($errors->any())
                        <div>
                            <strong>Errors:</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
    </body>

</html>