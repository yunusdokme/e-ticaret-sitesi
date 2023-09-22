


<?php
require 'connect.php';

if (isset($_GET['urunID']) && isset($_GET['urunAdet'])) {
    $urunID = $_GET['urunID'];
    $urunAdet = $_GET['urunAdet'];

    // İlgili ürünü veritabanından çekin
    $sql = $db->prepare("SELECT * FROM urun WHERE id=?");
    $sql->execute([$urunID]);
    $urun = $sql->fetch(PDO::FETCH_ASSOC);

    $toplamFiyat=0;

    $urunFiyat = floatval($urun['fiyat']);
    $toplam = $urunFiyat * $urunAdet;
    $toplamFiyat +=$toplam;


	

    echo $toplamFiyat;
}
?>

