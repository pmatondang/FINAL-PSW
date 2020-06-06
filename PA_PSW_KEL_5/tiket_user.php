<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Tiket</title>
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
            .pagination {
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
        <div class="bradcam_area bradcam_bg_2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3>Gunakan tiket kami kelilingi Indonesia</h3>
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
            $id_tiket = 'id_tiket';
            $jumlah_record = mysqli_query($koneksi, "SELECT * from tiket WHERE id_tiket = $id_tiket ORDER BY id_tiket ASC");
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
                            <h3 style="color:white; font-size:80px;">Berikut ini daftar tiket kami</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br>
            <ul class="container">
                <li>
                    <div class="search" style="margin-top: 30px;margin-left:550px;">      
                        <form method="GET" action="tiket_user.php">
                            <input  style="width:360px; height:50px; border-radius:10px;" type="text" name="cari" class="textbox" placeholder="   Masukkan id tiket/nama paket" onfocus="this.value = '';" 
                                onblur="if(this.value == '') {
                                    this.value = ' Cari jadwal';
                                }">&nbsp;
                                <input type="submit" value="Search" id="submit" name="submit" style="width:85px; height:50px; border-radius:10px;">
                                <div id="response"> </div>
                        </form>
                    </div>
                </li>
            </ul><br><br><br>
        <div class="tabel container"> 
            <?php 
                if(isset($_GET['cari'])){
                    echo '<div class="container" style="color:black;"> <p style="color="red">
                        Hasil pencarian id tiket/nama tiket "'. $_GET['cari'] .'". </p></div>';
                    $cari=mysqli_real_escape_string($koneksi, $_GET['cari']);
                    $tiket=mysqli_query($koneksi, "SELECT * FROM tiket WHERE id_tiket LIKE '%$cari%' OR nama_paket LIKE '%$cari%'");
                        if(mysqli_num_rows($tiket) == null){
                            echo '<br><div align="center"> <font size="4">Tiket yang anda cari tidak ada. </font></div>';
                    }
                }
                else{
                    $tiket = mysqli_query($koneksi, "SELECT * FROM tiket LIMIT $start, $per_hal");
                }
                while($p = mysqli_fetch_array($tiket)){ ?>	
                    <div class="col-md- 10 container">
                        <div  style="background-image: url('img2/tiket/bg.png');background-size:cover;height:200">
                            <div><a href="detail_tiket.php?id=<?=$p['id_tiket']?>">
                                <div class="pricing popular box-body media">   
                                    <div>
                                    &nbsp;&nbsp;<img src="<?php echo 'img2/'.$p['gambar']; ?>" width="250" height="180" style="float:left">
                                    </div>&nbsp;&nbsp;&nbsp;
                                    <div class="event-date margin-bottom-5"><br>
                                    <i style="float:left;font-size:15px;">Jadwal berangkat <?=$p['jadwal']?> dan kembali pada tanggal <?=$p['jadwal2']?> </i><br>
                                        <input class="popularity" type="hidden" value=<?=$p['id_tiket']?>>
                                        <span class="popularity"> Rp. <?=number_format($p['harga'])?> ,-</span>
                                            <div class="media-body">
                                                <h3 style="color:#fff;"><?=$p['nama_paket']?></h3>
                                                <span class="list-unstyled" >stok : <?=$p['stok']?></span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div><hr>
                            </div>
                        <?php }?><br><br><br>
                    <ul class="pagination a col-md 10 container">
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