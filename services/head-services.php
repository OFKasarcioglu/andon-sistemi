<?php
ob_start();
session_start();
include 'process/connection.php';
$KullaniciQuery = $DataBase->prepare("SELECT * FROM gbprssdatakullanici WHERE KullaniciName=:KullaniciName");
$KullaniciQuery->execute(array(
    'KullaniciName' => $_SESSION['KullaniciName']
));
$Count = $KullaniciQuery->rowCount();
$KullaniciRefiill = $KullaniciQuery->fetch(PDO::FETCH_ASSOC);

if ($Count == 0) {
    header("Location:system-login.php?DURUM=IZINSIZ");
    exit();
}

?>

<!doctype html>
<html lang="tr">
<head>
    <?php include "services/meta-services.php";?>
    <?php include "services/css-services.php";?>
</head>