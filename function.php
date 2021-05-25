<?php
session_start();

// database conection
$conn = mysqli_connect("localhost", "root", "", "dbrecord");

// insert kb
if (isset($_POST['savekb'])) {
	$iduser = $_POST['nama'];
	$deskripsikb = $_POST['deskripsi'];
	$idcompany = $_POST['company'];
	$nominalkb = $_POST['nominal'];
	$transferto = $_POST['transferto'];

	$tambahkb = mysqli_query($conn, "insert into kb (id_login, deskripsi_kb, id_company, nominal_kb, transfer_kb) values ('$iduser', '$deskripsikb', '$idcompany', '$nominalkb', '$transferto')");
	if ($tambahkb) {
		header('location:index.php');
	} else {
		echo "gagal";
		header('location:index.php');
	}
}

//insert tb
if (isset($_POST['savetb'])) {
	$namatb = $_POST['namatb'];
	$pilihkb = $_POST['pilihkb'];
	$keterangan = $_POST['keterangan'];

	$tambahtb = mysqli_query($conn, "insert into tb (id_login, id_kb, ket_tb) values ('$namatb', '$pilihkb', '$keterangan')");
	if ($tambahtb) {
		header('location:tb.php');
	} else {
		echo "gagal";
		header('location:tb.php');
	}
}

//insert kb
if (isset($_POST['savetbl'])) {
	$idusertbl = $_POST['namatbl'];
	$deskripsitbl = $_POST['deskripsitbl'];
	$idcompanytbl = $_POST['companytbl'];
	$nominaltbl = $_POST['nominaltbl'];
	$transfertotbl = $_POST['transfertotbl'];

	$tambahtbl = mysqli_query($conn, "insert into tbl (id_login, deskripsi_tbl, id_company, nominal_tbl, transfer_tbl) values ('$idusertbl', '$deskripsitbl', '$idcompanytbl', '$nominaltbl', '$transfertotbl')");
	if ($tambahtbl) {
		header('location:tbl.php');
	} else {
		echo "gagal";
		header('location:tbl.php');
	}
}


//update kb
if (isset($_POST['updatekb'])) {
	$idkb = $_POST['idkb'];
	$iduser = $_POST['nama'];
	$deskripsikb = $_POST['deskripsi'];
	$idcompany = $_POST['company'];
	$nominalkb = $_POST['nominal'];
	$transferto = $_POST['transferto'];
	// print_r($iduser);
	// exit();
	$updatekb = mysqli_query($conn, "update kb set id_login='$iduser', deskripsi_kb='$deskripsikb', id_company='$idcompany' , nominal_kb='$nominalkb', transfer_kb='$transferto' where kb.id_kb='$idkb' ");
	if ($updatekb) {
		header('location:index.php');
	} else {
		echo "gagal";
		header('location:index.php');
	}
}

//delete kb
if (isset($_POST['deletekb'])) {
	$idkb = $_POST['idkb'];

	$deletekb = mysqli_query($conn, "delete from kb where id_kb='$idkb'");
	if ($deletekb) {
		header('location:index.php');
	} else {
		echo "gagal";
		header('location:index.php');
	}
}

//update tb
if (isset($_POST['updatetb'])) {
	$idtb = $_POST['idtb'];
	$nametb = $_POST['namatb'];
	$selectkb = $_POST['pilihkb'];
	$kettb = $_POST['keterangan'];

	$updatetb = mysqli_query($conn, "update tb set id_login='$nametb', id_kb='$selectkb', ket_tb='$kettb' where id_tb='$idtb'");
	if ($updatetb) {
		header('location:tb.php');
	} else {
		echo "gagal";
		header('location:tb.php');
	}
}

//delete tb
if (isset($_POST['deletetb'])) {
	$idtb = $_POST['idtb'];

	$deletetb = mysqli_query($conn, "delete from tb where id_tb='$idtb'");
	if ($deletetb) {
		header('location:tb.php');
	} else {
		echo "gagal";
		header('location:tb.php');
	}
}

//update tbl
if (isset($_POST['updatetbl'])) {
	$idtblnya = $_POST['idtbl'];
	$namatbl = $_POST['namaupdatetbl'];
	$nominaltbl = $_POST['nominalupdatetbl'];
	$transfertotbl = $_POST['transfertoupdatetbl'];
	$companytbl = $_POST['companyupdatetbl'];
	$deskripsitbl = $_POST['deskripsiupdatetbl'];


	$updatetbl = mysqli_query($conn, "update tbl set id_login='$namatbl', deskripsi_tbl='$deskripsitbl', id_company='$companytbl', nominal_tbl='$nominaltbl', transfer_tbl='$transfertotbl' where id_tbl='$idtblnya'");
	if ($updatetbl) {
		header('location:tbl.php');
	} else {
		echo "gagal";
		header('location:tbl.php');
	}
}

//delete tbl
if (isset($_POST['modaldeletetbl'])) {
	$idtbl = $_POST['idtbl'];

	$deletetbl = mysqli_query($conn, "delete from tbl where id_tbl='$idtbl'");
	if ($deletetbl) {
		header('location:tbl.php');
	} else {
		echo "gagal";
		header('location:tbl.php');
	}
}
