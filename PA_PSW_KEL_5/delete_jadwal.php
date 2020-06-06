<?php
$id = $_GET['id_jadwal'];

include('includes/connection.php');

$sql = "DELETE FROM data_jadwal WHERE id_jadwal=$id";
if(mysql_query($sql))
{
	header('location:jadwal.php');
}
else
{
	die('Could not delete record:' .mysql_error());
}
?>
?>