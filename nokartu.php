<?php
include "koneksi.php";
$sql = mysqli_query($koneksi, "select * from tmprfid");
$data = mysqli_fetch_array($sql);
$nokartu = $data['nokartu'];
?>

<div class="form-group">
    <label for="">No. Kartu</label>
    <input type="text" name="nokartu" placeholder="Tempelkan Kartu RFID Anda" class="form-control" style="width: 200px"
    value="<?php echo $nokartu; ?>">
</div>