<?php
ob_start();
session_start();
include 'connection.php';
include 'PHPExcel/Classes/PHPExcel.php';
include 'PHPExcel/Classes/PHPExcel/IOFactory.php';

/** SESSION ISLEMLERI **/

if (isset($_POST['systemLogin'])) {
    $kullaniciName = $_POST['kullaniciName'];
    $kullaniciPassword = $_POST['kullaniciPass'];

    $kullaniciNameQuery = $DataBase->prepare("SELECT * FROM gbprssdatakullanici WHERE KullaniciName=:KullaniciName AND KullaniciSifre=:KullaniciSifre AND KullaniciYetki=:KullaniciYetki");
    $kullaniciNameQuery->execute(array(
        'KullaniciName' => $kullaniciName,
        'KullaniciSifre' => $kullaniciPassword,
        'KullaniciYetki' => "Admin"
    ));
    $Count = $kullaniciNameQuery->rowCount();
    if ($Count == 1) {
        $_SESSION['KullaniciName'] = $kullaniciName;
        header("Location:../homepage.php");

    } else {
        header("Location:../system-login.php?DURUM=YETKISIZ");
    }
}
/** SESSION ISLEMLERI **/

/** EXCEL EKLEME KODLARI START **/

if (isset($_FILES['ExcelYukle'])) {

    $excelName = $_FILES['ExcelYukle']['name']; // => fileUpload input name adlandırmasıdır.
    $tmpName = $_FILES['ExcelYukle']['tmp_name']; // => fileUpload input name adlandırmasıdır.
    $tiP = $_FILES['ExcelYukle']['type']; // => fileUpload input name adlandırmasıdır.

    if ($excelName && $tmpName && $tiP) { //=> Sadece Excel yüklenebilmesi için bu sorguyu yazdık.

        $uZantilar = array(
            'application/xls',
            'application/vnd.ms-excel',
            'application/xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        if (in_array($tiP, $uZantilar)) {
            $kutupHaneExcel = PHPExcel_IOFactory::load($tmpName); //=> Kütüphaneye bağladık.

            foreach ($kutupHaneExcel->getWorksheetIterator() as $sheetWorksCalisma) //Kütüphanede iç içe ne kadar döngü varsa çeker
            {
                $sayDirma = $sheetWorksCalisma->getHighestRow();

                for ($j = 2; $j <= $sayDirma; $j++) {

                    $Urun_agaci_yok = $sheetWorksCalisma->getCellByColumnAndRow(0, $j)->getValue();
                    $Ok = $sheetWorksCalisma->getCellByColumnAndRow(1, $j)->getValue();
                    $Sira = $sheetWorksCalisma->getCellByColumnAndRow(2, $j)->getValue();
                    $Evrak_tipi = $sheetWorksCalisma->getCellByColumnAndRow(3, $j)->getValue();
                    $Evrak_no = $sheetWorksCalisma->getCellByColumnAndRow(4, $j)->getValue();
                    $Musteri_siparis_no = $sheetWorksCalisma->getCellByColumnAndRow(5, $j)->getValue();
                    $Siparisi_alan = $sheetWorksCalisma->getCellByColumnAndRow(6, $j)->getValue();
                    $Hafta = $sheetWorksCalisma->getCellByColumnAndRow(7, $j)->getValue();
                    $Teslim_tarihi = $sheetWorksCalisma->getCellByColumnAndRow(8, $j)->getValue();
                    $Musteri_adi = $sheetWorksCalisma->getCellByColumnAndRow(9, $j)->getValue();
                    $Kalip_grubu = $sheetWorksCalisma->getCellByColumnAndRow(10, $j)->getValue();
                    $Mamul_kodu = $sheetWorksCalisma->getCellByColumnAndRow(11, $j)->getValue();
                    $Mamul_adi = $sheetWorksCalisma->getCellByColumnAndRow(12, $j)->getValue();
                    $Musteri_kodu = $sheetWorksCalisma->getCellByColumnAndRow(13, $j)->getValue();
                    $Siparis = $sheetWorksCalisma->getCellByColumnAndRow(14, $j)->getValue();
                    $Kapanan = $sheetWorksCalisma->getCellByColumnAndRow(15, $j)->getValue();
                    $Bakiye = $sheetWorksCalisma->getCellByColumnAndRow(16, $j)->getValue();
                    $Depo = $sheetWorksCalisma->getCellByColumnAndRow(17, $j)->getValue();
                    $Ihtiyac = $sheetWorksCalisma->getCellByColumnAndRow(18, $j)->getValue();
                    $Ak = $sheetWorksCalisma->getCellByColumnAndRow(19, $j)->getValue();
                    $Statu = $sheetWorksCalisma->getCellByColumnAndRow(20, $j)->getValue();
                    $Mps_no = $sheetWorksCalisma->getCellByColumnAndRow(21, $j)->getValue();
                    $Mps_miktar = $sheetWorksCalisma->getCellByColumnAndRow(22, $j)->getValue();
                    $Mps_uretilen = $sheetWorksCalisma->getCellByColumnAndRow(23, $j)->getValue();
                    $Mps_bakiye = $sheetWorksCalisma->getCellByColumnAndRow(24, $j)->getValue();
                    $Mps_ihtiyac_fark = $sheetWorksCalisma->getCellByColumnAndRow(25, $j)->getValue();
                    $Orj_sac = $sheetWorksCalisma->getCellByColumnAndRow(26, $j)->getValue();
                    $Orj_sac_ad = $sheetWorksCalisma->getCellByColumnAndRow(27, $j)->getValue();
                    $Tercih_sac = $sheetWorksCalisma->getCellByColumnAndRow(28, $j)->getValue();
                    $Tercih_sac_ad = $sheetWorksCalisma->getCellByColumnAndRow(29, $j)->getValue();
                    $Isin_pres_ihtiyaci_saat = $sheetWorksCalisma->getCellByColumnAndRow(30, $j)->getValue();
                    $Pres_reel_ihtiyac = $sheetWorksCalisma->getCellByColumnAndRow(31, $j)->getValue();
                    $Kalip = $sheetWorksCalisma->getCellByColumnAndRow(32, $j)->getValue();
                    $Pres = $sheetWorksCalisma->getCellByColumnAndRow(33, $j)->getValue();
                    $Sac_ok = $sheetWorksCalisma->getCellByColumnAndRow(34, $j)->getValue();
                    $Tum_isin_sac_ihtiyaci_kg = $sheetWorksCalisma->getCellByColumnAndRow(35, $j)->getValue();
                    $Bu_isin_sac_ihtiyaci_kg = $sheetWorksCalisma->getCellByColumnAndRow(36, $j)->getValue();
                    $Sac_stok = $sheetWorksCalisma->getCellByColumnAndRow(37, $j)->getValue();
                    $Sac_hazir_orani = $sheetWorksCalisma->getCellByColumnAndRow(38, $j)->getValue();
                    $Sac_satinalma_ihtiyaci = $sheetWorksCalisma->getCellByColumnAndRow(39, $j)->getValue();
                    $Satinalma_siparis_depo = $sheetWorksCalisma->getCellByColumnAndRow(40, $j)->getValue();
                    $Eksik_satinalma_siparisi = $sheetWorksCalisma->getCellByColumnAndRow(41, $j)->getValue();
                    $Siparis1_evrak_no = $sheetWorksCalisma->getCellByColumnAndRow(42, $j)->getValue();
                    $Siparis1_teslim_tarihi = $sheetWorksCalisma->getCellByColumnAndRow(43, $j)->getValue();
                    $Siparis1_bakiye = $sheetWorksCalisma->getCellByColumnAndRow(44, $j)->getValue();
                    $Tedarikci1 = $sheetWorksCalisma->getCellByColumnAndRow(45, $j)->getValue();
                    $Siparis2_evrak_no = $sheetWorksCalisma->getCellByColumnAndRow(46, $j)->getValue();
                    $Siparis2_teslim_tarihi = $sheetWorksCalisma->getCellByColumnAndRow(47, $j)->getValue();
                    $Siparis2_bakiye = $sheetWorksCalisma->getCellByColumnAndRow(48, $j)->getValue();
                    $Tedarikci2 = $sheetWorksCalisma->getCellByColumnAndRow(49, $j)->getValue();
                    $Diger_siparisler_bakiye = $sheetWorksCalisma->getCellByColumnAndRow(50, $j)->getValue();
                    $tarih4 = $sheetWorksCalisma->getCellByColumnAndRow(51, $j)->getValue();
                    if ($tarih4 == NULL) {
                        $Basla = NULL;
                    } else {
                        @$unixdate = ($tarih4 - 25569) * 86400;
                        $tarih4 = 25569 + ($unixdate / 86400);
                        $unixdate = ($tarih4 - 25569) * 86400;
                        $Basla = gmdate("Y-m-d", $unixdate);
                    }
                    $tarih5 = $sheetWorksCalisma->getCellByColumnAndRow(52, $j)->getValue();

                    if ($tarih5 == NULL) {
                        $Bitir = NULL;
                    } else {
                        @$unixdate = ($tarih5 - 25569) * 86400;
                        $tarih5 = 25569 + ($unixdate / 86400);
                        $unixdate = ($tarih5 - 25569) * 86400;
                        $Bitir = gmdate("Y-m-d", $unixdate);
                    }
                    $Kalip_ref = $sheetWorksCalisma->getCellByColumnAndRow(53, $j)->getValue();
                    $Satinalma_siparis_satir_sayisi = $sheetWorksCalisma->getCellByColumnAndRow(54, $j)->getValue();
                    $Satinalma_siparis_miktari = $sheetWorksCalisma->getCellByColumnAndRow(55, $j)->getValue();
                    $Acik_satinalma_evrak_no = $sheetWorksCalisma->getCellByColumnAndRow(56, $j)->getValue();
                    $Satinalma_kodu = $sheetWorksCalisma->getCellByColumnAndRow(57, $j)->getValue();
                    $Satinalma_revize_teslim_tarihi = $sheetWorksCalisma->getCellByColumnAndRow(58, $j)->getValue();
                    $Satinalma_cari = $sheetWorksCalisma->getCellByColumnAndRow(59, $j)->getValue();
                    $Urun_toleransi = $sheetWorksCalisma->getCellByColumnAndRow(60, $j)->getValue();
                    $Satinalma_toleransi = $sheetWorksCalisma->getCellByColumnAndRow(61, $j)->getValue();
                    $Proje_kodu = $sheetWorksCalisma->getCellByColumnAndRow(62, $j)->getValue();

                    $daTaIceriAl = $DataBase->prepare("INSERT INTO gbprssdataexcel SET
Urun_agaci_yok=:Urun_agaci_yok,
Ok=:Ok,
Sira=:Sira,
Evrak_tipi=:Evrak_tipi,
Evrak_no=:Evrak_no,
Musteri_siparis_no=:Musteri_siparis_no,
Siparisi_alan=:Siparisi_alan,
Hafta=:Hafta,
Teslim_tarihi=:Teslim_tarihi,
Musteri_adi=:Musteri_adi,
Kalip_grubu=:Kalip_grubu,
Mamul_kodu=:Mamul_kodu,
Mamul_adi=:Mamul_adi,
Musteri_kodu=:Musteri_kodu,
Siparis=:Siparis,
Kapanan=:Kapanan,
Bakiye=:Bakiye,
Depo=:Depo,
Ihtiyac=:Ihtiyac,
Ak=:Ak,
Statu=:Statu,
Mps_no=:Mps_no,
Mps_miktar=:Mps_miktar,
Mps_uretilen=:Mps_uretilen,
Mps_bakiye=:Mps_bakiye,
Mps_ihtiyac_fark=:Mps_ihtiyac_fark,
Orj_sac=:Orj_sac,
Orj_sac_ad=:Orj_sac_ad,
Tercih_sac=:Tercih_sac,
Tercih_sac_ad=:Tercih_sac_ad,
Isin_pres_ihtiyaci_saat=:Isin_pres_ihtiyaci_saat,
Pres_reel_ihtiyac=:Pres_reel_ihtiyac,
Kalip=:Kalip,
Pres=:Pres,
Sac_ok=:Sac_ok,
Tum_isin_sac_ihtiyaci_kg=:Tum_isin_sac_ihtiyaci_kg,
Bu_isin_sac_ihtiyaci_kg=:Bu_isin_sac_ihtiyaci_kg,
Sac_stok=:Sac_stok,
Sac_hazir_orani=:Sac_hazir_orani,
Sac_satinalma_ihtiyaci=:Sac_satinalma_ihtiyaci,
Satinalma_siparis_depo=:Satinalma_siparis_depo,
Eksik_satinalma_siparisi=:Eksik_satinalma_siparisi,
Siparis1_evrak_no=:Siparis1_evrak_no,
Siparis1_teslim_tarihi=:Siparis1_teslim_tarihi,
Siparis1_bakiye=:Siparis1_bakiye,
Tedarikci1=:Tedarikci1,
Siparis2_evrak_no=:Siparis2_evrak_no,
Siparis2_teslim_tarihi=:Siparis2_teslim_tarihi,
Siparis2_bakiye=:Siparis2_bakiye,
Diger_siparisler_bakiye=:Diger_siparisler_bakiye,
Basla=:Basla,
Bitir=:Bitir,
Kalip_ref=:Kalip_ref,
Satinalma_siparis_satir_sayisi=:Satinalma_siparis_satir_sayisi,
Acik_satinalma_evrak_no=:Acik_satinalma_evrak_no,
Satinalma_kodu=:Satinalma_kodu,
Satinalma_revize_teslim_tarihi=:Satinalma_revize_teslim_tarihi,
Satinalma_cari=:Satinalma_cari,
Satinalma_toleransi=:Satinalma_toleransi,
Proje_kodu=:Proje_kodu");

                    $yukle = $daTaIceriAl->execute([
                        'Urun_agaci_yok' => $Urun_agaci_yok,
                        'Ok' => $Ok,
                        'Sira' => $Sira,
                        'Evrak_tipi' => $Evrak_tipi,
                        'Evrak_no' => $Evrak_no,
                        'Musteri_siparis_no' => $Musteri_siparis_no,
                        'Siparisi_alan' => $Siparisi_alan,
                        'Hafta' => $Hafta,
                        'Teslim_tarihi' => $Teslim_tarihi,
                        'Musteri_adi' => $Musteri_adi,
                        'Kalip_grubu' => $Kalip_grubu,
                        'Mamul_kodu' => $Mamul_kodu,
                        'Mamul_adi' => $Mamul_adi,
                        'Musteri_kodu' => $Musteri_kodu,
                        'Siparis' => $Siparis,
                        'Kapanan' => $Kapanan,
                        'Bakiye' => $Bakiye,
                        'Depo' => $Depo,
                        'Ihtiyac' => $Ihtiyac,
                        'Ak' => $Ak,
                        'Statu' => $Statu,
                        'Mps_no' => $Mps_no,
                        'Mps_miktar' => $Mps_miktar,
                        'Mps_uretilen' => $Mps_uretilen,
                        'Mps_bakiye' => $Mps_bakiye,
                        'Mps_ihtiyac_fark' => $Mps_ihtiyac_fark,
                        'Orj_sac' => $Orj_sac,
                        'Orj_sac_ad' => $Orj_sac_ad,
                        'Tercih_sac' => $Tercih_sac,
                        'Tercih_sac_ad' => $Tercih_sac_ad,
                        'Isin_pres_ihtiyaci_saat' => $Isin_pres_ihtiyaci_saat,
                        'Pres_reel_ihtiyac' => $Pres_reel_ihtiyac,
                        'Kalip' => $Kalip,
                        'Pres' => $Pres,
                        'Sac_ok' => $Sac_ok,
                        'Tum_isin_sac_ihtiyaci_kg' => $Tum_isin_sac_ihtiyaci_kg,
                        'Bu_isin_sac_ihtiyaci_kg' => $Bu_isin_sac_ihtiyaci_kg,
                        'Sac_stok' => $Sac_stok,
                        'Sac_hazir_orani' => $Sac_hazir_orani,
                        'Sac_satinalma_ihtiyaci' => $Sac_satinalma_ihtiyaci,
                        'Satinalma_siparis_depo' => $Satinalma_siparis_depo,
                        'Eksik_satinalma_siparisi' => $Eksik_satinalma_siparisi,
                        'Siparis1_evrak_no' => $Siparis1_evrak_no,
                        'Siparis1_teslim_tarihi' => $Siparis1_teslim_tarihi,
                        'Siparis1_bakiye' => $Siparis1_bakiye,
                        'Tedarikci1' => $Tedarikci1,
                        'Siparis2_evrak_no' => $Siparis2_evrak_no,
                        'Siparis2_teslim_tarihi' => $Siparis2_teslim_tarihi,
                        'Siparis2_bakiye' => $Siparis2_bakiye,
                        'Diger_siparisler_bakiye' => $Diger_siparisler_bakiye,
                        'Basla' => $Basla,
                        'Bitir' => $Bitir,
                        'Kalip_ref' => $Kalip_ref,
                        'Satinalma_siparis_satir_sayisi' => $Satinalma_siparis_satir_sayisi,
                        'Acik_satinalma_evrak_no' => $Acik_satinalma_evrak_no,
                        'Satinalma_kodu' => $Satinalma_kodu,
                        'Satinalma_revize_teslim_tarihi' => $Satinalma_revize_teslim_tarihi,
                        'Satinalma_cari' => $Satinalma_cari,
                        'Satinalma_toleransi' => $Satinalma_toleransi,
                        'Proje_kodu' => $Proje_kodu
                    ]);
                    if ($yukle) {
                        header("Location:../database-insert.php?DURUM=YES");
                    } else {
                        header("Location:../database-insert.php?DURUM=NO");
                    }
                }
            }
        }
    }
}
/** EXCEL EKLEME KODLARI START **/



/** PRES EKLEME ISLEMLERI **/
if (isset($_POST['PresKaydet'])) {
    $PressKaydet = $DataBase->prepare("INSERT INTO gbprssdatapres SET PresAdi=:PresAdi,PresAdet=:PresAdet");
    $insert = $PressKaydet->execute(array(
        'PresAdi' => $_POST['PresAd'],
        'PresAdet' => $_POST['PresAdet']
    ));

    if ($insert) {
        header("Location:../pres-list.php?DURUM=OK");
    } else {
        header("Location:../pres-list.php?DURUM=NO");
    }

}
/** PRES EKLEME ISLEMLERI **/






/** KULLANICI EKLEME ISLEMLERI **/

if (isset($_POST['KullaniciKaydet'])) {
    $PressKaydet = $DataBase->prepare("INSERT INTO gbprssdatakullanici SET 
KullaniciName=:KullaniciName,
KullaniciSurName=:KullaniciSurName,
KullaniciSifre=:KullaniciSifre,
KullaniciYetki=:KullaniciYetki
");
    $insert = $PressKaydet->execute(array(
        'KullaniciName' => $_POST['KullaniciAd'],
        'KullaniciSurName' => $_POST['KullaniciSoyad'],
        'KullaniciSifre' => $_POST['KullaniciSifre'],
        'KullaniciYetki' => $_POST['KullaniciYetki']
    ));

    if ($insert) {
        header("Location:../people-list.php?DURUM=OK");
    } else {
        header("Location:../people-list.php?DURUM=NO");
    }

}
/** KULLANICI EKLEME ISLEMLERI **/






/**PRES DURUM DEGISTIR**/
$siraIdPres = $_POST["sira"];
$durum = $_POST["durum"];
$pres = $_POST["press"];
$tarih=date('Y-m-d');
$baglanti = new mysqli("localhost", "root", "123456789", "j32mc8jzhlk6qmchtu");
if ($baglanti->connect_errno > 0) {
    die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
}

if ($durum=='tamamlandi') {
    $sql="update gbprssdataexcel set Durum='".$durum."',Tamamlanma_tarihi='".$tarih."' where Sira = '".$siraIdPres."'";
    $sonuc= mysqli_query($baglanti,$sql);
    if($sonuc)
    {
        $sql2="INSERT INTO gbprssdatafinish() SELECT * FROM gbprssdataexcel WHERE Sira='".$siraIdPres."'";
        $sonuc2= mysqli_query($baglanti,$sql2);
        if($sonuc2)
        {
            header('Location:../preshane-screen.php');
        }
        else
        {
            echo 'tamamlandı tablosuna ekleme hatası';
        }
    }
    else
    {
        echo 'durum tamamlandi güncelleme hatası';
    }
}
else
{
    $sql="update gbprssdataexcel set Durum='".$durum."' where Sira = '".$siraIdPres."'";
    $sonuc= mysqli_query($baglanti,$sql);
    if($sonuc)
    {
        header('Location:../preshane-screen.php');
    }
    else
    {
        echo 'tamamlandi dışında durum güncelleme hatası';
    }
}
/**PRES DURUM DEGISTIR**/


/**PRESCI DEGISTIR**/

$siraPresci = $_POST["sirano"];
$presci = $_POST["presci"];


$baglanti = new mysqli("localhost", "root", "123456789", "j32mc8jzhlk6qmchtu");
if ($baglanti->connect_errno > 0) {
    die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
}
$sql = "update gbprssdataexcel set Presci='" . $presci . "' where Sira = '" . $siraPresci . "'";
$sonuc = mysqli_query($baglanti, $sql);
if ($sonuc) {
    header('Location:../preshane-screen.php');
} else {

    echo "hata oluştu";
}

/**PRESCI DEGISTIR**/

/**KALIPCI DEGISTIR**/
$siraKalipci = $_POST["sirano2"];
$kalipci = $_POST["kalipci"];



$baglanti =new mysqli("localhost", "root", "123456789", "j32mc8jzhlk6qmchtu");
if ($baglanti->connect_errno > 0) {
    die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
}
$sql = "update gbprssdataexcel set Kalipci='" . $kalipci . "' where Sira = '" . $siraKalipci . "'";
$sonuc = mysqli_query($baglanti, $sql);
if ($sonuc) {
    header('Location:../preshane-screen.php');
} else {

    echo "hata oluştu";
}

/**KALIPCI DEGISTIR**/





