<?php
include 'koneksipegasus.php';
if(isset($_SESSION['email'])) {
    echo"<script> alert('Anda Sudah Login');</script>";
    echo"<script> location='homepage.php'; </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="widht=device-widht, initial-scale=1">
    <title> LOGIN | Pegasus</title>
    <link rel="stylesheet" type="text/css" href="asset/asset/css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
    <div class="container">
      <center><h2>Log In</h2>
        <div class="underline-title"></div>
      </center>
      <form action="koneksi.php?proses_login" method="POST">
        <div class="form-group">
            <label>Username</label>
            <input type ="text" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type ="password" class="form-control" name="pass" placeholder="Password">
        </div>
        <br>
            <button type="submit" class="btn btn-outline-primary">Login</button>
        </br>
        <br>
            <p> Belum punya akun?
                <a href="registrasiakun.php">Daftar di sini</a>
            </p>
        </br>
      </form>
    </div>

<script type="text/javascript" src="tubes/assets/bootstrap"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>