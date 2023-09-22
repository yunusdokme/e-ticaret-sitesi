<?php require 'connect.php';?>


<div class="container">
    <form class="d-flex my-3" method="GET" action="magaza.php">
        <input class="form-control me-2" type="text" name="search">
        <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        <button class="btn btn-primary" type="submit">Ara</button>
    </form>
</div>
