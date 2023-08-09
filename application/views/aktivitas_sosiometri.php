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
                        <h4 class="mb-sm-0">Aktivitas Kuesioner</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?= $nama_usaha ?></a></li>
                                <li class="breadcrumb-item active">Aktivitas Kuesioner</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-primary" role="alert">
                <strong>Prosedur Kuesioner :</strong><br>
                1. Tambah Kuesioner, lakukan dengan cara klik tombol tambah kuesioner dan isi form<br>
                2. Import data, sebelumnya siapkan data dalam bentuk excel terlebih dahulu <a href='<?= base_url('sosiometri/download/template_upload.xlsx') ?>' style="font-weight: bold;">(download template)</a><br>
                3. Bagikan Link ke peserta dengan klik tombol link<br>
                <!-- <strong>Info :</strong> Halaman ini digunakan untuk menambahkan dan menghapus Kuesioner! -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title mb-0">Manajemen Kuesioner</h5>
                            <!-- <button type="button" class="btn btn-secondary waves-effect waves-light"><i class="las la-plus-circle" data-bs-toggle="modal" data-bs-target="#myModal"></i> Tambah User</button> -->
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                <i class="las la-plus-circle"></i> Tambah Kuesioner
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="table-kuesioner" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false" style="width: 5%;">No.</th>
                                        <th data-ordering="false">Tema Sosiometri</th>
                                        <th data-ordering="false">Kelas</th>
                                        <th data-ordering="false">Jumlah Siswa</th>
                                        <th data-ordering="false">Register Time</th>
                                        <th style="width:15%">Action</th>
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


<!-- Grids in modals -->

