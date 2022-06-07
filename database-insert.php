<?php include "services/head-services.php"?>
<title>Data İçeri Aktarma | Gebo Pres</title>
<body data-topbar="dark" data-layout="horizontal">
<div id="layout-wrapper">
    <?php include "services/menu-services.php";?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Veri İçeri Aktarma</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Anasayfa</a></li>
                                    <li class="breadcrumb-item active">Database İçeri Aktar</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mt-4">
                                            <div>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="GeboPresDataAktar" aria-describedby="GeboPresDataAktar">
                                                    <button class="btn btn-danger" type="submit" id="GeboPresDataAktar">İçeri Aktar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

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