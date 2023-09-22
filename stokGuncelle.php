<?php
require 'connect.php';
// Gelen verileri alın
$urunID = $_POST['urunID'];
$urunAdet = $_POST['urunAdet'];

// Veritabanında ürün geçmişi tablosuna ekleme işlemini gerçekleştirin
// İlgili veritabanı sorgularını burada çalıştırabilirsiniz
// Örnek olarak, aşağıdaki gibi bir sorgu kullanabilirsiniz
$sql = $db->prepare("INSERT INTO gecmis (urun_id, adet) VALUES (?, ?)");
$sql->execute([$urunID, $urunAdet]);

// İşlem sonucunu döndürün
http_response_code(200);
echo "Ürün geçmişe eklendi.";
?>
