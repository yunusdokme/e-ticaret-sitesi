<?php  
require 'connect.php';

session_start();
ob_start();


// sepet.php

// Sepetin kaldırılması için POST isteğini kontrol edin
if (isset($_POST['sepetKaldir'])) {
    $urunID = $_POST['urunID'];

    // İlgili ürünü sepetten kaldırma işlemini yapın

    // Örnek olarak, sepet dizisinden ilgili ürünü çıkarabilirsiniz
    if (($key = array_search($urunID, $_SESSION['sepet'])) !== false) {
        unset($_SESSION['sepet'][$key]);
    }

    // Ürün adedini de sıfırlayabilirsiniz
    unset($_SESSION['urunAdet' . $urunID]);

    // Kaldırma işleminden sonra gerekli yönlendirmeyi yapabilirsiniz
    header("Location: sepet.php");
    exit();
}



?>