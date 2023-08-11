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

<style>
    .avatar-title:hover {
        background-color: #6072AD !important;
    }
</style>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img">
                    <img src="<?= base_url('assets/default/assets/images/' . $gambar_latar) ?>" class="profile-wid-img" alt="">
                    <!-- <div class="overlay-content">
                        <div class="text-end p-3">
                            <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                                <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                                    <i class="ri-image-edit-line align-bottom me-1"></i> Ubah Latar
                                </label>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-3">
                    <div class="card mt-n5">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                    <img src="<?= base_url() ?>assets/default/assets/images/<?= $logo_sekolah ? 'sekolah/' . $logo_sekolah : 'logo-default.png' ?>" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                        <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                        <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                            <span class="avatar-title rounded-circle bg-primary text-body">
                                                <i class="ri-camera-fill" style="color:white"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <h5 class="fs-16 mb-1"><?= $sekolah ?></h5>
                                <p class="text-muted mb-0">Logo Sekolah</p>
                            </div>
                        </div>
                    </div>
                    <!--end card-->


                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
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
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#passwordtab" role="tab">
                                        <i class="far fa-user"></i> Ubah Password
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <form id="form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Nama</label>
                                                    <input type="text" class="form-control" id="name" name="name" value="<?= $name ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="nik" class="form-label">Nomor Induk</label>
                                                    <input type="text" class="form-control" id="nik" name="nik" value="<?= $nik ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $pekerjaan ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $phone ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email" value="<?= $email ?>">
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
                                    <form id="form-data-2">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="sekolah" class="form-label">Nama Sekolah</label>
                                                    <input type="text" class="form-control" id="sekolah" name="sekolah" value="<?= $sekolah ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="provinsi" class="form-label">Provinsi</label>
                                                    <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?= $provinsi ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="kota" class="form-label">Kota/Kabupaten</label>
                                                    <input type="text" class="form-control" id="kota" name="kota" value="<?= $kota ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="telp_sekolah" class="form-label">Telp Sekolah</label>
                                                    <input type="text" class="form-control" id="telp_sekolah" name="telp_sekolah" value="<?= $telp_sekolah ?>">
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
                                                    <img src="<?= base_url('assets/default/assets/images/' . ($photo ? 'konselor/' . $photo : 'default.jpg')) ?>" style="max-height: 210px;max-width: auto;" />
                                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                        <input id="profile-img-file-input-dark" type="file" class="profile-img-file-input">
                                                        <label for="profile-img-file-input-dark" class="profile-photo-edit avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-primary text-body">
                                                                <i class="ri-camera-fill" style="color:white"></i>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <h5 class="fs-16 mb-1"><?= $name ?></h5>
                                                <!-- <p class="text-muted mb-0"><?= $slogan ?></p> -->
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <div class="tab-pane" id="passwordtab" role="tabpanel">
                                    <form id="form-data-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="userid" class="form-label">User ID</label>
                                                    <input type="text" class="form-control" id="userid" name="userid" value="<?= $userid ?>" readonly>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password Baru</label>
                                                    <input type="password" class="form-control" id="password" name="password">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="password2" class="form-label">Password Baru Lagi</label>
                                                    <input type="password" class="form-control" id="password2" name="password2">
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

                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div><!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Solusi Cipta Media.
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

<!--select2 cdn-->
<script src="<?= base_url('assets/default/assets/js/select2.min.js') ?>"></script>

<!-- profile-setting init js -->
<script src="<?= base_url('assets/default/assets/js/pages/profile-setting.init.js') ?>"></script>

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
        e.preventDefault()

        if ($('#name').val() == '' || $('#nik').val() == '' || $('#pekerjaan').val() == '' || $('#phone').val() == '' || $('#email').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }

        var form_data = new FormData();
        form_data.append('table', 'user');
        form_data.append('name', $("#name").val());
        form_data.append('nik', $("#nik").val());
        form_data.append('pekerjaan', $("#pekerjaan").val());
        form_data.append('phone', $("#phone").val());
        form_data.append('email', $("#email").val());

        var url_ajax = '<?= base_url() ?>sosiometri/insert_setting_detil'


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

    $("#form-data-2").submit(function(e) {
        e.preventDefault()

        if ($('#sekolah').val() == '' || $('#alamat').val() == '' || $('#provinsi').val() == '' || $('#kota').val() == '' || $('#telp_sekolah').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }

        var form_data = new FormData();
        form_data.append('table', 'user');
        form_data.append('sekolah', $("#sekolah").val());
        form_data.append('alamat', $("#alamat").val());
        form_data.append('provinsi', $("#provinsi").val());
        form_data.append('kota', $("#kota").val());
        form_data.append('telp_sekolah', $("#telp_sekolah").val());

        var url_ajax = '<?= base_url() ?>sosiometri/insert_setting_detil'


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

    $("#form-data-3").submit(function(e) {
        e.preventDefault()

        var a = $('#password').val();
        var b = $('#password2').val();

        if ($('#userid').val() == '' || $('#password').val() == '' || $('#password2').val() == '') {
            Swal.fire(
                'error!',
                'Tidak boleh ada kolom kosong!',
                'error'
            )
            return
        }

        if (a != b) {
            Swal.fire(
                'error!',
                'Password tidak sama!',
                'error'
            )
            return
        }

        var form_data = new FormData();
        form_data.append('table', 'user');
        form_data.append('password', $("#password").val());

        var url_ajax = '<?= base_url() ?>sosiometri/insert_setting_detil_password'


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
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: result.message,
                        toast: true,
                        position: "top",
                        showConfirmButton: false,
                        timer: 2800,
                        timerProgressBar: true,
                    })
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


    $('#profile-img-file-input').on('change', function() {


        var form_data = new FormData();
        form_data.append('table', 'user');
        if ($('#profile-img-file-input').val() !== "") {
            var file_data = $('#profile-img-file-input').prop('files')[0];
            form_data.append('file', file_data);
        }


        url_ajax = '<?= base_url() ?>sosiometri/update_setting_gambar_sekolah'


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
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: result.message,
                        toast: true,
                        position: "top",
                        showConfirmButton: false,
                        timer: 2800,
                        timerProgressBar: true,
                    })
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


    $('#profile-img-file-input-dark').on('change', function() {


        var form_data = new FormData();
        form_data.append('table', 'user');
        // form_data.append('jenis', 'logo_dark');
        if ($('#profile-img-file-input-dark').val() !== "") {
            var file_data = $('#profile-img-file-input-dark').prop('files')[0];
            form_data.append('file', file_data);
        }


        url_ajax = '<?= base_url() ?>sosiometri/update_setting_gambar_profil'


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
                    var html2 = `<img src="<?= base_url('assets/default/assets/images/konselor/') ?>` + result.gambar + `" style="max-height: 210px;max-width: auto;" />
                                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                        <input id="profile-img-file-input-dark" type="file" class="profile-img-file-input">
                                                        <label for="profile-img-file-input-dark" class="profile-photo-edit avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-primary text-body">
                                                                <i class="ri-camera-fill" style="color:white"></i>
                                                            </span>
                                                        </label>
                                                    </div>`

                    $('#gb-dark').html(html2)
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses!',
                        text: result.message,
                        toast: true,
                        position: "top",
                        showConfirmButton: false,
                        timer: 2800,
                        timerProgressBar: true,
                    })
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