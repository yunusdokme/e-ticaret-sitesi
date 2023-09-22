<?php
require '../connect.php';
require 'admin.php';


?>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}




.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div>
       

    <div class="container">
  <form action="sqlkayit.php" method="post">
    <label for="fname">Başlık</label>
    <input type="text" id="fname" name="baslik" placeholder="Your name..">

    <label for="lname">İçerik</label>
    <input type="text" id="lname" name="icerik" placeholder="Your last name..">

    <label for="country">Kategori</label>
    <select id="country" name="kategori_id">
      <?php
      // Kategori verilerini veritabanından alın
      // Örnek olarak, kategori tablosundan verileri alıyorum
      // ve döngü ile seçenekleri oluşturuyorum
      $kategoriler = $db->query("SELECT * FROM kategori")->fetchAll(PDO::FETCH_ASSOC);
      foreach($kategoriler as $kategori) {
          echo '<option value="' . $kategori['id'] . '">' . $kategori['name'] . '</option>';
      }
      ?>
    </select>

    <label for="subject">Fiyat</label>
    <input id="subject" name="fiyat" placeholder="Write something.." type="text">
    <label for="subject">Stok</label>
    <input id="subject" name="stok" placeholder="Write something.." type="text">
    <label for="subject">Resim</label>
    <input id="subject" name="resim" placeholder="Write something.." type="text">
    <button type="submit" name="submit" class="btn btn-success">Success</button>
  </form>
</div>

     </main>