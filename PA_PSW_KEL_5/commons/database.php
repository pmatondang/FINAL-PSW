<?php

    global $db;
    $db = mysqli_connect('localhost','root','','paket_psw');
    if(!$db){
        die("Database Connect Problem");
    }

    function ExecuteQuery($query){
        global $db;
        $result = mysqli_query($db,$query);

        return $result;
    }

    function LoginAccount($username,$password){
        $query = "SELECT * FROM akun WHERE username='$username' AND password='$password'";

        $user = ExecuteQuery($query);

        return $user;
    }

    function redirect($_location)
	{
	    header('Location: ' .$_location);
    }

    function CekAkun($username){
        $query = "SELECT username FROM akun WHERE username ='$username'";

        $result = ExecuteQuery($query);

        return mysqli_num_rows($result);   
    }

    function AddAkun($nama,$username,$pass,$email){
        global $db;
        $query = "INSERT INTO akun
        VALUES ('$nama','$username', '$email','$pass', 1)";

        $result = ExecuteQuery($query);

        return mysqli_affected_rows($db);
    }

    function getPaket(){
        $query = "SELECT * FROM paket";

        $result = ExecuteQuery($query);
        $data = [];

        while ($paket = mysqli_fetch_assoc($result)) {
            $data[] = $paket;
        }

        return $data;
    }

    function CreatePaket($nama,$deskripsi,$tanggal,$gambar,$harga){
        global $db;
        $query = "INSERT INTO paket(nama_paket,deskripsi,gambar,harga,jadwal) VALUES('meat','cantik','23 mei 2001','',200)";

        $result = $db->prepare($query);
        $result->bind_param('ssssi',$nama,$deskripsi,$tanggal,$gambar,$harga);
        $result->execute();
        $result->close(); 

        return mysqli_affected_rows($db);
    }

    function DeletePaket($id_paket){
        $query = "DELETE FROM paket WHERE id_paket=$id_paket";

        $result = ExecuteQuery($query);

        return $result;
    }

    function EditPaket($id,$nama,$deskripsi,$tanggal,$gambar,$harga){
        global $db;

        $query = "UPDATE paket SET nama_paket='$nama',deskripsi='$deskripsi',
                  tanggal='$tanggal',gambar='$gambar',harga=$harga 
                  WHERE id_paket='$id'";

        mysqli_query($db,$query);

        return mysqli_affected_rows($db);
    }





?>