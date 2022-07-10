<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: index.php');
}
include_once "function/koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM kendaraan ORDER BY id_parkir DESC LIMIT 1;");
$dt = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>struk</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="luar print">
        STRUK MASUK <br> E-PARKING
        <div class="idstruk print">
            <div class="isi print">
                <?= $dt['id_parkir'] ?>
            </div>
        </div>
        <table id="tablestruk" class="print">
            <tr class="print">
                <td class="print">Nama Pemilik</td>
                <td class="print">: <?= $dt['nama_pelanggan'] ?></td>
            </tr>
            <tr class="print">
                <td class="print">Nomor Polisi</td>
                <td class="print">: <?= $dt['nomor_polisi'] ?></td>
            <tr class="print">
                <td class="print">Waktu Masuk</td>
                <td class="print">: <?= $dt['waktu_masuk'] ?></td>
            </tr>
            <tr class="print">
                <td class="print">Nama Petugas</td>
                <td class="print">: <?= $_SESSION['nama'] ?></td>
            </tr>
        </table>
        <div class="footerstruk print">
            Struk hilang dikenai denda Rp. 50.000 <br> Serahkan Struk Kepada Petugas<br> di Pintu Keluar <br> Terima
            kasih
        </div>
        <button onclick="window.print()"> PRINT </button>
        <a href="masuk.php"> <button> Lanjut </button> </a>
    </div>
</body>

</html>