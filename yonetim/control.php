<?php
include_once ("assets/fonksiyon.php");
$yonetim = new yonetim;
$yonetim->kontrolet("control");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
   
    <title>Udemy Nakliyat-Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">    
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">   
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
  <div id="preloader">
        <div class="loader"></div>
    </div>

    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="control.php"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                                                      
                            <li><a href="control.php?sayfa=siteayar"><i class="ti-pencil"></i> <span>Site Ayarları</span></a></li>
                            <li><a href="control.php?sayfa=introayar"><i class="ti-image"></i> <span>İntro Ayarları</span></a></li>
                            <li><a href="control.php?sayfa=hakkimizayar"><i class="ti-flag"></i> <span>Hakkımızda Ayarları</span></a></li>
                            <li><a href="control.php?sayfa=hizmetlerayar"><i class="ti-medall"></i> <span>Hizmetlerimiz Ayarları</span></a></li>
                            <li><a href="control.php?sayfa=filoayar"><i class="ti-car"></i> <span>Araç Filosu</span></a></li>
                            <li><a href="control.php?sayfa=referansayar"><i class="ti-comment-alt"></i> <span>Referans Yorumları</span></a></li>
                            <li><a href="control.php?sayfa=gelenmesaj"><i class="fa fa-envelope"></i> <span>Gelen Mesajlar</span></a></li>
                            <li><a href="control.php?sayfa=mailayar"><i class="fa fa-cog"></i> <span>Mail Ayarları</span></a></li>




                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                      
                    </div>
                    <!-- profile info & task notification -->
                     <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $yonetim->kuladial($baglanti); ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="control.php?sayfa=ayarlar">Ayarlar</a>
                                <a class="dropdown-item" href="control.php?sayfa=kulayar">Kullanıcı Ayarları</a>
                                <a class="dropdown-item" href="control.php?sayfa=cikis">Çıkış</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->

            <!-- page title area end -->
            <div class="main-content-inner">
                <!-- sales report area start -->
               <div class="row">
                    <div class="col-lg-12 mt-5 bg-white text-center " style="min-height:500px;">




                        <?php
                        @$sayfa = $_GET["sayfa"];

                        switch ($sayfa):

                            case "siteayar":
                            $yonetim->siteayar($baglanti);
                                break;
                            case "cikis":
                                $yonetim->cikis($baglanti);
                                break;

                            // -----------------
                            case "introayar":
                                $yonetim->introayar($baglanti);
                                break;
                            case "introresimguncelle":
                                $yonetim->introresimguncelleme($baglanti);
                                break;
                            case "introresimsil":
                                $yonetim->introsil($baglanti);
                                break;
                            case "introresimekle":
                                $yonetim->introresimekleme($baglanti);
                                break;

                            // -----------------

                            case "filoayar":
                                $yonetim->filogetir($baglanti);
                                break;
                            case "filoresimekle":
                                $yonetim->filoresimekle($baglanti);
                                break;
                            case "filoresimguncelle":
                                $yonetim->filoresimguncelle($baglanti);
                                break;
                            case "filoresimsil":
                                $yonetim->filoresimsil($baglanti);
                                break;

                            //  -----------------

                            case "hakkimizayar":
                                $yonetim->hakkimizda($baglanti);
                                break;
                            case "hakkimizdaekle":
                                $yonetim->hakkimizdaekle($baglanti);
                                break;
                            case "hakkimizdaguncelle":
                                $yonetim->hakkimizdaguncelle($baglanti);
                                break;
                            case "hakkimizdasil":
                                $yonetim->hakkimizdasil($baglanti);
                                break;
                            //  -----------------

                            case "hizmetlerayar":
                                $yonetim->hizmetler($baglanti);
                                break;
                            case "hizmetlerekle":
                                $yonetim->hizmetlerekle($baglanti);
                                break;
                            case "hizmetlerguncelle":
                                $yonetim->hizmetlerguncelle($baglanti);
                                break;
                            case "hizmetlersil":
                                $yonetim->hizmetlersil($baglanti);
                                break;

                            //  -----------------
                            case "referansayar":
                                $yonetim->referansayar($baglanti);
                                break;
                            case "referansekle":
                                $yonetim->referansekle($baglanti);
                                break;
                            case "referansguncelle":
                                $yonetim->referansguncelle($baglanti);
                                break;
                            case "referanssil":
                            $yonetim->referanssil($baglanti);
                                break;
                            case "refresimekle":
                                $yonetim->refresimekle($baglanti);
                                break;

                            // -----------------
                            case "gelenmesaj":
                                $yonetim->gelenmesajlar($baglanti);
                                break;
                            case "mesajoku":
                                $yonetim->mesajdetay($baglanti,$_GET["id"]);
                                break;
                            case "mesajarsivle":
                                $yonetim->mesajarsivle($baglanti,$_GET["id"]);
                                break;
                            case "mesajsil":
                                $yonetim->mesajsil($baglanti,$_GET["id"]);
                                break;
                            // -----------------
                            case "mailayar":
                                $yonetim->mailayar($baglanti);
                                break;
                            // -----------------
                            // -----------------
                            case "ayarlar":
                                $yonetim->ayarlar($baglanti);
                                break;
                            // -----------------
                            case "kulayar":
                                $yonetim->kullistele($baglanti);
                                break;

                            case "yonsil":
                                $yonetim->yonsil($baglanti,$_GET["id"]);
                                break;

                            case "yonekle":
                                $yonetim->yonekle($baglanti);
                                break;
                            default:
                                $yonetim->siteayar($baglanti);
                        endswitch;

                        ?>
                       
                </div>
            </div>
            </div>
        </div>
        <!-- main content area end -->
    </div>
    <!-- page container area end -->
    
   
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>  

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
