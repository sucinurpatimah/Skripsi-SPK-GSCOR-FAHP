<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PT. Arteria Daya Mulia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body style="background-color: #f8f9fa; min-height: 100vh; display: flex; flex-direction: column;">

    <div class="text-center mt-5 mb-4">
        <h2 class="fw-bold text-uppercase">PT. Arteria Daya Mulia</h2>
    </div>

    <div class="mx-auto"
        style="max-width: 450px; width: 100%; background-color: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);">
        <h3 class="fw-bold mb-4 text-center">Login</h3>

        {{-- error message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control" required
                    autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
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

</body>

</html>
