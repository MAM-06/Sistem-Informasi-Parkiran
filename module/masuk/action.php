<?php 
function tambah($data){
	global $koneksi;
	ini_set('date.timezone', 'Asia/Jakarta');
	$waktu_masuk = date("Y-m-d H:i:s");
	$jenis_id = $data["jenis_kendaraan"];
	$nomor_polisi = $data["nomor_polisi"];
	$nama_pelanggan = $data["nama_pelanggan"];
	$keterangan = 'Masuk';
	$query = "INSERT INTO kendaraan VALUES ('','$jenis_id','$nama_pelanggan','$nomor_polisi','$waktu_masuk','','','$keterangan')";
	mysqli_query($koneksi, $query);
}

?>