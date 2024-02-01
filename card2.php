<?php
include 'koneksi.php';
$query= "SELECT * FROM produk where id_produk='$_GET[id]'";
$result = mysqli_query($koneksi, $query);
$data=mysqli_fetch_array($result);
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
<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?=$data['foto'];?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
    <form method="post" action="keranjang.php?id=<?=$data["id_produk"]?>">
      <div class="card-body">
        <h5 class="card-title"><h3><?=$data['nama_produk'];?></h3></h5>
        <p class="card-text"><h6><?=$data['deskripsi_makanan'];?></h6></p>
        <span class="ms-auto teks-danger fw-bold d-block teks-center"><h6>Rp.<?=$data['harga'];?></span>
        <input type="number" name="stok" value="1">&ensp;
        <input type="hidden" name="hidden_name" value="<?=$data['nama_produk']?>">
        <input type="hidden" name="hidden_price" value="<?=$data['harga']?>">
        <input type="submit" name="add" class="btn btn-outline-success" value="Cart"></a>&ensp;
        <!-- <a href="checkout.php?id=<?=$data['id_produk'];?>" class="btn btn-outline-success" type="submit">Beli</a>&ensp; -->
      </div>
    </form>
    </div>
  </div>
</div>
</main>
</center>
</body>
</html>
