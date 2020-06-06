<?php
$autoid = $_POST['hid'];
$un = $_POST['txtusername'];
$pw = $_POST['txtpassword'];
$fn = $_POST['txtrole'];

include('includes/connection.php');

$sql = "UPDATE akun SET username='$un', password='$pw', role='$fn' WHERE id_akun='$autoid'";

if(mysql_query($sql))
{
	header('location:users.php');
}
else
{
	die('Unable to update record: ' .mysql_error());
}
?>