<?php
    include 'koneksi.php';
    session_start();
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];

        if($username!="" && $password!=""){
            $mysql=mysqli_query($koneksi,"SELECT * FROM penjual WHERE username='$username' and password='$password'");
            if($data = mysqli_fetch_array($mysql)){
                $_SESSION['username']=$data['username'];
                $_SESSION['password']=$data['password'];
                header('location:admin.php');

            }
        }
    }
    
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST ['password'];
        $query = mysqli_query($koneksi, "select * from penjual where username='$username' and password='$password'");
        if(mysqli_num_rows($query)>0){
            header("Location: admin.php");
        }else{
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



<form action="" method="POST">
    <table width="25%" border=0 align="center">
        <tr>
            <td> username </td>
            <td> <input type="text" name="username"> </td>
        </tr>
        <tr>
            <td> password </td>
            <td> <input type="password" name="password"> </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="login" value="login">
            </td>
        </tr>
    </table>
</form>
</body>
</html>

