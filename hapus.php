<?php
include "koneksi.php";

$id = $_GET['id'];
$hapus = mysqli_query($koneksi, "delete from karyawan where id='$id'");

if($hapus){
    echo "<script>alert('Data berhasil dihapus');
    location.replace('datakaryawan.php');
    </script>";

}
else{
    echo "
    <script>alert('Data gagal dihapus');
    location.replace('datakaryawan.php');
    </script>";
}
?>