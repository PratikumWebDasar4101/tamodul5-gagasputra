<html>
    <head>
        <title> DATAKU</title>
        <link rel="stylesheet" href="style.css">
    </head>
</html>
<?php
    session_start();
    @$database = $_SESSION['database'];
?>
<table border=1; style="border-spacing: 0; width:100%; text-align: center;" ;>
    <center><h2> Dataku </h2></center>
    <hr>
    <div id="tombol">
        <a href="registrasi.php"><input type="button" value="Tambah Data"></a>
        <a href="login.php?logout=iya"><input type="button" value="LOGOUT"></a>
    </div>
    <tr>
        <th style="padding: 5px;"> No. </th>
        <th style="width: 18%; padding: 5px;"> Nama </th>
        <th style="width: 10%; padding: 5px;"> NIM </th>
        <th style="width: 18%; padding: 5px;"> Email </th>
        <th style="width: 10%; padding: 5px;"> Jenis Kelamin </th>
        <th style="width: 10%; padding: 5px;"> Fakultas </th>
        <th style="width: 18%; padding: 5px;"> Program Studi </th>
        <th style="width: 10%; padding: 5px;"> Hobby </th>
        <th style="width: 20%; padding: 5px;"> Gambar </th>
    </tr>
        <?php
            for ($i=0; $i < count($database); $i++) {
        ?>
    <tr>
        <td><?php echo $i+1,"."; ?>
        </td>
        <td><?php echo $database[$i]['nama']; ?>
        </td>
        <td><?php echo $database[$i]['nim']."<br>"; ?>
        </td>
        <td><?php echo $database[$i]['email']."<br>"; ?>
        </td>
        <td><?php echo $database[$i]['jenis_kelamin']."<br>"; ?>
        </td>
        <td><?php echo $database[$i]['fakultas']."<br>"; ?>
        </td>
        <td><?php echo $database[$i]['prodi']."<br>"; ?>
        </td>
        <td>
            <?php 
                for ($j=0; $j < count($database[$i]['hobby']) ; $j++) { 
                    echo $database[$i]['hobby'][$j]."<br>";
                }
            ?>
        </td>
        <td>
            <center>
                <img src="<?php echo $database[$i]['file'];?>" width= 60%;>
            </center>
        </td>
    </tr>
        <?php
            }
        ?>
</table>