<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Tambah Kuesioner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-data">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="tema" class="form-label">Tema Sosiometri</label>
                                <input type="text" class="form-control" id="tema">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="kelas" class="form-label">Kelas</label>
                                <input type="text" class="form-control" id="kelas" onkeyup="this.value = this.value.toUpperCase()">
                            </div>
                        </div><!--end col-->
                        <!-- <div class="col-xxl-12">
                            <div>
                                <label for="jumlah_siswa" class="form-label">Jumlah Siswa</label>
                                <input type="text" class="form-control" id="jumlah_siswa">
                            </div>
                        </div> -->
                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalimport" tabindex="-1" aria-labelledby="modalimportLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalimportLabel">Import Data Kuesioner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_upload_excel" method="post" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <label class="form-label">Silahkan download Template, setelah diisi lakukan upload</label>
                            <a href='<?= base_url('sosiometri/download/template_upload.xlsx') ?>' class="btn btn-sm btn-success"><i class="ri-file-excel-line "></i> Download Template Excel</a>
                        </div><!--end col-->
                        <div class="col-xxl-12" style="border-bottom: solid 1px #e9ebec;">
                        </div>
                        <div class="col-xxl-12">
                            <div>
                                <input type="file" name="file_excel" class="custom-file-input" id="file_excel" lang="en">
                                <label class="custom-file-label" for="file_excel"></label>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12" style="display: none;">
                            <div>
                                <label for="batch" class="form-label">batch</label>
                                <input type="text" class="form-control" id="batch">
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>


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
                'url': '<?= base_url() ?>sosiometri/ajax_table_aktivitas',
                'type': 'post',
            },
            'columns': [{
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.no",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.tema",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return data.kelas + `<br><a href="<?= base_url('sosiometri/batch_detil/') ?>` + data.batch + `" type="button" class="btn btn-ghost-primary waves-effect waves-light">detil<i class="ri-arrow-right-fill"></i></a>`
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    if (data.jumlah_siswa == 0) {
                        return `Belum Upload`
                    } else {
                        return data.jumlah_siswa
                    }
                }
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data.date_created",
            }, {
                "target": [<?= $target ?>],
                "className": 'text-center py-1',
                "data": "data",
                "render": function(data) {
                    return `<button type="button" class="btn btn-sm btn-success" onclick=import_data('` + data.batch + `')><i class="ri-file-excel-line"></i> Import</button>
                    <input type="text" id="mylink" style="display: none;">
                    <button type="button" class="btn btn-sm btn-info" onclick=copyclipboard('` + data.link + `')><i class="ri-links-line"></i> Link</button>
                    <button type="button" class="btn btn-sm btn-danger" onclick=delete_data('` + data.id + `','` + data.batch + `')><i class="ri-delete-bin-line"></i> Hapus</button>`
                }
            }, ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

    });

    function reload_table() {
        $('#table-kuesioner').DataTable().ajax.reload(null, false);
    }

    $("#form-data").submit(function(e) {
        // alert('OK')
        e.preventDefault()

        if ($('#tema').val() == '' || $('#kelas').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'tbl_sosiometri');
        form_data.append('tema', $("#tema").val());
        form_data.append('kelas', $("#kelas").val());

        var url_ajax = '<?= base_url() ?>sosiometri/insert_data_aktivitas'


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
                    $('#tema').val('')
                    $('#kelas').val('')
                    $('#exampleModalgrid').modal('hide');
                    reload_table()
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

    function clear_form_import() {
        $('#modalimport').find('input').val('')
    }
    $("#form_upload_excel").submit(function(e) {
        e.preventDefault()
        if (!$('#file_excel').val()) {
            $('#modalimport').modal('hide');
            Swal.fire(
                "Oops!",
                "File belum dipilih",
                "warning"
            )
            return;
        }

        process_submit()
        var url_ajax = '<?= base_url() ?>sosiometri/import_excel'

        var file_data = $('#file_excel').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file_excel', file_data);
        form_data.append('batch', $("#batch").val());

        $.ajax({
            url: url_ajax,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(result) {
                if (result.status == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: result.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    clear_form_import()
                    $('#modalimport').modal("hide");
                    reload_table()
                } else
                    Swal.fire(
                        "Oops!",
                        'oke  ' + result.message,
                        "warning"
                    )
            },
            error: function(err) {
                var get_error = err.responseText
                if (get_error.indexOf('200') >= 0) {
                    clear_form_import()
                    $('#modalimport').modal("hide");
                    reload_table()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Berhasil Import Data User',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return;
                }
                if (get_error.indexOf('500') >= 0) {
                    clear_form_import()
                    $('#modalimport').modal("hide");
                    reload_table()
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Gagal Upload File Excle',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    return;
                }
                if (get_error.indexOf('501') >= 0 || get_error.indexOf('502') >= 0 || get_error.indexOf('503') >= 0 || get_error.indexOf('504') >= 0 || get_error.indexOf('505') >= 0) {
                    //501 => ada kolom kosong 
                    //502 => duplikat no absen yg baru, user double no absen 
                    //503 => duplikat no absen dengan data no absen db
                    //504 => tidak ada data
                    //505 => gagal import
                    var msg = ''
                    msg = get_error.substring(0, get_error.indexOf('}'))
                    msg = msg.slice(0, -1)
                    msg = msg.slice(25)
                    Swal.fire({
                        position: 'top-center',
                        showConfirmButton: false,
                        timer: 2000,
                        icon: 'warning',
                        title: 'Peringatan!',
                        text: msg
                    })
                    clear_form_import()
                    return;
                }
                Swal.fire({
                    position: 'top-center',
                    showConfirmButton: false,
                    timer: 2000,
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terdapat kesalahan pada sistem.'
                })
                clear_form_import()

            }
        });
    })

    function checkVal() {

    }

    function process_submit() {
        $("#modalimport").modal('hide')
    }

    function delete_data(id, batch) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Data yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>sosiometri/delete_data_sosiometri',
                    data: {
                        id: id,
                        batch: batch,
                        table: "tbl_sosiometri"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Deleted!',
                                'Data berhasil di hapus.',
                                'success'
                            )
                            reload_table()
                        } else
                            toast('error', result.message)
                    }
                })
            }
        })


    }

    function copyclipboard(datalink) {
        $('#mylink').val(datalink)
        // Get the text field
        var copyText = document.getElementById("mylink");
        // var copyText = datalink;

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
        alert("Link : " + copyText.value);
    }

    function import_data(batch) {
        $('#file_excel').val('');
        $('#modalimport').modal('show');
        $('#batch').val(batch)
    }
</script>