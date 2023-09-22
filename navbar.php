<!DOCTYPE html>
<?php
require 'connect.php';

session_start();
ob_start();

if (isset($_GET['sepet'])) {
  header('Location: sepet.php');
  exit();
}
?>

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
  <link rel="stylesheet" href="uruntest.css">
  <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link aa" aria-current="page" href="home.php">ANASAYFA</a>
        </li>
        <?php
        // $sql = $db->prepare("SELECT * FROM sayfa ");
        // $a = $sql->execute();

         ?>
      </ul>

  

      <?php if (isset($_SESSION['User'])) { ?>
        <?php
        if (isset($_SESSION['sepet']) && count($_SESSION['sepet']) > 0) {
          $sepetUrunSayisi = count($_SESSION['sepet']);
          ?>
          <form action="sepet.php" method="get">
            <button type="submit" class="btn btn-primary">SEPET (<?php echo $sepetUrunSayisi; ?>)</button>
          </form>
        <?php
        } else {
          ?>
          <form action="sepet.php" method="get">
            <button type="submit" class="btn btn-primary">SEPET (0)</button>
          </form>
        <?php
        }
        ?>

        &nbsp;
        <a href="profil.php?id=<?php echo $_SESSION['User']['id']; ?>">
          <button type="submit" class="btn btn-primary me-2">kullanici</button>
        </a>
        <a href="cikis.php" class="btn btn-danger">Çıkış</a>
      <?php } else { ?>
        <form action="login.php" method="POST">
          <button type="submit" class="btn btn-primary">GİRİŞ</button>
        </form>
      <?php } ?>
    </div>
  </div>
</nav>

</body>