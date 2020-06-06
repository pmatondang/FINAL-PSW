<?php
$id_jadwal = $_POST['id_jadwal'];
$nm= $_POST['txtnama_paket'];
$hg = $_POST['txtharga'];
$jam = $_POST['txtjam'];
$kapas = $_POST['txtkap'];

include('includes/connection.php');

$sql = "INSERT INTO data_jadwal VALUES('$id_jadwal','$nm','$hg','$jam','$kapas')";

if (mysql_query($sql))
{
	header('location:jadwal.php');
}
else
{
	die('Unable to insert data:' .mysql_error());
}

?>