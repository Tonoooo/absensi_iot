<?php
include "koneksi.php";
$sql = mysqli_query($koneksi, "select * from status");
$data = mysqli_fetch_array($sql);
$mode_absen = $data['mode'];

$mode = '';
if($mode_absen==1)
    $mode = "Masuk";
else if($mode_absen==2)
    $mode = "Istirahat";
else if($mode_absen==3)
    $mode = "Kembali";
else if($mode_absen==4)
    $mode = "Pulang";

// baca table tmprfid
$baca_kartu = mysqli_query($koneksi, "select * from tmprfid");
$data_kartu = mysqli_fetch_array($baca_kartu);

// Check if $data_kartu is null before accessing its elements
if ($data_kartu === null || !isset($data_kartu['nokartu'])) {
    $nokartu = "";
} else {
    $nokartu = $data_kartu['nokartu'];
}
?>

<div class="container-fluid" style="text-align: center;">
    <?php if($nokartu=="") { ?>
    <h3>Absen : <?php echo $mode; ?></h3>
    <h3>Silahkan Tempelkan Karut RFID Anda</h3>
    <img src="images/rfid.png" alt="RFID" style="width: 200px;"> <br>
    <img src="images/animasi2.gif" alt="">
    <?php } else {
        $cari_karyawan = mysqli_query($koneksi, "select * from karyawan where nokartu='$nokartu'");
        $jumlah_data = mysqli_num_rows($cari_karyawan);
        if($jumlah_data==0)
            echo "<h1>Maaf! Kartu tidak dikenali</h1>";
        else {
            $data_karyawan = mysqli_fetch_array($cari_karyawan);
            $nama = $data_karyawan['nama'];
            // tanggal dan jam hari ini
            date_default_timezone_set('Asia/Makassar');
            $tanggal = date('Y-m-d');
            $jam = date('H:i:s');

            // cek ditabel absensi apakah nomor kartu tersebut sudah ada sesuai tanggal hari ini.
            // apabila belum ada, maka dianggap absen masuk, tapi kalau sudah ada, maka update data sesuai mode absensi
            $cari_absen = mysqli_query($koneksi, "select * from absensi where nokartu='$nokartu' and tanggal='$tanggal'");
            // hitung jumlah datanya
            $jumlah_absen = mysqli_num_rows($cari_absen);
            if($jumlah_absen==0)
            {
                // simpan data absensi
                $simpan = mysqli_query($koneksi, "insert into absensi (nokartu, tanggal, jam_masuk) values ('$nokartu', '$tanggal', '$jam')");
                if($simpan)
                    echo "<h1>Selamat Datang <br> $nama</h1>";
            } else {
                if($mode_absen==2){
                    echo "<h1>Selamat Istirahat <br> $nama</h1>";
                    mysqli_query($koneksi, "update absensi set jam_istirahat='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
                } else if ($mode_absen==3) {
                    echo "<h1>Selamat Datang Kembali <br> $nama</h1>";
                    mysqli_query($koneksi, "update absensi set jam_kembali='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
                } else if ($mode_absen==4) {
                    echo "<h1>Selamat Jalan <br> $nama</h1>";
                    mysqli_query($koneksi, "update absensi set jam_pulang='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
                }
            }
        }

        // kosongkan tabel tmprfid
        mysqli_query($koneksi, "delete from tmprfid");
    } ?>
</div>
