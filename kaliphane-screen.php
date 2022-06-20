<?php include "services/head-services.php" ?>
<title>Anasayfa | Gebo Pres</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<body data-topbar="dark" data-layout="horizontal">
<div id="layout-wrapper">
    <?php include "services/menu-services.php"; ?>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Kalıp Hane Ekranı</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Anasayfa</a></li>
                                    <li class="breadcrumb-item active">Kalıp Hane Ekranı</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <style type="text/css">
                        #listele select {
                            width: 100%;
                        }

                        .kalip_yapimda {
                            background-color: #0c63e4;
                            color: white;
                        }

                        .yeni_kalip {
                            background-color: yellow;
                            color: black;
                        }

                        .kalip_bakimda {
                            background-color: red;
                            color: black;
                        }

                        .kalip_hazir {
                            background-color: purple;
                            color: white;
                        }
                    </style>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Kalıp Hane Ekranı</h4>
                                <?php
                                $dizipres = array();
                                $baglanti = new mysqli("localhost", "root", "123456789", "j32mc8jzhlk6qmchtu");
                                if ($baglanti->connect_errno > 0) {
                                    die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
                                }

                                $sql = "SELECT * FROM gbprssdatapres";
                                $sorgu = mysqli_query($baglanti, $sql);
                                $i = 0;
                                while ($sonuc = mysqli_fetch_row($sorgu)) {
                                    $dizipres[$i] = $sonuc[1];
                                    $i++;
                                }

                                echo '<table style="font-weight: bold;"  valign="top" class="table table-dark mb-0" ><tr><td>';
                                echo '<table border="0" width="100%" cellspacing="0" align="center" class="table table-dark mb-0">';
                                echo "<tr><td><h3 align='center' style='font-weight: bolder; color: white'>PRESLER</h3>";
                                for ($i = 0; $i < 5; $i++) {
                                    echo '<table border="0" cellspacing="0" class="table table-dark mb-0" >';
                                    echo "<tr><td>Hafta</br>";
                                    echo "Mamul Kodu</br>";
                                    echo "Mps Bakiye</br>";
                                    echo "Pres Reel İhtiyaç</br>";
                                    echo "Kalıp Grubu</br>";
                                    echo "Sıra</br>";
                                    echo "Saç Hazır Oranı <br> Durum</td></tr></table>";
                                }
                                echo "</td></tr></table>";
                                echo '</td><td align="top" valign="top">';
                                echo '<table border="0" cellspacing="0"  class="table table-dark mb-0">';
                                echo "<tr>";

                                foreach ($dizipres as $a) {
                                    echo "<td><h3 align='center' style='font-weight: bolder; color: white;'>" . $a . "</h3>";

                                   // $sql = "SELECT Hafta,Mamul_kodu,Mps_bakiye,Pres_reel_ihtiyac,Kalip_grubu,Sac_hazir_orani,Sira,Durum FROM gbprssdataexcel WHERE Pres='" . $a . "' and (Durum!='tamamlandi' or Durum is NULL)ORDER BY Hafta ASC limit 5";
                                    $sql = "SELECT Hafta,Mamul_kodu,Mps_bakiye,Pres_reel_ihtiyac,Kalip_grubu,Sac_hazir_orani,Sira,Kalip_durum FROM gbprssdataexcel WHERE Pres='".$a."' and (Kalip_durum!='kalip_hazir' or Kalip_durum is NULL)ORDER BY Hafta ASC limit 5";
                                    $sorgu = mysqli_query($baglanti, $sql);

                                    while ($sonuc = mysqli_fetch_row($sorgu)) {
                                        if ($sonuc[7] != "") {
                                            $sinif = $sonuc[7];
                                        } else {
                                            $sinif = "";
                                        }
                                        echo "<table border='1' cellspacing='1' >";
                                        echo "<tr class='table table-light mb-0'><td class='" . $sinif . "'>" . $sonuc[0] . "</br>";
                                        echo $sonuc[1] . "</br>";
                                        echo $sonuc[2] . "</br>";
                                        echo $sonuc[3] . "</br>";
                                        echo $sonuc[4] . "</br>";
                                        echo $sonuc[5] . "</br>";
                                        echo $sonuc[6] . "</br>";


                                        ?>

                                        <form method="POST" action="process/prodecure-under.php">
                                            <select name="kalipdurum" name="myselect" onchange="this.form.submit();">
                                                <option value="">Seçiniz</option>
                                                <option value="kalip_yapimda">Kalıp Yapımda</option>
                                                <option value="yeni_kalip">Yeni Kalıp</option>
                                                <option value="kalip_bakimda">Kalıp Bakımda</option>
                                                <option value="kalip_hazir">Kalıp Hazır</option>
                                            </select>
                                            <input type="hidden" name="mamulkod" value="<?php echo $sonuc[1] ?>">
                                            <input type="hidden" name="kalipgrubu" value="<?php echo $sonuc[4] ?>">
                                            <input type="hidden" name="id" value="<?php echo $sonuc[6] ?>">


                                        </form>

                                        <?php

                                        echo "</td></tr>";
                                        echo "</table>";
                                    }
                                    //echo "---------------------------<br>";
                                    echo "</td>";
                                }
                                echo "</tr>";
                                echo "</table>";
                                echo "</td></tr></table>";
                                ?>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Arızalı Kalıplar</h4>


                                <?php
                                $sql = "SELECT Sira,Kalip,Pres FROM gbprssdataexcel where Durum='kalip_ariza'";
                                $sorgu = mysqli_query($baglanti, $sql);
                                echo '<table border=1 class="table table-danger mb-0"><tr><th>Sıra Numarası</th><th>Arızalanan Kalıp</th><th>Hangi Pres</th></tr>';
                                while ($sonuc = mysqli_fetch_row($sorgu)) {
                                    echo '<tr><td>' . $sonuc[0] . '</td><td>' . $sonuc[1] . '</td><td>' . $sonuc[2] . '</td></tr>';
                                }
                                echo '</table>';


                                ?>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="row">
                    <p class="bg bg-primary" style="color:white;"><b> Mavi Renk Kodu => " KALIP YAPIMDA SİMGELER "<b/></p>
                    <p class="bg bg-warning" style="color:white;"><b> Sarı Renk Kodu => " KALIP YENİ SİMGELER "<b/></p>
                    <p class="bg bg-danger" style="color:white;"><b> Kırmızı Renk Kodu => " KALIP ARIZA SİMGELER "<b/></p>
                    <p  style="color:white; background-color: purple;"><b> Mor Renk Kodu => " KALIP HAZIR SİMGELER "<b/></p>
                </div>
            </div>
            <?php include "services/footer-services.php"; ?>
        </div>
    </div>
    <?php include "services/javascript-services.php"; ?>

</body>
</html>
