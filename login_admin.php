<?php
session_start();
include "koneksi.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | PRODUNCH</title>
  <link rel="stylesheet" href="style/style2.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body id="bg-login" style="   background-image: url(gambar/background.jpg) ;">

  <!-- captcha -->

  <div class="content">
    <img class="logo" src="gambar/logo.png" alt="">


    <div class="box-Login" style="    background-image: url(gambar/bacground.jpg) ;">
      <h2>Login</h2>
      <form action="" method="POST">


        <div class="group">
          <input type="text " name="user" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Username</label>
        </div>
        <div class="group">
          <input type="password " name="pass" required>
          <span class="highlight"></span>
          <span class="bar"></span>
          <label>Password</label>
        </div>

        <input type="submit" name="submit" value="Login" class="btn btn-danger">
      </form>
      <?php
      if (isset($_POST['submit'])) {
        $username = htmlspecialchars($_POST['user']);
        $password = htmlspecialchars($_POST['pass']);

        $query = mysqli_query($conn, "SELECT * FROM admin1 WHERE username='$username' AND password = '$password'");
        $countdata = mysqli_num_rows($query);
        $data = mysqli_fetch_array($query);
        $d = mysqli_fetch_object($query);
        $_SESSION['status_login'] = true;
        $_SESSION['a_global'] = $d;
        $_SESSION['admin'] = $d->admin_id;


        if ($countdata > 0) {
          if ($username == $data['username']) {
            if ($password == $data['password']) {
              echo '<script>window.location="dasboard_admin.php"</script>';
            } else {
              echo '<script>alert("Username atau password salah!")</script>';
            }
          }
        }
      }




      ?>
    </div>
  </div>
</body>

</html>