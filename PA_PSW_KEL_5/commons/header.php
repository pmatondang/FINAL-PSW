<?php
    if(isset($_GET['out'])){
        session_start();
        session_destroy();
        header('location : index.php');
    }
?>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="img/login/travelword.jpg">
</head>

    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="dashboard_user.php">
                                        <img class="logo" src="img/login/travelword.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="dashboard_user.php">Home</a></li>
                                            <li><a href="paket_user.php">Paket</a></li>
                                            <li><a class="" href="jadwal_user.php">Jadwal</a></l/li>
                                            <li><a href="tiket_user.php">Tiket</li>
                                            <li><a href="testimoni_user.php">Hubungi kami</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                    <div class="number">
                                        <p> <i class="fa fa-phone"></i>+628 194 90328 82</p>
                                    </div>
                                    <div class="search_btn">
                                        <a href="index.php"><button class="boxed-btn4" type="submit">Keluar</button></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->