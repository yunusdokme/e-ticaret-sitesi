<?php
// Veritabanı bağlantısı için gerekli bilgileri içeren bir dosya (connect.php) olduğunu varsayalım
require 'connect.php';

// Kullanıcının oturumunu başlatın veya devam ettirin
session_start();

// Kullanıcının oturum bilgilerini kontrol edin
if (isset($_SESSION['userID'])) {
    // Oturumda kullanıcı ID'si mevcut ise alın
    $userID = $_SESSION['userID'];

    // Gelen verileri alın
    $urunID = $_POST['urunID'];
    $urunAdet = $_POST['urunAdet'];

    // Veritabanında ürün geçmişi tablosuna ekleme işlemini gerçekleştirin
    $sql = $db->prepare("INSERT INTO gecmis (user_id, urun_id, adet) VALUES (?, ?, ?)");

    if ($sql->execute([$userID, $urunID, $urunAdet])) {
        // İşlem başarılı ise
        http_response_code(200);
        echo "Ürün geçmişe eklendi.";

        // İşlemlerin devam etmesi için burada diğer işlemleri yapabilirsiniz
    } else {
        // İşlem başarısız ise
        http_response_code(500);
        echo "Ürün geçmişe eklenirken bir hata oluştu.";
    }
} else {
    // Kullanıcı oturumu yoksa veya oturumda kullanıcı ID'si yoksa
    http_response_code(401);
    echo "Kullanıcı oturumu bulunamadı.";
}
?>
