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
          
          <div class="card-text">
            
           
                  <form  action="kayit.php" method="POST">
                    <div class="form-group">
                      <label for="user"> Adı</label>
                      <input type="text" class="form-control form-control-sm" id="user" aria-describedby="emailHelp" name="name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email </label>
                      <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Şifre</label>
                      <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" name="sifre">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Şifre tekrar</label>
                      
                      <input type="password" class="form-control form-control-sm" id="exampleInputPassword1" name="sifre-tekrar">
                    </div>
                    <button type="submit" class="btn btn-primary " name="kayit" >Kayıt Ol</button>
                    
                    <div class="sign-up">
                    
                    </div>
                  </form>
           </div>
        </div>
    </div>
  </div>
  
</body>





















  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>