<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
            <div class="card mt-5">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-center">Register</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="adsoyad">Ad Soyad</label>
                            <input id="adsoyad" type="text" class="form-control @error('adsoyad') is-invalid @enderror" name="adsoyad" value="{{ old('adsoyad') }}" required autofocus>
                            @error('adsoyad')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="meslek">Meslek</label>
                            <input id="meslek" type="text" class="form-control @error('meslek') is-invalid @enderror" name="meslek" value="{{ old('meslek') }}" required>
                            @error('meslek')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="adress">Adres</label>
                            <textarea id="adress" class="form-control @error('adress') is-invalid @enderror" name="adress" required>{{ old('adress') }}</textarea>
                            @error('adress')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Telefon Numarası</label>
                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required>
                            @error('phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" name="agree" class="form-check-input" id="agree" required>
                            <label class="form-check-label" for="agree">I agree with the terms and conditions</label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                    </form>
                </div>
                <div class="mb-4 text-muted text-center">
                    Already Registered? <a href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS, Popper.js, jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https:/a<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 15px;
        }
        .card-header {
            background-color: #f8b6d4;
            color: #fff;
            border-radius: 15px 15px 0 0;
        }
        .card-body {
            background-color: #fff;
            padding: 40px;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .btn-primary {
            background-color: #f8b6d4;
            border-color: #f8b6d4;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background-color: #f095b1;
            border-color: #f095b1;
        }
        .invalid-feedback {
            font-size: 0.9rem;
        }
        .footer-text {
            font-size: 0.9rem;
            color: #6c757d;
        }
        .custom-checkbox .custom-control-label {
            font-size: 0.9rem;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card">
            <div class="card-header text-center">
                <h4>Register</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="adsoyad">Ad Soyad</label>
                        <input id="adsoyad" type="text" class="form-control @error('adsoyad') is-invalid @enderror" name="adsoyad" value="{{ old('adsoyad') }}" required autofocus>
                        @error('adsoyad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meslek">Meslek</label>
                        <input id="meslek" type="text" class="form-control @error('meslek') is-invalid @enderror" name="meslek" value="{{ old('meslek') }}" required>
                        @error('meslek')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="adress">Adres</label>
                        <textarea id="adress" class="form-control @error('adress') is-invalid @enderror" name="adress" required>{{ old('adress') }}</textarea>
                        @error('adress')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Telefon Numarası</label>
                        <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required>
                        @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="password_confirmation">Password Confirmation</label>
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="agree" class="form-check-input" id="agree" required>
                        <label class="form-check-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                </form>
            </div>
            <div class="footer-text text-center mt-3">
                Already Registered? <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS, Popper.js, jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
