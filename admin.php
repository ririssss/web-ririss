<?php
    include 'koneksi.php';
    if(isset($_GET['aksi'])){
        if($_GET['aksi']=='edit'){
            $result = mysqli_query($koneksi,"SELECT * FROM pembeli WHERE id_pembeli='$_GET[id_pembeli]'");
            while($data = mysqli_fetch_array($result)){
                $nama_pembeli= $data['nama_pembeli'];
                $username= $data['username'];
                $password= $data['password'];
                $email= $data['email'];
                $alamat= $data['alamat'];
                $no_tlpn= $data['no_tlpn'];
                $foto= $data['foto'];
                
            }
        }elseif($_GET['aksi'] == "hapus"){
            $hapus = mysqli_query ($koneksi,"DELETE FROM pembeli WHERE id_pembeli='$_GET[id_pembeli]'");
             if($hapus){
                header("Location: admin.php");
            }

        }
    }
    //menyimpan data yang di edit

    if(isset($_POST['login']))
    if($_GET['aksi']=="edit"){
        $id_pembeli = $_GET['id_pembeli'];
        $nama_pembeli = $_POST['nama_pembeli'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email= $_POST['email'];
        $alamat= $_POST['alamat'];
        $no_tlpn= $_POST['no_telepon'];
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

        $edit = mysqli_query($koneksi, "UPDATE pembeli set nama_pembeli='$nama_pembeli', username='$username', password='$password', email='$email', alamat='$alamat', no_tlpn='$no_tlpn', foto='$foto' where id_pembeli='$id_pembeli'");

        if($edit > 0){
            header("Location: admin.php");
        }
    }else{
        //menyimpan data baru
        $nama_pembeli =$_POST['nama_pembeli'];
        $username =$_POST['username'];
        $password =$_POST['password'];

        $result = mysqli_query($koneksi, "INSERT INTO pembeli(id_pembeli,nama_pembeli,username,password,foto) values('$id_pembeli','$nama_pembeli','$username','$password','$foto'");
        if($result > 0){
            header("Location: admin.php");
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
          <a class="navbar-brand">Halaman Admin</a>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>&ensp;
            <a href="barang.php" class="btn btn-outline-success" type="submit">Barang</a>&ensp;
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
            <td> nama pembeli </td>
            <td> <input type="text" name="nama_pembeli" value="<?=@$nama_pembeli?>"> </td>
        </tr>
        <tr>
            <td> username </td>
            <td> <input type="text" name="username" value="<?=@$username?>"> </td>
        </tr>
        <tr>
            <td> password </td>
            <td> <input type="password" name="password" value="<?=@$password?>"> </td>
        </tr>
        <tr>
        <td> email </td>
            <td> <input type="text" name="email" value="<?=@$email?>"> </td>
        </tr>
        <tr>
            <td> alamat </td>
            <td> <input type="text" name="alamat" value="<?=@$alamat?>"> </td>
        </tr>
        <tr>
        <td> No Telepon </td>
            <td> <input type="text" name="no_telepon" value="<?=@$no_tlpn?>"> </td>
        </tr>
        <tr>
            <td> foto </td>
            <td> <input type="file" name="foto" value="<?=@$foto?>"> </td>
        </tr>
                
    </table>
    <input type="submit" name="login" value="login">
</form><br>
    </main>
</center>

<!--table-->
<main class="container border p-md-6 p-2">
<table class="table">
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama Pembeli</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Email</th>
      <th scope="col">Alamat</th>
      <th scope="col">No Telepon</th>
      <th scope="col">Foto</th>
      <th scope="col">Aksi</th>
    </tr>
</main>
  </thead>
  <tbody>


  <?php
    include 'koneksi.php';
    $no=1;
    $query = mysqli_query($koneksi, "SELECT * FROM pembeli");
    while($data=mysqli_fetch_array($query)){
        echo"<tr>";
        echo"<td>".$no; $no++."</td>";
        echo"<td>".$data['nama_pembeli']."</td>";
        echo"<td>".$data['username']."</td>";
        echo"<td>".$data['password']."</td>";
        echo"<td>".$data['email']."</td>";
        echo"<td>".$data['alamat']."</td>";
        echo"<td>".$data['no_tlpn']."</td>";
        echo"<td>".$data['foto']."</td>";
        echo"<td><a href='admin.php?aksi=edit&id_pembeli=".$data['id_pembeli']."'>edit</a></td>";
        echo"<td><a href='admin.php?aksi=hapus&id_pembeli=".$data['id_pembeli']."'>hapus</a></td>";
        echo"</tr>";
    }
    ?>
 
</body>
</html>