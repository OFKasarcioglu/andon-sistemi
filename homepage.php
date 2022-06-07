<?php include "services/head-services.php"?>
<title>Anasayfa | Gebo Pres</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                                <div id="KullaniciChart" style="width:100%; max-width:600px; height:380px;"></div>
                                <?php
                                $DataBase = new mysqli("localhost", "root", "123456789", "j32mc8jzhlk6qmchtu");
                                if ($DataBase->connect_errno > 0) {
                                    die("<b>Bağlantı Hatası:</b> " . $DataBase->connect_error);
                                }
                                ?>
                                <?php
                                $KullaniciAnaliz = "SELECT KullaniciYetki,COUNT(*) FROM `gbprssdatakullanici` group by KullaniciYetki";
                                $QueryKullanici = mysqli_query($DataBase, $KullaniciAnaliz);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Pres Analiz</h4>
                                <div id="PresChart" style="width:100%; max-width:600px; height:380px;">
                                    <?php
                                    $PresAnliz = "SELECT PresAdi,PresAdet FROM `gbprssdatapres`";
                                    $QueryPres = mysqli_query($DataBase, $PresAnliz);
                                    ?>
                                </div
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Referans Numarasına Göre Analiz</h4>
                                <div id="MamulChart" style="width:100%; max-width:600px; height:380px;"></div>
                                <?php
                                $ReferansAnaliz = "SELECT left(Mamul_kodu,5),COUNT(*) from gbprssdataexcel group by left(Mamul_kodu,5)";
                                $QueryReferans = mysqli_query($DataBase, $ReferansAnaliz);
                                ?>
                            </div>
                            </div>
                        </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Preslerin Kaç Saat Çalışacağı Analiz</h4>
                                <div id="PresBasCalisma" style="width:100%; max-width:600px; height:380px;">
                                    <?php
                                    $sql5 = "SELECT gbprssdatapres,(SUM(DATEDIFF(Bitir,Basla))*9) FROM `gbprssdataexcel` group by gbprssdatapres";
                                    $sorgu5 = mysqli_query($DataBase, $sql5);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Kalıpların Kaç Adet Üretileceği</h4>
                                <div id="KalipAdet" style="width:100%; max-width:550px; height:380px;"></div>
                                <?php
                                $sql6 = "SELECT Kalip_grubu,count(*) from gbprssdataexcel group by Kalip_grubu";
                                $sorgu6 = mysqli_query($DataBase, $sql6);
                                ?>
                            </div>
                            </div>
                        </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Bu Ay Tamamlanan İşler</h4>
                                <div id="BuAyBitenIsler" style="width:100%; max-width:600px; height:380px;">
                                    <?php
                                    $sql7 = "SELECT gbprssdatapres.PresAdi,count(*) FROM gbprssdatafinish inner join gbprssdatapres on gbprssdatafinish.Pres=pres.PresAdi where month(gbprssdatafinish.Tamamlanma_tarihi)=".date('m')." group by gbprssdatafinish.gbprssdatapres";
                                    $sorgu7 = mysqli_query($DataBase, $sql7);
                                    ?>
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
<script>
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Bölüm', 'Kişi'],
            <?php
            while ($QueryAfter = mysqli_fetch_row($QueryKullanici)) {
                echo "['$QueryAfter[0]',$QueryAfter[1]],";
            }
            ?>
        ]);

        var options = {
            title: ''
        };

        var chart = new google.visualization.BarChart(document.getElementById('KullaniciChart'));
        chart.draw(data, options);
    }
</script>
<script>
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Pres', 'Adet'],
            <?php
            while ($QueryAfter = mysqli_fetch_row($QueryPres)) {
                echo "['$QueryAfter[0]',$QueryAfter[1]],";
            }
            ?>
        ]);

        var options = {
            title: '',
            is3D: true
        };
        var chart = new google.visualization.PieChart(document.getElementById('PresChart'));
        chart.draw(data, options);
    }
</script>
<script>
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Pres', 'Adet'],
            <?php
            while ($QueryAfter = mysqli_fetch_row($QueryReferans)) {
                echo "['$QueryAfter[0]',$QueryAfter[1]],";
            }
            ?>
        ]);

        var options = {
            title: '',
            is3D: true
        };
        var chart = new google.visualization.PieChart(document.getElementById('MamulChart'));
        chart.draw(data, options);
    }
</script>
<script>
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Pres', 'Adet'],
            <?php
            while ($sonuc3 = mysqli_fetch_row($sorgu5)) {
                echo "['$sonuc3[0]',$sonuc3[1]],";
            }
            ?>
        ]);

        var options = {
            title: '',
            pieHole: 0.4
        };
        var chart = new google.visualization.PieChart(document.getElementById('PresBasCalisma'));
        chart.draw(data, options);
    }
</script>
<script>
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Pres', 'Adet'],
            <?php
            while ($sonuc3 = mysqli_fetch_row($sorgu6)) {
                echo "['$sonuc3[0]',$sonuc3[1]],";
            }
            ?>
        ]);

        var options = {
            title: '',
            is3D: true
        };
        var chart = new google.visualization.LineChart(document.getElementById('KalipAdet'));
        chart.draw(data, options);
    }
</script>
<script>
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Pres', 'Adet'],
            <?php
            while ($sonuc3 = mysqli_fetch_row($sorgu7)) {
                echo "['$sonuc3[0]',$sonuc3[1]],";
            }
            ?>
        ]);

        var options = {
            title: '',
            is3D: true
        };
        var chart = new google.visualization.LineChart(document.getElementById('BuAyBitenIsler'));
        chart.draw(data, options);
    }
</script>

</body>
</html>