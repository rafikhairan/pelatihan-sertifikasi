<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gameshark</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>

    <div class="container py-5">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center">

            <div class="col-xl-5 col-lg-6">
                <div class="card o-hidden border-0 shadow-lg mb-3">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h1 text-cs font-weight-bold font-italic mb-4">Gameshark</h1>
                                @if(session()->has('status'))
                                <div class="alert alert-success alert-dismissible fade show">{{ session('status') }}</div>
                                @endif

                                @if(session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}</div>
                                @endif
                            </div>
                            <form class="" action="/register" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        id="InputName" value="{{ old('name') }}" placeholder="Name" required>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                                        id="InputUsername" value="{{ old('username') }}" placeholder="Username" required>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                        id="InputEmail" value="{{ old('email') }}" placeholder="Email" required>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" class="form-control" name="password" id="InputPassword" placeholder="Password" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block w-100">
                                    Register
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card o-hidden border-0 shadow-lg mt-2">
                    <div class="card-body py-3">
                        <div class="text-center small">
                            Already have an account? <a href="/login">Login</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/assets/js/sb-admin-2.min.js"></script>

</body>

</html>