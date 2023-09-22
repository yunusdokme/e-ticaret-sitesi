<?php
require '../connect.php';

if (isset($_POST['submit'])) {
    $baslik = $_POST['baslik'];
    $icerik = $_POST['icerik'];
    $kategori_id = $_POST['kategori_id'];
    $fiyat = $_POST['fiyat'];
    $stok = $_POST['stok'];
    $resim = $_POST['resim'];

    try {
        $db = new PDO("mysql:host=localhost;dbname=proje", 'root','');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO urun (id,kat_id, baslik, icerik, resim, fiyat, stok) 
                VALUES (NULL,?, ?, ?, ?, ?, ?)";

        $stmt = $db->prepare($sql);

        $stmt->execute([$kategori_id, $baslik, $icerik, $resim, $fiyat, $stok]);

        echo 'Başarıyla kaydedildi.';
    } catch (PDOException $e) {
        var_dump($e);
        echo 'Kayıt hatası: ' . $e->getMessage();
    }
}
?>
