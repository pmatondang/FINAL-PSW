<?php
    require_once 'commons/database.php';
    global $db;
     
    // $id_akun = $_POST['id_akun'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $repass = $_POST['repassword'];
    $role = 1;

    if($pass != $repass){
        echo "<script>alert('Password tidak sama.');
            window.location = 'index.php'</script>";
    }
    else{
        $is_account_exist = CekAkun($username);
        if($is_account_exist > 0){
            echo "<script>alert('Username Sudah Dipakai');
                window.location = 'registrasi.php'</script>";
        }
        else{
            $do = AddAkun($nama,$username,$pass,$email);
            if($do > 0){    
                echo "<script>alert('Akun Berhasil Dibuat.');
                window.location = 'index.php'</script>";
            }
            else{
				echo "<script>alert('Akun Gagal Dibuat.');
                window.location = 'registrasi.php'</script>";
            }
        }
    }

?>