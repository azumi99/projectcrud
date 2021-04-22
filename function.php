<?php 
session_start();

// database conection
$conn = mysqli_connect("localhost", "root", "", "iventaris");

// input iventaris
if(isset($_POST['saveiventory'])){
	$iventaris = $_POST['iventaris'];
	$deskripsi = $_POST['deskripsi'];
	$jumlah = $_POST ['jumlah'];

	$tambahiventory= mysqli_query($conn, "insert into iventory (namabarang, deskripsi, jumlah) values ('$iventaris', '$deskripsi', '$jumlah')");
	if ($tambahiventory){
		header('location:index.php');
	} else{
		echo "gagal";
		header('location:index.php');
	}
}


?>