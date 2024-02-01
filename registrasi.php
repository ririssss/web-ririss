<?php
include 'koneksi.php';
if(isset($_POST['submit'])){
  $nama_pembeli = $_POST['nama_pembeli'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $no_telepon = $_POST['no_telepon'];
  $alamat = $_POST['alamat'];
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


  $query=mysqli_query($koneksi, "INSERT INTO pembeli(nama_pembeli,username,password,email,no_tlpn,alamat) values('$nama_pembeli','$username','$password','$email','$no_telepon','$alamat')");
  if($query>0){
    header('Location: index.php');
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

    <center>
    <main class="container border p-md-6 p-2">
<form method="POST" class="row g-3">
  <div class="col-md-6">
    <label for="inputUsername4" class="form-label">Username</label>
    <input type="text" class="form-control" id="inputEmail4" name="username">
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Password</label>
    <input type="password" class="form-control" id="inputPassword4" name="password">
  </div>


  <div class="col-12">
    <label for="inputName" class="form-label">Name</label>
    <input type="text" class="form-control" id="Name" placeholder="Nama" name="nama_pembeli">
  </div>


  <div class="col-12">
    <label for="inputEmail" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail" name="email">
  </div>


  <div class="col-md-6">
    <label for="inputNoTelepon" class="form-label">No Telepon</label>
    <input type="text" class="form-control" id="inputCity" name="no_telepon">
  </div>


  <div class="col-md-4">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text"   class="form-control" id="inputAddress" name="alamat">
    </select>
  </div>

  <div class="col-md-4">
    <label for="inputFoto" class="form-label">Foto</label>
    <input type="file"   class="form-control" id="inputAddress" name="Foto">
    </select>
  </div>

  <div class="col-12">
    <button type="submit" name="submit" class="btn btn-primary">Sign up</button>
  </div>
  </center>
</form>
</main>
</body>
</html>

