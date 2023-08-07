<!doctype html>
<?php

$limit = 25;
$total_data = count($sum_table_all);
$total_page = ceil($total_data / $limit);
if ($total_data > 25) {
    $limit = 50;
    $total_page = ceil(($total_data - 25) / $limit) + 1;
}
$page = 1;
$total_qty_carton = 0;
$total_qty = 0;
$total_amount = 0;
$total_net = 0;
$total_gross = 0;

function to_fixed($angka, $decimal)
{
    $convert = number_format($angka, $decimal, '.', ',');
    return $convert;
}

?>
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
    .pb-10-up {
        border: 1px blue solid !important;
        padding-bottom: 12.5rem !important;
    }

    .pb-5-up {
        border: 1px red solid !important;
        padding-bottom: 5rem !important;
    }

    .pb-15-up {
        border: 1px red solid !important;
        padding-bottom: 15rem !important;
    }

    .pb-20-up {
        border: 1px red solid !important;
        padding-bottom: 20rem !important;
    }

    .pb-25-up {
        border: 1px red solid !important;
        padding-bottom: 23rem !important;
    }

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
        margin: 1rem;
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
        border: 1.5px black solid;
        text-align: center;
    }
</style>

<body>
    <!-- Main content -->
    <?php for ($i = 0; $i < $total_page; $i++) : ?>
        <div class="page">
            <?php if ($page == 1) : ?>
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
                        <hr style="border:1.5px black solid;opacity: 1;color: black !important;">
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
                                <p style="font-size: 14px;">Kelas</p>
                                <p style="font-size: 14px;">Jumlah Siswa</p>
                                <p style="font-size: 14px;">Tema Sosiometri</p>
                            </div>
                            <div class="col-9">
                                <p style="font-size: 14px;">: <?= $data_sosiometri['kelas'] ?></p>
                                <p style="font-size: 14px;">: <?= $data_sosiometri['jumlah_siswa'] ?></p>
                                <p style="font-size: 14px;">: <?= $data_sosiometri['tema'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <p style="font-size: 14px;"><strong>REKAPITULASI HASIL</strong></p>
                </div>
            <?php endif; ?>
            <div class="row mt-3">
                <div class="col-12">
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <th rowspan="2">No Absen</th>
                                <th rowspan="2">Nama Siswa</th>
                                <th rowspan="2">Jenis Kelamin</th>
                                <th colspan="3">Teman Yang dipilih</th>
                                <th rowspan="2">Skor</th>
                                <th rowspan="2">Peringkat</th>
                            </tr>
                            <tr>
                                <th style="border: 1px solid black;">Pilihan (1)</th>
                                <th style="border: 1px solid black;">Pilihan (2)</th>
                                <th style="border: 1px solid black;">Pilihan (3)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $check_pg = 0;
                            if ($page == 1) {
                                $start = 0;
                                $limit = 25;
                                $end = $start + $limit;
                            } elseif ($page > 1 && $page != $total_page) {
                                $start = $end;
                                $limit = 50;
                                $end = $start + $limit;
                            } else {
                                $start = $end;
                                $limit = 50;
                                $end = $start + $limit;
                            }
                            $no = 1;
                            for ($j = $start; $j < $end; $j++) :
                            ?>
                                <tr>
                                    <td><?= $sum_table_all[$j]['no_absen'] ?></td>
                                    <td><?= $sum_table_all[$j]['nama_siswa'] ?></td>
                                    <td><?= $sum_table_all[$j]['jenis_kelamin'] ?></td>
                                    <td><?= $sum_table_all[$j]['pilihan_1'] ?></td>
                                    <td><?= $sum_table_all[$j]['pilihan_2'] ?></td>
                                    <td><?= $sum_table_all[$j]['pilihan_3'] ?></td>
                                    <td><?= $sum_table_all[$j]['skor'] ?></td>
                                    <td><?= $sum_table_all[$j]['peringkat'] ?></td>
                                </tr>
                            <?php
                                $no++;
                                $check_pg = $j + 1;
                                if ($j == $total_data - 1) break;
                            endfor;
                            ?>
                            <?php $checkisi = ($check_pg == $total_data) ? '1' : '0'; ?>
                        </tbody>
                        <tfoot style="border: 1.5px white solid !important;">
                            <tr style="border: 1.5px white solid !important;">
                                <td class="<?= ($page == 1 &&  ($total_data > 25) && ($checkisi == '0')) ? 'pb-5-up' : (($page >= 2 &&  ($total_data > 50) && ($checkisi == '0')) ? 'pb-15-up' : 'pb-25-up') ?>" style="border: 1.5px white solid !important;text-align: left !important;" colspan="8">
                                    <div class="col-12 mt-1">
                                        <p>* Skor sosiometri diperoleh dari skor total yang di terima siswa berdasarkan pilihan temannya</p>
                                        <p>* Peringkat diperoleh dari posisi skor siswa di dalam kelompok</p>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    <?php $page++;
    endfor; ?>
    <div class="row mt-3">
        <div class="col-12">
            <table style="width: 100%;">
                <thead>
                    <th style="width: 30%;">NOMINASI</th>
                    <th style="width: 30%;">KRITERIA</th>
                    <th style="width: 30%;">NAMA SISWA</th>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Bintang/Popular</strong></td>
                        <td>Individu yang paling banyak menerima pilihan dalam kelompok ini</td>
                        <td style="text-align: left !important;"> <?= $populer ?> </td>
                    </tr>
                    <tr>
                        <td><strong>Terisolir</strong></td>
                        <td>Individu yang sama sekali tidak dipilih temannya dalam kelompok ini</td>
                        <td style="text-align: left !important;"> <?= $terisolir ?> </td>
                    </tr>
                    <tr>
                        <td><strong>Neglectee</strong></td>
                        <td>Individu yang paling sedikit menerima pilihan dalam kelompok ini</td>
                        <td style="text-align: left !important;"> <?= $neglectee ?> </td>
                    </tr>
                    <tr>
                        <td><strong>Mutual Choice</strong></td>
                        <td>2 orang saling memilih satu sama lain dalam kelompok ini</td>
                        <td style="text-align: left !important;">
                            <div><?= $mutual ?></div>
                            <div><?= $mutual ?></div>
                            <div><?= $mutual ?></div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Triangles Choice</strong></td>
                        <td>3 orang saling memilih satu sama lain dalam kelompok ini</td>
                        <td style="text-align: left !important;"> <?= $triangles ?> </td>
                    </tr>
                    <tr>
                        <td><strong>Circle Choice</strong></td>
                        <td>Lebih dari 3 orang saling memilih satu sama lain dalam kelompok ini</td>
                        <td style="text-align: left !important;"> <?= $circle ?> </td>
                    </tr>
                </tbody>
            </table>
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
</body>

</html>

<script>
    window.print();
    window.onafterprint = function() {
        window.close();
    }
</script>