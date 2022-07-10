<!DOCTYPE html>
<html lang="en">
<head>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: index.php');
}
include_once("function/helper.php");
include_once("function/koneksi.php");
include_once 'function/function.php';
$masuk = query("SELECT * FROM `kendaraan` INNER JOIN  jeniskendaraan ON kendaraan.jenis_id = jeniskendaraan.jenis_id WHERE keterangan = 'Keluar' ORDER BY keterangan ASC");
?>
<?php include_once('navbar.php') ?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="libraries/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
</head>
<body><div id="pebungkus">
    <div class="card shadow">
        
    <div style="padding: 15px;">
        <h3 style="margin-top: 0;"><b>Laporan Periode Tanggal</b></h3>
        <hr />
        <form method="get" action="laporan.php">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="form-group">
                        <label>Filter Tanggal</label>
                        <div class="input-group">
                            <input type="text" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" class="form-control tgl_awal" placeholder="Tanggal Awal">
                            <span class="input-group-addon">s/d</span>
                            <input type="text" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" class="form-control tgl_akhir" placeholder="Tanggal Akhir">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
            <?php
            if(isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter
                echo '<a href="laporan.php" class="btn btn-default">RESET</a>';
            ?>
        </form>
        <?php
        // Load file koneksi.php
        include_once("function/helper.php");
        include_once("function/koneksi.php");
        $tgl_awal = @$_GET['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = @$_GET['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            // Buat query untuk menampilkan semua data transaksi
            $query = "SELECT * FROM kendaraan";
            $url_cetak = "print.php";
            $label = "Semua Data Parkir Kendaraan";
        }else{ // Jika terisi
            // Buat query untuk menampilkan data transaksi sesuai periode tanggal
            $query = "SELECT * FROM kendaraan WHERE (waktu_keluar BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
            $url_cetak = "print.php?tgl_awal=".$tgl_awal."&tgl_akhir=".$tgl_akhir."&filter=true";
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            $label = 'Data Parkir Kendaraan Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }
        ?>
        <hr />
        <h4 style="margin-bottom: 5px;"><b>Data Transaksi</b></h4>
        <?php echo $label ?><br />
        <div style="margin-top: 5px;">
            <a href="<?php echo $url_cetak ?>">CETAK PDF</a>
        </div>
        <div class="table-responsive" style="margin-top: 10px;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Tanggal</th>
                    <th>Nomor Polisi</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu keluar</th>
                    <th>Harga</th>
                    <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                            $tgl = date('d-m-Y', strtotime($data['waktu_keluar'])); // Ubah format tanggal jadi dd-mm-yyyy
                            echo "<tr>";
                            echo "<td>".$tgl."</td>";
                            echo "<td>".$data['nomor_polisi']."</td>";
                            echo "<td>".$data['waktu_masuk']."</td>";
                            echo "<td>".$data['waktu_keluar']."</td>";
                            echo "<td>".$data['harga']."</td>";
                            echo "<td>".$data['keterangan']."</td>";
                            echo "</tr>";
                        }
                    }else{ // Jika data tidak ada
                        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div></div>
    </div>
    <!-- Include File JS Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Include library Bootstrap Datepicker -->
    <script src="libraries/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- Include File JS Custom (untuk fungsi Datepicker) -->
    <script src="js/custom.js"></script>
    <script>
    $(document).ready(function(){
        setDateRangePicker(".tgl_awal", ".tgl_akhir")
    })
    </script>
</body>
</html>