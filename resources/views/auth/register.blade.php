<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body class="d-flex align-items-center min-vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Sign Up</h4>

                        <!-- Form Registrasi -->
                        <form action="{{ route('postRegister') }}" method="POST" class="mx-1 mx-md-4">
                            @csrf <!-- Token CSRF untuk keamanan -->

                            <div class="mb-4">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name') }}" required />
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email') }}" required />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required />
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Repeat Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" required />
                            </div>

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" value="" id="terms"
                                    required />
                                <label class="form-check-label" for="terms">
                                    I agree to all statements in <a href="#!">Terms of service</a>
                                </label>
                            </div>

                            <div class="d-flex justify-content-center mb-3">
                                <button type="submit" class="btn btn-primary btn-lg">Register</button>
                            </div>
                        </form>

                        <div class="text-center">
                            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
