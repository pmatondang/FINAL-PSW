<?php
$id = $_GET['id_pengunjung'];

include('includes/connection.php');

$sql = "DELETE FROM pengunjung WHERE id_pengunjung=$id";
if(mysql_query($sql))
{
	header('location:pengunjung_admin.php');
}
else
{
	die('Could not delete record:' .mysql_error());
}
?>
?>