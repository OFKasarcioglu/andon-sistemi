<?php
include 'connection.php';
/** PRES SILME EKLEME ISLEMLERI **/

if ($_GET["PSIL"]=='OK') {
    $PresDelete = $DataBase->prepare("DELETE FROM gbprssdatapres WHERE PresId=:ID");
    $Kontrol = $PresDelete->execute(array(
        'ID' => $_GET['PresId']
    ));

    if ($Kontrol) {
        header("Location:../pres-list.php?DURUM=OK");
    } else {
        header("Location:../pres-list.php?DURUM=NO");
    }

}
/** PRES SILME EKLEME ISLEMLERI **/