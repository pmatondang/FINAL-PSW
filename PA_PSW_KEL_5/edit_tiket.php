<?php
    require_once("functions/function.php");
    get_header();
    get_sidebar();
    get_bread_six();

    require_once('includes/db.php');
        $upload_dir = 'img2/';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM tiket WHERE id_tiket=".$id;
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            }else {
                $errorMsg = 'Data tidak ditemukan';
            }
        }

        if(isset($_POST['Submit'])){
            $nama = $_POST['nama_paket'];
            $stok = $_POST['stok'];
            $harga = $_POST['harga'];
            $date = $_POST['jadwal'];
            $date2 = $_POST['jadwal2'];
            $imgName = $_FILES['image']['name'];
            $imgTmp = $_FILES['image']['tmp_name'];
            $imgSize = $_FILES['image']['size'];
                if($imgName){
                    $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
                    $allowExt  = array('jpeg', 'jpg', 'png', 'gif');
                    $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
                    if(in_array($imgExt, $allowExt)){
                        if($imgSize < 5000000){
                            unlink($upload_dir.$row['gambar']);
                            move_uploaded_file($imgTmp ,$upload_dir.$userPic);
                        }else{
                            $errorMsg = 'Gambar terlalu besar';
                        }
                    }else{
                        $errorMsg = 'Tolong pilih gambar yang valid';
                    }
                } else{
                    $userPic = $row['gambar'];
                }

                if(!isset($errorMsg)){
                    $sql = "UPDATE tiket SET nama_paket = '".$nama."',	stok = '".$stok."', harga = '".$harga."', jadwal = '".$date."', jadwal2 = '".$date2."', gambar = '".$userPic."' WHERE id_tiket = ".$id;
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        echo "<script>alert('Tiket $nama berhasil diubah!'); window.location = 'tiket.php'</script>";	
                    }else{
                        $errorMsg = 'Error '.mysqli_error($conn);
                    }
                }
            }
?>
<html>
    <head>
    </head>
    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2></i><span class="break"></span>Data Tiket</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
                </div>
            </div>
            <div class="box-content"><br>
                <h2><span class="fas fa-fw fa-plus"></span> Edit Tiket</h2><br/>   
                <form class="" action="" method="post" enctype="multipart/form-data" style="margin-left:30px;">
                    <div class="form-group">
                        <label for="name">Nama Paket</label>
                        <input style="color:black;width:90%;height:30px;" type="text" class="form-control" name="nama_paket"  value="<?php echo $row['nama_paket']; ?>">
                    </div><br>
                    <div class="form-group">
                        <label for="contact">Stok</label>
                        <input style="color:black;width:90%;height:30px;" type="text" class="form-control" name="stok" value="<?php echo $row['stok']; ?>">
                    </div><br>
                    <div class="form-group">
                        <label for="contact">Harga</label>
                        <input style="color:black;width:90%;height:30px;" type="text" class="form-control" name="harga" value="<?php echo $row['harga']; ?>">
                    </div><br>
                    <div class="form-group">
                        <label for="contact">Jadwal</label>
                        <input style="color:black;width:30%px;height:30px;" type="date" class="form-control" name="jadwal" value="<?php echo $row['jadwal']; ?>"> sampai 
                        <input style="color:black;width:30%px;height:30px;" type="date" class="form-control" name="jadwal2" value="<?php echo $row['jadwal2']; ?>">
                    </div><br>
                    <div class="form-group">
                        <label for="image">Pilih Gambar</label>
                        <div class="col-md-4">
                            <img src="<?php echo $upload_dir.$row['gambar'] ?>" width="20%"><br><br>
                            <input type="file" class="form-control" name="image" value="">
                        </div><br><br>
                    <div class="form-group">
                        <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>       
    
    <?php
        get_footer();
    ?>

    </body>

</html>