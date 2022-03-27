<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// ketika tombol cari di klik maka akan menampilkan hasil data yang dicari
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KurniawanPHP</title>
</head>

<body>
<style>
     * {
        margin: 0;
      }

.header {
  width: 100%;
  height: 100px;
  background-color:#3f729b;
  
}

.header h1 {
  padding-top: 15px;
  padding-bottom: 0px;
  text-align: left;
  font-size: 50px;
  color: rgb(252, 252, 252);
  font-family:'Times New Roman', Times, serif;
  
}

.footer {
          width: 100%;
          height: 50px;
          padding-left: 0px;
          padding-right: 0px;
          line-height: 50px;
          background-color: #3f729b;
          position: absolute;
          bottom: 0px;
          right: 0px;
    }
    .social-media-button {
        border: none;
        color: #FFFFFF;
        /* WHITE */
        font-size: 16px;
        padding: 0.5em 1em;
      }
      .social-media-button.instagram {
        background: red;
      }



</style>
<style>
    html{
        background-image: url("img/bg1.jpg");
    }
</style>

    <h1 align=center>
     <p style = "font-family:courier,times new roman,helvetica;">
DAFTAR MAHASISWA
</p>
    </h1>
    <h4 align=center>
    <a href="tambah.php">
    <button style="background-color:white; border-color:blue; color:blue"><p class="fw-bold">TAMBAH DATA.</p>
    </button>
        </a>
    </h4>
    <h1 align=center>
    <form action="" method="POST">
        <input type="text" name="keyword" size="40" autofocus placeholder="Cari data yang diinginkan.." autocomplete="off">
        <button style="background-color:red; border-color:red; color:white" type="submit" name="cari"> Search</button>
    </form>
    </h1>

    <br>

    <table align="center" border="10" cellpadding="10" cellspacing="0">
        <thead style= "background-color: #0dcaf0">

        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Photo</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Jurusan</th>
            <th>Email</th>
        </tr>
</thead>
    <h4 align=center>
    <a href="logout.php"> LOG OUT</a>
    </h4>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <thead style= "background-color: #87CEEB">
            <tr>

                <td> <?= $i; ?> </td>

                <td>
                    <a href="ubah.php?id=<?php echo $row["id"]; ?>">Ubah</a> |
                    <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Yakin Ingin Menghapus Data');  ">Hapus</a>
                </td>
                <td><img src="img/<?php echo $row["gambar"] ?>" width="50"></td>
                <td><?php echo $row["nama"] ?></td>
                <td><?php echo $row["npm"] ?></td>
                <td><?php echo $row["jurusan"] ?></td>
                <td><?php echo $row["email"] ?></td>
            </tr>
        </thead>

            <?php $i++; ?>
        <?php endforeach; ?>

    </table>

    <div class="footer">
          <h10 style="color:white;"> Copyright||Kurniawan
          <div style="float:left">&copy; <?php echo date("Y"); ?> </div> </h10>
          <div style="float:right">
               <a href="https://www.instagram.com/wannn_x7/"><button type="button"
                         class="social-media-button icon instagram">my instagram</button> </a>
          </div>
</body>

</html>