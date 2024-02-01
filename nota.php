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

  <?php
  $koneksi = mysqli_connect("localhost","root","","toko_kue");
  $id = $_GET['id'];
  $trans = "SELECT * FROM detail
  inner join transaksi on detail.id_trans = transaksi.id_trans
  where detail.id_trans='$id'";
  $query = mysqli_query($koneksi, $trans);
  $data = mysqli_fetch_array($query);
  ?>
  <main class="container border p-md-6 p-2">
  <div style="clear: both"></div>
  <h3 class="title2">Nota pembelian</h3>
  <div class="Table-responsive">
    <table class="table table-bordered">
      No. Invoice : INV-<?=$id?> <br>
      tanggal_pembelian: <?=$data['tanggal_transaksi']?>
    </table>
  </main>
  </div>
  <main class="container border p-md-6 p-2">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nama barang</th>
      <th scope="col">Qty</th>

    </tr>
  </thead>
</main>


<?php
$produk = "SELECT * FROM detail
inner join produk on detail.id_produk = produk.id_produk
where detail.id_trans='$id'";
$query2 = mysqli_query($koneksi,$produk);
while($row = mysqli_fetch_array($query2)){ ?>
        <tr>
          <td><?=$row["nama_produk"]?></td>
          <td><?=$row["qty"]?></td>
        </tr>
        <?php } ?>
        <tr>
          <td align="right">Grand total</td>
          <td>Rp<?php echo number_format($data['total_harga'], 2); ?></td>
        </tr>
</table>
<script>window.print();</script>
</body>
</html>


