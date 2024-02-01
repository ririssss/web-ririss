<?php
 session_start();
 $koneksi = mysqli_connect("localhost","root","","toko_kue");
  if (isset($_POST["add"])){
    if (isset($_SESSION["cart"])){
      $item_array_id = array_column($_SESSION["cart"],"id_produk");
      if(!in_array($_GET['id'],$item_array_id)){
        $count = count($_SESSION['cart']);
        $item_array = array(
          'id_produk' => $_GET["id"],
          'item_name' => $_POST["hidden_name"],
          'product_price' => $_POST["hidden_price"],
          'item_quantity' => $_POST["stok"],
        );
        $_SESSION["cart"][$count] = $item_array;
        echo '<script>alert("produk berhasil ditambah ke keranjang")</script>';
        echo '<script>window. location="keranjang.php"</script>';

      }else{
        echo '<script>alert("produk sudah ada dikeranjang")</script>';
        echo '<script>window. location="keranjang.php"</script>';
      }
    }else{
      $item_array = array(
        'id_produk' => $_GET["id"],
          'item_name' => $_POST["hidden_name"],
          'product_price' => $_POST["hidden_price"],
          'item_quantity' => $_POST["stok"],
      );
      $_SESSION["cart"][0] = $item_array;
      echo '<script>alert("produk berhasil ditambahkan")</script>';
      echo '<script>window. location="keranjang.php"</script>';
    }
  }
  
  if(isset($_GET["action"])){
    if($_GET["action"]=="delete"){
      foreach ($_SESSION["cart"] as $keys =>$value){
        if ($value["id_produk"]==$_GET["id"]){
          unset($_SESSION["cart"]["$keys"]);
          echo '<script>alert("produk sudah dihapus")</script>';
          echo '<script>window. location="keranjang.php"</script>';

        }

      }
     
    }elseif($_GET['action'] == "beli"){
      $total = 0;
      foreach($_SESSION["cart"] as $key => $value){
        $total = $total + ($value["item_quantity"] * $value["product_price"]);
      }


      $query = mysqli_query($koneksi, "INSERT INTO transaksi (tanggal_transaksi,total_harga) values ('".date("Y-m-d" )."','$total')");
      $id_trans = mysqli_insert_id($koneksi);

      foreach($_SESSION["cart"] as $key => $value){
        $id_produk = $value['id_produk'];
        $qty = $value['item_quantity'];
        $sql = "INSERT INTO detail (id_trans,id_produk,qty) values ('$id_trans', '$id_produk','$qty')";
        $res = mysqli_query($koneksi, $sql); 
      }
      unset($_SESSION["cart"]);
          echo '<script>alert("Terima kasih sudah berbelanja")</script>';
          echo "<script>window.location='nota.php?id=".$id_trans."'</script>";
    }
    }
  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="script src= https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <!--navbar--> 
<main class="container border p-md-6 p-2">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand">Keranjang</a>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </nav>
</main>

<!--table keranjang-->
<main class="container border p-md-6 p-2">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nama Barang</th>
      <th scope="col">Qty</th>
      <th scope="col">Harga Barang</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Aksi</th>
      


    </tr>
  </thead>
  <tbody class="table-group-divider">
   <?php
   if(!empty($_SESSION["cart"])){
    $total = 0;
    foreach ($_SESSION["cart"]as $key => $value){
      ?>
      <tr>
        <td><?=$value["item_name"]?></td>
        <td><?=$value["item_quantity"]?></td>
        <td><?=$value["product_price"]?></td>
        <td>
          Rp <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?>
        </td>
        <td><a href="keranjang.php?action=delete&id=<?php echo $value["id_produk"]; ?>"></span
        class="text-danger">Hapus</span></a>
        </td>
    </tr>
    <?php
    $total = $total + ($value["item_quantity"] * $value["product_price"]);
    }

    ?>
    
    <tr>
      <td colspan="3" align="right">Grand total</td>
      <th align="right">Rp.<?php echo number_format($total,2);?></th>
      <td> <a href="keranjang.php?action=beli&id=<?php echo $value['id_produk']; ?>" class="btn btn-outline-success" type="submit" name="beli">checkout</a></td>
    </tr>
    <?php
    

    }
    ?>
   
  
    
  </tbody>
</table>
</main>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="script src= https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>