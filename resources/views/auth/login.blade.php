@extends("index")
@section("title"," Anasayfa")
@section("içerik")
    <div class="container">
        <div class="auth-pages">
            <div class="auth-left">
                <h2>Giriş Yap</h2>
                <div class="spacer"></div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Şifreniz">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <div class="login-container">
                        <button type="submit" class="auth-button">Giriş Yap</button>
                        <label><input type="checkbox" name="remember"> Beni Hatırla</label>
                    </div>
                    <div class="spacer"></div>
                    <a href="{{ route('password.request') }}">Şifreni mi Unuttun?</a>
                </form>
            </div>
            <div class="auth-right">
                <h2>Kayıt Ol</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf 
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="İsminiz">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif 
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Şifreniz">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Şifre Tekrar">
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="auth-button">Kayıt Ol</button>
                        </div>
                    </div>
                </form>
    
            </div>
        </div>
    </div>
@endsection
