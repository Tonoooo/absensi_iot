<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "header.php"; ?>
    <title>Document</title>
</head>
<body>
    <?php include "menu.php"?>

    <div class="container-fluid">
        <h3>DATA KARYAWAN</h3>
        <table class="table table-bordered">
            <thead>
                <tr style="background-color: grey; color: white;">
                    <th style="width: 10px; text-align: center;">No.</th>
                    <th style="width: 200px; text-align: center;">No. Kartu</th>
                    <th style="width: 400px; text-align: center;">Nama</th>
                    <th style="width: 10px; text-align: center;">Alamat</th>
                    <th style="width: 10px; text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "koneksi.php";
                    $sql = mysqli_query($koneksi, "select * from karyawan");
                    $no = 0;
                    while($data = mysqli_fetch_array($sql))
                    {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nokartu']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> | 
                        <a href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
                    </td>
                </tr>
                <?php $no++; } ?>
            </tbody>

        </table>
        
        <a href="tambah.php"><button class="btn btn-primary">+ Tambah data karyawan</button></a>
    </div>



    <?php include "footer.php"?>
</body>
</html>