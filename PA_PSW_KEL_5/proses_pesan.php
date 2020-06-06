<?php
        // data form yang dikirimkan
        $id_tiket = $_POST['id_tiket'];
        $nama  = $_POST['nama'];
        $gender  = $_POST['gender'];
        $email  = $_POST['email'];
        require_once('includes/koneksi.php');
        $sql = mysqli_query($koneksi, "INSERT INTO pemesanan VALUES('','$id_tiket', '$nama', '$gender', '$email')");
		if ($sql) {
			echo "<script>alert('Pemesanan $nama berhasil dipesan!'); window.location = 'tiket_user.php'</script>";	
		}else{
			echo "<script>alert('Pemesanan $nama gagal dipesan!'); window.location = 'tiket_user.php'</script>";
	}