<?php
 //menghubungkan ke function.php 
 require 'functions.php';
 $book = query ("SELECT * FROM buku");

//tombol search diklik
if ( isset($_POST["cari"]) ) {
    $book = cari($_POST["keyword"]);

}


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pinjaman Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>

<body>

    <div class="container-fluid">
        <div class="card text-center">
            <div class="card-header" style="background-color:#007bff; color:white;">
                <h1>Daftar Buku Pinjaman</h1>
            </div>
        </div>

        <br>
        <div class="col">
            <a class="btn btn-primary btn-lg" href="tambah.php" float:right;>Tambah Data Buku</a>
        </div>
        <br>

        <form action="" method="post" class="form-row">
            <div class="col-5" style="margin-left:15px;">
                <input type="text" name="keyword" id="" class="form-control" placeholder="Search here" autocomplete="off">
            </div>
            <button type="submit" name="cari" class="btn btn-primary" style="margin-left:15px;">Search</button>
        </form>
        <br>

        <table border="1" cellpadding="10" cellspacing="0" class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Kategori</th>
                </tr>
            </thead>

            <?php $i = 1; ?>
            <?php foreach ($book as $row) : ?>

            <tr>
                <th scope="row">
                    <?= $i ?>
                </th>
                <td>
                    <a href="edit.php?id=<?= $row["id"] ?>">Edit</a> |
                    <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Apa kamu yakin ingin menghapus?');">Delete</a>
                </td>
                <td><img src="img/<?= $row["cover"] ?>" height="100"></td>
                <td>
                    <?= $row["judul"] ?>
                </td>
                <td>
                    <?= $row["penulis"] ?>
                </td>
                <td>
                    <?= $row["penerbit"] ?>
                </td>
                <td>
                    <?= $row["kategori"] ?>
                </td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>


        </table>

        <br>
        <div class="card text-center">
            <div class="card-footer" style="background-color:#007bff; color:white;">
                <footer>Copyright 2019 - Khoirul Asfian</footer>
            </div>
        </div>

    </div>
</body>

</html>