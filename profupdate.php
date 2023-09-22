<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="profil.css"> 
  <title>Document</title>
    <title>Document</title>
</head>
<body>
<?php require 'navbar.php'; 

// Veritabanı bağlantısını burada gerçekleştirin


$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    //header('Location: home.php');
}

$query = $db->prepare("SELECT * FROM user WHERE id=?");
$query->execute([$id]);

$guncel = $query->fetch(PDO::FETCH_ASSOC);

if (!$guncel) {
    echo 'Listeleme başarısız';
    exit;
}

if ($guncel['id'] == $_SESSION['User']['id']) {
    if (isset($_POST['submit'])) {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $surname = isset($_POST['surname']) ? $_POST['surname'] : '';
        $number = isset($_POST['number']) ? $_POST['number'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';

        $errors = array();

        if (empty($name)) {
            $errors[] = 'İsminizi giriniz';
        }

        if (empty($surname)) {
            $errors[] = 'Soyadınızı giriniz';
        }

        if (empty($number)) {
            $errors[] = 'Telefon numaranızı giriniz';
        }

        if (empty($address)) {
            $errors[] = 'Adresinizi giriniz';
        }

        if (empty($email)) {
            $errors[] = 'Emailinizi giriniz';
        }

        if (empty($errors)) {
            $sorgu = $db->prepare("UPDATE user SET name=?, surname=?, number=?, address=?, email=? WHERE id=?");
            $guncelle = $sorgu->execute([$name, $surname, $number, $address, $email, $guncel['id']]);

            if ($guncelle) {
                header('Location: home.php');
                exit;
            } else {
                echo 'Güncelleme başarısız';
            }
        } else {
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
        }
    }
} else {
    echo 'Bu kullanıcıyı güncelleme yetkiniz yok';
    exit;
}
?>

<form method="POST" action="#">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right"></div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" name="name" value="<?php echo $guncel['name']; ?>"></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" placeholder="surname" name="surname" value="<?php echo $guncel['surname']; ?>"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" name="number" value="<?php echo $guncel['number']; ?>"></div>
                        <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" name="address" value="<?php echo $guncel['address']; ?>"></div>
                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" name="email" value="<?php echo $guncel['email']; ?>"></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button></div>
                </div>
            </div>
        </div>
    </div>
</form>


</div>
</div>
</body>
</html>