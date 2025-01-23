
<?php
include "koneksi.php";
if(isset($_POST['btnSimpan']))
{
    $nokartu = $_POST['nokartu'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $simpan = mysqli_query($koneksi, "INSERT INTO karyawan (nokartu, nama, alamat) VALUES ('$nokartu', '$nama', '$alamat')");

    if($simpan){
        echo "<script>alert('Data berhasil disimpan');
        location.replace('datakaryawan.php');
        </script>";

    }
    else{
        echo "<script>alert('Data gagal disimpan');
        location.replace('datakaryawan.php');
        </script>";
    }

    // kosongkan tabel tmprfid
    mysqli_query($koneksi, "delete from tmprfid");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "header.php"; ?>
    <title>Tambah Data Karyawan</title>

    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function(){
                $("#norfid").load('nokartu.php')
            }, 0);
        })
    </script>
</head>
<body>

    <?php include "menu.php"; ?>

    <div class="container-fluid">
        <h3>Tambah Data Karyawan</h3>
        <form action="" method="POST">
            <div id="norfid"></div>
            
            <div class="form-group">
                <label for="">Nama Karyawan</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan nama" class="form-control" style="width: 200px">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" style="width: 400px;"></textarea>
            </div>

            <button type="submit" name="btnSimpan" id="btnSimpan" class="btn btn-primary">Simpan</button>

        </form>
    </div>

    <?php include "footer.php"; ?>
    
</body>
</html>