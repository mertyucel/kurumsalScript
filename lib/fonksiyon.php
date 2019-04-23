<?php

try{
    $baglanti = new PDO("mysql:host=localhost;dbname=kurumsalyeni;charset=utf8","root","");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e){
    die($e->getMessage());
}

class kurumsalyeni{

    public $title,$metatitle,$metadesc,$metakey,$metaauthor,$metaowner,$metacopy,$logoresimadres,$twitter,$facebook,$instagram,$adres,$telefon,$mailadres,$haritabilgi,$hakkimizdabaslik,$hakkimizdaicerik,$hizmetlerbaslik,$filobaslik,$referansbaslik,$iletisimbaslik,$sosyalmedyabaslik;

    function __construct()
    {

        try {
            $baglanti = new PDO("mysql:host=localhost;dbname=kurumsalyeni;charset=utf8", "root", "");
            $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        $ayarcek = $baglanti->prepare("select * from ayarlar");
        $ayarcek->execute();
        $sorguson = $ayarcek->fetch();

        $this->title = $sorguson["title"];
        $this->metatitle = $sorguson["metatitle"];
        $this->metadesc = $sorguson["metadesc"];
        $this->metakey = $sorguson["metakey"];
        $this->metaauthor = $sorguson["metaauthor"];
        $this->metaowner = $sorguson["metaowner"];
        $this->metacopy = $sorguson["metacopy"];
        $this->logoresimadres = $sorguson["logoresimadres"];
        $this->twitter = $sorguson["twitter"];
        $this->facebook = $sorguson["facebook"];
        $this->instagram = $sorguson["instagram"];
        $this->telefon = $sorguson["telefon"];
        $this->mailadres = $sorguson["mailadres"];
        $this->adres = $sorguson["adres"];
        $this->haritabilgi = $sorguson["haritabilgi"];
        $this->hakkimizdabaslik = $sorguson["hakkimizdabaslik"];
        $this->hakkimizdaicerik = $sorguson["hakkimizdaicerik"];
        $this->hizmetlerbaslik = $sorguson["hizmetlerbaslik"];
        $this->filobaslik = $sorguson["filobaslik"];
        $this->referansbaslik = $sorguson["referansbaslik"];
        $this->iletisimbaslik = $sorguson["iletisimbaslik"];
        $this->sosyalmedyabaslik = $sorguson["sosyalmedyabaslik"];



    } // ayarları çekme

    function introbak($baglanti){
        $introal=$baglanti->prepare("select * from intro");
        $introal->execute();

        $sayi=0;

        while ($sonucum=$introal->fetch(PDO::FETCH_ASSOC)):

            if ($sayi==0):
                echo '<div class="carousel-item active"><img class="d-block w-100" src="'.$sonucum["resimyol"].'"></div>';
                $sayi=1;
            else:
                echo '<div class="carousel-item"><img class="d-block w-100" src="'.$sonucum["resimyol"].'"></div>';

            endif;

        endwhile;



    } // intro resimleri getir

    function slidericon($baglanti) {


        $introal=$baglanti->prepare("select * from intro");
        $introal->execute();
        $verisayi=$introal->rowCount();

        for ($i=0; $i<$verisayi; $i++) :

            if ($i==0):
                echo '<li data-target="#carousel-example-1z" data-slide-to="'.$i.'" class="active"></li>';

            else:
                echo '<li data-target="#carousel-example-1z" data-slide-to="'.$i.'"></li>';
            endif;




        endfor;


    } // slidericon

    function hakkimizda($baglanti){

        $introal = $baglanti->prepare("select * from hakkimizda");
        $introal->execute();

        echo '<div class="section-header text-center">
            <h2>'; echo $this->hakkimizdabaslik; echo '</h2>
            <p>'; echo $this->hakkimizdaicerik; echo '</p>
            </div>
            <div class="row bg-light">';

        while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)):

            echo '<div class="col-lg-4 text-center">
                        <div class="box">
                            <div class="icon text-center"><i class="'.$sonucum["icon"].'"></i></div>
                            <h4 class="box"><a href="#" class="text-info">'.$sonucum["baslik"].'</a></h4>
                        </div>
                       </div>';
        endwhile;

        echo '</div>';


    } // hakkimizda

    function hizmetlerimiz($baglanti){

        $introal = $baglanti->prepare("select * from hizmetler");
        $introal->execute();

        echo '<div class="section-header text-center">
            <h2>'; echo $this->hizmetlerbaslik; echo '</h2>
              </div>
            <div class="row">';

        while ($sonucum = $introal->fetch(PDO::FETCH_ASSOC)):

            echo '<div class="col-lg-4 col-md-3">
                        <div class="box wow fadeInLeft">
                            <div class="icon"><i class="'.$sonucum["icon"].'"></i></div>
                            <h4 class="title"><a href="#">'.$sonucum["baslik"].'</a></h4>
                            <p class="description text-muted">'.$sonucum["icerik"].'</p>
                        </div>
                       </div>';
        endwhile;

        echo '</div>';

    } // hizmetlerimiz

    function filobak($baglanti){
        $introal=$baglanti->prepare("select * from filo");
        $introal->execute();

        $sayi=0;

        while ($sonucum=$introal->fetch(PDO::FETCH_ASSOC)):

            if ($sayi==0):
                echo '<div class="carousel-item active">
                            <div class="view">
                              <img class="d-block w-100" src="'.$sonucum["resimyol"].'"">          
                             </div>
                      </div>';
                $sayi=1;
            else:
                echo '<div class="carousel-item">
                            <div class="view">
                              <img class="d-block w-100" src="'.$sonucum["resimyol"].'"">          
                             </div>
                      </div>';

            endif;

        endwhile;



    } // filo resimleri getir

    function filoicon($baglanti) {


        $introal=$baglanti->prepare("select * from filo");
        $introal->execute();
        $verisayi=$introal->rowCount();

        for ($i=0; $i<$verisayi; $i++) :

            if ($i==0):
                echo '<li data-target="#carousel-example-2" data-slide-to="'.$i.'" class="active"></li>';

            else:
                echo '<li data-target="#carousel-example-2" data-slide-to="'.$i.'"></li>';
            endif;


        endfor;


    } // filo slideicon

    function referansicon($baglanti) {


        $introal=$baglanti->prepare("select * from referans");
        $introal->execute();
        $verisayi=$introal->rowCount();

        for ($i=0; $i<$verisayi; $i++) :

            if ($i==0):
                echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';

            else:
                echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
            endif;


        endfor;


    } // referans slideicon

    function referansgetir($baglanti){
        $introal=$baglanti->prepare("select * from referans");
        $introal->execute();

        $sayi=0;

        while ($sonucum=$introal->fetch(PDO::FETCH_ASSOC)):

            if ($sayi==0):


                echo '<div class="item carousel-item active">
                        <div class="img-box"><img src="'.$sonucum["resimyol"].'"></div>
                        <p class="testimonial">'.$sonucum["icerik"].'</p>
                        <p class="overview"><b>'.$sonucum["kisi"].'</b>, '.$sonucum["gorev"].'</p>
                    </div>';
                $sayi=1;
            else:
                echo '<div class="item carousel-item">
                        <div class="img-box"><img src="'.$sonucum["resimyol"].'"></div>
                        <p class="testimonial">'.$sonucum["icerik"].'</p>
                        <p class="overview"><b>'.$sonucum["kisi"].'</b>, '.$sonucum["gorev"].'</p>
                    </div>';

            endif;

        endwhile;
    } // referans getir














}


?>