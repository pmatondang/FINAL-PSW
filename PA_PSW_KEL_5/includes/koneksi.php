<?php
global $koneksi;

$koneksi = mysqli_connect("localhost", "root", "");
	if (!$koneksi) {
		die("Database connection problem");
	}
	
	$db_use = mysqli_select_db($koneksi, "paket_psw") or die("Select db problem !!");
?>