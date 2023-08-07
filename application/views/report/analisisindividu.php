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
    </style>
</head>
<style type="text/css">
    label {
        font-size: 9px;
        color: black;
        margin: 0px;
    }

    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 30px;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 7mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    @page {
        size: A4;
        margin: 0;
    }

    @media print {

        html,
        body {
            width: 210mm;
            height: 100vh;
            overflow: initial;
        }

        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: avoid;
            page-break-inside: avoid;
            page-break-before: avoid;
        }
    }

    p {
        font-size: 12px;
        margin-bottom: 2px;
        line-height: 1.5;
        font-weight: normal;
    }

    small {
        font-size: 12px;
        line-height: 1.0 !important;
        font-weight: normal;
    }

    table,
    tr,
    th,
    td {
        font-size: 12px;
        padding-top: 2px !important;
        padding-bottom: 2px !important;
        padding-right: 5px !important;
        padding-left: 5px;
        /* border-right: 1pt solid black !important; */
        border-left: 1pt solid black !important;

    }

    .b-bottom {
        border-bottom: 1pt solid black;
    }

    .b-top {
        border-top: 1pt solid black;
    }

    .purchase-order {
        margin-top: 0px;
        margin-bottom: 0px;
        margin-left: -100px;
        font-weight: bold;
        ;
        font-style: italic;
    }
</style>

<body>
    <!-- Main content -->
    <div class="page">
        <div class="row">
            <div class="col-2">
                <img src="<?= base_url() ?>assets/default/assets/images/<?= $data_konselor['logo_sekolah'] ? 'sekolah/' . $data_konselor['logo_sekolah'] : 'fav-simitri.png' ?>" class="img-fluid" alt="logo">
            </div>
            <div class="col-10">
                <h4><?= $data_konselor['sekolah'] ? $data_konselor['sekolah'] : '' ?></h4>
                <p><?= $data_konselor['alamat'] ? $data_konselor['alamat'] . ($data_konselor['kota'] || $data_konselor['provinsi'] ? ', '  : '') . $data_konselor['kota'] . ' ' . $data_konselor['provinsi'] : '' ?></p>
                <p>Telp. <?= $data_konselor['phone'] ? $data_konselor['phone'] : '-' ?> Email. <?= $data_konselor['email'] ? $data_konselor['email'] : '-' ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr style="opacity: 1">
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-8">&nbsp;</div>
            <div class="col-3" style="border: 1px solid black">
                <div>
                    <p style="font-size: 18px;text-align: center;padding-top: 5px;"><strong>RAHASIA</strong></p>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <p style="text-align: center;font-size: 16px;"><strong>LAPORAN ANALISA SOSIOMETRI</strong></p>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <p style="font-size: 14px;">Nama Depan</p>
                        <p style="font-size: 14px;">Nomor Absen</p>
                        <p style="font-size: 14px;">Kelas</p>
                        <p style="font-size: 14px;">Sekolah</p>
                        <p style="font-size: 14px;">Tema Sosiometri</p>
                    </div>
                    <div class="col-9">
                        <p style="font-size: 14px;">: <?= $data_siswa['nama'] ? $data_siswa['nama'] : '-' ?></p>
                        <p style="font-size: 14px;">: <?= $data_siswa['no_absen'] ? $data_siswa['no_absen'] : '-' ?></p>
                        <p style="font-size: 14px;">: <?= $data_siswa['kelas'] ? $data_siswa['kelas'] : '-' ?></p>
                        <p style="font-size: 14px;">: <?= $data_siswa['sekolah'] ? $data_siswa['sekolah'] : '-' ?></p>
                        <p style="font-size: 14px;">: <?= $data_sosiometri['tema'] ? $data_sosiometri['tema'] : '-' ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <p style="font-size: 14px;"><strong>REKAPITULASI HASIL</strong></p>
        </div>
        <div class="row mt-3">
            <div class="col-8">
                <table style="width: 100%;">
                    <thead style="border: 1.5px solid black;text-align: center;">
                        <th style="width: 30%;">PILIHAN (1)</th>
                        <th style="width: 30%;">PILIHAN (2)</th>
                        <th style="width: 30%;">PILIHAN (3)</th>
                    </thead>
                    <tbody style="border: 1.5px solid black;">
                        <tr style="border: 1.5px solid black;">
                            <td style="height: 80px;text-align: center;"><?= $hasil['pilihan_1']  ?  strtoupper($hasil['pilihan_1']) : '' ?></td>
                            <td style="text-align: center;"><?= $hasil['pilihan_2']  ?  strtoupper($hasil['pilihan_2']) : '' ?></td>
                            <td style="text-align: center;"><?= $hasil['pilihan_3']  ?  strtoupper($hasil['pilihan_3']) : '' ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8">
                <table>
                    <thead>
                        <th style="width: 30%;border-top: 1.5px solid black;">SKOR SOSIOMETRI</th>
                        <th style="width: 30%;border-top: 1.5px solid black;">PERINGKAT KELOMPOK</th>
                        <th style="width: 30%;"></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="height: 80px;border-top: 1.5px solid black;border-bottom: 1.5px solid black;text-align: center;font-size: 24px;"><?= $skor ?></td>
                            <td style="border-top: 1.5px solid black;border-bottom: 1.5px solid black;text-align: center;font-size: 24px;"><?= $peringkat ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <p style="font-size: 14px;">Jumlah teman yang memilih sebagai pilihan (1) : <?= $sum_pil_1 ?></p>
                <p style="font-size: 14px;">Jumlah teman yang memilih sebagai pilihan (2) : <?= $sum_pil_2 ?></p>
                <p style="font-size: 14px;">Jumlah teman yang memilih sebagai pilihan (3) : <?= $sum_pil_3 ?></p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6"></div>
            <div class="col-6 text-center">
                <p>Malang, <?= date('d F Y') ?></p>
                <p>Konselor</p>
                <p style="padding-top: 80px;"><?= $data_konselor['name'] ? $data_konselor['name'] : '' ?></p>
            </div>
        </div>

    </div>

</body>

</html>

<script>
    window.print();
    window.onafterprint = function() {
        window.close();
    }
</script>