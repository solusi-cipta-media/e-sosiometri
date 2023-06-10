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
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex  min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-12">
                        <!-- <div class="card overflow-hidden"> -->
                        <!-- <div class="card-body p-4"> -->
                        <!-- <div class="text-center">
                                    <img src="https://img.themesbrand.com/velzon/images/auth-offline.gif" alt="" height="210">
                                    <h3 class="mt-4 fw-semibold">We're currently offline</h3>
                                    <p class="text-muted mb-4 fs-14">We can't show you this images because you aren't connected to the internet. When you’re back online refresh the page or hit the button below</p>
                                    <button class="btn btn-success btn-border" onClick="window.location.href=window.location.href"><i class="ri-refresh-line align-bottom"></i> Refresh</button>
                                </div> -->

                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Lacak Carwash</h4>
                                    <div class="flex-shrink-0">
                                        <!-- <div class="form-check form-switch form-switch-right form-switch-md">
                                            <label for="striped-rows-showcode" class="form-label text-muted">Show Code</label>
                                            <input class="form-check-input code-switcher" type="checkbox" id="striped-rows-showcode">
                                        </div> -->
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <a href="<?= base_url() ?>" class="btn btn-secondary"><i class="ri-delete-back-line"></i> Home</a>
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-nowrap align-middle mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Customer</th>
                                                        <th scope="col">Alamat</th>
                                                        <th scope="col">Jenis Kendaraan</th>
                                                        <th scope="col">NOPOL</th>
                                                        <th scope="col">Tanggal Cuci</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    if ($id != '') {
                                                    ?>
                                                        <tr>
                                                            <td class="fw-medium"><?= $id ?></td>
                                                            <td><?= $customer ?></td>
                                                            <td><?= $alamat ?></td>
                                                            <td><?= $pekerjaan ?></td>
                                                            <td><?= $nomor_kendaraan ?></td>
                                                            <td><?= date('d-M-Y', strtotime($tgl_masuk)) ?></td>
                                                            <td><?= $status_pekerjaan ?></td>
                                                        </tr>
                                                    <?php
                                                    } else {
                                                        echo '<tr>';
                                                        echo '<td colspan="7" style="text-align: center;font-style: italic;">Tidak ada data</td>';
                                                        echo '</tr>';
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div>
                        <!-- end col -->
                        <!-- </div> -->
                        <!-- end row -->
                        <!-- </div> -->
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
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/default/') ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/default/') ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url('assets/default/') ?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url('assets/default/') ?>assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?= base_url('assets/default/') ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?= base_url('assets/default/') ?>assets/js/plugins.js"></script>

</body>

</html>