<?php
   require 'connect.php';
   require 'navbar.php';
?>

<body>

<?php
        $id=$_GET['id'];
        if(! $id){
          header('Location:home.php');
        }

           $sql = $db->prepare("SELECT * FROM urun WHERE id=?");
           $a = $sql->execute([$id]);
  
           while($sqldet=$sql->fetch(PDO::FETCH_ASSOC)){
          
            ?>
    <div class="container my-5">
            <div class="row">
                <div class="col-md-5">
                    <div class="main-img">
                        <img class="img-fluid" src="<?php echo $sqldet['resim'] ?>" alt="ProductS">
                        <div class="row my-3 previews">
                            <div class="col-md-3">
                                <img class="w-100" src="<?php echo $sqldet['resim'] ?>" alt="Sale">
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="main-description px-2">
                        
                        <div class="product-title text-bold my-3">
                        <h1> <?php echo $sqldet['baslik'] ?></h1>
                        <p> <?php echo $sqldet['icerik'] ?> </p>

                        </div>


                        <div class="price-area my-4">
                        
                            <p class="new-price text-bold mb-1"><?php echo $sqldet['fiyat'] ?></p>
                        

                        </div>


                        <div class="buttons d-flex my-5">
                    
                         <div class="block">
                            <form action="sepet.php" method="POST">
                                <input type="hidden" name="sepetEkle" value="1">
                                <input type="hidden" name="urunID" value="<?php echo $sqldet['id']; ?>">
                                <button type="submit" class="shadow btn custom-btn">SAtın Al</button>
                            </form>
                        </div>


                            <div class="block quantity">
                                <input type="number" class="form-control" id="cart_quantity" value="1" min="0" max="5" placeholder="Enter email" name="cart_quantity">
                            </div>
                        </div>




                    </div>

                    <div class="product-details my-4">
                        
                        <p class="description"> </p>
                    </div>
                
                
                </div>
            </div>
        </div>







        </div>
        <?php } ?>














        <div class="d-flex flex-column col-md-8">
    <?php
    $urunId = $_GET['id'];
    $yorum= $db->prepare("SELECT yorum.*, user.name, surname FROM yorum INNER JOIN user ON yorum.kullanici_id=user.id WHERE yorum.urun_id = ? ORDER BY yorum.tarih DESC");
    $yorum->execute([$urunId]);

    while ($row = $yorum->fetch(PDO::FETCH_ASSOC)) {
        $name = $row['name'];
        $surname = $row['surname'];
        $icerik = $row['yorum_metni'];
        $tarih = $row['tarih'];
    ?>
        <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
            <div class="commented-section mt-2">
                <div class="d-flex flex-row align-items-center commented-user">
                    <h5 class="mr-2"><?php echo $name.' '.$surname; ?></h5>
                    <span class="dot mb-1"></span>
                    <span class="mb-1 ml-2"><?php echo $tarih; ?></span>
                </div>
                <div class="comment-text-sm">
                    <span><?php echo $icerik; ?></span>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<div class="coment-bottom bg-white p-2 px-4">
    <?php if (isset($_SESSION['User'])): ?>
        <form action="yorum.php?id=<?php echo $_GET['id']; ?>" method="post">
            <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                <input type="text" class="form-control mr-3" placeholder="Add comment" name="icerik">
                <button class="btn btn-primary" type="submit" name="submit">Comment</button>
            </div>
        </form>
    <?php endif; ?>
</div>


    </div>
    </div>
    </div>
    </div>







        <?php 

        require 'footer.php';
        ?>
</body>