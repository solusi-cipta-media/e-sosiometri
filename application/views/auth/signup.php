<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/default/') ?>assets/images/<?= $favicon ?>">

    <!-- Layout config Js -->
    <script src="<?= base_url('assets/default/') ?>assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/default/') ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/default/') ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/default/') ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?= base_url('assets/default/') ?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row justify-content-center g-0">
                    <div class="col-lg-6">
                        <div class="card overflow-hidden m-0">
                            <div class="row justify-content-center g-0">


                                <div class="col-lg-12">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Daftar Akun</h5>
                                            <p class="text-muted">Silahkan melakukan pendaftaran untuk menggunakan sosiometri.</p>
                                        </div>

                                        <div class="mt-4">
                                            <form action="<?= base_url('auth/signup') ?>" method="post">
                                                <?= $this->session->flashdata('message') ?>
                                                <div class="mb-3">
                                                    <label for="userid" class="form-label">Username <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="userid" name="userid" placeholder="Enter Username" value="<?= set_value('userid') ?>" required>
                                                    <?= form_error('userid', '<small class="text-danger">', '</small>') ?>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="<?= set_value('email') ?>" required>
                                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">Password</label>
                                                    <div class="position-relative auth-pass-inputgroup">
                                                        <input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" name="password1" id="password-input" aria-describedby="passwordInput" required>
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="password-input">Ulangi Password</label>
                                                    <div class="position-relative auth-pass-inputgroup">
                                                        <input type="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" name="password2" id="password-input" aria-describedby="passwordInput" required>
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                                    </div>
                                                </div>

                                                <div class="mb-4">
                                                    <p class="mb-0 fs-12 text-muted fst-italic">Dengan mendaftarkan Anda menyetujui <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Syarat & Ketentuan</a></p>
                                                </div>

                                                <!-- <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                                    <h5 class="fs-13">Saran keamanan password harus terdiri dari:</h5>
                                                    <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 karakter</b></p>
                                                    <p id="pass-lower" class="invalid fs-12 mb-2">Terdapat karakter <b>lowercase</b> huruf (a-z)</p>
                                                    <p id="pass-upper" class="invalid fs-12 mb-2">Terdapat karakter <b>uppercase</b> huruf (A-Z)</p>
                                                    <p id="pass-number" class="invalid fs-12 mb-0">Terdapat karakter <b>nomor</b> (0-9)</p>
                                                </div> -->

                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Sign Up</button>
                                                </div>

                                                <!-- <div class="mt-4 text-center">
                                                    <div class="signin-other-title">
                                                        <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
                                                    </div>

                                                    <div>
                                                        <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                                        <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                                        <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                                        <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                                                    </div>
                                                </div> -->
                                            </form>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="mb-0">Sudah memiliki akun ? <a href="<?= base_url('auth') ?>" class="fw-semibold text-primary text-decoration-underline"> Login</a> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <script src="<?= base_url('assets/default/') ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/default/') ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url('assets/default/') ?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url('assets/default/') ?>assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?= base_url('assets/default/') ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= base_url('assets/default/') ?>assets/js/plugins.js"></script>

    <!-- validation init -->
    <script src="<?= base_url('assets/default/') ?>assets/js/pages/form-validation.init.js"></script>
    <!-- password create init -->
    <script src="<?= base_url('assets/default/') ?>assets/js/pages/passowrd-create.init.js"></script>
</body>

</html>