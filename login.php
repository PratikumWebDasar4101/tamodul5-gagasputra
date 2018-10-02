<html>
    <head>
        <title> Login </title>
        <link rel="stylesheet" href="style.css">
    </head>
</html>
<?php
session_start();
$akun = array(
    array("user","user"));  
    if (@$_SESSION['berhasil'])
        header("location: registrasi.php");
    if (@$_GET['logout']) {
        session_destroy();
        header("location: login.php");
    }
?>
<form method="post" class="login">
    <input type="text" name="username" placeholder="Username"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <input type="submit" name="kirim" value="LOGIN" id="kirim"> 
</form>
<?php
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cek=0;
        for ($i = 0; $i < count($akun); $i++) { 
            if ( $akun[$i][0] == $username && $akun[$i][1] == $password) {
                header("location: registrasi.php");
                $_SESSION['berhasil']="Berhasil";
                $cek=1;
            }
        }
            if ($cek == 0) {
                ?>
                <script type="text/javascript">
                alert("Username/Password salah");
                </script>
                <?php
            }
        }
?>
