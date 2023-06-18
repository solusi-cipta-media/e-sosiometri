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

    <!-- Sweet Alert css-->
    <link href="<?= base_url('assets/default/assets/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />

    <!--datatable css-->
    <link href="<?= base_url('assets/default/assets/css/dataTables.bootstrap5.min.css') ?>" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="<?= base_url('assets/default/assets/css/responsive.bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/default/assets/css/buttons.dataTables.min.css') ?>" rel="stylesheet" type="text/css" />


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

</head>



<?php include('menu_header.php') ?>



<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Setting Email</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?= $nama_usaha ?></a></li>
                                <li class="breadcrumb-item active">Setting Email</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-primary" role="alert">
                <strong>Info :</strong><br>
                1. Halaman ini digunakan untuk melakukan setting pengiriman email otomatis!<br>
                2. Jika Anda menggunakan Gmail sebagai email Host, mohon aktifkan fitur 'Akses Aplikasi yang Kurang Aman'.
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <!-- <div class="card-header d-flex justify-content-between"> -->
                        <div class="card-header d-flex justify-content-between">

                            <h5 class="card-title mb-0">Setting Email</h5>

                        </div>
                        <div class="card-body">
                            <form id="form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="host" class="form-label">Host</label>
                                            <input type="text" class="form-control" id="host" name="host" placeholder="tls://smtp.gmail.com" value="<?= $host ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username Email</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="sosiometri@gmail.com" value="<?= $username ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="text" class="form-control" id="password" name="password">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="secure" class="form-label">SMTP Secure</label>
                                            <input type="text" class="form-control" id="secure" name="secure" placeholder="tls" value="<?= $secure ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="port" class="form-label">Port</label>
                                            <input type="text" class="form-control" id="port" name="port" placeholder="587" value="<?= $port ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="from" class="form-label">Email From</label>
                                            <input type="text" class="form-control" id="from" name="from" placeholder="info@gmail.com" value="<?= $emailfrom ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="pengirim" class="form-label">Nama Pengirim</label>
                                            <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="no-reply@gmail.com" value="<?= $nama_pengirim ?>">
                                        </div>
                                    </div>
                                </div>
                                <dir class="row">
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary"><i class="ri-upload-cloud-line"></i> Updates</button>
                                        </div>
                                    </div>
                                </dir>
                            </form>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Solusi Cipta Media
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">

                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->




<?php include('menu_footer.php') ?>


<!-- JAVASCRIPT -->
<script src="<?= base_url('assets/default/assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/libs/simplebar/simplebar.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/libs/node-waves/waves.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/libs/feather-icons/feather.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/pages/plugins/lord-icon-2.1.0.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/plugins.js') ?>"></script>

<script src="<?= base_url('assets/default/assets/js/jquery-3.6.0.min.js') ?>"></script>

<!--datatable js-->
<script src="<?= base_url('assets/default/assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/dataTables.bootstrap5.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/default/assets/js/jszip.min.js') ?>"></script>

<script src="<?= base_url('assets/default/assets/js/pages/datatables.init.js') ?>"></script>

<!-- Sweet Alerts js -->
<script src="<?= base_url('assets/default/assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- Sweet alert init js-->
<script src="<?= base_url('assets/default/assets/js/pages/sweetalerts.init.js') ?>"></script>

<!-- App js -->
<script src="<?= base_url('assets/default/assets/js/app.js') ?>"></script>
</body>

</html>

<script>
    $("#form-data").submit(function(e) {
        // alert('OK')
        e.preventDefault()

        if ($('#host').val() == '' || $('#username').val() == '' || $('#password').val() == '' || $('#secure').val() == '' || $('#port').val() == '' || $('#emailfrom').val() == '' || $('#nama_pengirim').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'set_email');
        form_data.append('host', $("#host").val());
        form_data.append('username', $("#username").val());
        form_data.append('password', $("#password").val());
        form_data.append('secure', $("#secure").val());
        form_data.append('port', $("#port").val());
        form_data.append('emailfrom', $("#from").val());
        form_data.append('nama_pengirim', $("#pengirim").val());

        var url_ajax = '<?= base_url() ?>sosiometri/update_set_email'


        $.ajax({
            url: url_ajax,
            type: "post",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            dataType: "json",
            success: function(result) {
                if (result.status == "success") {
                    Swal.fire(
                        'Success!',
                        result.message,
                        'success'
                    )
                } else {
                    Swal.fire(
                        'error!',
                        result.message,
                        'error'
                    )
                }
            },
            error: function(err) {
                Swal.fire(
                    'error!',
                    err.responseText,
                    'error'
                )
            }
        })
    })
</script>