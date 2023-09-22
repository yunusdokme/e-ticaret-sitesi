<!DOCTYPE html>
<?php
   require 'connect.php';


?>



<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="app.css">
  <title>Document</title>
</head>

<body>
<?php require 'navbar.php'; ?>

<ul class="nav justify-content-center">
    <?php
    $kat = $db->prepare("SELECT * FROM kategori ");
    $a = $kat->execute();

    while ($katCek = $kat->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="magaza.php?id=<?php echo $katCek['id']; ?>"><?php echo $katCek['name']; ?></a>
        </li>
    <?php
    }
    ?>
</ul>

   <?php require 'search.php'; ?>


  <hr>
  <?php
require 'connect.php';

$kategori_id = isset($_GET['id']) ? $_GET['id'] : '';
$kelime = isset($_GET['search']) ? $_GET['search'] : '';

// Kategori ID kontrolü
if (empty($kategori_id)) {
    echo "Hata: Kategori ID belirtilmemiş veya geçersiz.";
    exit;
}

// Veritabanı sorgusu için arama koşulu oluşturma
$arama = ($kelime != '') ? "AND urun.baslik LIKE '%$kelime%'" : '';

// Ürünleri getir
$sql = $db->prepare("SELECT urun.*, kategori.name AS name FROM urun LEFT JOIN kategori ON urun.kat_id = kategori.id WHERE urun.kat_id = ? $arama");
$sql->execute([$kategori_id]);

$urunler = $sql->fetchAll(PDO::FETCH_ASSOC);

// Ürün kontrolü
if (empty($urunler)) {
    echo "Hata: Ürün bulunamadı.";
    exit;
}
?>

<!-- Sayfa içeriği -->
<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row">
            <?php foreach ($urunler as $urun) { ?>
                <div class="col-md-4">
                    <div class="card mb-4 box shadow">
                        <div>
                            <img style="height: 150px;width: 150px; margin-left: 130px;" src="<?php echo $urun['resim']; ?>" class="card-img-top" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 style="text-align:center;" class="card-title"><?php echo $urun['baslik']; ?></h5>
                            <p style="text-align:center;" class="card-text text-truncate">
                                <?php echo $urun['icerik']; ?>
                            </p>
                        </div>
                        <form action="sepet.php" method="post">
                            <div class="card-footer">
                                <strong style="font-size:20px;"><?php echo $urun['fiyat']; ?></strong>
                                <a style="float:right; margin-left:20px" href="uruntest.php?id=<?php echo $urun['id']; ?>">
                                    <button type="button" class="btn btn-primary">Satın Al</button>
                                </a>
                                <?php if(isset($_SESSION['User'])): ?>
                                    <input type="hidden" name="urunID" value="<?php echo $urun['id']; ?>">
                                    <button style="float:right;" type="submit" class="btn btn-primary" name="sepetEkle">Sepete Ekle</button>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>



<?php require 'footer.php'; ?>