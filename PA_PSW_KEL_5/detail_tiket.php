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
                margin-left: 800px;  
            }
        </style>
        <style>
            .main {
            width: 800px;
            height: 600px;
            margin: 50px auto;
            }
            .panel {
                background-color: #444;
                height: 34px;
                padding: 10px;
            }
            .panel a#login_pop, .panel a#join_pop {
                border: 2px solid #aaa;
                color: #fff;
                display: block;
                float: right;
                margin-right: 10px;
                padding: 5px 10px;
                text-decoration: none;
                text-shadow: 1px 1px #000;

                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
                -ms-border-radius: 10px;
                -o-border-radius: 10px;
                border-radius: 10px;
            }
            a#login_pop:hover, a#join_pop:hover {
                border-color: #eee;
            }
            .overlay {
                background-color: rgba(0, 0, 0, 0.6);
                bottom: 0;
                cursor: default;
                left: 0;
                opacity: 0;
                position: fixed;
                right: 0;
                top: 0;
                visibility: hidden;
                z-index: 1;

                -webkit-transition: opacity .5s;
                -moz-transition: opacity .5s;
                -ms-transition: opacity .5s;
                -o-transition: opacity .5s;
                transition: opacity .5s;
            }
            .overlay:target {
                visibility: visible;
                opacity: 1;
            }
            .popup {
                background-color: lightblue;
                width: 30%;
                height: 48%;
                border: 3px solid white;
                display: inline-block;
                left: 50%;
                opacity: 0;
                padding: 15px;
                position: fixed;
                text-align: justify;
                top: 80%;
                visibility: hidden;
                z-index: 10;

                -webkit-transform: translate(-50%, -50%);
                -moz-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                -o-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);

                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
                -ms-border-radius: 10px;
                -o-border-radius: 10px;
                border-radius: 10px;

                -webkit-box-shadow: 0 1px 1px 2px rgba(0, 0, 0, 0.4) inset;
                -moz-box-shadow: 0 1px 1px 2px rgba(0, 0, 0, 0.4) inset;
                -ms-box-shadow: 0 1px 1px 2px rgba(0, 0, 0, 0.4) inset;
                -o-box-shadow: 0 1px 1px 2px rgba(0, 0, 0, 0.4) inset;
                box-shadow: 0 1px 1px 2px rgba(0, 0, 0, 0.4) inset;

                -webkit-transition: opacity .5s, top .5s;
                -moz-transition: opacity .5s, top .5s;
                -ms-transition: opacity .5s, top .5s;
                -o-transition: opacity .5s, top .5s;
                transition: opacity .5s, top .5s;
            }
            .overlay:target+.popup {
                top: 50%;
                opacity: 1;
                visibility: visible;
            }
            .close {
                background-color: black;
                height: 30px;
                line-height: 30px;
                position: absolute;
                right: 0;
                text-align: center;
                text-decoration: none;
                top: -15px;
                width: 30px;

                -webkit-border-radius: 15px;
                -moz-border-radius: 15px;
                -ms-border-radius: 15px;
                -o-border-radius: 15px;
                border-radius: 15px;
            }
            .close:before {
                color: rgba(255, 255, 255, 0.9);
                content: "X";
                font-size: 24px;
                text-shadow: 0 -1px rgba(0, 0, 0, 0.9);
            }
            .close:hover {
                background-color: rgba(64, 128, 128, 0.8);
            }
            .popup p, .popup div {
                margin-bottom: 10px;
            }
            .popup label {
                display: inline-block;
                text-align: left;
                width: 120px;
            }
            .popup input[type="text"],[type="email"], .popup input[type="password"] {
                border: 1px solid;
                border-color: #999 #ccc #ccc;
                margin: 0;
                width: 100%;
                padding: 2px;

                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                -ms-border-radius: 2px;
                -o-border-radius: 2px;
                border-radius: 2px;
            }
            #input_reg{
                width: 100%;
            }
            .popup input[type="text"]:hover, .popup input[type="password"]:hover {
                border-color: #555 #888 #888;
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
            $id_tiket = $_GET['id'];
            $tiket = mysqli_query($koneksi, "SELECT * FROM tiket WHERE id_tiket = '$id_tiket'") or die(mysqli_error($koneksi));
            $p = mysqli_fetch_array($tiket);
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
            
        <div class="tabel"> 
            <div class="container single_grid" style="margin-top:10px;background-color:#fff">
                <div><br>
                    <p style="margin-left:30px;color:black;">Jadwal berangkat <?=$p['jadwal']?> dan jadwal kembali <?=$p['jadwal2']?></p>
                    <img style="margin-top:10px;margin-left:30px;" src="img2/<?=$p['gambar']?>" width="400" height="350">
                    <h1 style="margin-left:30px;color:black;"><?php echo $p['nama_paket']?></h1>
                        <form>
                            <div class="simpleCart_shelfItem">
                                <div class="price_single">
                                    <div style="margin-left:300px;color:black;" class="head"><h3>Rp. <?= number_format($p['harga'])?>,-</h3></div>
                                </div><hr>
                                    <table class="" style="margin-left:30px;color:black;">
                                        <tr>
                                            <td colspan="3">Jumlah Tersedia<td>
                                            <td><input disabled="disabled" style="margin-left:400px;width:80px;color:black;text-align:center" value="<?php echo  $p['stok']?>"></td>
                                        </tr><br>
                                        <tr>
                                            <td colspan="4">Masukkan Jumlah</td>
                                            <td><input type="number" style="margin-left:400px;width:80px;color:black;" name="jumlah" class="form-control input-sm" min="1" max="<?php echo $data['stok']; ?>" style="width: 100px;" value="1"></td>
                                        </tr>
                                    </table><hr>
                                    <a data-aos="fade-right" href="#login_form" id="login_pop" class="btn btn-outline-silver" style="background-color:silver;float:right">Pesan Sekarang</a>
                            </div><br><br>
                        </form>
                        <!-- popup form #1 -->
                        <a href="#x" class="overlay" id="login_form"></a>
                            <div class="popup">
                                <b><center><h4>Mari isi data anda</h4>
                                <form method="POST" action="proses_pesan.php">
                                    <fieldset id="inputs" style="color: black;">
                                        <div>
                                            <span class="glyphicon glyphicon-user span"></span>
                                            <select class="form-control" name="id_tiket" style="width:100%px">
                                                <?php
                                                    $query = mysqli_query($koneksi, "SELECT * FROM tiket");
                                                    while($q = mysqli_fetch_assoc($query)){
                                                    echo '<option>'. $q['id_tiket'] .'</option>';		
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="input-group">Nama lengkap</div>
                                        <input style="color:black" type="text" id="input_reg" class="input" name="nama" placeholder="nama anda" required>
                                        <div class="input-group"><br> Jenis Kelamin</div>
                                        <div>
                                            <span class="glyphicon glyphicon-user span"></span>
                                            <select id="input_reg" name="gender" required>
                                                <option value="0">- Pilih Gender -</option>
                                                <option value="Laki-laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="input-group">Email</div>
                                        <div>
                                            <input style="color:black" type="email" class="input" name="email" placeholder="masukkan email" required> 
                                        </div>
                                        <div>
                                            <center><input type="submit" class="submit_daftar" name="submit_anggota" value="Pesan"></center>
                                        </div>
                                    </fieldset>
                                </form>
                                <a class="close" href="#close"></a>
                            </div>
                            <!-- end pop-up-->
                </div>
            </div>        
        </div><br><br>

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