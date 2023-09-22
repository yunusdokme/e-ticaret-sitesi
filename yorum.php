<?php
session_start();
require 'connect.php';

if (isset($_POST['submit'])) {
    $icerik = $_POST['icerik'];
    $kullaniciId = $_SESSION['User']['id'];
    $urunId = $_GET['id'];

    $sql = "INSERT INTO yorum (yorum_metni, kullanici_id, urun_id) VALUES (?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$icerik, $kullaniciId, $urunId]);

    echo "Yorum başarıyla kaydedildi.";
}
?>
