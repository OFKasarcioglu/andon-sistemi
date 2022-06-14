<?php
/**ACIL IS DEGISTIR**/

$sira=$_POST['siraAcil'];
$baglanti = new mysqli("localhost", "root", "123456789", "j32mc8jzhlk6qmchtu");
if ($baglanti->connect_errno > 0) {
    die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
}
$sql="SELECT min(Hafta) FROM gbprssdataexcel";
$sorgu=mysqli_query($baglanti,$sql);
$sonuc=mysqli_fetch_row($sorgu);
$sql2="update gbprssdataexcel set Hafta = '".(($sonuc[0])-1)."' where Sira = '$sira'";
$sonuc2= mysqli_query($baglanti,$sql2);
if ($sonuc2) {
    header('Location:../kaliphane-screen.php');
}
else{
    echo "Hata var";
}
/**ACIL IS DEGISTIR**/
