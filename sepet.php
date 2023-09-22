<!DOCTYPE html>
<html lang="en">
<?php
   require 'connect.php';
   if (isset($_GET['sepet'])) {
    header('Location: sepet.php');
    exit();
  }

 


?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="sepet.css">
    <title>Document</title>
</head>
<body>
<?php require 'navbar.php';?>
<main>
   
                       
                            
     <?php   require 'fiyat.php'; ?>                    
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
     <?php


// sepet.php

// Oturumu başlat

// Eğer ürün sepete eklendi ise
if (isset($_POST['sepetEkle'])) {
    // Ürün ID'sini al
    $urunID = $_POST['urunID'];

    // Sepeti kontrol etmek için oturum verilerini kullan
    if (!isset($_SESSION['sepet'])) {
        // Eğer sepet henüz oluşturulmadıysa, yeni bir sepet oluştur
        $_SESSION['sepet'] = array();
    }

    // Ürünü sepete eklemek için tekrarlı kontrol yap
    if (!in_array($urunID, $_SESSION['sepet'])) {
        // Ürün daha önce eklenmemişse, sepete ekle
        $_SESSION['sepet'][] = $urunID;

        $urunAdetIndex = 'urunAdet' . $urunID;

        // Eğer ürün adeti daha önce tanımlanmış ise, artır
        if (isset($_SESSION[$urunAdetIndex])) {
            $_SESSION[$urunAdetIndex]++;
        } else {
            // Ürün adeti daha önce tanımlanmamış ise, 1 olarak ata
            $_SESSION[$urunAdetIndex] = 1;
        }
    }

    // Ana sayfaya yönlendirme yap
    header('Location: home.php');
    exit();
}

?>



<?php
if (isset($_SESSION['sepet']) && count($_SESSION['sepet']) > 0) {
    $toplamFiyat = 0; // Toplam fiyatı başlangıçta sıfıra ayarlayın

    ?>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Ürün</th>
                    <th scope="col">Fiyat</th>
                    <th scope="col">Adet</th>
                    <th scope="col">İşlem</th>
                </tr>
            </thead>
            <tbody>
    <?php
    foreach ($_SESSION['sepet'] as $urunID) {
        // İlgili ürünü veritabanından çekin
        $sql = $db->prepare("SELECT * FROM urun WHERE id=?");
        $sql->execute([$urunID]);
        $urun = $sql->fetch(PDO::FETCH_ASSOC);

        // Ürünün fiyatını sayısal bir değere dönüştürün ve toplam fiyata ekleyin
        $urunFiyat = floatval($urun['fiyat']);
        $urunAdet = $_SESSION['urunAdet' . $urunID] ?? 0;
        $toplamFiyat += $urunFiyat * $urunAdet;

        ?>
        <tr>
            <td>
                <div class="row">
                    <div class="col-md-3 text-left">
                        <img src="<?php echo $urun['resim']; ?>" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow">
                    </div>
                    <div class="col-md-9 text-left mt-sm-2">
                        <h4><?php echo $urun['baslik']; ?></h4>
                        <p class="font-weight-light"><?php echo $urun['icerik']; ?></p>
                    </div>
                </div>
            </td>
            <td><?php echo $urun['fiyat']; ?></td>
           <td>
    <div class="quantity">
        <input type="number" id="urunAdet-<?php echo $urunID; ?>" class="form-control form-control-lg text-center urunAdet" value="<?php echo $_SESSION['urunAdet' . $urunID] ?? 0; ?>" onchange="hesaplaToplam(<?php echo $urunID; ?>)">
        <span>Adet: <?php echo $_SESSION['urunAdet' . $urunID] ?? 0; ?></span>
    </div>
</td>

            <td class="actions">
                <div class="text-right">
                    <form action="sepetKaldir.php" method="POST">
                        <input type="hidden" name="urunID" value="<?php echo $urunID; ?>">
                        <button type="submit" class="btn btn-white border-secondary bg-white btn-md mb-2" name="sepetKaldir">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
            </tbody>
        </table>
        <div class="float-right text-right">
            <h4>Subtotal:</h4>
            <h1><span id="toplamFiyat"><?php echo $toplamFiyat; ?></span>TL</h1> <!-- Toplam fiyatı yazdır -->
        </div>
        <div class="row mt-4 d-flex align-items-center">
       
        <?php if (isset($_SESSION['User']['id'])) : ?>
    <form action="odeme.php" method="post">
        <div class="col-sm-6 order-md-2 text-right">
            <input type="hidden" name="urunID" value="<?php echo $_SESSION['User']['id'] ?>">
            <input type="hidden" name="urunAdet" value="<?php echo $urun['adet']; ?>">
            <input type="hidden" name="urunID" value="<?php echo $urun['id']; ?>">
            <input type="hidden" name="urunName" value="<?php echo $urun['baslik']; ?>">
            
            <!-- Adet değerini gizli input olarak ekleyin -->
            <input type="hidden" name="adet" id="adetInput-<?php echo $urun['id']; ?>" value="<?php echo $_SESSION['urunAdet' . $urun['id']] ?? 0; ?>">
            
            <button type="submit" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Ödeme</button>
        </div>
    </form>
<?php else : ?>
    <p>Kullanıcı girişi yapmadınız.</p>
<?php endif; ?>




            <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                <a href="home.php">
                    <i class="fas fa-arrow-left mr-2"></i> Alışverişe Devam et</a>
            </div>
        </div>
    </div>
  
    <?php
} else {
    // Sepet boş ise, bir mesaj gösterebilirsiniz
    echo "Sepetiniz boş.";
}
?>



</main>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="min.js"></script>
