<html>
    <head>
        <style>
            .styleimage{
                width:40px;
                height:30px;
            }
            .pagination > li > a, .pagination > li > span {
                padding-left: 20px;
                line-height: 1;
                margin-bottom: px;
                border: 2px solid brown;
                box: #1B242F;
            }
            .a{
                float: right;
            }
            .page-link{
                color:black;
            }
        </style>
    </head>
    
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
            <?php
                include("includes/koneksi.php");
            ?>
            <div class="box-content"><br>
                <h3><span class="fas fa-fw fa-plus"></span> Tambah Baru</h3><br/><br/>   
                <form action="tambah_tiket_proses.php" method="post" enctype="multipart/form-data">
                    <input name="id_tiket" type="hidden" class="form-control" style="width:90%;color:black;">
                    <div class="form-group">
                        <label>Stok</label>
                        <input name="stok" type="number" class="form-control" placeholder="Banyak tiket yang tersedia.." style="width:50%;height:4%;color:black;" required>
                    </div><br>
                    <div class="form-group">
                        <label>Harga</label>
                        <select class="form-control" name="harga" style="width:50%;height:4%;color:black;">            
                            <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM paket");
                                while($q = mysqli_fetch_assoc($query)){
                                echo '<option>'. $q['harga'] .'</option>';		
                                }
                            ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label>Nama Tiket</label>
                        <select class="form-control" name="nama_paket" style="width:50%;height:4%;color:black;">               
                            <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM paket");
                                while($q = mysqli_fetch_assoc($query)){
                                echo '<option>'. $q['nama_paket'] .'</option>';		
                                }
                            ?>
                        </select>
                    </div><br>  
                    <div class="form-group">
                        <label>Gambar</label>
                        <select class="form-control" type="file" name="gambar" style="width:50%;height:4%;color:black;">            
                            <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM paket");
                                while($q = mysqli_fetch_assoc($query)){
                                echo '<option>'. $q['gambar'] .'</option>';		
                                }
                            ?>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label>Jadwal</label><br>
                        <input name="jadwal" type="date" class="form-control" style="width:30%px;height:4%;color:black;" required> sampai
                        <input name="jadwal2" type="date" class="form-control" style="width:30%px;height:4%;color:black;" required>
                    </div><br><br>
                    <input type="submit" class="btn btn-primary" value="Simpan" name="tambah" style="width:150px">
                    <a href="tambah_tiket.php" class="btn btn-default" data-dismiss="modal" style="width:150px;color:black;float:right;background-color:silver;" >Batal</a>
                </form><br><br>
            </div>
        </div>
    </div>       
    
    <?php
        get_footer();
    ?>

    </body>

</html>