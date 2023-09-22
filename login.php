<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
  
  <title>Document</title>
</head>
<body>
  <div class="global-container">
    <div class="card login-form">
    <div class="card-body">
      <h3 class="card-title text-center">Oturum Açın</h3>
      <div class="card-text">
        <!--
        <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
        <form action="giris.php" method="POST">
          <!-- to error: add class "has-danger" -->
          <div class="form-group">
            <label for="exampleInputEmail1">Email addresi</label>
            <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" name="mail">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Şifre</label>
            <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" name="pass">
          </div>
          <button type="submit" class="btn btn-primary " name="submit">Giriş</button>
          
          <div class="sign-up">
            Hesabınız yok mu? <a href="register.php">Hemen oluşturun</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  





















  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>