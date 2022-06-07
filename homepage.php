<?php include "services/head-services.php"?>
<title>Anasayfa | Gebo Pres</title>
<body data-topbar="dark" data-layout="horizontal">
<div id="layout-wrapper">
    <?php include "services/menu-services.php";?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Anasayfa</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Anasayfa</a></li>
                                    <li class="breadcrumb-item active">Anasayfa - Analiz</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Kullanıcı Analiz</h4>
                                <div id="line-chart" class="e-charts"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Pres Analiz</h4>
                                <div id="mix-line-bar" class="e-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Referans Numarasına Göre Analiz</h4>
                                <div id="line-chart" class="e-charts"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Preslerin Kaç Saat Çalışacağı Analiz</h4>
                                <div id="mix-line-bar" class="e-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Kalıpların Kaç Adet Üretileceği</h4>
                                <div id="line-chart" class="e-charts"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Tamamlanan İşler</h4>
                                <div id="mix-line-bar" class="e-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "services/footer-services.php";?>
    </div>
</div>
<?php include "services/javascript-services.php";?>
</body>
</html>