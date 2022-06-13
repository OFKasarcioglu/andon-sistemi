<?php
/** KALIP DURUM DEGISTIR**/
$kalipgrubu = $_POST["kalipgrubu"];
$mamulkod=$_POST["mamulkod"];
$kalipdurum = $_POST["kalipdurum"];
$siraId = $_POST["id"];

$baglanti = new mysqli("localhost", "root", "123456789", "j32mc8jzhlk6qmchtu");
if ($baglanti->connect_errno > 0) {
    die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
}
if($kalipdurum=="kalip_hazir"){
    $sql="update gbprssdataexcel set Kalip_durum='kalip_hazir',Durum='pres_hazir' where Sira='".$siraId."'";
    $sonuc= mysqli_query($baglanti,$sql);
    if($sonuc)
    {
        header('Location:../kaliphane-screen.php');
    }
    else{
        echo "kalip_hazir hatası";
    }
}
else
{
    $sql="update gbprssdataexcel set Kalip_durum='".$kalipdurum."' where Kalip_grubu = '".$kalipgrubu."' and Mamul_kodu='".$mamulkod."' and (Kalip_durum!='kalip_hazir' OR Kalip_durum is NULL)";
    $sonuc= mysqli_query($baglanti,$sql);
    if($sonuc){
        header('Location:../kaliphane-screen.php');
    }
    else
    {
        echo "diger kalip hatası";
    }
}

/** KALIP DURUM DEGISTIR**/