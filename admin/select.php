<?php
require '../connect.php';
require 'admin.php';


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

    <h2>Ürün listesi</h2>
   

    <table>
        <tr>
            <th>Başlık</th>
            <th>İçerik</th>
            <th>Fiyat</th>
            <th>Stok</th>
        </tr>

        <?php
        $listeleme = $db->query("SELECT * FROM urun")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($listeleme as $liste) {
            ?>
            <tr>
                <td><?php echo $liste['baslik']; ?></td>
                <td><?php echo $liste['icerik']; ?></td>
                <td><?php echo $liste['fiyat']; ?></td>
                <td><?php echo $liste['stok']; ?></td>
                <td>
                    <form method="POST" action="delete.php">
                        <input type="hidden" name="urun_id" value="<?php echo $liste['id']; ?>">
                        <button type="submit" class="btn btn-danger" name="submit">SİL</button>
                    </form>
                </td>
            
            </tr>
            <?php
        }
        ?>

    </table>
</main>
