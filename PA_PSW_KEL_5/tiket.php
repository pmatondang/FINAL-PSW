<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_six();
?>
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
                    <a style="margin-bottom:20px" class="btn btn-info col-md-8" href="tambah_tiket.php">
                        <span class="fas fa-fw fa-add"></span>Tambah Tiket
                    </a>
                    <?php
                        include("includes/koneksi.php");?>
                    <?php
                        $per_hal = 6;
                        $jumlah_record = mysqli_query($koneksi, "SELECT * FROM tiket");
                        $jum = mysqli_num_rows($jumlah_record);
                        $halaman = ceil($jum / $per_hal);
                        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                        $start = ($page - 1) * $per_hal;
                    ?>
                    
                    <form action="cari_tiket.php" class="input-group col-md-4 col-md-offset-8" style="margin-left:80%;">
                        <div class="input-group">
                            <button class="btn btn-primary" type="button">
                                <i class="halflings-icon white search"></i>
                            </button>
                            <input style="color:black;height:4%;" type="text" class="form-control bg-light border-0 small" name="cari" placeholder="Silahkan cari..." aria-label="Search" aria-describedby="basic-addon2">
                        </div>
                    </form><br><br>

                    <?php 
                        if(isset($_GET['cari'])){
                            echo '<div> <b>Hasil pencarian dengan kata kunci "'. $_GET['cari'] .'"</b></div><br/>';
                            $cari=mysqli_real_escape_string($koneksi, $_GET['cari']);
                            $kegiatan=mysqli_query($koneksi, "SELECT * FROM tiket WHERE id_tiket LIKE '%$cari%' OR nama_paket LIKE '%$cari%'");
                        }else{
                            $kegiatan=mysqli_query($koneksi, "SELECT * FROM  tiket ORDER BY id_tiket ASC LIMIT $start, $per_hal");
                        }
                        $no=1;
                        $count = mysqli_num_rows($kegiatan);
                        if($count == null){
                            if(isset($_GET['cari'])){
                                echo "<script>alert('Tiket $cari tidak ada') ;window.location = 'tiket.php'</script>";	
                            }
                        }else{
                    ?>
                        <table class="table table-bordered" style="color:black" width="100%" cellspacing="0">
                            <thead style="background: #CCCCFF;">
                                <tr><center>
                                    <th>ID</th>
                                    <th style="width:200px;">Nama Paket</th>
                                    <th>Gambar</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Jadwal</th>
                                    <th style="width:200px;">Aksi</th></center>
                                </tr>
                            </thead>
                            <?php
                                while($b=mysqli_fetch_array($kegiatan)){
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $b['id_tiket'] ?></td>
                                    <td style="width:300px;">
                                        <?php echo $b['nama_paket'] ?>
                                    </td>
                                    <td style="width:300px;">
                                        <center><img src="<?php echo 'img2/'.$b['gambar']?>" style='width:280px;height:130px'></center>
                                    </td>
                                    <td style="text-align:justify;"><?php echo $b['stok']?></td>
                                    <td style="width:200px;">
                                        Rp. <?php echo number_format($b['harga'])?>,-
                                    </td>
                                    <td style="width:250px;">
                                        <?php echo $b['jadwal'] ?> sampai 
                                        <?php echo $b['jadwal2'] ?>
                                    </td>
                                    <td>
                                        <a href="edit_tiket.php?id=<?php echo $b['id_tiket']; ?>" class="btn btn-warning">
                                            <span class="halflings-icon white edit"></span></a>
                                        <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ 
                                            location.href='hapus_tiket.php?id=<?php echo $b['id_tiket']; ?>' }" class="btn btn-danger">
                                            <span class="halflings-icon white trash"></span></a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php }?>
                        </table> 
                    <?php }?>
                </div>
            </div>
        </div>
        <div>
            <a href="cetak_tiket_pdf.php">
                <button style="float:right;width:7%;height:30px;color:black;background-color:lightblue">CETAK PDF</button>
            </a>
        </div>
        <div>
            <a href="export_tiket.php">
                <button style="float:left;width:10%;height:30px;color:black;background-color:lightblue">CETAK EXCEL</button>
            </a>
        </div>
        <?php
            get_footer();
        ?>	

    </body>
</html>

<style type="text/css">
	.a{	
		color: #ffff;

	}
    .col-md {
        background: #c2dcd8;
        padding: 0.5em;
        border: 1px solid white;
        border-radius: 5px;
        margin-right: 22px;
    }
    .future{
        margin-left: 120px;
    }
</style>
