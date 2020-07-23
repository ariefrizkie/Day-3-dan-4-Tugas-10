<!DOCTYPE html>
<html>
<head>
  <title>Daftar Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="container">
    <br>
    <h4>Daftar Produk</h4>
<?php

    include "sambung.php";


    if (isset($_GET['id_produk'])) {
        $id_produk=htmlspecialchars($_GET["id_produk"]);

        $sql="delete from produk where id_produk='$id_produk' ";
        $hasil=mysqli_query($kon,$sql);


            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Nama produk</th>
            <th>Keterangan</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "sambung.php";
        $sql="select * from produk order by id_produk desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama_produk"]; ?></td>
                <td><?php echo $data["keterangan"];   ?></td>
                <td><?php echo $data["harga"];   ?></td>
                <td><?php echo $data["jumlah"];   ?></td>
                <td>
                    <a href="update.php?id_produk=<?php echo htmlspecialchars($data['id_produk']); ?>" class="btn btn-outline-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_produk=<?php echo $data['id_produk']; ?>" class="btn btn-outline-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-outline-primary" role="button">Tambah Data</a>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>