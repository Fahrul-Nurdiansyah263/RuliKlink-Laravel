<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Klinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/backend/login.css') }}">
</head>
<body>

<div class="login-card">
    <h2 class="login-title">Login</h2>

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('backend.login') }}" method="POST" novalidate>
        @csrf

      
        <div class="mb-3 position-relative">
            <span class="input-group-text" id="envelope"><i class="fas fa-envelope " style="margin-right: 3px;"></i></span>
            <input type="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

       
        <div class="mb-3 position-relative">
            <span class="input-group-text"><i class="fas fa-lock" style="margin-right: 3px;"></i></span>
            <input type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   id="password" placeholder="Masukkan password Anda" required>
           
            @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-login w-100">
            <i class="fas fa-sign-in-alt me-2"></i>Masuk
        </button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        const eyeIcon = document.getElementById('eyeIcon');
        const envelope = document.getElementById('envelope');
    
    togglePassword.addEventListener('click', function() {
      
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        if (type === 'password') {
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }});

        
    });
</script>

</body>
</html>