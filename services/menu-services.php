<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="./homepage.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="./assets/images/logo-light.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="./assets/images/logo-light.svg" alt="" height="17">
                    </span>
                </a>

                <a href="./homepage.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="./assets/images/logo-light.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="./assets/images/logo-light.svg" alt="" height="19">
                    </span>
                </a>
            </div>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="assets/images/logo-light.svg"
                             alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1" key="t-henry">Gebo Pres</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="./logout.php"><i
                                    class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                                    key="t-logout">G??venli ????k????</span></a>
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
                        <i class="fas fa-file-excel"></i><span key="t-dashboards"> Database ????eri Aktar</span>
                    </a>

                    <a class="nav-link dropdown-toggle arrow-none" href="./urgent-work.php" id="topnav-dashboard"
                       role="button"
                    >
                        <i class="bx bxs-error"></i><span key="t-dashboards"> Acil ????</span>
                    </a>


                    <a class="nav-link dropdown-toggle arrow-none" href="./kaliphane-screen.php" id="topnav-dashboard"
                       role="button"
                    >
                        <i class="fas fa-prescription-bottle"></i><span key="t-dashboards"> Kal??p Hane Ekran??</span>
                    </a>


                    <a class="nav-link dropdown-toggle arrow-none" href="./preshane-screen.php" id="topnav-dashboard"
                       role="button"
                    >
                        <i class="bx bxl-codepen"></i><span key="t-dashboards"> Pres Hane Ekran??</span>
                    </a>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button"
                        >
                            <i class="fas fa-users-cog"></i>
                            <span key="t-ui-elements"> Kullan??c?? ????lemleri</span>
                            <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu mega-dropdown-menu px-2 dropdown-mega-menu-xl"
                             aria-labelledby="topnav-uielement">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <a href="./people-insert.php" class="dropdown-item" key="t-alerts">Kullan??c?? Ekle</a>
                                        <a href="./people-list.php" class="dropdown-item" key="t-buttons">Kullan??c?? Listesi</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button"
                        >
                            <i class="bx bx-customize"></i>
                            <span key="t-ui-elements"> Pres ????lemleri</span>
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
                        <i class="dripicons-map"></i><span key="t-dashboards"> Sac ????lemleri</span>
                    </a>

                </ul>
            </div>
        </nav>
    </div>
</div>