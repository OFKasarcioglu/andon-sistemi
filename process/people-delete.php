<?php
include 'connection.php';
/** KULLANICI SILME EKLEME ISLEMLERI **/

if ($_GET["KSIL"]=='OK') {
$KullaniciDelete = $DataBase->prepare("DELETE FROM gbprssdatakullanici WHERE KullaniciID=:ID");
$Kontrol = $KullaniciDelete->execute(array(
'ID' => $_GET['KullaniciID']
));

if ($Kontrol) {
header("Location:../people-list.php?DURUM=OK");
} else {
header("Location:../people-list.php?DURUM=NO");
}

}
/** KULLANICI SILME EKLEME ISLEMLERI **/