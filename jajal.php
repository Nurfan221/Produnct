<?php
    session_start();
    require "../koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<style>
    .main{
        height: 100vh;
    }
    .login-box{
        width: 500px;
        height: 500px;
        box-sizing: border-box;
        border-radius: 10px;
    }
</style>
<body>
    <div class="main d-flex flex-column justify-content-center align-items-center">
        <div class="login-box p-5 shadow">
            <form action="" method="post">
                <div>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <!-- img src coming from php script on folder images/-->
                <div class="form-group">
                    <td>Captcha<br>
                        <img src='captcha.php' />
                    </td>
                        <label class="small mb-1" for="inputPassword">Captcha</label>
                        <input class="form-control py-4" name="captcha_code" type="text" placeholder="Enter captcha" />
                </div>
                <div>
                    <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">Login</button>
                </div>
            </form>
        </div>

        <div class="mt-3" style="width:500px">
            <?php
                if(isset($_POST['loginbtn'])){
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);
                    $captcha = htmlspecialchars($_POST['captcha_code']);
                    
                    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
                    $countdata = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);
                     

                    if($username=='' || $password=='' || $captcha=''){
                        ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            username, pass dan captcha wajib diIsi! 
                        </div>
                        <meta http-equiv="refresh" content="2; url=login.php" />
                        <?php
                    }
                    else{
                        if ($countdata>0){
                            if($password == $data['password']){
                                if($_POST['captcha_code']== $_SESSION['captcha_code']){
                                    $_SESSION['login'] = true;
                                    header('location: index.php');
                                }
                                else{
                                    ?>
                                        <div class="alert alert-warning mt-3" role="alert">
                                            username, password atau captcha ada yang salah 
                                            <?php echo "<a href='login.php'>Kembali</a>";?>
                                        </div>
                                    <?php
                                }
                            }
                        }
                    }
                    
                }
                
            ?>
        </div>
    </div>
    
</body>
</html>