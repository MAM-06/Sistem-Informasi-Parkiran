<?php ob_start(); ?>
<html>
<head>
  <title>Laporan</title>
  <style>
    .table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }
    .table th {
      padding: 5px;
    }
    .table td {
      word-wrap:break-word;
      width: 20%;
      padding: 5px;
    }
  </style>
</head>
<body>
  <?php
  // Load file koneksi.php
  include_once("function/helper.php");
  include_once("function/koneksi.php");
  $tgl_awal = @$_GET['tgl_awal']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
  $tgl_akhir = @$_GET['tgl_akhir']; // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
  if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
    // Buat query untuk menampilkan semua data transaksi
    $query = "SELECT * FROM kendaraan";
    $label = "Semua Data Parkir Kendaraan";
  }else{ // Jika terisi
    // Buat query untuk menampilkan data transaksi sesuai periode tanggal
    $query = "SELECT * FROM kendaraan WHERE (waktu_keluar BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."')";
    $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
    $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
    $label = 'Data Parkir Kendaraan Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
  }
  ?>
  <h4 style="margin-bottom: 5px;">Data Parkir Kendaraan</h4>
  <?php echo $label ?>
  <table class="table" border="1" width="100%" style="margin-top: 10px;">
  <tr>
    <th>Nomor Polisi</th>
    <th>Waktu Masuk</th>
    <th>Waktu keluar</th>
    <th>Harga</th>
    <th>Status</th>
    </tr>
    <?php
    $sql = mysqli_query($koneksi, $query); 
    $row = mysqli_num_rows($sql); 
    if($row > 0){ 
      while($data = mysqli_fetch_array($sql)){  
        echo "<tr>";
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
  </table>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
require 'libraries/html2pdf/autoload.php';
$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Laporan Parkiran.pdf', 'I');
?>