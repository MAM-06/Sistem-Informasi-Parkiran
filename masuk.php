<?php
session_start();
if (!isset($_SESSION['user_id'])){
    header('location: index.php');
}
include_once "function/helper.php";
include_once "function/koneksi.php";
include_once "module/masuk/action.php";
if (isset($_POST["submit"])) {
	tambah($_POST);
    header ('location: struk.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Halaman Utama</title>
</head>

<body>
    <?php include_once('navbar.php') ?>
    <div id="pebungkus">
        <div class="card shadow">
            <h4 class="card-header">Kendaraan Masuk</h4>
            <div class="container">
                <form action="" method="post">
                    <span>
                        <br><label>Jenis Kendaraan</label><br>
                        <select name="jenis_kendaraan" class="form-control">
                            <?php $query = mysqli_query($koneksi, "SELECT jenis_id, jeniskendaraan FROM jeniskendaraan ORDER BY jeniskendaraan ASC"); ?>
                            <?php while($row = mysqli_fetch_assoc($query)): ?>
                            <?php if($jenis_id == $row["jenis_id"]) : ?>
                            <option value="<?= $row['jenis_id']; ?>" selected="true"><?= $row["jeniskendaraan"]; ?>
                            </option>
                            <?php else : ?>
                            <option value="<?= $row['jenis_id']; ?>"><?= $row["jeniskendaraan"]; ?></option>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        </select>
                    </span><br>
                    <span>
                        <label>Nama Pelanggan</label><br>
                        <input type="text" class="form-control" name="nama_pelanggan" autocomplete="off">
                    </span><br>
                    <span>
                        <label>Nomor Polisi</label><br>
                        <input type="text" class="form-control" name="nomor_polisi" autocomplete="off">
                    </span><br>
                    <span>
                        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</body>

</html>