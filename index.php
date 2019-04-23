<?php
include_once("lib/fonksiyon.php");
$sinif = new kurumsalyeni;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <title><?= $sinif->title; ?></title>
    <meta name="title" content="<?= $sinif->metatitle; ?>"/>
    <meta name="description" content="<?= $sinif->metadesc; ?>"/>
    <meta name="keywords" content="<?= $sinif->metakey; ?>"/>
    <meta name="author" content="<?= $sinif->metaauthor; ?>"/>
    <meta name="owner" content="<?= $sinif->metaowner; ?>"/>
    <meta name="copyright" content="<?= $sinif->metacopy; ?>"/>
    <!-- Kütüphaneler -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/superfish/hoverIntent.js"></script>
    <script src="lib/superfish/superfish.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/magnific-popup/magnific-popup.min.js"></script>
    <script src="lib/sticky/sticky.js"></script>
    <script src="js/main.js"></script>


    <!-- Fontlar -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap stil dosyası -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- işimize yarayacak diğer kütüphane css dosyalarımız -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- bizim stil dosyamız -->
  <link href="css/style.css" rel="stylesheet">
    <script>
        $(document).ready(function (e) {

            $("#gonderbtn").click(function () {

                $.ajax({
                    type:"POST",
                    url:'lib/mail/gonder.php',
                    data:$('#mailform').serialize(),
                    success:function (donen){
                        $('#mailform').trigger("reset");
                        $('#formtutucu').fadeOut(500);
                        $('#mesajsonuc').show(2000).html(donen);
                        $('#formtutucu').show(2000);
                        $('#mesajsonuc').hide(4000);
                    },
                });

            });

        });
    </script>
</head>

<body>
    
    <!-- header -->
    
    <header id="header">    
      <div class="container">        
          <div id="logo" class="pull-left">
              <h1><a href="#"> <img class="img-responsive" src="<?= $sinif->logoresimadres; ?>" style="height:50px; width:275px;"/></a> </h1>
          </div>                     
            <nav id="nav-menu-container">
              <ul class="nav-menu">        
                <li class="menu-active"><a href="#">Anasayfa</a></li>
                <li><a href="#hakkimizda">Hakkımızda</a></li>
                <li><a href="#hizmetler">Hizmetlerimiz</a></li>
                <li><a href="#filo">Araç Filomuz</a></li>
                <li><a href="#yorumlar">Referanslarımız</a></li>
                <li><a href="#iletisim">İletişim</a></li> 
              </ul>
            </nav>       
        </div>   
    </header>
      
<!-- İNTRO -->
<section>
  <div class="container-fluid">
<!--Carousel Wrapper-->
<div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
        <?php $sinif->slidericon($baglanti); ?>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <?php $sinif->introbak($baglanti); ?>
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
  </div>
  <!--/.Carousel Wrapper-->
</div>
</section>
    
<section id="hakkimizda">
  <div class="container">
      <?php $sinif->hakkimizda($baglanti); ?>
  </div>
</section>
    
    <!-- ana main -->
    
    <section id="hizmetler">
      <div class="container">
            <?php $sinif->hizmetlerimiz($baglanti); ?>

        </div>

    </section>
    

    <!-- Filomuz -->
    
    
    <section class="wow fadeInUp text-center">
        
    <div  class="container">
        <h2 id="filo"><?= $sinif->filobaslik; ?></h2>
             <!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel">
    <!--Indicators-->
    
    <ol class="carousel-indicators"  >
        <?php $sinif->filoicon($baglanti); ?>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <?php $sinif->filobak($baglanti); ?>

    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
  </div>
  <!--/.Carousel Wrapper-->
                        
    
    </div>
    </section>
    
    <!-- müşteri Yorumlar -->
    
    
    <section id="yorumlar" class="wow fadeInUp text-center">
    
    <div class="container">
    
    
              <div class="section-header">
                <h2><?= $sinif->referansbaslik; ?></h2>
                </div>
                 
                      <div class="col-md-8 col-center m-auto">
                    
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                          <!-- Carousel indicators -->
                          <ol class="carousel-indicators">
                              <?php $sinif->referansicon($baglanti); ?>
                          </ol>   
                          <!-- Wrapper for carousel items -->
                          <div class="carousel-inner">
                              <?php $sinif->referansgetir($baglanti); ?>

                          </div>
                          <!-- Carousel controls -->
                          <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </div>
                   
             
        
                   
    </div>
    
    
    
    
    </section>
    
      
    <!-- iletişim -->
    
   <!--Section: Contact v.2-->
<section id="iletisim">
    <div class="container">
    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-left my-4"><?= $sinif->iletisimbaslik; ?></h2>
    <!--Section description-->

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <div class="form">
            <div id="mesajsonuc">

            </div>
            <div id="formtutucu">
            <form id="mailform">

                <div class="form-row">
                
                <div class="form-group col-md-6">
                <input type="text" name="isim" class="form-control" placeholder="Adınız" required="required" />
                
                </div>
                
                <div class="form-group col-md-6">
                <input type="text" name="mail" class="form-control" placeholder="Mail Adresiniz" required="required" />
                
                </div>
                </div>
                              
                
                <div class="form-group">
                <input type="text" name="konu" class="form-control" placeholder="Mesaj Konusu" required="required" />
                </div>
                
                <div class="form-group">
                <textarea class="form-control" name="mesaj" rows="5"></textarea>
                </div>
                
                
                
                <div class="text-center"><input type="button"  value="Gönder" id="gonderbtn" class="btn btn-info"/></div>
                
                </form>
            </div>
            </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fa fa-location-arrow fa-2x"></i>
                    <p><?= $sinif->adres; ?></p>
                </li>

                <li><i class="fa fa-phone fa-2x"></i>
                    <p><?= $sinif->telefon; ?></p>
                </li>

                <li><i class="fa fa-envelope-o fa-2x"></i>
                    <p><?= $sinif->mailadres; ?></p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>
  </div>     

</section>
<br>
<hr>
<section id="topbar" class="d-none d-lg-block ">
    <div class="container ">

        <div class="social-links text-center ">
            <h2><?= $sinif->sosyalmedyabaslik; ?></h2>
          <a href="<?= $sinif->twitter; ?>" class="twitter mx-3"><i class="fa fa-twitter fa-3x"></i></a>
          <a href="<?= $sinif->facebook; ?>" class="facebook mx-3"><i class="fa fa-facebook fa-3x"></i></a>
            <a href="<?= $sinif->instagram; ?>" class="instagram mx-3"><i class="fa fa-instagram fa-3x"></i></a>
          </div>
    </div>    
    </section> 
<!--Section: Contact v.2-->
<hr>

<div class="container">
    <iframe src="<?= $sinif->haritabilgi; ?>" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
 </div>  
<br>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>




</body>
</html>
