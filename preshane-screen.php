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
                            <h4 class="mb-sm-0 font-size-18">Pres Hane Ekranı</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Anasayfa</a></li>
                                    <li class="breadcrumb-item active">Pres Hane Ekranı</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Pres Hane Ekranı</h4>
                                <style type="text/css">
                                    #listele select{
                                        width: 100%;
                                    }

                                    .kalip_ariza{
                                        background-color: rgb(201,21,21);
                                    }

                                    .kalite_problem{
                                        background-color: rgb(238,130,238);
                                    }

                                    .pres_hazir{
                                        background-color: rgb(60,179,113);
                                    }
                                </style>


                                <script>
                                    setInterval(function(){
                                        window.location.reload(false);},20000);
                                </script>
                                <form action="#" method="POST">
                                    <select class="form-select" name="secim" onchange="this.form.submit();">
                                        <option disabled selected hidden>Seçiniz</option>
                                        <option value="p1">PRES 35 - 50</option>
                                        <option value="p2">PRES 60 - 400</option>
                                    </select>
                                </form>


                                <?php

                                $karar="p1";
                                if($_POST)
                                {
                                    $karar=$_POST["secim"];
                                }


                                    $dizipres=array();
                                    $dizipresadet= array();
                                    $dizipresiki=array();
                                    $dizipresadetiki= array();

                                    $baglanti = new mysqli("localhost", "root", "123456789", "j32mc8jzhlk6qmchtu");
                                    if ($baglanti->connect_errno > 0) {
                                        die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
                                    }
                                    $sql="SELECT * FROM gbprssdatapres";
                                    $sorgu=mysqli_query($baglanti,$sql);
                                    $i=0;
                                    $k=0;

                                    while( $sonuc=mysqli_fetch_row($sorgu) ){
                                        if($i<3)
                                        {
                                            $dizipres[$i]=$sonuc[1];
                                            $dizipresadet[$i]=$sonuc[2];
                                        }
                                        else
                                        {
                                            $dizipresiki[$k]=$sonuc[1];
                                            $dizipresadetiki[$k]=$sonuc[2];
                                            $k++;
                                        }
                                        $i++;
                                    }


                                    echo '<br>';
                                    echo '<table border="1"  style="border-color: white" class="table table-dark mb-0"><tr><td>';
                                    echo '<table border="0" width="100%" class="table table-dark mb-0">';
                                    echo "<tr><td><h5></h5><br>";
                                    for ($i=0; $i < 3; $i++) {
                                        echo '<table border="" style="border-color: white" width="100%">';
                                        echo '<tr><td style="font-weight: bold; border-color: white">Presçi<br>';
                                        echo 'Kalıpçı<br>';
                                        echo "Durum</br>";
                                        echo "Referans</br>";
                                        echo "Kalıp</br>";
                                        Echo "Orj.Sac</br>";
                                        echo "PresReelİht.</br>";
                                        echo "Sıra</br>";
                                        echo "B Tarihi</br>";
                                        echo "Kalan Saat</br>";
                                        echo "Bitiş Tarihi</td></tr></table>";
                                    }
                                    echo "</td></tr></table>";
                                    echo "</td><td>";



                                    if($karar=="p1"){
                                        for($j=0;$j<count($dizipres);$j++){
                                            echo "<table ><tr><td><h5 align='center' style='color:white; font-weight: bold'>".$dizipres[$j]."</h5>";
                                            $k=0;
                                            $sql="SELECT Mamul_kodu,Kalip_grubu,Pres_reel_ihtiyac,Sira,Durum,Basla,Bitir,Presci,Kalipci,Durum,Pres,Orj_sac FROM gbprssdataexcel WHERE Pres='".$dizipres[$j]."' and (Durum!='tamamlandi' or Durum is NULL) ORDER BY Hafta ASC LIMIT 0,".($dizipresadet[$j]*3)."";
                                            $sorgu=$baglanti->query($sql);
                                            echo '<table style="font-weight:bolder; border-color: white" border="1";><tr>';
                                            if($sorgu->num_rows>0)
                                            {
                                                while($row=$sorgu->fetch_assoc())
                                                {
                                                    if($row["Durum"]!=""){
                                                        $sinif=$row["Durum"];
                                                    }else{
                                                        $sinif="";
                                                    }
                                                    if($k%$dizipresadet[$j]==0 && $k!=0)
                                                    {
                                                        echo '</tr><tr><td  class="'.$sinif.'">';
                                                    }
                                                    else
                                                    {
                                                        echo '<td class="'.$sinif.'">';
                                                    }
                                                    ?>
                                                    <form method="POST" action="process/prodecure.php">
                                                        <select style="width: 100%" name="presci" onchange="this.form.submit();">
                                                            <option disabled selected hidden>Seçiniz</option>
                                                            <option <?php if($row["Presci"]=="Ramazan") echo 'selected="selected"'; ?> >Ramazan</option>
                                                            <option <?php if($row["Presci"]=="Olcay") echo 'selected="selected"'; ?> >Olcay</option>
                                                            <option <?php if($row["Presci"]=="Engin") echo 'selected="selected"'; ?> >Engin</option>
                                                            <option <?php if($row["Presci"]=="Hakan") echo 'selected="selected"'; ?> >Hakan</option>
                                                            <option <?php if($row["Presci"]=="Aziz") echo 'selected="selected"'; ?> >Aziz</option>
                                                            <option <?php if($row["Presci"]=="Enes") echo 'selected="selected"'; ?> >Enes</option>
                                                            <input type="hidden" name="sirano" value="<?php echo $row["Sira"]?>">
                                                        </select>
                                                    </form>
                                                    <form method="POST" action="process/prodecure.php">
                                                        <select style="width: 100%" name="kalipci" onchange="this.form.submit();">
                                                            <option disabled selected hidden>Seçiniz</option>
                                                            <option <?php if($row["Kalipci"]=="Resul") echo 'selected="selected"'; ?> >Resul</option>
                                                            <option <?php if($row["Kalipci"]=="İsmail") echo 'selected="selected"'; ?> >İsmail</option>
                                                            <option <?php if($row["Kalipci"]=="Hüseyin") echo 'selected="selected"'; ?> >Hüseyin</option>
                                                            <input type="hidden" name="sirano2" value="<?php echo $row["Sira"]?>">
                                                        </select>
                                                    </form>

                                                    <?php

                                                    echo '<form method="POST" action="process/prodecure.php">';
                                                    echo '<select style="width: 100%" class="" name="durum" onchange="this.form.submit();">';
                                                    echo '<option value="">Seçiniz</option>';
                                                    echo '<option value="kalip_ariza">Kalıp Arıza</option>';
                                                    echo '<option value="kalite_problem">Kalite Prob.</option>';
                                                    echo '<option value="pres_hazir">Pres Hazır</option>';
                                                    echo '<option value="tamamlandi">Tamamlandı</option>';
                                                    echo '</select>';
                                                    echo '<input type="hidden" name="sira" value="'.$row["Sira"].'">';
                                                    echo '<input type="hidden" name="press" value="'.$dizipres[$j].'">';
                                                    echo '</form>';

                                                    echo $row["Mamul_kodu"].'<br>';
                                                    echo $row["Kalip_grubu"].'<br>';
                                                    echo $row["Orj_sac"].'<br>';
                                                    echo $row["Pres_reel_ihtiyac"].'<br>';
                                                    echo $row["Sira"].'<br>';
                                                    echo $row["Basla"].'<br>';
                                                    $ara=strtotime($row["Bitir"])-strtotime($row["Basla"]);
                                                    echo ((round($ara / (60 * 60 * 24)))*18).'<br>';
                                                    echo $row["Bitir"].'<br>';
                                                    echo '</td>';
                                                    $k++;
                                                }
                                                echo '</tr></table>';
                                            }
                                            else
                                            {
                                                echo "0 kayıt";
                                            }
                                            echo '</td></tr></table>';
                                            echo '</td><td>';

                                        }
                                    }else if($karar=="p2")
                                    {
                                        for($j=0;$j<count($dizipresiki);$j++){
                                            //echo '<td>';
                                            echo "<table><tr><td><h5  align='center' style='color:white; font-weight: bold'>".$dizipresiki[$j]."</h5>";
                                            $k=0;
                                            $sql="SELECT Mamul_kodu,Kalip_grubu,Pres_reel_ihtiyac,Sira,Durum,Basla,Bitir,Presci,Kalipci,Kalip_durum,Pres,Orj_sac FROM gbprssdataexcel WHERE Pres='".$dizipresiki[$j]."' and (Durum!='tamamlandi' or Durum is NULL) ORDER BY Hafta ASC LIMIT 0,".($dizipresadetiki[$j]*3)."";
                                            $sorgu=$baglanti->query($sql);
                                            echo '<table style="font-weight:bolder; border-color: white" border="1";><tr>';
                                            if($sorgu->num_rows>0)
                                            {
                                                while($row=$sorgu->fetch_assoc())
                                                {
                                                    if($row["Durum"]!=""){
                                                        $sinif=$row["Durum"];
                                                    }else{
                                                        $sinif="";
                                                    }
                                                    if($k%$dizipresadetiki[$j]==0 && $k!=0)
                                                    {
                                                        echo '</tr><tr><td class="'.$sinif.'">';
                                                    }
                                                    else
                                                    {
                                                        echo '<td class="'.$sinif.'">';
                                                    }
                                                    ?>
                                                    <form method="POST" action="process/prodecure.php">
                                                        <select style="width: 100%" name="presci" onchange="this.form.submit();">
                                                            <option disabled selected hidden>Seçiniz</option>
                                                            <option <?php if($row["Presci"]=="Ramazan") echo 'selected="selected"'; ?> >Ramazan</option>
                                                            <option <?php if($row["Presci"]=="Olcay") echo 'selected="selected"'; ?> >Olcay</option>
                                                            <option <?php if($row["Presci"]=="Engin") echo 'selected="selected"'; ?> >Engin</option>
                                                            <option <?php if($row["Presci"]=="Hakan") echo 'selected="selected"'; ?> >Hakan</option>
                                                            <option <?php if($row["Presci"]=="Aziz") echo 'selected="selected"'; ?> >Aziz</option>
                                                            <option <?php if($row["Presci"]=="Enes") echo 'selected="selected"'; ?> >Enes</option>
                                                            <input type="hidden" name="sirano" value="<?php echo $row["Sira"]?>">
                                                        </select>
                                                    </form>
                                                    <form method="POST"action="process/prodecure.php">
                                                        <select style="width: 100%" name="kalipci" onchange="this.form.submit();">
                                                            <option disabled selected hidden>Seçiniz</option>
                                                            <option <?php if($row["Kalipci"]=="Resul") echo 'selected="selected"'; ?> >Resul</option>
                                                            <option <?php if($row["Kalipci"]=="İsmail") echo 'selected="selected"'; ?> >İsmail</option>
                                                            <option <?php if($row["Kalipci"]=="Hüseyin") echo 'selected="selected"'; ?> >Hüseyin</option>
                                                            <input type="hidden" name="sirano2" value="<?php echo $row["Sira"]?>">
                                                        </select>
                                                    </form>

                                                    <?php

                                                    echo '<form method="POST" action="process/prodecure.php">';
                                                    echo '<select style="width: 100%" name="durum" onchange="this.form.submit();">';
                                                    echo '<option value="">Seçiniz</option>';
                                                    echo '<option value="kalip_ariza">Kalıp Arıza</option>';
                                                    echo '<option value="kalite_problem">Kalite Prob.</option>';
                                                    echo '<option value="pres_hazir">Pres Hazır</option>';
                                                    echo '<option value="tamamlandi">Tamamlandı</option>';
                                                    echo '</select>';
                                                    echo '<input type="hidden" name="sira" value="'.$row["Sira"].'">';
                                                    echo '<input type="hidden" name="press" value="'.$dizipresiki[$j].'">';
                                                    echo '</form>';

                                                    //echo $row["Presci"].'<br>';
                                                    //echo $row["Kalipci"].'<br>';
                                                    echo $row["Mamul_kodu"].'<br>';
                                                    echo $row["Kalip_grubu"].'<br>';
                                                    echo $row["Orj_sac"].'<br>';
                                                    echo $row["Pres_reel_ihtiyac"].'<br>';
                                                    echo $row["Sira"].'<br>';
                                                    echo $row["Basla"].'<br>';
                                                    $ara=strtotime($row["Bitir"])-strtotime($row["Basla"]);
                                                    echo ((round($ara / (60 * 60 * 24)))*18).'<br>';
                                                    echo $row["Bitir"].'<br>';
                                                    echo '</td>';
                                                    $k++;
                                                }
                                                echo '</tr></table>';
                                            }
                                            else
                                            {
                                                echo "0 kayıt";
                                            }
                                            echo '</td></tr></table>';
                                            echo '</td><td>';

                                        }
                                    }
                                    echo '</td></td>';
                                    echo "</tr>";
                                    echo "</table>";
                                ?>





                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Arızalı Presler</h4>


                                        <?php
                                        $sql = "SELECT Sira,Kalip,Pres FROM gbprssdataexcel where Durum='pres_arizasi'";
                                        $sorgu = mysqli_query($baglanti, $sql);
                                        echo '<table border=1 class="table table-danger mb-0"><tr><th>Pres Numarası</th><th>Mamül Kodu</th><th>Pres Arıza Tarihi</th></tr>';
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
                            <p class="bg bg-warning" style="color:white;"><b> Turuncu Renk Kodu => " PRES ARIZA SİMGELER "<b/></p>
                            <p style="color:white; background-color: red;"><b> Kırmızı Renk Kodu => " KALIP ARIZA SİMGELER "<b/></p>
                            <p  style="color:white; background-color: pink;"><b> Pembe Renk Kodu => " KALİTE PROBLEMİ SİMGELER "<b/></p>
                            <p style="color:white; background-color: green;" ><b> Yeşil Renk Kodu => " PRES HAZIR SİMGELER "<b/></p>

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