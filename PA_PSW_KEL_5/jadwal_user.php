<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Jadwal</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="img/login/travelword.jpg">
    
        <!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css   ">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/themify-icons.css">
        <link rel="stylesheet" href="css/nice-select.css">
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/gijgo.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/slicknav.css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="css/stylee.css">
        <link rel="stylesheet" href="css/gaya.css" class="">
        <style>
            .styleimage{
                width:400px;
                height:300px;
            }
            .pagination > li > a, .pagination > li > span {
                float: center;
                padding-left: 20px;
                line-height: 1;
                margin-bottom: 20px;
                border: 2px solid silver;
                box: #1B242F;
            }
            .a{
                float: center;
            }
        </style>
    </head>

    <body style="background: silver;">
        <?php
            require_once 'commons/header.php';
        ?>
        <div class="bradcam_area bradcam_bg_5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3>Selamat Datang di Jadwal kami</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
        require_once 'includes/koneksi.php';
    ?>

    <?php
        $per_hal = 4;
        $id_jadwal = 'id_jadwal';
        $jumlah_record = mysqli_query($koneksi, "SELECT * from data_jadwal WHERE id_jadwal = $id_jadwal ORDER BY id_jadwal ASC");
        $jum = mysqli_num_rows($jumlah_record);
        $halaman = ceil($jum / $per_hal);
        $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
        $start = ($page - 1) * $per_hal;
    ?>
        <div class="newletter_area overlay">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3 style="color:white; font-size:80px;"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br>
        <ul class="container">
        <li>
            <div class="search" style="margin-top: 30px; margin-left:650px;">      
                <form method="GET" action="jadwal_user.php">
                    <input  style="width:360px; height:50px; border-radius:10px;" type="text" name="cari" class="textbox" placeholder="   Masukkan id/nama paket" onfocus="this.value = '';" 
                        onblur="if(this.value == '') {
                            this.value = ' Cari jadwal';
                        }">&nbsp;
                        <input type="submit" value="Search" id="submit" name="submit" style="width:85px; height:50px; border-radius:10px;">
                        <div id="response"> </div>
                </form>
            </div>
        </li>
    </ul><br>
        <div class="tabel">
			<table class="table table-striped table-bordered" style="background: white;">
                <thead>
                    <tr align="center">
                        <th>Nama Paket</th>
                        <th>Harga</th>
                        <th>Jam Berangkat</th>
                        <th>Kapasitas</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_GET['cari'])){
                    echo '<div> <p style="color="red"> Hasil pencarian jadwal "'. $_GET['cari'] .'". </p></div>';
                    $cari=mysqli_real_escape_string($koneksi, $_GET['cari']);
                    $jadwal=mysqli_query($koneksi, "SELECT * FROM data_jadwal where id_jadwal like '%$cari%' or nama_paket like '%$cari%'");
                    if(mysqli_num_rows($jadwal) == null){
	  			        echo "<script>alert('Maaf, jadwal $cari yang anda cari tidak ditemukan..'); window.location = 'jadwal_user.php'</script>";
                    }
                }
                else{
                    $jadwal = mysqli_query($koneksi, "SELECT * FROM data_jadwal LIMIT $start, $per_hal");
                }
                while ($row=mysqli_fetch_array($jadwal)){
                    echo "<tr align='center'>";
                        echo "<td>".$row['nama_paket']."</td>";
                        echo "<td>Rp. ".number_format($row['harga']).",-</td>";
                        echo "<td>".$row['jam_berangkat']."</td>";
                        echo "<td>".$row['kapasitas']."</td>";
                    echo "<tr>";
                }
                ?>
                </tbody>
            </table><br><br>
        <ul class="pagination a">
            <?php 
                if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                    ?>
                      <li class="page-item"><a class="page-link" href="#">First</a></li>
                      <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <?php
                    }else{ // Jika page bukan page ke 1
                      $link_prev = ($page > 1)? $page - 1 : 1;
                    ?>
                      <li class="page-item"><a class="page-link" href="jadwal_user.php?page=1">First</a></li>
                      <li class="page-item"><a class="page-link" href="jadwal_user.php?page=<?php echo $link_prev; ?>">&laquo;</a></li>
                    <?php
                    }
      			for($x = 1;$x <= $halaman; $x++){?>
      				<li class="page-item" ><a class="page-link" href="?page=<?php echo $x?>"><?php echo $x ?></a></li>
                <?php } ?>
                
                <?php
                // Jika page sama dengan jumlah page, maka disable link NEXT nya
                // Artinya page tersebut adalah page terakhir 
                if($page == $halaman){ // Jika page terakhir ?>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">Last</a></li>
                
                <?php }
                else{ // Jika Bukan page terakhir
                    $link_next = ($page < $halaman)? $page + 1 : $halaman;
                ?>
                    <li class="page-item"><a class="page-link" href="jadwal_user.php?page=<?php echo $link_next; ?>">&raquo;</a></li>
                    <li class="page-item"><a class="page-link" href="jadwal_user.php?page=<?php echo $halaman; ?>">Last</a></li>    
                <?php }
                ?>
            </li>
        </ul>
    </div>
    </div><br><br><br>

        <?php
            require_once 'commons/footer.php'
        ?>

        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/scrollIt.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/nice-select.min.js"></script>
        <script src="js/jquery.slicknav.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/gijgo.min.js"></script>
        <script src="js/slick.min.js"></script>
       
        <!--contact js-->
        <script src="js/contact.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/mail-script.js"></script>

        <script src="js/main.js"></script>
        <script>
            $('#datepicker').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
            });
        </script>
    </body>

</html>