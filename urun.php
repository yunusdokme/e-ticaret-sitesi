<html lang="en">
<?php
   require 'connect.php';

session_start();
ob_start();

?>

<head>
  <title>Harvest vase</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="urun.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-lite">
    <div class="container-fluid ">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link  aa " aria-current="page" href="home.php">ANASAYFA</a>
          </li>
          <?php
                    $sql = $db->prepare("SELECT * FROM sayfa ");
                    $a = $sql->execute();

                    while ($sqlCek = $sql->fetch(PDO::FETCH_ASSOC)) {
                ?>
          <li class="nav-item">
            <a class="nav-link aa" href="#"><?php echo $sqlCek['baslik'];?></a>
          </li>
          <?php } ?>
          </ul>   
          
       
          <?php if(isset($_SESSION['User'])){ ?>
                         <a href="sepet.html"> <button type="button" class="btn btn-primary">SEPET</button></a>
                         &nbsp

                        <button type="sumbit" class="btn btn-primary me-2">kullanici</button>
                        
                        <a href="cikis.php" class="btn btn-danger">Çıkış</a>
                    <?php } else{ ?>
                        <form action="login.php" method="POST">
                            <button type="sumbit" class="btn btn-primary">GİRİŞ</button>
                        </form>
           <?php }?>
      
       
      </div>
    </div>
  </nav>
<!-- navbar bitti-->
<?php
        $id=$_GET['id'];
        if(! $id){
          header('Location:home.php');
        }

           $sql = $db->prepare("SELECT * FROM urun WHERE id=?");
           $a = $sql->execute([$id]);
  
           while($sqldet=$sql->fetch(PDO::FETCH_ASSOC)){
          
            ?>

  <div class="wrapper">
    <div class="product-img">
      <img src="<?php echo $sqldet['resim'] ?>" height="420" width="327">
    </div>
    <div class="product-info">
      <div class="product-text">
        <h1> <?php echo $sqldet['baslik'] ?></h1>
        
        <p> <?php echo $sqldet['icerik'] ?> </p>
      </div>
      <div class="product-price-btn">
        <p><?php echo $sqldet['fiyat'] ?></p><br><br>
       <a href="sepet.php?id"> <button type="button">Satın Al</button></a>
      </div>
    </div>
  </div>
<?php } ?>
</body>

</html>