<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PT. Arteria Daya Mulia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body style="background-color: #f8f9fa; min-height: 100vh; display: flex; flex-direction: column;">

    {{-- Error Message --}}
    @if ($errors->any())
        <div
            style="
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1050;
            max-width: 500px;
            width: 90%; ">
            <div class="alert alert-danger shadow text-center mb-0" style="font-size: 0.95rem; font-weight: bold;">
                <ul class="mb-0" style="list-style: none; padding-left: 0;">
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="text-center mt-5 mb-4">
        <h2 class="fw-bold text-uppercase">PT. Arteria Daya Mulia</h2>
    </div>

    <div class="mx-auto"
        style="max-width: 450px; width: 100%; background-color: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);">
        <h3 class="fw-bold mb-4 text-center">Login</h3>

        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control" required
                    autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div style="position: relative;">
                    <input type="password" name="password" id="password" class="form-control" required
                        style="padding-right: 42px;">
                    <span id="togglePassword"
                        style="position: absolute; top: 50%; right: 12px; transform: translateY(-50%); cursor: pointer; color: #6c757d; transition: color 0.2s;">
                        <i class="fas fa-eye" id="iconPassword"></i>
                    </span>
                </div>
            </div>
            <div class="d-grid mb-3">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

    <footer style="margin-top: auto; background-color: #f1f1f1; padding: 1rem 0;">
        <div class="container text-center">
            <small class="text-muted">
                &copy; PT. Arteria Daya Mulia {{ date('Y') }} &nbsp;|&nbsp;
                <a href="#">Privacy Policy</a> &middot; <a href="#">Terms & Conditions</a>
            </small>
        </div>
    </footer>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const icon = document.getElementById('iconPassword');

        togglePassword.addEventListener('click', () => {
            const isHidden = password.type === 'password';
            password.type = isHidden ? 'text' : 'password';

            // Ganti ikon
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');

            // Efek transisi warna saat klik
            togglePassword.style.color = isHidden ? '#0d6efd' : '#6c757d';
        });
    </script>

    <script>
        setTimeout(() => {
            const alertBox = document.querySelector('.alert');
            if (alertBox) {
                alertBox.style.transition = 'opacity 0.5s ease';
                alertBox.style.opacity = 0;
                setTimeout(() => alertBox.remove(), 500);
            }
        }, 3000);
    </script>

</body>

</html>
