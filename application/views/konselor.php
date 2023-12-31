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

    <style type="text/css">
        #table-info {
            border: 1px solid black;
        }

        .avatar-title:hover {
            background-color: #6072AD !important;
        }
    </style>

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
                        <h4 class="mb-sm-0">Konselor</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"><?= $nama_usaha ?></a></li>
                                <li class="breadcrumb-item active">Konselor</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="alert alert-primary" role="alert">
                <strong>Info :</strong> Halaman ini digunakan untuk melihat detil informasi Konselor!
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <!-- <div class="card-header d-flex justify-content-between"> -->
                        <div class="card-header d-flex justify-content-between">

                            <h5 class="card-title mb-0">Konselor</h5>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" class="btn btn-info" id="btn-tambah">
                                        <i class="ri-add-circle-line"></i> Tambah
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="table-kuesioner" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th data-ordering="false" style="width: 5%;">No.</th>
                                        <th data-ordering="false">Konselor</th>
                                        <th data-ordering="false">Pekerjaan</th>
                                        <th data-ordering="false">Phone</th>
                                        <th data-ordering="false">Sekolah</th>
                                        <th data-ordering="false">Status</th>
                                        <th>Action</th>
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

<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Tambah Konselor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-data">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="userid" class="form-label">UserID</label>
                                <input type="text" class="form-control" id="userid">
                                <small style="color: red;font-style: italic; display: none;" id="erroruserid">User ID sudah digunakan !</small>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name">

                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan">

                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone">

                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-12">
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email">

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

