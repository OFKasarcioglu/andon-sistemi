<?php include "services/head-services.php"?>
<title>Pres Ekle | Gebo Pres</title>
<body data-topbar="dark" data-layout="horizontal">
<div id="layout-wrapper">
    <?php include "services/menu-services.php";?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Pres Ekle</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Anasayfa</a></li>
                                    <li class="breadcrumb-item active">Pres İşlemleri</li>
                                    <li class="breadcrumb-item active">Pres Ekle</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="process/prodecure.php" method="post">
                                    <div class="row mb-4">
                                        <label for="KullaniciAdi" class="col-sm-3 col-form-label">Pres Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="KullaniciAdi" name="PresAd" placeholder="Örn : PRS-123-01 ">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="KullaniciSoyadi" class="col-sm-3 col-form-label">Pres Adet</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="PresAdet" id="KullaniciSoyadi" placeholder="Örn : 1">
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <div>
                                                <button type="submit" name="PresKaydet" class="btn btn-primary w-md">Pres Ekle</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>

            </div>
        </div>
        <?php include "services/footer-services.php";?>
    </div>
</div>
<?php include "services/javascript-services.php";?>
</body>
</html>