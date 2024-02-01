<?php
//include 'koneksi.php';
//session_start();
//if(isset($_POST['getStok'])){
  //  $stok = $_POST['stok'];
    //$harga = $_POST['harga'];
    //$_SESSION['total'] = $harga * $stok;
    //$_SESSION['quantity']= $stok;
//}
//if(isset($_POST['beli'])){
  //  $nama = $_POST['nama'];
    //$query = mysqli_query($koneksi, "INSERT INTO transaksi(id_produk,qty,total_harga) VALUES ('$_SESSION[id]', $_SESSION[quantity], $_SESSION[total]");
    //$lst_id = mysqli_insert_id($koneksi);
    //header("location: struk.php?id_transakski=$lst_id");
//}
?>

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
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflre.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="script src= https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
<main class="container border p-md-6 p-2">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <center>
          <a class="navbar-brand">Payment</a>
          </center>
          </form>
        </div>
      </nav>
</main>
<main class="container border p-md-6 p-2">
<div class="container mb-5 mt-5">
    <div class="row text-center">
        <div class="col-md-12 col-lg-12">
            <div class="row text-muted">
                <div class="h2 col-12">Information Payment</div>
                <div class="col-lg-12 col-md-12 dashhead-subtitle h6 text-capitalize text-muted">
                    <span id="viewCart" >Cart</span> &#187; <span id="viewInformation">Information</span> &#187; <span id="viewShipping">Shipping</span> &#187; <span id="payment" > <span id="enterpayment" class="text-warning">Enter Payment Card Info</span> &#187; <span id="confirm" >Confirm</span> </span>
                </div>
            </div>
        </div>
    </div>
    <div id="pnlCreditCardSection" class="mt-5">
        <div class="mx-auto">
            <div class="row justify-content-center">
                <div class="col-9 my-4 py-1">
                    <h2 class="text-center">Credit &amp; Debit Cards Information</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-7 mt-3 mt-lg-0 text-center mx-auto">

                <!--Name-->
                <div class="row mb-4">
                        <div class="col-lg-1 col-md-1"></div>
                        <div class="col-lg-3 col-md-3 col-12 text-left">
                            <span class="text-muted recorddetaillabel mr-1">Name *</span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-right text-sm-left">
                            <div class="row">
                                <div class="col-12 pr-1">
                                    <div class="input-group">
                                        <div class="w-100" aria-label="Card Number" aria-describedby="card-number-logo">
                                            <input type="text" class="center-block form-control" id="Name" required/><br>
                                        </div>
                                                  
                
                

                    <!--Hosted Field for CC number-->
                    <div class="row mb-4">
                        <div class="col-lg-1 col-md-1"></div>
                        <div class="col-lg-3 col-md-3 col-12 text-left">
                            <span class="text-muted recorddetaillabel mr-1">Card Number *</span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-right text-sm-left">
                            <div class="row">
                                <div class="col-12 pr-1">
                                    <div class="input-group">
                                        <div class="w-100" aria-label="Card Number" aria-describedby="card-number-logo">
                                            <input type="number" class="center-block form-control" id="card-number" required/>
                                        </div>
                                        <div id="card-logo" class="pt-2 mx-2 input-group-append">
                                            <img alt="card image" src="https://files.readme.io/9018c4f-Visa.png" height="20px" id="card-number-logo">
                                        </div>
                                    </div>
                                    <span class="helper-text text-left" id="ccn-help"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Hosted Field for CC EXP-->
                    <div class="row mb-4">
                        <div class="col-lg-1 col-md-1"></div>
                        <div class="col-lg-3 col-md-3 col-12 text-left">
                            <span class="text-muted recorddetaillabel mr-1">Exp. Date *</span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-right text-sm-left">
                            <div class="row">
                                <div class="col-12 pr-1">
                                    <div class="input-group">
                                        <div class="mr-2" data-bluesnap="exp">
                                            <input type="date" value="2022-01-01" min="2000-01-01" class="center-block form-control" id="exp-date"/>
                                        </div>
                                    </div>
                                    <span class="helper-text text-left" id="exp-help"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Hosted Field for CC CVV-->
                    <div class="row mb-4">
                        <div class="col-lg-1 col-md-1"></div>
                        <div class="col-lg-3 col-md-3 col-12 text-left">
                            <span class="text-muted recorddetaillabel mr-1">Security Code *</span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 text-lg-right text-md-right text-right text-sm-left">
                            <div class="row">
                                <div class="col-12 pr-1">
                                    <div class="input-group">
                                        <div class="mr-2" data-bluesnap="cvv">
                                            <input type="text" class="center-block form-control" id="cvv" required/>
                                        </div>
                                    </div>
                                    <span class="helper-text text-left" id="cvv-help"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div>
        <a href="card2.php?id=<?=$data['id_produk'];?>" class="btn btn-outline-success" type="submit">Back</a>&ensp;
            <a href="nota.php?id=<?=$data['id_produk'];?>" class="btn btn-outline-success" type="submit">Next</a>
        </div>
    </div>
</div>
</main>
</body>
</html>


