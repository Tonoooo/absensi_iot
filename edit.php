
<?php
include "koneksi.php";

$id = $_GET['id'];
$cari = mysqli_query($koneksi, "select * from karyawan where id='$id'");
$hasil = mysqli_fetch_array($cari);

if(isset($_POST['btnSimpan']))
{
    $nokartu = $_POST['nokartu'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $simpan = mysqli_query($koneksi, "update karyawan set nokartu='$nokartu', nama='$nama', alamat='$alamat' where id='$id'");

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

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "header.php"; ?>
    <title>Tambah Data Karyawan</title>
</head>
<body>

    <?php include "menu.php"; ?>

    <div class="container-fluid">
        <h3>Tambah Data Karyawan</h3>
        <form action="" method="POST">
            <div class="form-group">
                <label for="">No. Kartu</label>
                <input type="text" name="nokartu" placeholder="Masukkan Nomor Kartu RFID" class="form-control" style="width: 200px"
                value="<?php echo $hasil['nokartu']; ?>">
            </div>
            <div class="form-group">
                <label for="">Nama Karyawan</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan nama" class="form-control" style="width: 200px"
                value="<?php echo $hasil['nama']; ?>">
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat" style="width: 400px;"
                ><?php echo $hasil['alamat']; ?></textarea>
            </div>

            <button type="submit" name="btnSimpan" id="btnSimpan" class="btn btn-primary">Simpan</button>

        </form>
    </div>

    <?php include "footer.php"; ?>
    
</body>
</html>