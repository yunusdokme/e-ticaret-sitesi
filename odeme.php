<?php
require 'connect.php'; // Veritabanı bağlantısı için gerekli olan dosya

session_start(); // Oturumu başlat

// Kullanıcının oturum kimliğini kontrol edin
if (!isset($_SESSION['User']['id'])) {
    // Kullanıcı oturumu yoksa, hata mesajını ekrana bas ve işlemi durdur
    echo "Oturum açmış bir kullanıcı bulunamadı.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sepetten gelen verileri alın
    $urunID = $_POST['urunID'];
    $urunAdet = $_POST['urunAdet'];
    $urunName = $_POST['urunName'];

    // Kullanıcının ID'sini alın
    $userID = $_SESSION['User']['id'];

    // Tarihi alın
    $tarih = date('Y-m-d'); // Örnek olarak '2023-05-30' formatında alınır

    // Kullanıcının sepetindeki ürünü kontrol edin
    // Bu kısımda gerekli kontrolleri yaparak ürünün varlığını ve kullanıcının sepetindeki adeti kontrol edebilirsiniz
    // Örnek olarak, ürünün veritabanında mevcut olduğunu ve stokta yeterli miktarda olduğunu varsayalım

    // Gecmis tablosuna kayıt ekle
    $sql = $db->prepare("INSERT INTO gecmis (user_id, urun_id, adet, alis_tarihi, urun_name) VALUES (?, ?, ?, ?, ?)");
    $result = $sql->execute([$userID, $urunID, $urunAdet, $tarih, $urunName]);
    
    // İşlem sonucunu kontrol edin
    if ($result) {
        // Sepeti boşalt
        unset($_SESSION['sepet']);
    
        // Ürün stoklarını güncelle
        foreach ($_SESSION['sepet'] as $urunID) {
            // İlgili ürünün mevcut adedini alın
            $sql = $db->prepare("SELECT adet FROM urun WHERE id = ?");
            $sql->execute([$urunID]);
            $urun = $sql->fetch(PDO::FETCH_ASSOC);
    
            // Ürün adedini güncelle
            $yeniAdet = $urun['adet'] - $_SESSION['urunAdet' . $urunID];
            $sql = $db->prepare("UPDATE urun SET adet = ? WHERE id = ?");
            $sql->execute([$yeniAdet, $urunID]);
        }
    
        // Ödeme işlemi başarılı, home.php sayfasına yönlendir
        header('Location: kredi_karti.php');
        exit();

      
    }
    
}
?>
