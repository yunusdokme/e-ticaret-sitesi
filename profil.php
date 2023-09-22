
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="profil.css"> 
  <title>Document</title>
</head>
<body>
<?php require 'navbar.php'; ?>

<?php
 $id=$_GET['id'];
 if(! $id){


 }
   $sql=$db->prepare("SELECT * FROM user WHERE id=?");
   $a=$sql->execute([$id]);

   while($userr=$sql->fetch(PDO::FETCH_ASSOC)){
         
?>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50"><?php echo $userr['email']; ?></span><span> </span></div>
        </div>
              
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Profile Settings</h4>
                            </div>
                            <div class="row mt-2">
                        
                                <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="<?php echo $userr['name'] ;?>" value=""  disabled></div>
                                <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="<?php echo $userr['surname'];?>" disabled></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Mobile Number</label><input type="input" class="form-control" placeholder="<?php echo $userr['number'];?>" value="" disabled></div>
                                <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="<?php echo $userr['address'];?>" value="" disabled></div>
                            
                                
                                
                                <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder=" <?php echo $userr['email']; ?>"  value="" disabled></div>
                                
                            </div>
                            
                        <a href="profupdate.php?id=<?php echo $userr['id'] ?>"> <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Profil Düzenle</button></div></a>
                        <a href="siparis.php?id<?php echo $userr['id'] ?>"> <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Siparişlerim</button></div></a>
                    </div>

                         
                    </div>
       
    </div>
</div>


<?php } ?>
</div>
</div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>