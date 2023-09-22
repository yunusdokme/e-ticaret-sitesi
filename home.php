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



  <hr>
<br><br>
  <main>
<div class="container mt-1"> 
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      </div>

      <!-- The slideshow/carousel -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://samsung-akinon.b-cdn.net/cms/2023/01/27/a4432744-d294-4a65-a956-448912d01d95.jpg" alt="Los Angeles" class="d-block" style="width:100%">
        </div>
        <div class="carousel-item">
          <img src="https://samsung-akinon.b-cdn.net/cms/2023/01/27/a4432744-d294-4a65-a956-448912d01d95.jpg" alt="Chicago" class="d-block" style="width:100%">
        </div>
        <div class="carousel-item">
          <img src="https://samsung-akinon.b-cdn.net/cms/2023/01/27/a4432744-d294-4a65-a956-448912d01d95.jpg" alt="New York" class="d-block" style="width:100%">
        </div>
      </div>

      <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
      </div>

      <div class="container-fluid mt-3">

      </div>
</div>
<br><br><br>


  <div class="album py-5 bg-body-tertiary">               
    
  <div class="container ">

  <div class="row ">

  <?php

    $urun = $db->prepare("SELECT * FROM urun");
    $urun->execute();


while ($urunCek = $urun->fetch(PDO::FETCH_ASSOC)) {
?>
    <div class="col-md-4">
        <div class="card mb-4 box shadow">
            <div>
                <!-- <span class="badge bg-success card-badge">New</span> -->
                <img style="height: 150px; width: 150px; margin-left: 130px;" src="<?php echo $urunCek['resim']; ?>" class="card-img-top" alt="CArd image cap">
            </div>
            <div class="card-body">
                <h5 style="text-align: center;" class="card-title"><?php echo $urunCek['baslik']; ?></h5>
                <p style="text-align: center;" class="card-text text-truncate">
                    <?php echo $urunCek['icerik']; ?>
                </p>
            </div>
            <form action="sepet.php" method="post">
                <div class="card-footer">
                    <strong style="font-size: 20px;"><?php echo $urunCek['fiyat']; ?></strong>
                    <a style="float: right; margin-left: 20px" href="uruntest.php?id=<?php echo $urunCek['id']; ?>">
                        <button type="button" class="btn btn-primary">Satın Al</button>
                    </a>
                    <?php if (isset($_SESSION['User'])) : ?>
                        <input type="hidden" name="urunID" value="<?php echo $urunCek['id']; ?>">
                        <button style="float: right;" type="submit" class="btn btn-primary" name="sepetEkle">Sepete Ekle</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>



  
  </main>
  
  <div class="b-example-divider"></div>

  
<?php

require 'footer.php';
?>














  <!-- JavaScript Bundle with Popper -->
  
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
  </script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
 