<?php 
require '../connect.php';


if (isset($_POST['submit'])) {
    $urun_id = $_POST['urun_id'];
    $sorgu = $db->prepare("DELETE FROM urun WHERE id = ?");
    $silme = $sorgu->execute([$urun_id]);

    if ($silme) {
        
        header('Location: select.php');
    } else {
        echo "Ürün silme işlemi başarısız oldu.";
    }
}


?>