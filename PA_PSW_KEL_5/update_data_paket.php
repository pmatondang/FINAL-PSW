<?php     
      require_once 'commons/database.php';
        $autoid = $_POST['uID'];
        $nama_paket = $_POST['txtnama_paket'];
        $deskripsi = $_POST['txtdeskripsi'];  
        $harga = $_POST['txtharga'];
        $jadwal = $_POST['txtjadwal'];
        
        if(isset($_POST['ubah_foto'])){
            $foto = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];
            $fotobaru = date('dmYHis').$foto;
            $path = "img2/".$fotobaru;
            
            if(move_uploaded_file($tmp,$path)){
              $datapaket = getOnePaket($_POST['id']);
              $hasil = mysqli_fetch_array($datapaket,MYSQLI_ASSOC);
              if(is_file("img2/".$hasil['gambar']))
                  unlink("img2/".$hasil['gambar']);
                  $do = EditPaket($autoid,$nama_paket,$deskripsi,$gambar,$harga,$jadwal);
                 
                  if($do){
                      echo "<script>alert('Paket $nama_paket telah diubah');
                              window.location = 'paket.php'</script>";
                  }
                  else{
                      echo "<script>alert('Paket $nama_paket gagal diubah');
                      window.location = 'paket.php#edit_.'.$autoid'</script>";
                  }
          }
          else{
              echo "Maaf, gambar gagal diupload.";
              redirect('paket.php#edit_'.$autoid);
          }
      }
      else{
          $query = "UPDATE paket SET nama_paket='$nama_paket',deskripsi='$deskripsi',
          harga='$harga',jadwal='$jadwal' 
          WHERE id_paket='$autoid'";
          if(ExecuteQuery($query)){
              echo "<script>alert('Paket $nama_paket telah diubah');
                   window.location = 'paket.php'</script>";
          }
          else {
              echo "<script>alert('Paket $nama_paket gagal diubah');
              window.location = 'paket.php#edit_.'.$autoid'</script>";
          }
      }



?>