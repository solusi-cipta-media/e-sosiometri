<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="<?= base_url('dashboard') ?>" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= base_url('assets/default/assets/images/' . $favicon) ?>" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('assets/default/assets/images/' . $logo_dark) ?>" alt="" height="32">
                                </span>
                            </a>

                            <a href="<?= base_url('dashboard') ?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= base_url('assets/default/assets/images/' . $favicon) ?>" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('assets/default/assets/images/' . $logo_light) ?>" alt="" height="32">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- App Search-->

                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <a href="<?= base_url('auth/logout') ?>" type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-log-in fs-22'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- removeNotificationModal -->
        <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                        </div>
                    </div>

                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="javascript:void(0);" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/default/assets/images/' . $favicon) ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/default/assets/images/' . $logo_dark) ?>" alt="" height="32">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="javascript:void(0);" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url('assets/default/assets/images/' . $favicon) ?>" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('assets/default/assets/images/' . $logo_light) ?>" alt="" height="32">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <?php if ($this->session->userdata('role_id') == '1') { ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url('dashboard') ?>">
                                    <i class="ri-home-4-line"></i> <span data-key="t-widgets">Dashboard</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="menu-title"><span data-key="t-menu">Sosiometri</span></li>
                        <?php if ($this->session->userdata('role_id') == '1') { ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url('sosiometri/aktivitas') ?>">
                                    <i class="ri-account-circle-line"></i> <span data-key="t-widgets">Data Sosiometri</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url('sosiometri/analisis') ?>">
                                <i class="ri-team-line"></i> <span data-key="t-widgets">Laporan Analisis</span>
                            </a>
                        </li>
                        <li class="menu-title"><span data-key="t-menu">Setting</span></li>
                        <?php if ($this->session->userdata('role_id') == '2') { ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url('dashboard/aplikasi') ?>">
                                    <i class=" ri-settings-5-line"></i> <span data-key="t-widgets">Aplikasi</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($this->session->userdata('role_id') == '1') { ?>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="<?= base_url('sosiometri/biodata') ?>">
                                    <i class=" ri-settings-5-line"></i> <span data-key="t-widgets">Biodata</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?= base_url('auth/logout') ?>">
                                <i class="ri-login-box-line"></i> <span data-key="t-widgets">Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>