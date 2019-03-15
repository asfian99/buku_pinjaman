<?php
    require ("functions.php");
    //cek apakah tombol submit sudah ditekan
    if (isset($_POST["submit"])) {

        //cek apakah data berhasil ditambahkan atau tidak
        if ( tambah($_POST) > 0 ) {
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Ditambahkan!');
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
    <title>Tambah Data Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>

<body>

    <div class="card-header">
        <h1 align="center">Tambah Data Buku</h1>
    </div>
    <br>

    <form action="" method="post" enctype="multipart/form-data" >

        <div class="form-group-row">
            <label for="judul" class="col-sm-2 col-form-label">Judul Buku : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="judul" id="judul" required>
            </div>
        </div>

        <div class="form-group-row">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="penulis" id="penulis" required>
            </div>
        </div>

        <div class="form-group-row">
            <label for="penerbit" class="col-sm-2 col-form-label">Penerbit : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="penerbit" id="penerbit" required>
            </div>
        </div>

        <div class="form-group-row">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori : </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="kategori" id="kategori">
            </div>
        </div>
        
        <div class="form-group-row">
            <label for="cover" class="col-sm-2 col-form-label">Cover : </label>
                <div class="col-sm-5">
                    <div class="form-control">
                        <input type="file" style="margin-top:-3px;" class="form-control-file" name="cover" id="cover">
                        <!-- <label class="custom-file-label" for="cover">Choose file</label> -->
                    </div>
                </div>
        </div>

        
        <!-- <div class="form-group-row">
            <label for="cover" class="col-sm-2 col-form-label">Cover : </label>
                <div class="col-sm-5">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="cover" id="cover">
                        <label class="custom-file-label" for="cover">Choose file</label>
                    </div>
                </div>
        </div> -->

        <div class="form-group-row">
            <br>
            <div class="col">
                <button type="submit" name="submit" class="btn btn-primary"> Tambah Data </button>
            </div>
        </div>

    </form>

</body>

</html>