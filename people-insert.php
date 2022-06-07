<?php include "services/head-services.php"?>
<title>Kullanıcı Ekle | Gebo Pres</title>
<body data-topbar="dark" data-layout="horizontal">
<div id="layout-wrapper">
    <?php include "services/menu-services.php";?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Kullanıcı Ekle</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Anasayfa</a></li>
                                    <li class="breadcrumb-item active">Kullanıcı İşlemleri</li>
                                    <li class="breadcrumb-item active">Kullanıcı Ekle</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="row mb-4">
                                        <label for="KullaniciAdi" class="col-sm-3 col-form-label">Kullanıcı Adı</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="KullaniciAdi" placeholder="Örn : Recep ">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="KullaniciSoyadi" class="col-sm-3 col-form-label">Kullanıcı Soyadı</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="KullaniciSoyadi" placeholder="Örn : Ateş">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="KullaniciSifresi" class="col-sm-3 col-form-label">Kullanıcı Şifresi</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control" id="KullaniciSifresi" placeholder="Örn : 12345">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">Kulanıcı Yetki</label>
                                        <div class="col-sm-9">
                                            <select id="formrow-inputState" class="form-select">
                                                <option>--</option>
                                                <option>Admin</option>
                                                <option>Pres Elemanı</option>
                                                <option>Kalıp Elemanı</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">Kullanıcı Ekle</button>
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