<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="editmodalLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="editmodalLabel">Edit Konselor</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i> Biodata
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#informasiSekolah" role="tab">
                                <i class="far fa-user"></i> Informasi Sekolah
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#photoProfil" role="tab">
                                <i class="far fa-user"></i> Photo Profil
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form id="form-data-2">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="name_edit" name="name_edit">
                                            <input type="hidden" class="form-control" id="id_edit" name="id_edit">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="nik" class="form-label">Nomor Induk</label>
                                            <input type="text" class="form-control" id="nik_edit" name="nik_edit">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                            <input type="text" class="form-control" id="pekerjaan_edit" name="pekerjaan_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="phone_edit" name="phone_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email_edit" name="email_edit">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary"><i class="ri-upload-cloud-line"></i> Updates</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <div class="tab-pane" id="informasiSekolah" role="tabpanel">
                            <form id="form-data-3">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="sekolah" class="form-label">Nama Sekolah</label>
                                            <input type="text" class="form-control" id="sekolah_edit" name="sekolah_edit">
                                            <input type="hidden" class="form-control" id="id_edit2" name="id_edit2">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control" id="alamat_edit" name="alamat_edit">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="provinsi" class="form-label">Provinsi</label>
                                            <input type="text" class="form-control" id="provinsi_edit" name="provinsi_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="kota" class="form-label">Kota/Kabupaten</label>
                                            <input type="text" class="form-control" id="kota_edit" name="kota_edit">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="telp_sekolah" class="form-label">Telp Sekolah</label>
                                            <input type="text" class="form-control" id="telp_sekolah_edit" name="telp_sekolah_edit">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary"><i class="ri-upload-cloud-line"></i> Updates</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <div class="tab-pane" id="photoProfil" role="tabpanel">
                            <form>
                                <div class="row g-2">
                                    <div class="text-center">
                                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4" id="gb-dark">
                                            <img id="photo-konselor" src="<?= base_url('assets/default/assets/images/default.jpg') ?>" style="max-height: 210px;max-width: auto;" />
                                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                <input id="id_edit3" type="hidden" class="form-control">
                                                <input id="profile-konselor" type="file" class="profile-img-file-input">
                                                <label for="profile-konselor" class="profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-primary text-body">
                                                        <i class="ri-camera-fill" style="color:white"></i>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <h5 class="fs-16 mb-1">Photo Profile</h5>
                                    </div>
                                </div>
                                <!--end row-->
                            </form>
                        </div>

                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">Biodata Konselor <span class="badge badge-soft-success">Active</span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="info">
                <div class="row mt-3">
                    <div class="col-4">
                        <img src="<?= base_url('assets/default/assets/images/konselor/asa.jpg') ?>" alt="" class="object-cover w-100" height="220">
                        <h5 class="text-center mt-3">UserID : bening14</h5>
                    </div>
                    <div class="col-8">
                        <table class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <tr>
                                <td>Nama</td>
                                <td>Agus Salim</td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>007022</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>agus.salim.83@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>087654321890</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>Guru</td>
                            </tr>
                            <tr>
                                <td>Sekolah</td>
                                <td>SLTP N1 Malang<br>Jl. Pramuka No.48, Malang, Jawa Timur<br>0341-565656</td>
                            </tr>
                        </table>
                    </div>
                </div>
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
<!-- profile-setting init js -->
<!-- <script src="<?= base_url('assets/default/assets/js/pages/profile-setting.init.js') ?>"></script> -->
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
                'url': '<?= base_url() ?>sosiometri/ajax_table_konselor',
                'type': 'post'
            },
            'columns': [{
                    "target": [<?= $target ?>],
                    "className": 'text-center py-1',
                    "data": "data.no",
                }, {
                    "target": [<?= $target ?>],
                    "className": 'py-1',
                    "data": "data",
                    "render": function(data) {
                        return `<div class="d-flex gap-2 align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="<?= base_url() ?>assets/default/assets/images/${data.photo?'konselor/'+data.photo:'default.jpg'}" alt="" class="avatar-xs rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    ` + data.name + `<br><a href="javascript: void(0);"><span class="badge text-bg-primary" onclick=info_konselor('` + data.id + `')>detil<i class=" ri-arrow-right-line"></i></span></a>
                                </div>
                            </div>`
                    }
                }, {
                    "target": [<?= $target ?>],
                    "className": 'text-center py-1',
                    "data": "data",
                    "render": function(data) {
                        return data.pekerjaan + `<br>` + data.nik
                    }
                }, {
                    "target": [<?= $target ?>],
                    "className": 'text-center py-1',
                    "data": "data.phone",
                }, {
                    "target": [<?= $target ?>],
                    "className": 'py-1',
                    "data": "data",
                    "render": function(data) {
                        return `<div class="d-flex gap-2 align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="<?= base_url() ?>assets/default/assets/images/${data.logo_sekolah ? 'sekolah/' + data.logo_sekolah : 'logo-default.png'}" alt="" class="avatar-xs rounded-circle">
                                </div>
                                <div class="flex-grow-1">
                                    <strong>${data.sekolah}</strong><br>${data.alamat}${data.kota || data.provinsi?`, `:''}<br>${data.kota} ${data.provinsi}<br>Telp : ${data.telp_sekolah?data.telp_sekolah:'-'}
                                </div>
                            </div>`
                    }
                },
                {
                    "target": [<?= $target ?>],
                    "className": 'text-center py-1',
                    "data": "data",
                    "render": function(data) {
                        if (data.is_active == '1') {
                            return `<span class="badge badge-soft-success">Active</span>`
                        } else {
                            return `<span class="badge badge-soft-danger">Not Active</span>`
                        }
                    }
                },
                {
                    "target": [<?= $target ?>],
                    "className": 'text-center py-1',
                    "data": "data",
                    "render": function(data) {
                        if (data.is_active == '1') {
                            return `<button type="button" class="btn btn-sm btn-success" onclick=edit('` + data.id + `') data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-edit-line"></i></button>
                        <button type="button" class="btn btn-sm btn-warning" onclick=reset('` + data.id + `') data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Password"><i class="ri-history-line"></i></button>
                        <button type="button" class="btn btn-sm btn-danger" onclick=nonaktif('` + data.id + `') data-bs-toggle="tooltip" data-bs-placement="top" title="Non Aktifkan User"><i class="ri-user-unfollow-fill"></i></button>
                        <button type="button" class="btn btn-sm btn-danger" onclick=delete_data('` + data.id + `') data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"><i class="ri-delete-bin-line"></i></button>
                        `
                        } else {
                            return `<button type="button" class="btn btn-sm btn-success" onclick=edit('` + data.id + `') data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-edit-line"></i></button>
                        <button type="button" class="btn btn-sm btn-warning" onclick=reset('` + data.id + `') data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Password"><i class="ri-history-line"></i></button>
                        <button type="button" class="btn btn-sm btn-info" onclick=aktif('` + data.id + `') data-bs-toggle="tooltip" data-bs-placement="top" title="Aktifkan User"><i class="ri-user-follow-fill"></i></button>
                        <button type="button" class="btn btn-sm btn-danger" onclick=delete_data('` + data.id + `') data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"><i class="ri-delete-bin-line"></i></button>
                        `
                        }
                    }
                },
            ],
            "dom": '<"row" <"col-md-6" l><"col-md-6" f>>rt<"row" <"col-md-6" i><"col-md-6" p>>',
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });

    });

    function reload_table() {
        $('#table-kuesioner').DataTable().ajax.reload(null, false);
    }

    function delete_data(id) {

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
                    url: '<?= base_url() ?>sosiometri/delete_data',
                    data: {
                        id: id,
                        table: "user"
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

    function aktif(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda akan mengaktifkan user!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, aktifkan saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>sosiometri/aktifkan',
                    data: {
                        id: id,
                        table: "user"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Activated!',
                                'User berhasil di aktifkan.',
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

    function nonaktif(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda akan menonaktifkan user!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, nonaktifkan saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>sosiometri/nonaktifkan',
                    data: {
                        id: id,
                        table: "user"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Freezed!',
                                'User berhasil di nonaktifkan.',
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

    function reset(id) {

        Swal.fire({
            title: 'Apakah Anda Yakin ?',
            text: "Anda akan melakukan reset password user menjadi password default : 12345",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, reset saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url() ?>sosiometri/reset',
                    data: {
                        id: id,
                        table: "user"
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {
                        if (result.status == "success") {
                            Swal.fire(
                                'Reset!',
                                'Password user berhasil di reset ke default : 12345',
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

    $('#btn-tambah').on('click', function() {
        $('#exampleModalgrid').modal('show');
        $('#batch').val('<?= $this->uri->segment(3) ?>')
        $('#kelas').val('<?= $this->uri->segment(4) ?>')
    })

    $("#form-data").submit(function(e) {
        // alert('OK')
        e.preventDefault()

        if ($('#userid').val() == '' || $('#name').val() == '' || $('#pekerjaan').val() == '' || $('#phone').val() == '' || $('#email').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'user');
        form_data.append('userid', $("#userid").val());
        form_data.append('name', $("#name").val());
        form_data.append('pekerjaan', $("#pekerjaan").val());
        form_data.append('phone', $("#phone").val());
        form_data.append('email', $("#email").val());

        var url_ajax = '<?= base_url() ?>sosiometri/insert_konselor'


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

    $("#form-data-2").submit(function(e) {
        // alert('OK')
        e.preventDefault()

        if ($('#name_edit').val() == '' || $('#nik_edit').val() == '' || $('#pekerjaan_edit').val() == '' || $('#phone_edit').val() == '' || $('#email_edit').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'user');
        form_data.append('id', $("#id_edit").val());
        form_data.append('name', $("#name_edit").val());
        form_data.append('nik', $("#nik_edit").val());
        form_data.append('pekerjaan', $("#pekerjaan_edit").val());
        form_data.append('phone', $("#phone_edit").val());
        form_data.append('email', $("#email_edit").val());

        var url_ajax = '<?= base_url() ?>sosiometri/update_konselor'


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
                    $('#editmodal').modal('hide');
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

    $("#form-data-3").submit(function(e) {
        // alert('OK')
        e.preventDefault()

        if ($('#sekolah_edit').val() == '' || $('#alamat_edit').val() == '' || $('#provinsi_edit').val() == '' || $('#kota_edit').val() == '' || $('#telp_sekolah_edit').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }


        var form_data = new FormData();
        form_data.append('table', 'user');
        form_data.append('id', $("#id_edit2").val());
        form_data.append('sekolah', $("#sekolah_edit").val());
        form_data.append('alamat', $("#alamat_edit").val());
        form_data.append('provinsi', $("#provinsi_edit").val());
        form_data.append('kota', $("#kota_edit").val());
        form_data.append('telp_sekolah', $("#telp_sekolah_edit").val());

        var url_ajax = '<?= base_url() ?>sosiometri/update_konselor'


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
                    $('#editmodal').modal('hide');
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

    function info_konselor(id) {

        $.ajax({
            url: '<?= base_url() ?>sosiometri/info_konselor',
            type: "post",
            async: true,
            data: {
                id: id
            },
            dataType: "json",
            success: function(result) {
                $('#infoModal').modal('show');

                var html2 = `<div class="row mt-3">
                    <div class="col-4">
                        <img src="<?= base_url('assets/default/assets/images/') ?>${result.photo ?'konselor/'+result.photo:'default.jpg'}" alt="" class="object-cover w-100" height="220">
                        <h5 class="text-center mt-3">UserID : ` + result.userid + `</h5>
                    </div>
                    <div class="col-8">
                        <table class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                            <tr>
                                <td>Nama</td>
                                <td>` + result.name + `</td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>` + result.nik + `</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>` + result.email + `</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>` + result.phone + `</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>` + result.pekerjaan + `</td>
                            </tr>
                            <tr>
                                <td>Sekolah</td>
                                <td>` + result.sekolah + `<br>` + result.alamat + (result.kota ? ', ' + result.kota : '') + (result.provinsi ? ', ' + result.provinsi : '') + `<br>` + result.telp_sekolah + `</td>
                            </tr>
                        </table>
                    </div>
                </div>`

                $('#info').html(html2)

            },
            error: function(err) {
                Swal.fire(
                    'error!',
                    err.responseText,
                    'error'
                )
            }
        })
    }

    $('#userid').on('keyup', function() {
        $.ajax({
            url: '<?= base_url() ?>sosiometri/getuserid',
            type: "post",
            async: true,
            data: {
                userid: $('#userid').val()
            },
            dataType: "json",
            success: function(result) {
                if (result.status == 'error') {
                    $('#erroruserid').show()
                } else {
                    $('#erroruserid').hide()
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

    function edit(id) {

        $('#editmodal').modal('show');

        $.ajax({
            url: '<?= base_url() ?>sosiometri/getuseriddata',
            type: "post",
            async: true,
            data: {
                id: id
            },
            dataType: "json",
            success: function(result) {
                $('#name_edit').val(result.name)
                $('#nik_edit').val(result.nik)
                $('#pekerjaan_edit').val(result.pekerjaan)
                $('#phone_edit').val(result.phone)
                $('#email_edit').val(result.email)
                $('#sekolah_edit').val(result.sekolah)
                $('#alamat_edit').val(result.alamat)
                $('#provinsi_edit').val(result.provinsi)
                $('#kota_edit').val(result.kota)
                $('#telp_sekolah_edit').val(result.telp_sekolah)
                $('#id_edit').val(result.id)
                $('#id_edit2').val(result.id)
                $('#id_edit3').val(result.id)
                $('#photo-konselor').attr('src', `<?= base_url('assets/default/assets/images/') ?>${result.photo?'konselor/':''}` + (result.photo ? result.photo : 'default.jpg'))


            },
            error: function(err) {
                Swal.fire(
                    'error!',
                    err.responseText,
                    'error'
                )
            }
        })
    }

    $('#profile-konselor').on('change', function() {
        var form_data = new FormData();
        form_data.append('table', 'user');
        form_data.append('id', $('#id_edit3').val());
        if ($('#profile-konselor').val() !== "") {
            var file_data = $('#profile-konselor').prop('files')[0];
            form_data.append('file', file_data);
        }


        url_ajax = '<?= base_url() ?>sosiometri/update_setting_gambar_profil_konselor'


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

                    $('#photo-konselor').attr('src', `<?= base_url('assets/default/assets/images/') ?>${result.gambar?'konselor/':''}` + (result.gambar ? result.gambar : 'default.jpg'))

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
    });
</script>