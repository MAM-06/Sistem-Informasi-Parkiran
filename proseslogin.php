<?php  
session_start();
if (!isset($_SESSION['user_id'])){
    header('location: index.php');
}

include_once("function/helper.php");
include_once("function/koneksi.php");

$username = $_POST["username"];
$password = $_POST["password"];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($query) == 0){
	header("Location: ".BASE_URL."index.php?notif=true");
}else{
	
	session_start();
	$_SESSION["login"] = true;
	$nama = mysqli_fetch_assoc($query);
	$_SESSION['user_id'] = $nama['user_id'];
	$_SESSION['nama'] = $nama['nama'];

	header("location: ".BASE_URL."masuk.php");
};

?>