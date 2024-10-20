<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/fontawesome/css/all.min.css') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/main.css') }}" />
    <title>Admin Login</title>
</head>

<body class="body" id="body">

    <section class="404-page page-bg">
        <div class="position-absolute top-50 start-50 translate-middle w-100">
            <div class="container">
                <div class="text-center mb-4">
                    <a class="d-inline-block" href="index.html">
                        <img src="{{ asset('admin/images/logo-white.png') }}" class="" alt="">
                    </a>
                </div>

                <div class="row justify-content-center mx-1">
                    <div class="col-sm-10 col-md-7 col-lg-5 col-xxl-4 bg-white rounded-4 p-5 text-color-muted">
                        <h1 class="text-center fw-normal text-color mb-5">Login</h1>
                        @if(session()->has('error'))
                        <p class="text-danger">{{ session()->get('error') }}</p>
                        @endif
                        <form action="{{ route('admin.login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text px-4 fs-14">
                                    <i class="fa-solid fa-envelope"></i>
                                </span>
                                <input type="email" name="email" class="form-control py-3 @error('email')is-invalid @enderror" placeholder="Email">
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text px-4 fs-14" onclick="showHidePass(password, passIcon)"
                                    role="button">
                                    <i class="fa-regular fa-eye pass-icon"></i>
                                </span>
                                <input id="password" name="password" type="password" class="form-control py-3 @error('password')is-invalid @enderror" placeholder="Password">
                            </div>
                            


                            <button class="btn button-primary w-100 fs-14 py-3 mb-4" type="submit">Login</button>

                        

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/script.js') }}"></script>
</body>

</html>