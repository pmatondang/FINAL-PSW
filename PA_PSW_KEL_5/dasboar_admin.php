<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread();
?>

<html>
	<head>
		<link rel="stylesheet" href="css/stylee.css">
		<link rel="stylesheet" href="css/adminkel.css">
	</head>
	<body style="background-color: silver;">
	  <table>
		<tr>
			<td>&emsp;&emsp;&emsp;
				<img src="imgadmin/paket.png" alt=""><br>
				<center><a href="paket.php" class="boxed-btn3">Paket</a></center><br>
			</td>
			<td>&emsp;&emsp;&emsp;
				<img src="imgadmin/jadwal.png" alt=""><br>
				<center>&emsp;&emsp;&emsp;<a href="jadwal.php" class="boxed-btn3">Jadwal</a></center><br>
			</td>
			<td>&emsp;&emsp;&emsp;
				<img src="imgadmin/tiket.png" alt=""><br>
				<center>&emsp;&emsp;&emsp;<a href="tiket.php" class="boxed-btn3">Tiket</a></center><br>
			</td>
			<td>&emsp;&emsp;&emsp;
				<img src="imgadmin/pesanan.png" alt=""><br>
				<center><a href="pemesanan.php" class="boxed-btn3">Pemesanan</a></center><br>
			</td>
		</tr>
		<tr>
			<td>&emsp;&emsp;&emsp;
				<img src="imgadmin/pengunjung.png" alt=""><br>
				<center><a href="pengunjung_admin.php" class="boxed-btn3">Pengunjung</a></center>
			</td>
			<td>&emsp;&emsp;&emsp;
				<img src="imgadmin/komentar.png" alt=""><br>
				<center>&emsp;&emsp;&emsp;<a href="testimoni_admin.php" class="boxed-btn3">Testimoni</a></center>
			</td>
			<td>&emsp;&emsp;&emsp;
				<img src="imgadmin/user.png" alt=""><br>
				<center>&emsp;&emsp;&emsp;<a href="users.php" class="boxed-btn3">Akun</a></center>
			</td>
		</tr>
	  </table>
	</body>
</html>



<?php
	get_footer();
?>