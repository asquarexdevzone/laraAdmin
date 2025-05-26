<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | LaravelAdmin</title>
    @include('admin.include')
</head>


<body class="authentication-bg">

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-10">
                    <div class="card overflow-hidden bg-opacity-25">
                        <div class="row g-0">
                            <div class="col-lg-6 d-none d-lg-block p-2">
                                <img src="{{ asset('images/auth-img.jpg') }}" alt="" class="img-fluid rounded h-100">
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <div class="auth-brand p-4">
                                        <a href="index.html" class="logo-light">
                                            <img src="{{ $logoPath }}" alt="logo">
                                        </a>
                                        <a href="index.html" class="logo-dark">
                                            <img src="{{ $logoPath }}" alt="dark logo">
                                        </a>
                                    </div>
                                    <div class="p-4 my-auto">
                                        <h4 class="fs-20">Login</h4>
                                        <p class="text-muted mb-3">Enter your Credentials</p>
                                        @if ($errors->has('login_error'))
                                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                                {{ $errors->first('login_error') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>

                                            <script>
                                                setTimeout(function () {
                                                    let alert = document.querySelector('.alert');
                                                    if (alert) {
                                                        let bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                                                        bsAlert.close();
                                                    }
                                                }, 3000);
                                            </script>
                                        @endif
                                        <!-- form -->
                                        <form action="/auth/login" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="admin_email" class="form-label">Username</label>
                                                <input class="form-control" type="text" id="emailaddress"
                                                    name="admin_email" required="" placeholder="Enter your Username or Email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="admin_password" class="form-label">Password</label>
                                                <input class="form-control" type="password" id="password"
                                                    name="admin_password" required="" placeholder="Enter your Password">
                                            </div>
                                            <div class="mb-0 text-start">
                                                <button class="btn btn-soft-primary w-100" type="submit"><i
                                                        class="ri-login-circle-fill me-1"></i> <span
                                                        class="fw-bold">Make Login</span> </button>
                                            </div>
                                        </form>

                                        <!-- end form-->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="{{ asset('js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('js/app.min.js') }}"></script>

    <!-- Daterangepicker js -->
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>

    <!-- Apex Charts js -->
    <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector Map js -->
    <script src="{{ asset('vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script
        src="{{ asset('vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- Dashboard App js -->
    <script src="{{ asset('js/pages/dashboard.js') }}"></script>

</body>

</html>