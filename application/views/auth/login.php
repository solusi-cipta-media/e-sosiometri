<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Solusi Cipta Media" name="description" />
    <meta content="Solusiciptamedia" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/default/assets/images/' . $favicon) ?>">

    <!-- Layout config Js -->
    <script src="<?= base_url('assets/default/assets/js/layout.js') ?>"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/default/assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/default/assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/default/assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url('assets/default/assets/css/custom.min.css') ?>" rel="stylesheet" type="text/css" />

    <style>
        .gb-depan {
            background-image: url("assets/default/assets/images/<?= $gambar_depan ?>") !important;
            background-position: center;
            background-size: cover;
        }

        .bg-overlay {
            opacity: .3 !important;
        }
    </style>
</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 h-100 gb-depan">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="index.html" class="d-block">
                                                    <img src="<?= base_url('assets/default/assets/images/' . $logo_light) ?>" alt="" height="28">
                                                </a>
                                            </div>
                                            <div class="mt-auto">
                                                <div class="mb-3">
                                                    <i class="ri-double-quotes-l display-4 text-success"></i>
                                                </div>

                                                <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-inner text-center text-white-50 pb-5">
                                                        <div class="carousel-item active">
                                                            <p class="fs-15 fst-italic">" <?= $slogan . ' - ' . $nama_usaha ?> "</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Selamat Datang !</h5>
                                            <p class="text-muted">Silahkan Login.</p>
                                        </div>

                                        <div class="mt-4">
                                            <form action="<?= base_url('auth') ?>" method="POST">

                                                <?= $this->session->flashdata('message') ?>
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" name="userid" placeholder="Enter username" value="<?= set_value('username') ?>" autofocus="true">
                                                    <?= form_error('userid', '<small class="text-danger">', '</small>') ?>
                                                </div>

                                                <div class=" mb-3">
                                                    <label class="form-label" for="password-input">Password</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                                        <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password-input" name="password">
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                                    </div>
                                                </div>

                                                <div class="mt-3">
                                                    <button class="btn btn-success w-100" type="submit" name="login" id="login">Sign In</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="mt-5 mb-1 text-center">
                                            <a href="<?= base_url('auth/authreset') ?>" class="text-muted">Lupa password?</a>
                                        </div>
                                        <div class="text-center">
                                            <p class="mb-0">Belum memiliki akun ? <a href="<?= base_url('auth/signup') ?>" class="fw-semibold text-primary text-decoration-underline"> Daftar</a> </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Hak Cipta oleh <i class="mdi mdi-heart text-danger"></i> Khairul Bariyyah
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/default/assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/default/assets/libs/simplebar/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('assets/default/assets/libs/node-waves/waves.min.js') ?>"></script>
    <script src="<?= base_url('assets/default/assets/libs/feather-icons/feather.min.js') ?>"></script>
    <script src="<?= base_url('assets/default/assets/js/pages/plugins/lord-icon-2.1.0.js') ?>"></script>
    <script src="<?= base_url('assets/default/assets/js/plugins.js') ?>"></script>

    <!-- password-addon init -->
    <script src="<?= base_url('assets/default/assets/js/pages/password-addon.init.js') ?>"></script>
</body>

</html>