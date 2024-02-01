<?php
    include 'koneksi.php';
    if(isset($_GET['aksi'])){
        if($_GET['aksi']=='edit'){
            $result = mysqli_query($koneksi,"SELECT * FROM produk WHERE id_produk='$_GET[id_produk]'");
            while($data = mysqli_fetch_array($result)){
                $jenis_produk= $data['jenis_produk'];
                $id_produk= $data['id_produk'];
                $nama_produk= $data['nama_produk'];
                $harga= $data['harga'];
                $stok= $data['stok'];
                $foto= $data['foto'];
                $deskripsi_makanan= $data['deskripsi_makanan'];
                
            }
        }elseif($_GET['aksi'] == "hapus"){
            $hapus = mysqli_query ($koneksi,"DELETE FROM produk WHERE id_produk='$_GET[id_produk]'");
             if($hapus){
                header("Location: barang.php");
            }

        }
    }
    //menyimpan data yang di edit

    if(isset($_POST['masukan']))
    if($_GET['aksi']=="edit"){
        $jenis_produk = $_POST['jenis_produk'];
        $id_produk = $_POST['id_produk'];
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok= $_POST['stok'];
        $foto= $_POST['foto'];
        $deskripsi_makanan= $_POST['deskripsi_makanan'];
        $foto= $_FILES['foto'] ['name'];
        $ekstensi1 = array('png','jpg','jpeg');
        $x = explode('.',$foto);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto']['tmp_name'];
        if(in_array($ekstensi, $ekstensi1) === true){
            move_uploaded_file($file_tmp, 'img/'.$foto);
        }else{
            echo "<script> alert('ekstensi tidak diperbolehkan')</script>";
        }

        $edit = mysqli_query($koneksi, "UPDATE produk set jenis_produk='$jenis_produk', id_produk='$id_produk', nama_produk='$nama_produk', harga='$harga', stok='$stok',foto='$foto', deskripsi_makanan='$deskripsi_makanan' where id_produk='$id_produk'");

        if($edit > 0){
            header("Location: barang.php");
        }
    }else{
        //menyimpan data baru
        $jenis_produk=$_POST['jenis_produk'];
        $id_produk=$_POST['id_produk'];
        $nama_produk =$_POST['nama_produk'];
        $harga =$_POST['harga'];
        $stok =$_POST['stok'];
        $foto =$_FILES['foto'];
        $deskripsi_makanan =$_POST['deskripsi_makanan'];



        $result = mysqli_query($koneksi, "INSERT INTO produk(jenis_produk,id_produk,nama_produk,harga,stok,foto,deskripsi_makanan) values('$jenis_produk','$id_produk','$nama_produk','$harga','$stok','$foto','$deskripsi_makanan'");
        if($result > 0){
            header("Location: barang.php");
        }
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflre.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="script src= https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <!--navbar-->
    <main class="container border p-md-6 p-2">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand">Barang</a>
          <form class="d-flex" role="search">
            <a href="index.php" class="btn btn-outline-success" type="submit">Index</a>&ensp;
            <a href="admin.php" class="btn btn-outline-success" type="submit">Back</a>
          </form>
        </div>
      </nav>
</main>

    <!--form-->
    <center>
    <main class="container border p-md-6 p-2">
<form action="" method="POST" enctype="multipart/form-data">
    <table width="25%" border=0>
    <tr>
            <td> jenis produk </td>
            <td> <input type="text" name="jenis_produk" value="<?=@$jenis_produk?>"> </td>
        </tr>
        <tr>
            <td> id produk </td>
            <td> <input type="text" name="id_produk" value="<?=@$id_produk?>"> </td>
        </tr>
        <tr>
            <td> nama produk </td>
            <td> <input type="text" name="nama_produk" value="<?=@$nama_produk?>"> </td>
        </tr>
        <tr>
        <td> harga </td>
            <td> <input type="text" name="harga" value="<?=@$harga?>"> </td>
        </tr>
        <tr>
            <td> stok </td>
            <td> <input type="text" name="stok" value="<?=@$stok?>"> </td>
        </tr>
        <tr>
        <td> foto </td>
            <td> <input type="file" name="foto" value="<?=@$foto?>"> </td>
        </tr>
        <tr>
            <td> deskripsi makanan </td>
            <td> <input type="text" name="deskripsi_makanan" value="<?=@$deskripsi_makanan?>"> </td>
        </tr>
                
    </table>
    <input type="submit" name="masukan" value="masukan">
</form><br>
    </main>
</center>

<!--table-->
<main class="container border p-md-6 p-2">
<table class="table">
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">jenis produk</th>
      <th scope="col">id produk</th>
      <th scope="col">nama produk</th>
      <th scope="col">harga</th>
      <th scope="col">stok</th>
      <th scope="col">foto</th>
      <th scope="col">deskripsi makanan</th>
      <th scope="col">Aksi</th>
      <th scope="col">Aksi</th>
    </tr>
</main>
  </thead>
  <tbody>


  <?php
    include 'koneksi.php';
    $no=1;
    $query = mysqli_query($koneksi, "SELECT * FROM produk");
    while($data=mysqli_fetch_array($query)){
        echo"<tr>";
        echo"<td>".$data['jenis_produk']."</td>";
        echo"<td>".$data['id_produk']."</td>";
        echo"<td>".$data['nama_produk']."</td>";
        echo"<td>".$data['harga']."</td>";
        echo"<td>".$data['stok']."</td>";
        echo"<td>".$data['foto']."</td>";
        echo"<td>".$data['deskripsi_makanan']."</td>";
        echo"<td><a href='barang.php?aksi=edit&id_produk=".$data['id_produk']."'>edit</a></td>";
        echo"<td><a href='barang.php?aksi=hapus&id_produk=".$data['id_produk']."'>hapus</a></td>";
        echo"</tr>";
    }
    ?>
 
</body>
</html>