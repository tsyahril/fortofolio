<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-5">
        <div class="card shadow-lg border-0">
            <div class="card-body p-5 bg-light text-dark">
                <h2 class="text-center mb-4 text-dark">Login</h2>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                 <form method="POST" action="{{ route('login.action') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" required autofocus class="form-control">
                        @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" required class="form-control">
                        @error('password')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        @if(Route::has('password.request'))
                            <a href="" class="text-decoration-none text-primary">Lupa password?</a>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
