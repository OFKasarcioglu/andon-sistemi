<?php include "services/head-services.php"?>
<?php
include 'process/connection.php';
$SacIhtiyac=$DataBase->prepare("SELECT * FROM gbprssdataexcel");
$SacIhtiyac->execute();

?>
<title>Sac İşlemleri | Gebo Pres</title>
<body data-topbar="dark" data-layout="horizontal">
<div id="layout-wrapper">
    <?php include "services/menu-services.php";?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Sac İşemleri Listele</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Anasayfa</a></li>
                                    <li class="breadcrumb-item active">Sac İşlemleri</li>
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
                                        <th>Sıra</th>
                                        <th>Müşteri Sipariş No</th>
                                        <th>Teslim Tarihi</th>
                                        <th>Müşteri Adı</th>
                                        <th>Kalıp Grubu</th>
                                        <th>Tüm İçin Sac İhtiyaç </th>
                                        <th>Bu İş İçin Sac İhtiyaç KG</th>
                                        <th>Sac Stok</th>
                                        <th>Satın Alma İhtiyacı</th>
                                        <th>Satın Alınacak Miktar</th>

                                    </tr>
                                    </thead>
                                    <tbody align="center">
                                    <?php
                                    while ($SacIhtiyacListele=$SacIhtiyac->fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>
                                            <td><?php echo $SacIhtiyacListele['Sira'];?></td>
                                            <td><?php echo $SacIhtiyacListele['Musteri_siparis_no'];?></td>
                                            <td><?php echo $SacIhtiyacListele['Teslim_tarihi'];?></td>
                                            <td><?php echo $SacIhtiyacListele['Musteri_adi'];?></td>
                                            <td><?php echo $SacIhtiyacListele['Kalip_grubu'];?></td>
                                            <td><?php echo $SacIhtiyacListele['Tum_isin_sac_ihtiyaci_kg'];?></td>
                                            <td><?php echo $SacIhtiyacListele['Bu_isin_sac_ihtiyaci_kg'];?></td>
                                            <td><?php echo $SacIhtiyacListele['Sac_stok'];?></td>
                                            <td><?php echo $SacIhtiyacListele['Sac_satinalma_ihtiyaci'];?></td>
                                            <td>
                                                <?php


                                                $Stok =  $SacIhtiyacListele['Sac_stok'];
                                                $Ihtiyac =  $SacIhtiyacListele['Bu_isin_sac_ihtiyaci_kg'];
                                                $Sonuc =  $Ihtiyac - $Stok;

                                                if($Sonuc < 0)
                                                    echo "<p class='bg bg-success'>Stok Yeterli</p>";
                                                else
                                                    echo  "<p class='bg bg-danger'>".$Sonuc."</p>";


                                                ?>
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
