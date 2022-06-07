<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="./homepage.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>

                <a href="./homepage.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-light.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="19">
                    </span>
                </a>
            </div>

        </div>

        <div class="d-flex">


            <div class="dropdown d-inline-block">
                <div class="dropdown d-none d-lg-inline-block ms-1">
                    <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                        <i class="bx bx-fullscreen"></i>
                    </button>
                </div>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg"
                             alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry">Henry</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#"><i
                                    class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                    key="t-logout">Güvenli Çıkış</span></a>
                    </div>
                </div>
            </div>
        </div>
</header>
<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    <a class="nav-link dropdown-toggle arrow-none" href="./homepage.php" id="topnav-dashboard"
                       role="button"
                    >
                        <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Anasayfa</span>
                    </a>


                    <a class="nav-link dropdown-toggle arrow-none" href="./database-insert.php" id="topnav-dashboard"
                       role="button"
                    >
                        <i class="fas fa-file-excel"></i><span key="t-dashboards"> Database İçeri Aktar</span>
                    </a>

                    <a class="nav-link dropdown-toggle arrow-none" href="./urgent-work.php" id="topnav-dashboard"
                       role="button"
                    >
                        <i class="bx bxs-error"></i><span key="t-dashboards"> Acil İş</span>
                    </a>


                    <a class="nav-link dropdown-toggle arrow-none" href="./homepage.php" id="topnav-dashboard"
                       role="button"
                    >
                        <i class="fas fa-prescription-bottle"></i><span key="t-dashboards"> Pres Hane Ekranı</span>
                    </a>


                    <a class="nav-link dropdown-toggle arrow-none" href="./homepage.php" id="topnav-dashboard"
                       role="button"
                    >
                        <i class="bx bxl-codepen"></i><span key="t-dashboards"> Kalıp Hane Ekranı</span>
                    </a>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button"
                        >
                            <i class="fas fa-users-cog"></i>
                            <span key="t-ui-elements"> Kullanıcı İşlemleri</span>
                            <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                             aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <a href="./people-insert.php" class="dropdown-item" key="t-alerts">Kullanıcı Ekle</a>
                                        <a href="./people-list.php" class="dropdown-item" key="t-buttons">Kullanıcı Listesi</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button"
                        >
                            <i class="bx bx-customize"></i>
                            <span key="t-ui-elements"> Pres İşlemleri</span>
                            <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                             aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <a href="./pres-insert.php" class="dropdown-item" key="t-alerts">Pres Ekle</a>
                                        <a href="./pres-list.php" class="dropdown-item" key="t-buttons">Pres Listesi</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </li>

                    <a class="nav-link dropdown-toggle arrow-none" href="./sheet-metal-processing.php" id="topnav-dashboard"
                       role="button"
                    >
                        <i class="dripicons-map"></i><span key="t-dashboards"> Sac İşlemleri</span>
                    </a>

                    <a class="nav-link dropdown-toggle arrow-none" href="./support-system.php" id="topnav-dashboard"
                       role="button"
                    >
                        <i class="bx bxs-message-dots"></i><span key="t-dashboards"> Destek İşlemleri</span>
                    </a>
                </ul>
            </div>
        </nav>
    </div>
</div>