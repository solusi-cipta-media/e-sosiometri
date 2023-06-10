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
                        <h4 class="mb-sm-0">Peserta Kuesioner</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?= $nama_usaha ?></a></li>
                                <li class="breadcrumb-item active">Peserta Kuesioner</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-primary" role="alert">
                <strong>Info :</strong> Halaman ini digunakan untuk melihat detil informasi kegiatan Kuesioner!
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0">Perserta Kuesioner - Batch <?= $batch ?></h5>
                            <!-- <button type="button" class="btn btn-secondary waves-effect waves-light"><i class="las la-plus-circle" data-bs-toggle="modal" data-bs-target="#myModal"></i> Tambah User</button> -->
                            <a href="<?= base_url('sosiometri/aktivitas') ?>" type="button" class="btn btn-danger">
                                <i class="ri-arrow-left-fill"></i> Kembali
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="table-kuesioner" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false" style="width: 5%;">No.</th>
                                        <th data-ordering="false">No Absen</th>
                                        <th data-ordering="false">Nama</th>
                                        <th data-ordering="false">Kelas</th>
                                        <th data-ordering="false">Jenis Kelamin</th>
                                        <th>Sudah Kuesioner ?</th>
                                    </tr>
                                </thead>
                            </table>
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
    <?php $target = 0; ?>
    $(function() {
        $("#table-kuesioner").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            'serverSide': true,
            'processing': true,
            "order": [
                [0, "desc"]
            ],
            'ajax': {
                'dataType': 'json',
                'url': '<?= base_url() ?>sosiometri/ajax_table_batch',
                'type': 'post',
                'data': {
                    batch: '<?= $batch ?>'
                }
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no_absen",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.nama",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.kelas",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.jenis_kelamin",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.status_kuesioner == '30-Nov--0001 12:00:00') {
                        return `<span class="badge bg-danger">BELUM</span>`
                    } else {
                        return `<span class="badge bg-success">SUDAH</span> | ` + data.status_kuesioner
                    }
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

    });
</script>