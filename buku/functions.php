<?php
    //connect ke database
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

  function query ($query)  {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;

  }


  function tambah ($datatambah) {
    global $conn;
    //ambil data dari tiap elemen form
    $judul = htmlspecialchars($datatambah["judul"]);
    $penulis = htmlspecialchars($datatambah["penulis"]);
    $penerbit = htmlspecialchars($datatambah["penerbit"]);
    $kategori = htmlspecialchars($datatambah["kategori"]);

    //upload cover

    $cover = upload();
    if ( !$cover ) {
      return false;
    }

    //query insert data
    $query = "INSERT INTO buku
                VALUE
                ('', '$judul', '$penulis', '$penerbit', '$kategori', '$cover')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }


  function upload () {

      $namefile = $_FILES['cover']['name'];
      $ukuranfile = $_FILES['cover']['size'];
      $error = $_FILES['cover']['error'];
      $tmpname = $_FILES['cover']['tmp_name']; 

        if ($error === 4) {
          echo "<script>
                  alert ('Cover Belum Terpilih!');
                </script>";
          return false;
        }

        //cek apakah yang diupload gambar
        $extCoverValid = ['jpg', 'jpeg', 'png'];
        $extCover = explode('.', $namefile);
        $extCover = strtolower(end($extCover));
        
        if ( !in_array($extCover, $extCoverValid) ) {
          echo "<script>
                  alert ('Hanya mendukung file jpg, jpeg, dan png!');
                </script>";
          return false;

        }

      //cek jika ukurannya terlalu besar
        if ($ukuranfile > 500000) {
          echo "<script>
                  alert ('Ukuran file terlalu besar, maksimal 500 kB!');
                </script>"; 
          return false;

        }

      $namafileNew = uniqid();
      $namafileNew .= '.';
      $namafileNew .= $extCover;

      move_uploaded_file($tmpname, 'img/' . $namafileNew);

      return  $namafileNew;



  }


  function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");

    return mysqli_affected_rows($conn);
  }


  function edit($dataedit) {
    global $conn;
    
    $id = $dataedit["id"];
    //ambil data dari tiap elemen form
    $judul = htmlspecialchars($dataedit["judul"]);
    $penulis = htmlspecialchars($dataedit["penulis"]);
    $penerbit = htmlspecialchars($dataedit["penerbit"]);
    $kategori = htmlspecialchars($dataedit["kategori"]);
    $cover_lama = htmlspecialchars($dataedit["coverlama"]);
    
    if ($_FILES['cover']['error'] === 4) {
      $cover = $cover_lama;
    } else {
      $cover = upload();
    }

    //query update data
    $query = "UPDATE buku SET
                judul = '$judul',
                penulis = '$penulis',
                penerbit = '$penerbit',
                kategori = '$kategori',
                cover = '$cover'
              WHERE id = $id
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }

 
  function cari($keyword) {
      $query = "SELECT * FROM buku WHERE 
                judul LIKE '%$keyword%' OR
                penulis LIKE '%$keyword%' OR
                penerbit LIKE '%$keyword%' OR
                kategori LIKE '%$keyword%' 
      ";

      return query($query);

  }


?>