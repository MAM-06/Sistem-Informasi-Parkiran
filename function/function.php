<?php 
include_once 'koneksi.php';
function query($query){
	global $koneksi;
	$result= mysqli_query($koneksi, $query);
	$rows=[];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[]= $row;
	}
	return $rows;
}

function cari($keyword){
	global $koneksi;
	
	$query = "SELECT * FROM `kendaraan` INNER JOIN  jeniskendaraan ON kendaraan.jenis_id = jeniskendaraan.jenis_id 
		WHERE keterangan = 'Masuk' AND kendaraan.nomor_polisi = '$keyword' ORDER BY keterangan ASC";

	$result= mysqli_query($koneksi, $query);
	$rows=[];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[]= $row;
	}
	return $rows;

}

?>