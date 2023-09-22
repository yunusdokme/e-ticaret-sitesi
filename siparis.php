<?php
require 'connect.php';
require 'navbar.php';

?>

<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
</head>


<body>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <h2>Siparişlerim</h2>
   

    <table>
        <tr>
            <th>Başlık</th>
            <th>İçerik</th>
            <th>Alış Tarihi</th>
            
        </tr>

<?php
        if (!isset($_SESSION['User']['id'])) {
    // Kullanıcı giriş yapmamış, yönlendirme yapabilirsiniz
    header("Location: login.php");
    exit;
}

// Giriş yapmış kullanıcının kimlik bilgilerini alın
$userId = $_SESSION['User']['id'];

// Giriş yapmış kullanıcının sipariş geçmişini getirme işlemini gerçekleştirin
$listeleme = $db->prepare("SELECT gecmis.*, urun.icerik FROM gecmis
            INNER JOIN urun ON gecmis.urun_id = urun.id
            WHERE gecmis.user_id = :userId");
$listeleme->bindParam(':userId', $userId, PDO::PARAM_INT);
$listeleme->execute();

while ($liste = $listeleme->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <tr>
        <td><?php echo $liste['urun_name']; ?></td>
        <td><?php echo $liste['icerik']; ?></td>
        <td><?php echo $liste['alis_tarihi']; ?></td>
    </tr>
    <?php
}
?>

    </table>


    <?php  
    require 'footer.php';
    ?>