<!DOCTYPE html>
<html>
<head>
    <title> Registrasi </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2> REGISTRASI </h2>
    <div class="input">
        <form method="POST" enctype="multipart/form-data">
            <div id="utama">
                    NIM     : <hr><input type="text" name="nim" pattern="\d*" maxlength="10"> <br><br>
                    Nama    : <hr><input type="text" name="nama" maxlength="25"> <br><br>
                    Email   : <hr><input type="email" name="email"> <br><br>
                    Jenis Kelamin :
                    <input type="radio" name="jenis_kelamin" id="radio" value="Laki-Laki" > Laki-Laki 
                    <input type="radio" name="jenis_kelamin" id="radio" value="Perempuan" > Perempuan <br><br>
            </div>    
            <div id="dropdown">
                    Fakultas : <hr><select name="fakultas" id="fakultas" required><br>
                    <option value="FTE"> FTE </option>
                    <option value="FIF"> FIF </option>
                    <option value="FRI"> FRI </option>
                    <option value="FEB"> FEB </option>
                    <option value="FKB"> FKB </option>
                    <option value="FIK"> FIK </option>
                    <option value="FIT"> FIT </option>
                    </select> <br><br>
                    Program Studi : <hr><select name="prodi" id="prodi" required><br>
                    <option value="Manajemen Informatika"> Manajemen Informatika </option>
                    <option value="Teknik Telekomunikasi"> Teknik Telekomunikasi </option>
                    <option value="Teknik Informatika"> Teknik Informatika </option>
                    <option value="Teknik Komputer"> Teknik Komputer </option>
                    <option value="Manajemen Pemasaran"> Manajemen Pemasaran </option>
                    <option value="Perhotelan"> Perhotelan </option>
                    <option value="Komputerisasi Akuntansi"> Komputerisasi Akuntansi </option>
                    <option value="Sistem Multimedia"> Sistem Multimedia </option>
                    </select> <br>
            </div>
            <div id="pertama">
                    <div id="judul"> Hobby : </div><br><hr>
                    <input type="checkbox" name="hobby[]" value="Membaca"> Membaca <br>
                    <input type="checkbox" name="hobby[]" value="Mewarnai"> Mewarnai <br>
                    <input type="checkbox" name="hobby[]" value="Melukis"> Melukis <br>
                    <input type="checkbox" name="hobby[]" value="Mengarang"> Mengarang <br>
                    <input type="checkbox" name="hobby[]" value="Bermain Game"> Bermain Game <br><br>
            </div>
            <div id="seterusnya">
                    Gambar : <hr>
                    <input type="file" name="file" id="file"> <br><br>
            </div>
            <input type="submit" value="KIRIM" id="submit">
        </form>
    </div>
</body>
</html>

<?php
    session_start();

    if(isset($_POST['nim'])) {

        $foto = $_FILES['file']['name'];
        $tmp_foto = $_FILES['file']['tmp_name'];
        $dir = "foto/";
        $target = $dir.$foto;

        if (!move_uploaded_file($tmp_foto, $target)) {
            die ("Upload Gagal!");
        }

        $cek = count($_SESSION['database']);
        $_SESSION['database'][$cek] = array("nama" => $_POST['nama'], "nim" => $_POST['nim'], "email" => $_POST['email'], "jenis_kelamin" => $_POST['jenis_kelamin'], "fakultas" => $_POST['fakultas'], "prodi" => $_POST['prodi'], "hobby" => $_POST['hobby'], "file" => $target);

        header("Location: output.php");
    }
?>
