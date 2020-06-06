<?php
$id_paket = $_POST['id_paket'];
$nm= $_POST['txtnama_paket'];
$desc= $_POST['txtdeskripsi'];
$img = $_POST['txtgambar'];
$hg = $_POST['txtharga'];
$jad = $_POST['txtjadwal'];
$jad2 = $_POST['txtjadwal2'];

include('includes/connection.php');

$sql = "INSERT INTO paket VALUES('$id_paket','$nm','$desc','$img','$hg','$jad','$jad')";

if (mysql_query($sql))
{	
	header('location:paket.php');
}
else
{
	echo"Sorry your package can't save.";
	echo"<br><a href='add_paket'>Back to form</a>";
}

?>