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
                <img src="<?= base_url('assets/default/assets/images/sekolah/logo.png') ?>" class="img-fluid" alt="logo">
            </div>
            <div class="col-10">
                <h4>SLTP N1 MREBET</h4>
                <p>Jl. Pramuka No. 48 Malang 65154</p>
                <p>Telp. 0341-556677 Email. info@sltpn1malang.sch.id</p>
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
                        <p style="font-size: 14px;">: Agus</p>
                        <p style="font-size: 14px;">: P001</p>
                        <p style="font-size: 14px;">: X</p>
                        <p style="font-size: 14px;">: SLTP N1 Mrebet</p>
                        <p style="font-size: 14px;">: Siapa yang paling membantu teman di kelas</p>
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
                    <thead style="border: 1px solid black;text-align: center;">
                        <th style="width: 30%;">PILIHAN (1)</th>
                        <th style="width: 30%;">PILIHAN (2)</th>
                        <th style="width: 30%;">PILIHAN (3)</th>
                    </thead>
                    <tbody style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <td style="height: 80px;text-align: center;">ARTHUR</td>
                            <td style="text-align: center;">GILANG</td>
                            <td style="text-align: center;">RIZAL</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8">
                <table>
                    <thead>
                        <th style="width: 30%;border-top: 1px solid black;">SKOR SOSIOMETRI</th>
                        <th style="width: 30%;border-top: 1px solid black;">PERINGKAT KELOMPOK</th>
                        <th style="width: 30%;"></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="height: 80px;border-top: 1px solid black;border-bottom: 1px solid black;text-align: center;font-size: 24px;">60</td>
                            <td style="border-top: 1px solid black;border-bottom: 1px solid black;text-align: center;font-size: 24px;">3</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <p style="font-size: 14px;">Jumlah teman yang memilih sebagai pilihan (1) : 12</p>
                <p style="font-size: 14px;">Jumlah teman yang memilih sebagai pilihan (2) : 10</p>
                <p style="font-size: 14px;">Jumlah teman yang memilih sebagai pilihan (3) : 5</p>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6"></div>
            <div class="col-6 text-center">
                <p>Malang, 27-Jul-2023</p>
                <p>Konselor</p>
                <p style="padding-top: 80px;">Agus Salim</p>
            </div>
        </div>

    </div>

</body>

</html>