<?php include "services/head-services.php"?>
<?php
include 'process/connection.php';
$KullaniciListe=$DataBase->prepare("SELECT * FROM gbprssdatakullanici");
$KullaniciListe->execute();

?>
<title>Kullanıcı Listesi | Gebo Pres</title>
<body data-topbar="dark" data-layout="horizontal">
<div id="layout-wrapper">
    <?php include "services/menu-services.php";?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Kullanıcı Listele</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Anasayfa</a></li>
                                    <li class="breadcrumb-item active">Kullanıcı İşlemleri</li>
                                    <li class="breadcrumb-item active">Kullanıcı Kullanıcı Listele</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <style>
                        .pagination {
                            float: right;
                        }
                    </style>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead align="center">
                                    <tr>
                                        <th>Kullanıcı Ad</th>
                                        <th>Kullanıcı Soyad</th>
                                        <th>Kullanıcı Şifre</th>
                                        <th>Kullanıcı Yetki</th>
                                        <th>Kullanıcı Eklenme Tarihi</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody align="center">


                                    <?php
                                    while ($KullaniciListeGoster=$KullaniciListe->fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>
                                            <td><?php echo $KullaniciListeGoster['KullaniciName'];?></td>
                                            <td><?php echo $KullaniciListeGoster['KullaniciSurName'];?></td>
                                            <td><?php echo $KullaniciListeGoster['KullaniciSifre'];?></td>
                                            <td><?php echo $KullaniciListeGoster['KullaniciYetki'];?></td>
                                            <td><?php echo $KullaniciListeGoster['KullaniciAddDate'];?></td>
                                            <td>
                                                <button type="button" class="btn btn-danger waves-effect btn-label waves-light"><i class="bx bx-pencil label-icon"></i> Sil</button>
                                                <button type="button" class="btn btn-primary waves-effect btn-label waves-light"><i class="bx bx-trash label-icon"></i> Düzenle</button>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "services/footer-services.php";?>
    </div>

</div>
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="assets/js/pages/datatables.init.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
