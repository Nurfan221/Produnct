<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
        .error {
            color: #FF0000;
            font-size: 15px;
        }
    </style>


    <title>Daftar</title>
</head>

<body>


    <!-- cek daftar -->
    <?php
    $check = 0;
    $namaErr = $nohpErr = $emailErr = $usernameErr = $passErr = "";
    $nama = $nohp = $email = $username = $pass = "";
    $tesvalidnama = $tesvalidnohp = $tesvalidemail = $tesvalidusername = $tesvalidpass = "FALSE";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $namaErr = "Name is required";
        } else {
            $nama = test_input($_POST["nama"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
                $namaErr = "Only letters and white space allowed";
            } else {
                $tesvalidnama = "TRUE";
            }
        }

        if (empty($_POST["nohp"])) {
            $nohpErr = "No HP is required";
        } else {
            $nohp = test_input($_POST["nohp"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[0-9 ]*$/", $nohp)) {
                $nohpErr = "No HP is Only number";
            }
            if (strlen($nohp) < 10 || strlen($nohp) > 14) {
                $nohpErr = "No HP need 10-14 karakter number";
            } else {
                $tesvalidnohp = "TRUE";
            }
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            } else {
                $tesvalidemail = "TRUE";
            }
        }
        if (empty($_POST["username"])) {
            $usernameErr = "username is required";
        } else {
            $username = test_input($_POST["username"]);

            $cekdb = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
            $jumlah = mysqli_num_rows($cekdb);

            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-z0-9]*$/", $username)) {
                $usernameErr = "don't use spaces and kapital karakter";
                $tesvalidusername = "FALSE";
            }
            if ($jumlah > 0) {
                $usernameErr = "username is ready";
                $tesvalidusername = "FALSE";
            } else {
                $tesvalidusername = "TRUE";
            }
        }

        if (empty($_POST["password"])) {
            $passErr = "Pass is required";
        } else {
            $pass = test_input($_POST["password"]);
            $tesvalidpass = "TRUE";
        }
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($tesvalidnama == "TRUE" && $tesvalidnohp == "TRUE" && $tesvalidemail == "TRUE" && $tesvalidusername == "TRUE" && $tesvalidpass == "TRUE") {
        $sendnama = $nama;
        $sendnohp = $nohp;
        $sendemail = $email;
        $sendusername = $username;
        $sendpass = $pass;
        $sqlttambah = "INSERT INTO user (nama_user,username,password,email,no_hp) VALUES ('$sendnama','$sendusername','$sendpass','$sendemail','$sendnohp')";
        $addaccount = mysqli_query($conn, $sqlttambah);
        if ($addaccount) {
            echo '<script>
                    $(document).ready(function(){
                        $("#exampleModal").modal("show");
                    });
                </script>';
        } else {
            echo 'gagal';
        }
    }
    ?>



    <div class="contaianer">

        <!-- menu daftar -->
        <div class="menudaftar">

            <div class="daftar">

                <h1>Sign up</h1>

                <div class="tmbldaftar">

                    <div class="fbk">
                        <div class="fbgambar">
                            <img src="gambar/fb.png" alt="">
                        </div>

                        <div class="fbnama">
                            Daftar Dengan Facebook
                        </div>

                    </div>

                    <div class="googlek">
                        <div class="googlegambar">
                            <img src="gambar/google.png" alt="">
                        </div>

                        <div class="goolenama">
                            Daftar Dengan Facebook
                        </div>

                    </div>

                    <div class="garis">
                        <hr class="garis1" size="1px">Atau
                        <hr class="garis2" size="1px">
                    </div>


                </div>

            </div>

            <!-- login  -->

            <div class="login">

                <div class="login1">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="formlogin">
                            <p><span class="error">* required field.</span></p>
                            <p id="namef"><b>Nama </b><span class="error">* <?php echo $namaErr; ?></span></p>
                            <input class="inputlogin" type="text" name="nama" id="flogin" placeholder="Masukkan Nama" value="<?php echo $nama; ?>" require>
                            <br>
                            <p id="namef"><b>No Handphone </b><span class="error">* <?php echo $nohpErr; ?></span></p>
                            <input class="inputlogin" type="number" name="nohp" id="flogin" placeholder="Masukkan No Handphone" value="<?php echo $nohp; ?>" require>
                            <br>
                            <p id="namef"><b>E-mail </b><span class="error">* <?php echo $emailErr; ?></span></p>
                            <input class="inputlogin" type="text" name="email" id="flogin" placeholder="Masukkan E-mail" value="<?php echo $email; ?>">
                            <br>
                            <p id="namef"><b>Username </b><span class="error">* <?php echo $usernameErr; ?></span></p>
                            <input class="inputlogin" type="text" name="username" id="flogin" placeholder="Masukkan Username" maxlength="25" value="<?php echo $username; ?>" require>
                            <br>
                            <p id="namef"><b> Password </b><span class="error">* <?php echo $passErr; ?></span></p>
                            <input class="inputlogin" type="password" name="password" id="psw" placeholder="Masukkan Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" require>
                            <br><br><br>


                            <!-- Untuk Validasi Inputan Password -->
                            <div id="message">
                                <table width="100%">
                                    <tr>
                                        <td>
                                            <p id="letter" class="invalid"> A <b>lowercase</b> letter </p>
                                        </td>
                                        <td style="width:20px ;"> </td>
                                        <td>
                                            <p id="capital" class="invalid"> A <b>capital (uppercase)</b> letter</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p id="number" class="invalid"> A <b>number</b></p>
                                        </td>
                                        <td style="width:20px ;"> </td>
                                        <td>
                                            <p id="length" class="invalid"> Minimum <b>8 characters</b></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <br><br><br>
                        <button class="button-73" type="submit" name="daftar" id="btnlogin">DAFTAR</button>

                        <p class="punya" style="float:left;">Sudah Punya akun ? </p>
                        <!-- Button trigger modal -->
                        <a class="login1" href="login.php" style="margin-left:160px;">Login</a>



                    </form>
                </div>





            </div>


        </div>
        <div class="namaweb">
            <img src="gambar/logo.png" alt="">

            <div class="tulisan">
                <p class="tulisan1">Costumer Obsesison.</p>
                <p>Di sini kami percaya bahwa pelanggan harus menjadi prioritas utama.</p>
                <p>Kami ada untuk memberikan yang terbaik bagi anda</p>
            </div>


            <div class="lingkaran2"> </div>
            <div class="lingkaran1"></div>

        </div>
        <!-- Untuk Validasi Inputan Password -->
        <script>
            var myInput = document.getElementById("psw");
            var letter = document.getElementById("letter");
            var capital = document.getElementById("capital");
            var number = document.getElementById("number");
            var length = document.getElementById("length");

            // When the user clicks on the password field, show the message box
            myInput.onfocus = function() {
                document.getElementById("message").style.display = "block";
            }

            // When the user clicks outside of the password field, hide the message box
            myInput.onblur = function() {
                document.getElementById("message").style.display = "none";
            }

            // When the user starts to type something inside the password field
            myInput.onkeyup = function() {
                // Validate lowercase letters
                var lowerCaseLetters = /[a-z]/g;
                if (myInput.value.match(lowerCaseLetters)) {
                    letter.classList.remove("invalid");
                    letter.classList.add("valid");
                } else {
                    letter.classList.remove("valid");
                    letter.classList.add("invalid");
                }

                // Validate capital letters
                var upperCaseLetters = /[A-Z]/g;
                if (myInput.value.match(upperCaseLetters)) {
                    capital.classList.remove("invalid");
                    capital.classList.add("valid");
                } else {
                    capital.classList.remove("valid");
                    capital.classList.add("invalid");
                }

                // Validate numbers
                var numbers = /[0-9]/g;
                if (myInput.value.match(numbers)) {
                    number.classList.remove("invalid");
                    number.classList.add("valid");
                } else {
                    number.classList.remove("valid");
                    number.classList.add("invalid");
                }

                // Validate length
                if (myInput.value.length >= 8) {
                    length.classList.remove("invalid");
                    length.classList.add("valid");
                } else {
                    length.classList.remove("valid");
                    length.classList.add("invalid");
                }
            }
        </script>

</body>

</html>