<?php
require 'connect.php';
session_start();

if (isset($_POST['submit'])) {
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    // Alanların boş olup olmadığını kontrol etme
    if (empty($mail) || empty($pass)) {
        echo 'Lütfen tüm alanları doldurun.';
        exit;
    }

    $statement = $db->prepare("SELECT * FROM user WHERE email = ? AND passwordd = ?");
    $statement->execute([$mail, $pass]);
    $user = $statement->fetch();

    if ($statement->rowCount() > 0) {
        if ($user['email'] === 'admin@gmail.com' && $user['passwordd'] === '123456789') {
            $_SESSION['User'] = array(
                'email' => $user['email'],
                'passwordd' => $user['passwordd'],
                'id' => $user['id']
            );
            header('Location: admin/admin.php');
            exit;
        } else {
            $_SESSION['User'] = array(
                'email' => $user['email'],
                'passwordd' => $user['passwordd'],
                'id' => $user['id']
            );
            header('Location: home.php');
            exit;
        }
    } else {
        echo 'Kullanıcı bilgileri hatalı.';
    }
}
?>
