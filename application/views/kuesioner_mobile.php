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

    <link href="<?= base_url('assets/default/assets/css/select2.min.css') ?>" rel="stylesheet" type="text/css" />

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

    <!-- <style>
        .gb-depan {
            background-image: url("assets/default/assets/images/<?= $gambar_depan ?>") !important;
            background-position: center;
            background-size: cover;
        }
    </style> -->
</head>

<body>
    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <img src="<?= base_url() ?>assets/default/assets/images/<?= $logo ? 'sekolah/' . $logo : 'simitri.png' ?>" style="max-width: 120px;">
                            <h2 class="text-white mb-1">Kuesioner E-Sosiometri</h2>
                            <h5 class="text-white mb-3">SMP N1 Malang</h5>
                        </div>
                    </div>
                </div>
                <div class="row" id="biodata">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-12">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Selamat datang di E-Sosiometri!</h5>
                                            <p class="text-muted">Silahkan isi identitas diri Anda</p>
                                        </div>
                                        <div class="mt-4">
                                            <!-- <form action="" method="POST"> -->
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <select class="form-control" name="nama" id="nama">
                                                    <option value="">--Pilih Nama Saya--</option>
                                                    <?php
                                                    foreach ($siswa as $key => $value) {
                                                    ?>
                                                        <option value="<?= $value['no_absen'] . '-' . $value['nama'] . '-' . $value['id'] ?>"><?= $value['no_absen'] . ' - ' . $value['nama'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <small style="color: red; display: none;" id="error_nama">Anda harus memilih nama Anda terlebih dahulu</small>
                                            </div>
                                            <div class="mb-3">
                                                <label for="no_absen" class="form-label">Nomor Absen</label>
                                                <input type="hidden" class="form-control" id="batch" name="batch" value="<?php echo $this->uri->segment(3); ?>" readonly>
                                                <input type="text" class="form-control" id="no_absen" name="no_absen">
                                                <small style="color: red; display: none;" id="error_no_absen">Kolom isian tidak boleh kosong</small>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kelas" class="form-label">Kelas</label>
                                                <input type="text" class="form-control" id="kelas" name="kelas">
                                                <small style="color: red; display: none;" id="error_kelas">Kolom isian tidak boleh kosong</small>
                                            </div>
                                            <div class="mb-3">
                                                <label for="sekolah" class="form-label">Sekolah</label>
                                                <input type="text" class="form-control" id="sekolah" name="sekolah">
                                                <small style="color: red; display: none;" id="error_sekolah">Kolom isian tidak boleh kosong</small>
                                            </div>
                                            <div class="mt-3">
                                                <button class="btn btn-success w-100" type="button" name="btn_biodata" id="btn_biodata">Lanjutkan</button>
                                            </div>
                                            <!-- </form> -->
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
                <div class="row" style="display: none;" id="konfirmasi">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-12">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <!-- <h5 class="text-primary">Selamat datang di E-Sosiometri!</h5> -->
                                            <p>Instrument ini merupakan sosiometri yang bertujuan untuk mengukur tingkat relasi sosial saudara dalam kelompok. Pertanyaan yang akan di ajukan berkaitan dengan pengalaman saudara dalam menjalin hubungan sosial dengan orang lain dalam kelompok yang telah ditentukan</p>
                                            <p>Tidak ada jawaban benar atau salah dalam instrument ini, karena tujuan kami adalah mengukur apa yang saudara rasakan. Semua yang saudara informasikan dalam paket ini akan terjamin kerahasiaanya, dan hanya akan kami pergunakan untuk kepentingan pendidikan dan penelitian saja.</p>
                                        </div>
                                        <div class="mt-4">

                                            <div class="mt-3">
                                                <button class="btn btn-success w-100" type="button" name="btn_konfirmasi" id="btn_konfirmasi">Saya setuju</button>
                                            </div>
                                            <!-- </form> -->
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
                <div class="row" style="display: none;" id="question">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row g-0">
                                <div class="col-lg-12">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h5 class="text-primary">Pertanyaan : </h5>
                                            <h4 class="mt-5"><?= $d['tema'] ?></h4>

                                            <h5 class="mt-5">Pilihan 1 :</h5>
                                            <div class="mb-3">
                                                <label for="nama1" class="form-label">Nama</label>
                                                <select class="form-control" name="nama1" id="nama1">
                                                    <!-- <option value="">--Pilih Teman Anda--</option>
                                                    <?php
                                                    foreach ($siswa as $key => $value) {
                                                    ?>
                                                        <option value="<?= $value['no_absen'] . '-' . $value['nama'] ?>"><?= $value['no_absen'] . ' - ' . $value['nama'] ?></option>
                                                    <?php
                                                    }
                                                    ?> -->
                                                </select>
                                                <small style="color: red; display: none;" id="error_nama1">Anda belum memilih teman Anda</small>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alasan1" class="form-label">Alasan</label>
                                                <textarea class="form-control" name="alasan1" id="alasan1" cols="30" rows="3"></textarea>
                                                <small style="color: red; display: none;" id="error_alasan1">Kolom isian tidak boleh kosong</small>
                                            </div>

                                            <h5 class="mt-5">Pilihan 2 :</h5>
                                            <div class="mb-3">
                                                <label for="nama2" class="form-label">Nama</label>
                                                <select class="form-control" name="nama2" id="nama2">
                                                    <!-- <option value="">--Pilih Teman Anda--</option>
                                                    <?php
                                                    foreach ($siswa as $key => $value) {
                                                    ?>
                                                        <option value="<?= $value['no_absen'] . '-' . $value['nama'] ?>"><?= $value['no_absen'] . ' - ' . $value['nama'] ?></option>
                                                    <?php
                                                    }
                                                    ?> -->
                                                </select>
                                                <small style="color: red; display: none;" id="error_nama2">Anda belum memilih teman Anda</small>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alasan2" class="form-label">Alasan</label>
                                                <textarea class="form-control" name="alasan2" id="alasan2" cols="30" rows="3"></textarea>
                                                <small style="color: red; display: none;" id="error_alasan2">Kolom isian tidak boleh kosong</small>
                                            </div>
                                            <h5 class="mt-5">Pilihan 3 :</h5>
                                            <div class="mb-3">
                                                <label for="nama3" class="form-label">Nama</label>
                                                <select class="form-control" name="nama3" id="nama3">
                                                    <!-- <option value="">--Pilih Teman Anda--</option>
                                                    <?php
                                                    foreach ($siswa as $key => $value) {
                                                    ?>
                                                        <option value="<?= $value['no_absen'] . '-' . $value['nama'] ?>"><?= $value['no_absen'] . ' - ' . $value['nama'] ?></option>
                                                    <?php
                                                    }
                                                    ?> -->
                                                </select>
                                                <small style="color: red; display: none;" id="error_nama3">Anda belum memilih teman Anda</small>
                                            </div>
                                            <div class="mb-3">
                                                <label for="alasan3" class="form-label">Alasan</label>
                                                <textarea class="form-control" name="alasan3" id="alasan3" cols="30" rows="3"></textarea>
                                                <small style="color: red; display: none;" id="error_alasan3">Kolom isian tidak boleh kosong</small>
                                            </div>

                                        </div>
                                        <div class="mt-4">

                                            <div class="mt-3">
                                                <button class="btn btn-success w-100" type="button" name="btn_question" id="btn_question">Saya setuju</button>
                                            </div>
                                            <!-- </form> -->
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

                <div class="row justify-content-center" style="display: none;" id="thankyou">
                    <div class="col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <img src="<?= base_url('assets/default/assets/images/congrats.svg') ?>" alt="" height="210">
                                    <h5 class="mt-4 fw-semibold">Terima kasih atas partisipasi Anda</h5>
                                    <!-- <p class="text-muted mb-4 fs-14">Data ini kami gunakan hanya untuk Kamu</p> -->
                                    <button class="btn btn-success btn-border mt-3" onClick="window.location.href=window.location.href"><i class="ri-home-3-line align-bottom"></i> Home</button>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

                </div>




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

    <script src="<?= base_url('assets/default/assets/js/jquery-3.6.0.min.js') ?>"></script>
    <!--select2 cdn-->
    <script src="<?= base_url('assets/default/assets/js/select2.min.js') ?>"></script>
    <!-- Sweet Alerts js -->
    <script src="<?= base_url('assets/default/assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>
    <!-- Sweet alert init js-->
    <script src="<?= base_url('assets/default/assets/js/pages/sweetalerts.init.js') ?>"></script>

</body>

</html>

<script>
    var a;
    var b;
    $('#nama').select2({});
    $('#nama1').select2({});
    $('#nama2').select2({});
    $('#nama3').select2({});

    $('#nama').on('change', function() {

        $.ajax({
            url: '<?= base_url() ?>kuesioner/getsiswa',
            data: {
                id: $('#nama').val(),
                table: "tbl_siswa_kuesioner"
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {
                a = result.no_absen

                $('#no_absen').val(result.no_absen)
                $('#kelas').val(result.kelas)
                $('#sekolah').val(result.sekolah)
                //jika dipilih

                $.ajax({
                    url: '<?= base_url() ?>kuesioner/getpilihan',
                    data: {
                        nama1: a,
                        table: "tbl_siswa_kuesioner",
                        batch: '<?php echo $this->uri->segment(3) ?>'
                    },
                    type: 'post',
                    dataType: 'json',
                    success: function(result) {

                        var html = '<option value="">--Pilih Teman Anda--</option>';
                        result.forEach(d => {
                            // html += `<option value="${d.id}">${d.no_absen + '-' + d.nama}</option>`;
                            html += '<option value="' + d.no_absen + '-' + d.nama + '-' + d.id + '">' + d.no_absen + '-' + d.nama + '</option>';
                        });
                        $('#nama1').html(html);

                    }
                })

            }
        })
    });

    $('#nama').on('change', function() {
        if ($('#nama').val() != '') {
            $('#error_nama').hide()
        }
    });

    $('#btn_biodata').on('click', function() {
        //cek dulu apakah ada kolom kosong
        if ($('#nama').val() == '') {
            $('#error_nama').show()
        }
        if ($('#no_absen').val() == '') {
            $('#error_no_absen').show()
        }
        if ($('#kelas').val() == '') {
            $('#error_kelas').show()
        }
        if ($('#sekolah').val() == '') {
            $('#error_sekolah').show()
        }

        if ($('#no_absen').val() != '') {
            $('#error_no_absen').hide()
        }
        if ($('#kelas').val() != '') {
            $('#error_kelas').hide()
        }
        if ($('#sekolah').val() != '') {
            $('#error_sekolah').hide()
        }

        //masuk ke halaman selanjutnya
        if ($('#nama').val() != '' && $('#no_absen').val() != '' && $('#kelas').val() != '' && $('#sekolah').val() != '') {
            //cek apakah di DB konseli sudah melakukan pengisian kuesioner sebelumnya?
            $.ajax({
                url: '<?= base_url() ?>kuesioner/cekkuesioner',
                data: {
                    no_absen: $('#no_absen').val(),
                    batch: '<?php echo $this->uri->segment(3) ?>',
                    table: "tbl_hasil_kuesioner"
                },
                type: 'post',
                dataType: 'json',
                success: function(result) {
                    if (result.status == "error") {

                        Swal.fire(
                            'error!',
                            result.message,
                            'error'
                        )

                    } else {

                        $('#biodata').hide();
                        $('#konfirmasi').show('500');
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
        }
    })

    $('#btn_konfirmasi').on('click', function() {
        $('#konfirmasi').hide();
        $('#question').show('500');
    })


    $('#btn_question').on('click', function() {

        if ($('#nama1').val() == '') {
            $('#error_nama1').show()
        }
        if ($('#alasan1').val() == '') {
            $('#error_alasan1').show()
        }
        if ($('#nama2').val() == '') {
            $('#error_nama2').show()
        }
        if ($('#alasan2').val() == '') {
            $('#error_alasan2').show()
        }
        if ($('#nama3').val() == '') {
            $('#error_nama3').show()
        }
        if ($('#alasan3').val() == '') {
            $('#error_alasan3').show()
        }

        if ($('#alasan1').val() != '') {
            $('#error_alasan1').hide()
        }
        if ($('#alasan2').val() != '') {
            $('#error_alasan2').hide()
        }
        if ($('#alasan3').val() != '') {
            $('#error_alasan3').hide()
        }

        //masuk ke halaman selanjutnya
        if ($('#nama1').val() != '' && $('#alasan1').val() != '' && $('#nama2').val() != '' && $('#alasan2').val() != '' && $('#nama3').val() != '' && $('#alasan3').val() != '') {


            //kirim data ke database

            $.ajax({
                url: '<?= base_url('kuesioner/inserttabel') ?>',
                dataType: 'json',
                type: 'post',
                data: {
                    batch: $('#batch').val(),
                    nama: $('#nama').val(),
                    no_absen: $('#no_absen').val(),
                    kelas: $('#kelas').val(),
                    sekolah: $('#sekolah').val(),
                    nama1: $('#nama1').val(),
                    alasan1: $('#alasan1').val(),
                    nama2: $('#nama2').val(),
                    alasan2: $('#alasan2').val(),
                    nama3: $('#nama3').val(),
                    alasan3: $('#alasan3').val()
                },
                success: function(result) {
                    console.log(result)
                    if (result == 200) {
                        $('#question').hide();
                        $('#thankyou').show('500');
                    }
                }
            });



        }
    })

    $('#nama1').on('change', function() {
        if ($('#nama1').val() != '') {
            $('#error_nama1').hide()
        }
        b = $('#nama1').val()
        // var nama1 = $('#nama1').val()
        // alert(nama1)
        $.ajax({
            url: '<?= base_url() ?>kuesioner/getpilihan1',
            data: {
                nama1: $('#nama1').val(),
                konseli: a,
                table: "tbl_siswa_kuesioner",
                batch: '<?php echo $this->uri->segment(3) ?>'
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {

                var html = '<option value="">--Pilih Teman Anda--</option>';
                result.forEach(d => {
                    // html += `<option value="${d.id}">${d.no_absen + '-' + d.nama}</option>`;
                    html += '<option value="' + d.no_absen + '-' + d.nama + '-' + d.id + '">' + d.no_absen + '-' + d.nama + '</option>';
                });
                $('#nama2').html(html);

            }
        })
    });
    $('#nama2').on('change', function() {
        if ($('#nama2').val() != '') {
            $('#error_nama2').hide()
        }
        // var nama2 = $('#nama2').val()
        // alert(nama2)
        $.ajax({
            url: '<?= base_url() ?>kuesioner/getpilihan2',
            data: {
                nama2: $('#nama2').val(),
                konseli: a,
                pilihan1: b,
                table: "tbl_siswa_kuesioner",
                batch: '<?php echo $this->uri->segment(3) ?>'
            },
            type: 'post',
            dataType: 'json',
            success: function(result) {

                var html = '<option value="">--Pilih Teman Anda--</option>';
                result.forEach(d => {
                    // html += `<option value="${d.id}">${d.no_absen + '-' + d.nama}</option>`;
                    html += '<option value="' + d.no_absen + '-' + d.nama + '-' + d.id + '">' + d.no_absen + '-' + d.nama + '</option>';
                });
                $('#nama3').html(html);

            }
        })
    });
    $('#nama3').on('change', function() {
        if ($('#nama3').val() != '') {
            $('#error_nama3').hide()
        }
        // var nama3 = $('#nama3').val()
        // alert(nama3)
    });
</script>