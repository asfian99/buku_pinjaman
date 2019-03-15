<?php
    require ("functions.php");

    //ambil data dari url
    $id = $_GET["id"];

    //query data mahasiswa berdasarkan id
    $bukuku = query("SELECT * FROM buku WHERE id = $id")[0];

    //cek apakah tombol submit sudah ditekan
    if (isset($_POST["submit"])) {

        //cek apakah data berhasil diedit atau tidak
        if ( edit($_POST) > 0 ) {
            echo "
                <script>
                    alert('Data Berhasil Diedit!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    aler('Data Gagal Diedit!');
                    document.location.href = 'index.php';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Data Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>

<body>
<div class="container-fluid">
    <div class="card-header">
        <h1 align="center">Edit Data Buku</h1>
    </div>
    <br>

    <form action="" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value=" <?= $bukuku ["id"];?> " >
        <input type="hidden" name="coverlama" value=" <?= $bukuku ["cover"];?> " >

        <div class="form-group-row">
            <label for="judul" class="col-sm-2 col-form-label">Judul Buku : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="judul" id="judul" value="<?= $bukuku ["judul"];?>">
            </div>
        </div>

        <div class="form-group-row">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="penulis" id="penulis" value="<?= $bukuku ["penulis"];?>">
            </div>
        </div>

        <div class="form-group-row">
            <label for="penerbit" class="col-sm-2 col-form-label">Penerbit : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="penerbit" id="penerbit" value="<?= $bukuku ["penerbit"];?>">
            </div>
        </div>

        <div class="form-group-row">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="kategori" id="kategori" value="<?= $bukuku ["kategori"];?>">
            </div>
        </div>

        <div class="form-group-row">
            <label for="cover" class="col-sm-2 col-form-label">Cover : </label>
                <div class="col-sm-5">
                    <div class="form-control">
                        <input type="file" style="margin-top:-3px;" class="form-control-file" name="cover" id="cover">
                        <!-- <label class="custom-file-label" for="cover">Choose file</label> -->
                    </div>
                </div> <br>
                <img src="img/<?= $bukuku["cover"]; ?>" height = "100" style="margin-left:15px;"> <br>        
        </div>
        

        <div class="form-group-row">
            <br>
            <div class="col-sm-5">
                <button type="submit" name="submit" class="btn btn-primary"> Simpan </button>
            </div>
        </div>

    </form>


</div>
</body>

</html>