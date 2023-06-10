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
                        <h4 class="mb-sm-0">Carwash</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Carwash</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card crm-widget">
                        <div class="card-body p-0">
                            <div class="row row-cols-xxl-8 row-cols-md-3 row-cols-1 g-0">
                                <div class="col">
                                    <div class="py-4 px-3">
                                        <h5 class="text-muted text-uppercase fs-13">Jumlah Customer <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-space-ship-line display-6 text-muted"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3" id="card-customer">
                                                <h2 class="mb-0"><span class="counter-value" data-target="197">0</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="col">
                                    <div class="mt-3 mt-md-0 py-4 px-3">
                                        <h5 class="text-muted text-uppercase fs-13">Pendapatan <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-wallet-line display-6 text-muted"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3" id="card-pendapatan">
                                                <h2 class="mb-0">$<span class="counter-value" data-target="489.4">0</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                                <div class="col">
                                    <div class="mt-3 mt-md-0 py-4 px-3">
                                        <h5 class="text-muted text-uppercase fs-13">Jumlah Order <i class="ri-arrow-up-circle-line text-success fs-18 float-end align-middle"></i></h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-pulse-line display-6 text-muted"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3" id="card-order">
                                                <h2 class="mb-0"><span class="counter-value" data-target="32.89">0</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end row -->
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-xxl-5 col-md-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Jenis Pekerjaan</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span class="text-muted"><span class="selected-month"></span><i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end list-last-month"></div>
                                </div>
                            </div>
                        </div><!-- end card header -->
                        <div class="card-body pb-0">
                            <div id="jenis-pekerjaan-chart" class="apex-charts"></div>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xxl-7">
                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Pendapatan</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span class="text-muted"><span class="selected-year"></span><i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end list-last-year"></div>
                                </div>
                            </div>
                        </div><!-- end card header -->
                        <div class="card-body px-0">
                            <!-- <ul class="list-inline main-chart text-center mb-0">
                                <li class="list-inline-item chart-border-left me-0 border-0">
                                    <h4 class="text-primary">$584k <span class="text-muted d-inline-block fs-13 align-middle ms-2">Revenue</span></h4>
                                </li>
                                <li class="list-inline-item chart-border-left me-0">
                                    <h4>$497k<span class="text-muted d-inline-block fs-13 align-middle ms-2">Expenses</span>
                                    </h4>
                                </li>
                                <li class="list-inline-item chart-border-left me-0">
                                    <h4><span data-plugin="counterup">3.6</span>%<span class="text-muted d-inline-block fs-13 align-middle ms-2">Profit Ratio</span></h4>
                                </li>
                            </ul> -->

                            <div id="pendapatan-chart" class="apex-charts" dir="ltr"></div>
                        </div>
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

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
                    </script> © Solusiciptamedia
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

<!-- apexcharts -->
<script src="<?= base_url('assets/default/assets/libs/apexcharts/apexcharts.min.js') ?>"></script>

<!-- Dashboard init -->
<script src="<?= base_url('assets/default/assets/js/pages/dashboard-crm.init.js') ?>"></script>

<!-- App js -->
<script src="<?= base_url('assets/default/assets/js/app.js') ?>"></script>
</body>

</html>

