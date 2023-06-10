<?php
date_default_timezone_set('Asia/Jakarta');
$today = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets/default/assets/css/paper.css') ?>" rel="stylesheet">
    <title><?= $title ?></title>

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
<style>
    @page {
        size: A6;
    }

    @media print {
        @page {
            size: A6;
            margin: 0;
        }
    }

    body {
        font-family: 'Calibri', Times, serif !important;
        font-size: 14px;
        color: black;
        line-height: 1.8;
    }
</style>

<body class="A6">
    <section class="sheet" style="padding: 15px;">
        <!-- <div style="text-align: center;">
            <img src="<?= base_url('assets/default/assets/images/' . $logo) ?>" style="max-width: 24px;">
        </div> -->
        <div style="text-align: center; line-height:1;margin-bottom: 10px;margin-top: 5px;">
            <h6 style="margin-top: 0px;font-weight: normal;margin-bottom: 0px;"><?= $nama_usaha ?></h6>
            <small><?= $alamat ?></small>
            <small><?= $hp_usaha ?></small><br>
            <small style="font-size: 10px;font-style: italic;"><?= date('d-M-Y', strtotime($today)) ?></small>
        </div>
        <div style="text-align: center;">
            <img src="<?= base_url("assets/default/assets/images/qr/$qr_image") ?>">
        </div>
        <div style="text-align: center; border-bottom: 1px solid black;line-height:1;">
            <small style="font-size: 18px;"><strong>ID : # <?= $nomor ?></strong></small><br>
            <small style="font-size: 18px;"><strong><?= $nomor_kendaraan ?></strong></small><br>
            <small style="font-size: 10px;"><?= $pekerjaan ?></small><br><br>
        </div>
        <div style="text-align: center; line-height:1;">
            <small style="font-size: 10px;margin-top: 0px;font-style: italic;"><?= $slogan ?></small><br>
            <small style="font-size: 10px;margin-top: 0px;font-style: italic;">Terima kasih atas kunjungan Anda!</small><br>
        </div>
    </section>


    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets/default/assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/default/assets/libs/simplebar/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('assets/default/assets/libs/node-waves/waves.min.js') ?>"></script>
    <script src="<?= base_url('assets/default/assets/libs/feather-icons/feather.min.js') ?>"></script>
    <script src="<?= base_url('assets/default/assets/js/pages/plugins/lord-icon-2.1.0.js') ?>"></script>
    <script src="<?= base_url('assets/default/assets/js/plugins.js') ?>"></script>
</body>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.print();

        setTimeout(() => {
            window.close()
        }, 3000);
    });
</script>

</html>