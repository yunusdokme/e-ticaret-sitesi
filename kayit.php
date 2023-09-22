<?php

require 'connect.php';

if(isset($_POST['kayit'])){
    $name = $_POST['name'];
    $sifre = $_POST['sifre'];
    $sfrtekrar = $_POST['sifre-tekrar'];
    $email = $_POST['email'];

    // Alanların boş olup olmadığını kontrol etme
    if(empty($name) || empty($sifre) || empty($sfrtekrar) || empty($email)){
        echo 'Lütfen tüm alanları doldurun.';
        exit;
    }

    // Şifre kontrolü
    if($sifre !== $sfrtekrar){
        echo 'Şifreler eşleşmiyor.';
        exit;
    }

    // E-posta adresinin veritabanında var olup olmadığını kontrol etme
    $kontrol = $db->prepare("SELECT COUNT(*) FROM user WHERE email = ?");
    $kontrol->execute([$email]);
    $kullaniciSayisi = $kontrol->fetchColumn();

    if($kullaniciSayisi > 0){
        echo 'Bu e-posta adresi zaten kullanımda.';
        exit;
    }

    // Kullanıcıyı veritabanına ekleme
    $kayit = $db->prepare("INSERT INTO user(name, passwordd, email) VALUES (?, ?, ?)");
    $kayit->execute([$name, $sifre, $email]);

    if($kayit){
        echo "Kayıt başarılı";
        header("Location: login.php");
        exit;
    } else{
        echo 'Kayıt başarısız';
    }
}
?>