<script>
    var base_url = "<?= base_url() ?>",
        chart_jenis_pekerjaan, chart_pendapatan

    $(function() {
        jenis_pekerjaan_chart()
        pendapatan_chart()
        get_last_month()
        get_last_year()
        ambil_jumlah_customer()
        ambil_jumlah_pendapatan()
        ambil_jumlah_order()
    });

    function ambil_jumlah_customer() {
        $.ajax({
            url: '<?= base_url() ?>dashboard/getcustomerqty',
            type: 'post',
            dataType: 'json',
            success: function(result) {
                var html = `<h2 class="mb-0"><span class="counter-value" data-target="197">` + result + `</span></h2>`

                $('#card-customer').html(html)
            }
        })
    }

    function ambil_jumlah_pendapatan() {
        $.ajax({
            url: '<?= base_url() ?>dashboard/getamount',
            type: 'post',
            dataType: 'json',
            success: function(result) {
                // console.log(result)
                var html2 = `<h2 class="mb-0">Rp<span class="counter-value" data-target="489.4">` + new Intl.NumberFormat().format(result.amount) + `</span></h2>`

                $('#card-pendapatan').html(html2)
            }
        })
    }

    function ambil_jumlah_order() {
        $.ajax({
            url: '<?= base_url() ?>dashboard/getorder',
            type: 'post',
            dataType: 'json',
            success: function(result) {
                // console.log(result)
                var html3 = `<h2 class="mb-0"><span class="counter-value" data-target="32.89">` + result + `</span></h2>`

                $('#card-order').html(html3)
            }
        })
    }

    function convert_month(number) {
        if (number > 12) return

        if (number == "1") month = "Jan"
        if (number == "2") month = "Feb"
        if (number == "3") month = "Mar"
        if (number == "4") month = "Apr"
        if (number == "5") month = "May"
        if (number == "6") month = "Jun"
        if (number == "7") month = "Jul"
        if (number == "8") month = "Aug"
        if (number == "9") month = "Sep"
        if (number == "10") month = "Oct"
        if (number == "11") month = "Nov"
        if (number == "12") month = "Dec"

        return month
    }

    function select_lastmonth_pekerjaan(bulan, tahun) {
        $(".selected-month").html(`${convert_month(bulan)} ${tahun}`)
        jenis_pekerjaan_chart(bulan, tahun)
    }

    function select_lastyear_pekerjaan(tahun) {
        $(".selected-year").html(`${tahun}`)
        pendapatan_chart(tahun)
    }

    function get_last_month() {
        $.ajax({
            url: base_url + "dashboard/get_last_month",
            dataType: "json",
            success: function(result) {
                var no = 1
                result.forEach(d => {
                    if (no++ == 1) $(".selected-month").html(`${convert_month(d.bulan_masuk)} ${d.tahun_masuk}`)

                    $(".list-last-month").append(`<a class="dropdown-item" onclick="select_lastmonth_pekerjaan('${d.bulan_masuk}', '${d.tahun_masuk}')" href="javascript:void(0)">${convert_month(d.bulan_masuk)} ${d.tahun_masuk}</a>`)
                });
            }
        })
    }

    function get_last_year() {
        $.ajax({
            url: base_url + "dashboard/get_last_year",
            dataType: "json",
            success: function(result) {
                var no = 1
                result.forEach(d => {
                    if (no++ == 1) $(".selected-year").html(`${d.tahun}`)

                    $(".list-last-year").append(`<a class="dropdown-item" onclick="select_lastyear_pekerjaan('${d.tahun}')" href="javascript:void(0)">${d.tahun}</a>`)
                });
            }
        })
    }

    function jenis_pekerjaan_chart(bulan, tahun) {
        var series = []
        $.ajax({
            url: `${base_url}dashboard/ajax_jenis_pekerjaan_chart`,
            data: {
                bulan: bulan,
                tahun: tahun
            },
            type: "post",
            dataType: "json",
            success: function(result) {
                result.forEach(d => {
                    series.push({
                        name: `${d.pekerjaan}`,
                        data: [d.jumlah]
                    })
                });
                if (chart_jenis_pekerjaan != null) chart_jenis_pekerjaan.destroy()
                var options_jenis_pekerjaan_chart = {
                    series: series,
                    chart: {
                        type: 'bar',
                        height: 325
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '70%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: true
                    },
                    stroke: {
                        show: true,
                        width: 10,
                        colors: ['transparent']
                    },
                    xaxis: {
                        labels: {
                            show: false
                        },
                        categories: ['Jenis Pekerjaan'],
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        x: {
                            show: false
                        }
                    }
                };

                chart_jenis_pekerjaan = new ApexCharts(document.querySelector("#jenis-pekerjaan-chart"), options_jenis_pekerjaan_chart);
                chart_jenis_pekerjaan.render()
            }
        })
    }

    function pendapatan_chart(tahun) {
        var series = []
        $.ajax({
            url: `${base_url}dashboard/ajax_pendapatan_chart`,
            data: {
                tahun: tahun
            },
            type: "post",
            dataType: "json",
            success: function(result) {
                var data = []
                result.forEach(d => {
                    data.push(d.jumlah)
                });

                if (chart_pendapatan != null) chart_pendapatan.destroy()
                var options_chart_pendapatan = {
                    series: [{
                        name: "Revenue",
                        data: data,
                    }],
                    chart: {
                        type: 'line',
                        height: 320,
                        zoom: {
                            enabled: false
                        }
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 5,
                        curve: 'smooth'
                    },
                    xaxis: {
                        labels: {
                            show: true
                        },
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    },
                    colors: ['#f06548', '#545454'],
                    tooltip: {
                        x: {
                            show: false
                        }
                    }
                };

                chart_pendapatan = new ApexCharts(document.querySelector("#pendapatan-chart"), options_chart_pendapatan);
                chart_pendapatan.render()
            }
        })
    }
</script>