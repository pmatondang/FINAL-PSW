<?php
$id = $_GET['id_paket'];

include('includes/connection.php');

$sql = "DELETE FROM paket WHERE id_paket=$id";
if(mysql_query($sql))
{
	header('location:paket.php');
}
else
{
	die('Could not delete record:' .mysql_error());
}
?>
?>