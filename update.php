<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css">

</head>
<body>
<div class="container">
    <?php

    include "sambung.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_GET['id_produk'])) {
        $id_produk=input($_GET["id_produk"]);

        $sql="select * from produk where id_produk=$id_produk";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_produk=htmlspecialchars($_POST["id_produk"]);
        $nama_produk=input($_POST["nama_produk"]);
        $keterangan=input($_POST["keterangan"]);
        $harga=input($_POST["harga"]);
        $jumlah=input($_POST["jumlah"]);

        $sql="update produk set
			nama_produk='$nama_produk',
			keterangan='$keterangan',
			harga='$harga',
			jumlah='$jumlah',
			where id_produk=$id_produk";

        $hasil=mysqli_query($kon,$sql);

        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal diupdate.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="form-group">
            <label>Nama Produk:</label>
            <input type="text" name="nama_produk" class="form-control" value="<?php echo $data['nama_produk']; ?>" placeholder="Masukan Nama Produk" required />

        </div>
        <div class="form-group">
            <label>Keterangan:</label>
            <input type="text" name="keterangan" class="form-control" value="<?php echo $data['keterangan']; ?>" placeholder="Keterangan" required/>

        </div>
        <div class="form-group">
            <label>Harga:</label>
            <input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" placeholder="Masukkan Harga" required/>

        </div>
        <div class="form-group">
            <label>Jumlah:</label>
            <input type="text" name="jumlah" class="form-control" value="<?php echo $data['jumlah']; ?>" placeholder="Jumlah" required/>
        </div>

        <input type="hidden" name="id_produk" value="<?php echo $data['id_produk']; ?>" />

        <button type="submit" name="submit" class="btn btn-outline-primary">Masukkan</button>
        <a href="index.php" class="btn btn-outline-danger" role="button" aria-pressed="true">Batal</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>