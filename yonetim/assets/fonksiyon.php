<?php
ob_start();
try{
    $baglanti = new PDO("mysql:host=localhost;dbname=kurumsalyeni;charset=utf8","root","");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e){
    die($e->getMessage());
}

class yonetim{

    private $veriler = array();

    function sorgum($vt,$sorgu,$tercih=0){
        $al = $vt->prepare($sorgu);
        $al->execute();

        if ($tercih == 1):
            return $al->fetch();

        elseif ($tercih == 2):
            return $al;

        endif;

    } // GENEL SORGUM

    function siteayar($baglanti){
        $sonuc = self::sorgum($baglanti,"select * from ayarlar",1);

        if ($_POST):

            $title=htmlspecialchars($_POST["title"]);
            $metatitle=htmlspecialchars($_POST["metatitle"]);
            $metadesc=htmlspecialchars($_POST["metadesc"]);
            $metakey=htmlspecialchars($_POST["metakey"]);
            $metaauthor =htmlspecialchars($_POST["metaauthor"]);
            $metaowner=htmlspecialchars($_POST["metaowner"]);
            $metacopy=htmlspecialchars($_POST["metacopy"]);
            $logoresimadres=htmlspecialchars($_POST["logoresimadres"]);
            $twitter=htmlspecialchars($_POST["twitter"]);
            $facebook=htmlspecialchars($_POST["facebook"]);
            $instagram=htmlspecialchars($_POST["instagram"]);
            $adres=htmlspecialchars($_POST["adres"]);
            $telefon=htmlspecialchars($_POST["telefon"]);
            $mailadres=htmlspecialchars($_POST["mailadres"]);
            $haritabilgi=htmlspecialchars($_POST["haritabilgi"]);
            $hakkimizdabaslik =htmlspecialchars($_POST["hakkimizdabaslik"]);
            $hakkimizdaicerik=htmlspecialchars($_POST["hakkimizdaicerik"]);
            $hizmetlerbaslik=htmlspecialchars($_POST["hizmetlerbaslik"]);
            $filobaslik=htmlspecialchars($_POST["filobaslik"]);
            $referansbaslik=htmlspecialchars($_POST["referansbaslik"]);
            $iletisimbaslik=htmlspecialchars($_POST["iletisimbaslik"]);
            $sosyalmedyabaslik=htmlspecialchars($_POST["sosyalmedyabaslik"]);
            $mesajtercih=htmlspecialchars($_POST["mesajtercih"]);



            // burada veritabanı işlemleri

            $guncelleme = $baglanti->prepare("update ayarlar set title=?,metatitle=?,metadesc=?,metakey=?,metaauthor=?,metaowner=?,metacopy=?,logoresimadres=?,twitter=?,facebook=?,instagram=?,adres=?,telefon=?,mailadres=?,haritabilgi=?,hakkimizdabaslik=?,hakkimizdaicerik=?,hizmetlerbaslik=?,filobaslik=?,referansbaslik=?,iletisimbaslik=?,sosyalmedyabaslik=?,mesajtercih=?");

            $guncelleme->bindParam(1,$title,PDO::PARAM_STR);
            $guncelleme->bindParam(2,$metatitle,PDO::PARAM_STR);
            $guncelleme->bindParam(3,$metadesc,PDO::PARAM_STR);
            $guncelleme->bindParam(4,$metakey,PDO::PARAM_STR);
            $guncelleme->bindParam(5,$metaauthor,PDO::PARAM_STR);
            $guncelleme->bindParam(6,$metaowner,PDO::PARAM_STR);
            $guncelleme->bindParam(7,$metacopy,PDO::PARAM_STR);
            $guncelleme->bindParam(8,$logoresimadres,PDO::PARAM_STR);
            $guncelleme->bindParam(9,$twitter,PDO::PARAM_STR);
            $guncelleme->bindParam(10,$facebook,PDO::PARAM_STR);
            $guncelleme->bindParam(11,$instagram,PDO::PARAM_STR);
            $guncelleme->bindParam(12,$adres,PDO::PARAM_STR);
            $guncelleme->bindParam(13,$telefon,PDO::PARAM_STR);
            $guncelleme->bindParam(14,$mailadres,PDO::PARAM_STR);
            $guncelleme->bindParam(15,$haritabilgi,PDO::PARAM_STR);
            $guncelleme->bindParam(16,$hakkimizdabaslik,PDO::PARAM_STR);
            $guncelleme->bindParam(17,$hakkimizdaicerik,PDO::PARAM_STR);
            $guncelleme->bindParam(18,$hizmetlerbaslik,PDO::PARAM_STR);
            $guncelleme->bindParam(19,$filobaslik,PDO::PARAM_STR);
            $guncelleme->bindParam(20,$referansbaslik,PDO::PARAM_STR);
            $guncelleme->bindParam(21,$iletisimbaslik,PDO::PARAM_STR);
            $guncelleme->bindParam(22,$sosyalmedyabaslik,PDO::PARAM_STR);
            $guncelleme->bindParam(23,$mesajtercih,PDO::PARAM_INT);

            $guncelleme->execute();

            echo '
                <div class="alert alert-success mt-5">
                   <strong>SİTE AYARLARI</strong>  BAŞARIYLA GÜNCELLENDİ.
                </div>
            ';

            header("refresh:2,url=control.php");

            else:
            ?>
                <form action="control.php?sayfa=siteayar" method="post">
                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <h3 class="text-info">SİTE AYARLARI</h3>
                        </div>
                        <div class="col-lg-12 mx-auto mt-2 border">
                            <table class="table table-striped">
                                <thead class="bg-info">
                                <tr>
                                    <th scope="col"  class="text-white">Ayar Adı</th>
                                    <th scope="col" class="text-white">Mevcut Değer</th>
                                </tr>
                                <br>
                                <hr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><span class="col-lg-2">Başlık</span></td>
                                    <td><input type="text" name="title" class="form-control mx-auto col-lg-10" value="<?= $sonuc["title"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Meta Başlığı</span></td>
                                    <td><input type="text" name="metatitle" class="form-control mx-auto col-lg-10" value="<?= $sonuc["metatitle"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Meta Tanımı</span></td>
                                    <td><input type="text" name="metadesc" class="form-control mx-auto col-lg-10" value="<?= $sonuc["metadesc"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Meta Anahtarları</span></td>
                                    <td><input type="text" name="metakey" class="form-control mx-auto col-lg-10"  value="<?= $sonuc["metakey"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Site Yazarı</span></td>
                                    <td><input type="text" name="metaauthor" class="form-control mx-auto col-lg-10" value="<?= $sonuc["metaauthor"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Site Sahibi</span></td>
                                    <td><input type="text" name="metaowner" class="form-control mx-auto col-lg-10" value="<?= $sonuc["metaowner"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Site Tarihi</span></td>
                                    <td><input type="text" name="metacopy" class="form-control mx-auto col-lg-10" value="<?= $sonuc["metacopy"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Logo Resmi</span></td>
                                    <td><input type="text" name="logoresimadres" class="form-control mx-auto col-lg-10" value="<?= $sonuc["logoresimadres"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Twitter Adresi</span></td>
                                    <td><input type="text" name="twitter" class="form-control mx-auto col-lg-10" value="<?= $sonuc["twitter"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Facebook Adresi</span></td>
                                    <td><input type="text" name="facebook" class="form-control mx-auto col-lg-10" value="<?= $sonuc["facebook"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Instagram Adresi</span></td>
                                    <td><input type="text" name="instagram" class="form-control mx-auto col-lg-10" value="<?= $sonuc["instagram"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Adres</span></td>
                                    <td><input type="text" name="adres" class="form-control mx-auto col-lg-10" value="<?= $sonuc["adres"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Telefon</span></td>
                                    <td><input type="text" name="telefon" class="form-control mx-auto col-lg-10" value="<?= $sonuc["telefon"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Mail Adresi</span></td>
                                    <td><input type="text" name="mailadres" class="form-control mx-auto col-lg-10" value="<?= $sonuc["mailadres"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Harita Bilgisi</span></td>
                                    <td><input type="text" name="haritabilgi" class="form-control mx-auto col-lg-10" value="<?= $sonuc["haritabilgi"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Hakkımızda Başlığı</span></td>
                                    <td><input type="text" name="hakkimizdabaslik" class="form-control mx-auto col-lg-10" value="<?= $sonuc["hakkimizdabaslik"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Hakkımızda İçeriği</span></td>
                                    <td><input type="text" name="hakkimizdaicerik" class="form-control mx-auto col-lg-10" value="<?= $sonuc["hakkimizdaicerik"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Hizmetler Başlığı</span></td>
                                    <td><input type="text" name="hizmetlerbaslik" class="form-control mx-auto col-lg-10" value="<?= $sonuc["hizmetlerbaslik"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Filo Başlığı</span></td>
                                    <td><input type="text" name="filobaslik" class="form-control mx-auto col-lg-10" value="<?= $sonuc["filobaslik"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Referans Başlığı</span></td>
                                    <td><input type="text" name="referansbaslik" class="form-control mx-auto col-lg-10" value="<?= $sonuc["referansbaslik"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">İletişim Başlığı</span></td>
                                    <td><input type="text" name="iletisimbaslik" class="form-control mx-auto col-lg-10" value="<?= $sonuc["iletisimbaslik"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Sosyal Medya Başlığı</span></td>
                                    <td><input type="text" name="sosyalmedyabaslik" class="form-control mx-auto col-lg-10" value="<?= $sonuc["sosyalmedyabaslik"]; ?>"></td>
                                </tr>
                                <tr>
                                    <td><span class="col-lg-2">Mesaj Tercih</span></td>
                                    <td class="text-danger ">
                                        Sadece Mail :
                                        <input type="radio" name="mesajtercih" value="1" class=" m-3" <?php echo ($sonuc["mesajtercih"] == 1) ? "checked='checked'": ""; ?> >

                                        Mail ve Mesaj :
                                        <input type="radio" name="mesajtercih" value="2" class=" m-3 " <?php echo ($sonuc["mesajtercih"] == 2) ? "checked='checked'": ""; ?>>

                                        Sadece Mesaj :
                                        <input type="radio" name="mesajtercih" value="3" class=" m-3 " <?php echo ($sonuc["mesajtercih"] == 3) ? "checked='checked'": ""; ?>>

                                    </td>


                                </tr>
                                </tbody>
                            </table>
                            <div class="col-lg-7 mx-auto mt-2 border-top">
                                <input type="submit" name="buton" class="btn btn-info m-1 btn-lg" value="GÜNCELLE">
                            </div>


                        </div>

                </form>
                <?php
                endif;
    } // site ayar getirme

    function sifrele($veri){
        return  base64_encode(gzdeflate(gzcompress(serialize($veri))));

    } // sifrele

    function coz($veri){
        return  unserialize(gzuncompress(gzinflate(base64_decode($veri))));

    } // çöz

    function kuladial($vt){
        $cookid = $_COOKIE["kulbilgi"];
        $cozduk = self::coz($cookid);
        $sorgusonuc = self::sorgum($vt,"select * from yonetim where id=$cozduk",1);
        return $sorgusonuc["kulad"];
    } // kullanıcı adını alıyoruz

    function giriskontrol($kulad,$sifre,$vt){
        $sifrelihal = md5(sha1(md5($sifre)));

        $sor = $vt->prepare("select * from yonetim where kulad='$kulad' and sifre='$sifrelihal'");
        $sor->execute();


        if ($sor->rowCount() == 0):
            echo '<div class="alert alert-danger mt-5 col-md-5 mx-auto">BİLGİLER HATALI!</div>';
            header("refresh:2,url=index.php");
        else:
            $gelendeger = $sor->fetch();
            $sor = $vt->prepare("update yonetim set aktif=1 where kulad='$kulad' and sifre='$sifrelihal'");
            $sor->execute();
            echo '<div class="alert alert-info mt-5 col-md-5 mx-auto">GİRİŞ YAPILIYOR..</div>';
            header("refresh:2,url=control.php");

            // cookie
            $id = self::sifrele($gelendeger["id"]);
            setcookie("kulbilgi",$id,time() + 60*60*24);
        endif;
    } // giriş kontrol

    function cikis($vt){
        $cookid = $_COOKIE["kulbilgi"];
        $cozduk = self::coz($cookid);
        self::sorgum($vt,"update yonetim set aktif=0 where id=$cozduk",0);
        setcookie("kulbilgi",$cookid,time() - 5);
        echo '<div class="alert alert-info mt-5 col-md-5 mx-auto">ÇIKIŞ YAPILIYOR..</div>';
        header("refresh:2,url=index.php");
    } // çıkış

    function kontrolet($sayfa){
        if (isset($_COOKIE["kulbilgi"])):
            /*
            -Giriş yapan kullanıcının bilgileri teyit etmek için db ye bağlayabilirsin
            - O bilgiler ile sağlama yaparak daha fazla kontrol yapabilirsin
            */
            if ($sayfa == "index"): header("Location:control.php"); endif;
        else:
            if ($sayfa == "control"):  header("Location:index.php");  endif;

        endif;
    } // cookie kontrol


    // -------------------- INTRO

    function introayar($vt) {
        echo '<div class="row text-center">
                <div class="col-lg-12 text-center border-bottom"><h3 class="float-left mt-3 text-info">INTRO RESİMLERİ</h3><a href="control.php?sayfa=introresimekle" class="btn btn-success m-2 btn-sm float-right">YENİ RESİM EKLE</a></div>';
        $introbilgiler = self::sorgum($vt,"select * from intro",2);
        while ($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):

            echo '<div class="col-lg-4">
                        <div class="row border border-light p-1 m-1">
                            <div class="col-lg-12">
                                <img src="../'.$sonbilgi["resimyol"].'" alt="">
                            </div>
                            <div class="col-lg-6 text-right">
                                <a href="control.php?sayfa=introresimguncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size: 25px;"></a>
                            </div>
                            <div class="col-lg-6 text-left">
                                <a href="control.php?sayfa=introresimsil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size: 25px;"></a>
                            </div>   
                         </div>
                      </div>  ';
        endwhile;
        echo '</div>';
    } // mevcut introlar getiriliyor

    function introresimekleme($vt){
        echo '<div class="row text-center">
                <div class="col-lg-12">';

        if ($_POST):
            // php işlemleri
            // ilk dosyanın boş olup olmamasına bakılacak
            // dosyanın boyutuna bakacağız
            // dosyanın uzantısına bakacağız
            // mutlu son
            if ($_FILES["dosya"]["name"] == ""):
                echo ' <div class="alert alert-danger mt-5">DOSYA YÜKLENMEDİ.BOŞ OLAMAZ.</div>';
                header("refresh:2,url=control.php?sayfa=introresimekle");
            else: // boş değil ise
                if ($_FILES["dosya"]["size"] > (1024*1024*5)):
                    echo '<div class="alert alert-danger mt-5">DOSYA BOYUTU ÇOK FAZLA</div>';
                    header("refresh:2,url=control.php?sayfa=introresimekle");
                else: // boyutta bir problem yok ise
                    $izinverilen = array("image/png","image/jpeg");
                    if (!in_array($_FILES["dosya"]["type"],$izinverilen)):
                        echo '<div class="alert alert-danger mt-5">İZİN VERİLEN DOSYA UZANTI DEĞİL!</div>';
                        header("refresh:2,url=control.php?sayfa=introresimekle");
                    else: // herşey tamam
                        $dosyaminyolu = '../img/carousel/'.$_FILES["dosya"]["name"];
                        move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                        echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA YÜKLENDİ</div>';
                        header("refresh:2,url=control.php?sayfa=introayar");
                        // Dosya yüklendikten sonra veri tabanına eklememiz lazım
                        $dosyaminyolu2 = str_replace('../','',$dosyaminyolu);
                        $kayitekle = self::sorgum($vt,"insert into intro (resimyol) VALUES ('$dosyaminyolu2')",0);

                    endif;
                endif;
            endif;

        else:
            ?>
            <div class="col-lg-4 mx-auto mt-2">
                <div class="card card-bordered">
                    <div class="card-body">
                        <h5 class="title border-bottom">Intro Resim Yükleme Formu</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <p class="card-text"><input type="file" name="dosya"></p>
                            <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1">
                        </form>
                        <p class="card-text text-left text-danger border-top">
                            * İzin verilen formatlar : jpg-png
                            * İzin verilen max.boyut : 5mb
                        </p>
                    </div>
                </div>
            </div>
        <?php
        endif;
        echo '</div></div></div>';

    } // yeni intro resmi ekleme

    function introsil($vt){
        $introid = $_GET["id"];
        $verial = self::sorgum($vt,"select * from intro where id=$introid",1);
        echo '<div class="row text-center">
                <div class="col-lg-12">';

        // dosyayı silme işlemi
        unlink("../".$verial["resimyol"]);

        // veritabanı veri silme
        self::sorgum($vt,"delete from intro where id=$introid",0);


        echo '<div class="alert alert-success mt-5">SİLMELER BAŞARILI</div>';
        echo '</div></div>';
        header("refresh:2,url=control.php?sayfa=introayar");

    } // Intro resim silme

    function introresimguncelleme($vt){

        $gelenintroid = $_GET["id"];

        echo '<div class="row text-center">
                <div class="col-lg-12">';

        if ($_POST):
            // php işlemleri
            // ilk dosyanın boş olup olmamasına bakılacak
            // dosyanın boyutuna bakacağız
            // dosyanın uzantısına bakacağız
            // mutlu son

            $formdangelenid = $_POST["introid"];

            if ($_FILES["dosya"]["name"] == ""):
                echo ' <div class="alert alert-danger mt-5">DOSYA YÜKLENMEDİ.BOŞ OLAMAZ.</div>';
                header("refresh:2,url=control.php?sayfa=introayar");
            else: // boş değil ise
                if ($_FILES["dosya"]["size"] > (1024*1024*5)):
                    echo '<div class="alert alert-danger mt-5">DOSYA BOYUTU ÇOK FAZLA</div>';
                    header("refresh:2,url=control.php?sayfa=introayar");
                else: // boyutta bir problem yok ise
                    $izinverilen = array("image/png","image/jpeg");
                    if (!in_array($_FILES["dosya"]["type"],$izinverilen)):
                        echo '<div class="alert alert-danger mt-5">İZİN VERİLEN DOSYA UZANTI DEĞİL!</div>';
                        header("refresh:2,url=control.php?sayfa=introayar");
                    else: // herşey tamam

                        // dbden mevcut veriyi çektik ve dosyayı sildik
                        $resimyolunabak = self::sorgum($vt,"select * from intro where id=$gelenintroid",1);
                        $dbgelenyol = '../'.$resimyolunabak["resimyol"];
                        unlink($dbgelenyol);
                        // dbden mevcut veriyi çektik ve dosyayı sildik

                        $dosyaminyolu = '../img/carousel/'.$_FILES["dosya"]["name"];
                        move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);

                        $dosyaminyolu2 = str_replace('../','',$dosyaminyolu);
                        self::sorgum($vt,"update intro set resimyol='$dosyaminyolu2' where id=$gelenintroid",0);

                        echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA GÜNCELLENDİ</div>';
                        header("refresh:2,url=control.php?sayfa=introayar");



                    endif;
                endif;
            endif;

        else:
            ?>
            <div class="col-lg-4 mx-auto mt-2">
                <div class="card card-bordered">
                    <div class="card-body">
                        <h5 class="title border-bottom">Intro Resim Güncelleme Formu</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <p class="card-text"><input type="file" name="dosya"></p>
                            <p class="card-text"><input type="hidden" name="introid" value="<?php echo $gelenintroid; ?>"></p>
                            <input type="submit" name="buton" value="GÜNCELLE" class="btn btn-primary mb-1">
                        </form>
                        <p class="card-text text-left text-danger border-top">
                            * İzin verilen formatlar : jpg-png
                            * İzin verilen max.boyut : 5mb
                        </p>
                    </div>
                </div>
            </div>
        <?php
        endif;
        echo '</div></div></div>';

    } //  intro resmi güncelleme

    // -------------------- FILO

    function filogetir($vt){
    echo' 
<div class="container">

  <h1 class="font-weight-light text-center text-lg-left text-info">Araç Filosu<a href="control.php?sayfa=filoresimekle" class="btn btn-success m-2 btn-sm float-right">YENİ RESİM EKLE</a></h1>

  <hr class="mt-2 mb-5">

  <div class="row text-center text-lg-left">';
        $filobilgiler = self::sorgum($vt,"select * from filo",2);
        while ($sonbilgi=$filobilgiler->fetch(PDO::FETCH_ASSOC)):
       echo '
            <div class="col-lg-4 col-md-3 ">
                 <div class="d-block mb-4 h-100">
               <img class="img-fluid img-thumbnail" src="../'.$sonbilgi["resimyol"].'" >
                  <a href="control.php?sayfa=filoresimguncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size: 25px;"></a>
                  <a href="control.php?sayfa=filoresimsil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger float-right" style="font-size: 25px;"></a>
                    <hr>
                  </div>
            </div> 
       ';
        endwhile;
 echo ' </div> </div>';
    } // mevcut filo  getirme

    function filoresimekle($vt){
        echo '<div class="row text-center">
                <div class="col-lg-12">';

        if ($_POST):
            // php işlemleri
            // ilk dosyanın boş olup olmamasına bakılacak
            // dosyanın boyutuna bakacağız
            // dosyanın uzantısına bakacağız
            // mutlu son
            if ($_FILES["dosya"]["name"] == ""):
                echo ' <div class="alert alert-danger mt-5">DOSYA YÜKLENMEDİ.BOŞ OLAMAZ.</div>';
                header("refresh:2,url=control.php?sayfa=filoresimekle");
            else: // boş değil ise
                if ($_FILES["dosya"]["size"] > (1024*1024*5)):
                    echo '<div class="alert alert-danger mt-5">DOSYA BOYUTU ÇOK FAZLA</div>';
                    header("refresh:2,url=control.php?sayfa=filoresimekle");
                else: // boyutta bir problem yok ise
                    $izinverilen = array("image/png","image/jpeg");
                    if (!in_array($_FILES["dosya"]["type"],$izinverilen)):
                        echo '<div class="alert alert-danger mt-5">İZİN VERİLEN DOSYA UZANTI DEĞİL!</div>';
                        header("refresh:2,url=control.php?sayfa=filoresimekle");
                    else: // herşey tamam
                        $dosyaminyolu = '../img/carousel/'.$_FILES["dosya"]["name"];
                        move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                        echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA YÜKLENDİ</div>';
                        header("refresh:2,url=control.php?sayfa=filoayar");
                        // Dosya yüklendikten sonra veri tabanına eklememiz lazım
                        $dosyaminyolu2 = str_replace('../','',$dosyaminyolu);
                        $kayitekle = self::sorgum($vt,"insert into filo (resimyol) VALUES ('$dosyaminyolu2')",0);

                    endif;
                endif;
            endif;

        else:
            ?>
            <div class="col-lg-4 mx-auto mt-2">
                <div class="card card-bordered">
                    <div class="card-body">
                        <h5 class="title border-bottom">Filo Resim Yükleme Formu</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <p class="card-text"><input type="file" name="dosya"></p>
                            <input type="submit" name="buton" value="YÜKLE" class="btn btn-primary mb-1">
                        </form>
                        <p class="card-text text-left text-danger border-top">
                            * İzin verilen formatlar : jpg-png
                            * İzin verilen max.boyut : 5mb
                        </p>
                    </div>
                </div>
            </div>


        <?php
        endif;
        echo '</div></div></div>';

    } // yeni filo resmi ekleme

    function filoresimsil($vt){
        $introid = $_GET["id"];
        $verial = self::sorgum($vt,"select * from filo where id=$introid",1);
        echo '<div class="row text-center">
                <div class="col-lg-12">';

        // dosyayı silme işlemi
        unlink("../".$verial["resimyol"]);

        // veritabanı veri silme
        self::sorgum($vt,"delete from filo where id=$introid",0);


        echo '<div class="alert alert-success mt-5">SİLMELER BAŞARILI</div>';
        echo '</div></div>';
        header("refresh:2,url=control.php?sayfa=filoayar");

    } // filo resim silme

    function filoresimguncelle($vt){

        $gelenintroid = $_GET["id"];

        echo '<div class="row text-center">
                <div class="col-lg-12">';

        if ($_POST):
            // php işlemleri
            // ilk dosyanın boş olup olmamasına bakılacak
            // dosyanın boyutuna bakacağız
            // dosyanın uzantısına bakacağız
            // mutlu son

            $formdangelenid = $_POST["introid"];

            if ($_FILES["dosya"]["name"] == ""):
                echo ' <div class="alert alert-danger mt-5">DOSYA YÜKLENMEDİ.BOŞ OLAMAZ.</div>';
                header("refresh:2,url=control.php?sayfa=filoayar");
            else: // boş değil ise
                if ($_FILES["dosya"]["size"] > (1024*1024*5)):
                    echo '<div class="alert alert-danger mt-5">DOSYA BOYUTU ÇOK FAZLA</div>';
                    header("refresh:2,url=control.php?sayfa=filoayar");
                else: // boyutta bir problem yok ise
                    $izinverilen = array("image/png","image/jpeg");
                    if (!in_array($_FILES["dosya"]["type"],$izinverilen)):
                        echo '<div class="alert alert-danger mt-5">İZİN VERİLEN DOSYA UZANTI DEĞİL!</div>';
                        header("refresh:2,url=control.php?sayfa=filoayar");
                    else: // herşey tamam

                        // dbden mevcut veriyi çektik ve dosyayı sildik
                        $resimyolunabak = self::sorgum($vt,"select * from filo where id=$gelenintroid",1);
                        $dbgelenyol = '../'.$resimyolunabak["resimyol"];
                        unlink($dbgelenyol);
                        // dbden mevcut veriyi çektik ve dosyayı sildik

                        $dosyaminyolu = '../img/carousel/'.$_FILES["dosya"]["name"];
                        move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);

                        $dosyaminyolu2 = str_replace('../','',$dosyaminyolu);
                        self::sorgum($vt,"update filo set resimyol='$dosyaminyolu2' where id=$gelenintroid",0);

                        echo '<div class="alert alert-success mt-5">DOSYA BAŞARIYLA GÜNCELLENDİ</div>';
                        header("refresh:2,url=control.php?sayfa=filoayar");



                    endif;
                endif;
            endif;

        else:
            ?>
            <div class="col-lg-4 mx-auto mt-2">
                <div class="card card-bordered">
                    <div class="card-body">
                        <h5 class="title border-bottom">Filo Resim Güncelleme Formu</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <p class="card-text"><input type="file" name="dosya"></p>
                            <p class="card-text"><input type="hidden" name="introid" value="<?php echo $gelenintroid; ?>"></p>
                            <input type="submit" name="buton" value="GÜNCELLE" class="btn btn-primary mb-1">
                        </form>
                        <p class="card-text text-left text-danger border-top">
                            * İzin verilen formatlar : jpg-png
                            * İzin verilen max.boyut : 5mb
                        </p>
                    </div>
                </div>
            </div>
        <?php
        endif;
        echo '</div></div></div>';

    } //  filo resmi güncelleme

    // -------------------- HAKKIMIZDA

    function hakkimizda($vt){
        echo '<div class="row text-center">
                <div class="col-lg-12 text-center border-bottom"><h3 class="float-left mt-3 text-info">Hakkımızda Kısmı</h3><a href="control.php?sayfa=hakkimizdaekle" class="btn btn-success m-2 btn-sm float-right">YENİ EKLE</a></div>';
        $introbilgiler = self::sorgum($vt,"select * from hakkimizda",2);
        while ($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):

            echo '<div class="col-lg-3">
                        <div class="row card-bordered p-1 m-1 bg-light">
                        <div class="col-lg-12 text-center p-2">     
                                <h3>'.$sonbilgi["id"].'</h3>                     
                              <a href="control.php?sayfa=hakkimizdaguncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size: 25px;"></a>
                              <a href="control.php?sayfa=hakkimizdasil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size: 25px;"></a>
                            </div>
                            
                            <div class="col-lg-9 pt-3 text-left" style="border-radius: 10px;">
                            
                            <br>
                                <span >'.$sonbilgi["baslik"].'</span>
                            </div>
                            
                            
        
                            <div class="col-lg-9 pt-3 text-left">
                            
                              <br>
                              <span>'.$sonbilgi["icon"].'</span>  
                            </div>  
                         </div>
                      </div>  ';
        endwhile;
        echo '</div>';
    } // hakkımızda

    function hakkimizdaekle($vt){
        echo '<div class="row text-center">
                <div class="col-lg-12 text-center border-bottom"><h3 class="mt-3 text-info">HAKKIMIZDA EKLE</h3></div>';

        if (!$_POST):

            echo '<div class="col-lg-6 mx-auto">
                        <div class="row card-bordered p-1 m-1 bg-light">
                            <div class="col-lg-2 pt-3">
                                BAŞLIK
                            </div>
                            
                            <div class="col-lg-10 p-2">
                                <form action="" method="post">
                                <input type="text" name="baslik" class="form-control">
                            </div>
                            
                            
                            
                            <div class="col-lg-2 pt-3">
                                ICON
                            </div>  
                            
                            <div class="col-lg-10 p-2">
                                <form action="" method="post">
                                <input type="text" name="icon" class="form-control">
                            </div>
                            
                            <div class="col-lg-12 border-top p-2">
                                <input type="submit" name="buton" value="EKLE" class="btn btn-primary">
                                </form>
                            </div>  
                            
                            
                         </div>
                      </div>  ';
        else:
            $baslik = htmlspecialchars($_POST["baslik"]);
            $icon = htmlspecialchars($_POST["icon"]);

            if ($baslik == "" && $icon == ""):
                echo ' <div class="col-lg-6 mx-auto">
                         <div class="alert alert-danger mt-5">VERİLER BOŞ OLAMAZ</div>
                       </div>';
                header("refresh:2,url=control.php?sayfa=hakkimizayar");
            else:
                self::sorgum($vt,"insert into hakkimizda (baslik,icon) VALUES ('$baslik','$icon')",0);
                echo ' <div class="col-lg-6 mx-auto">
                         <div class="alert alert-success mt-5">EKLEME BAŞARILI</div>
                       </div>';
                header("refresh:2,url=control.php?sayfa=hakkimizayar");


            endif;
        endif;
        echo '</div>';

    } // hakkımızda ekleme yapma

    function hakkimizdaguncelle($vt){
        echo '<div class="row text-center">
                <div class="col-lg-12 text-center border-bottom"><h3 class="mt-3 text-info">HAKKIMIZDA GÜNCELLE</h3></div>';
        /*
        ilk gelen id alınacak
        id ile veritabanına çıkılıp verinin bilgileri gelecek
        inputlara o veriler yazılacak
        hidden ile id post için taşınacak
        */
        $kayitid = $_GET["id"];
        $kayitbilgial = self::sorgum($vt,"select * from hakkimizda where id=$kayitid",1);

        if (!$_POST):

            echo '<div class="col-lg-6 mx-auto">
                        <div class="row card-bordered p-1 m-1 bg-light">
                            <div class="col-lg-2 pt-3">
                                BAŞLIK
                            </div>
                            
                            <div class="col-lg-10 p-2">
                                <form action="" method="post">
                                <input type="text" name="baslik" class="form-control" value="'.$kayitbilgial["baslik"].'">
                            </div>
                            
                            
                            
                            <div class="col-lg-2 pt-3">
                                ICON
                            </div>  
                            
                            <div class="col-lg-10 p-2">
                                <input type="text" name="icon" class="form-control" value="'.$kayitbilgial["icon"].'">
                            </div>
                            
                            <div class="col-lg-12 border-top p-2">
                                <input type="hidden" name="kayitidsi" value="'.$kayitid.'">
                                <input type="submit" name="buton" value="GÜNCELLE" class="btn btn-primary">
                                </form>
                            </div>  
                            
                            
                         </div>
                      </div>  ';
        else:
            $baslik = htmlspecialchars($_POST["baslik"]);
            $icon = htmlspecialchars($_POST["icon"]);
            $kayitidsi = htmlspecialchars($_POST["kayitidsi"]);

            if ($baslik == "" && $icon == ""):
                echo ' <div class="col-lg-6 mx-auto">
                         <div class="alert alert-danger mt-5">VERİLER BOŞ OLAMAZ</div>
                       </div>';
                header("refresh:2,url=control.php?sayfa=hakkimizayar");
            else:
                self::sorgum($vt,"update hakkimizda set baslik='$baslik',icon='$icon' where id=$kayitidsi",0);
                echo ' <div class="col-lg-6 mx-auto">
                         <div class="alert alert-success mt-5">GÜNCELLEME BAŞARILI</div>
                       </div>';
                header("refresh:2,url=control.php?sayfa=hakkimizayar");


            endif;
        endif;
        echo '</div>';
    } // hakkımızda güncelleme

    function hakkimizdasil($vt){
        $kayitid = $_GET["id"];

        echo '<div class="row text-center">
                <div class="col-lg-12">';


        self::sorgum($vt,"delete from hakkimizda where id=$kayitid",0);


        echo '<div class="alert alert-success mt-5">SİLME BAŞARILI</div>';
        echo '</div></div>';
        header("refresh:2,url=control.php?sayfa=hakkimizayar");
    } // hakkımızda silme

    // -------------------- HİZMETLER

    function hizmetler($vt){
        echo '<div class="row text-center">
                <div class="col-lg-12 text-center border-bottom"><h3 class="float-left mt-3 text-info">Hizmetler Kısmı</h3><a href="control.php?sayfa=hizmetlerekle" class="btn btn-success m-2 btn-sm float-right">YENİ EKLE</a></div>';
        $introbilgiler = self::sorgum($vt,"select * from hizmetler",2);
        while ($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):

            echo '<div class="col-lg-3">
                        <div class="row card-bordered p-1 m-1 bg-light">
                        
                        <div class="col-lg-12 text-center p-2">     
                            <h3>'.$sonbilgi["id"].'</h3>                     
                              <a href="control.php?sayfa=hizmetlerguncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size: 25px;"></a>
                              <a href="control.php?sayfa=hizmetlersil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size: 25px;"></a>
                            </div>
                       
                            <div class="col-lg-9 pt-3 text-left" style="border-radius: 10px;">
                          <hr>
                                <span >'.$sonbilgi["baslik"].'</span>
                            </div>
                          
                            
                            <div class="col-lg-9 pt-3 text-left" style="border-radius: 10px;">
                           <br> <hr>
                                <span >'.$sonbilgi["icerik"].'</span>
                            </div>
                            <hr>
                            
        
                            <div class="col-lg-9 pt-3 text-left">
                              <br> <hr>
                              <span>'.$sonbilgi["icon"].'</span>  
                            </div>  
                         </div>
                      </div>  ';
        endwhile;
        echo '</div>';
    } // hizmetler

    function hizmetlerekle($vt){
        echo '<div class="row text-center">
                <div class="col-lg-12 text-center border-bottom"><h3 class="mt-3 text-info">HİZMETLER EKLE</h3></div>';

        if (!$_POST):

            echo '<div class="col-lg-6 mx-auto">
                        <div class="row card-bordered p-1 m-1 bg-light">
                            <div class="col-lg-2 pt-3">
                                BAŞLIK
                            </div>
                            
                            <div class="col-lg-10 p-2">
                                <form action="" method="post">
                                <input type="text" name="baslik" class="form-control">
                            </div>
                            
                            <div class="col-lg-2 pt-3">
                                İÇERİK
                            </div>  
                            
                            <div class="col-lg-10 p-2">
                                
                              <textarea name="icerik" class="form-control"  cols="30" rows="10"></textarea>                           

                            </div>                        
                            
                            <div class="col-lg-2 pt-3">
                                ICON
                            </div>  
                            
                            <div class="col-lg-10 p-2">
                            
                                <input type="text" name="icon" class="form-control">
                            </div>
                            
                            <div class="col-lg-12 border-top p-2">
                                <input type="submit" name="buton" value="EKLE" class="btn btn-primary">
                                </form>
                            </div>  
                            
                            
                         </div>
                      </div>  ';
        else:
            $baslik = htmlspecialchars($_POST["baslik"]);
            $icon = htmlspecialchars($_POST["icon"]);
            $icerik = htmlspecialchars($_POST["icerik"]);

            if ($baslik == "" && $icon == "" && $icerik == "" ):
                echo ' <div class="col-lg-6 mx-auto">
                         <div class="alert alert-danger mt-5">VERİLER BOŞ OLAMAZ</div>
                       </div>';
                header("refresh:2,url=control.php?sayfa=hizmetlerayar");
            else:
                self::sorgum($vt,"insert into hizmetler (baslik,icerik,icon) VALUES ('$baslik','$icerik','$icon')",0);
                echo ' <div class="col-lg-6 mx-auto">
                         <div class="alert alert-success mt-5">EKLEME BAŞARILI</div>
                       </div>';
                header("refresh:2,url=control.php?sayfa=hizmetlerayar");


            endif;
        endif;
        echo '</div>';

    } // hizmetler ekleme yapma

    function hizmetlerguncelle($vt){
        echo '<div class="row text-center">
                <div class="col-lg-12 text-center border-bottom"><h3 class="mt-3 text-info">HİZMETLER GÜNCELLE</h3></div>';
        /*
        ilk gelen id alınacak
        id ile veritabanına çıkılıp verinin bilgileri gelecek
        inputlara o veriler yazılacak
        hidden ile id post için taşınacak
        */
        $kayitid = $_GET["id"];
        $kayitbilgial = self::sorgum($vt,"select * from hizmetler where id=$kayitid",1);

        if (!$_POST):

            echo '<div class="col-lg-6 mx-auto">
                        <div class="row card-bordered p-1 m-1 bg-light">
                            <div class="col-lg-2 pt-3">
                                BAŞLIK
                            </div>
                            
                            <div class="col-lg-10 p-2">
                             <form action="" method="post">
                                <input type="text" name="baslik" class="form-control" value="'.$kayitbilgial["baslik"].'">
                            </div>
                            
                             <div class="col-lg-2 pt-3">
                                İÇERİK
                            </div>  
                            
                            <div class="col-lg-10 p-2">
                               
                                <textarea name="icerik" class="form-control"  cols="30" rows="10">'.$kayitbilgial["icerik"].'</textarea>                           
                            </div>
                            
                            
                            <div class="col-lg-2 pt-3">
                                ICON
                            </div>  
                            
                            <div class="col-lg-10 p-2">
                                <form action="" method="post">
                                <input type="text" name="icon" class="form-control" value="'.$kayitbilgial["icon"].'">
                            </div>
                            
                            <div class="col-lg-12 border-top p-2">
                                <input type="hidden" name="kayitidsi" value="'.$kayitid.'">
                                <input type="submit" name="buton" value="GÜNCELLE" class="btn btn-primary">
                                </form>
                            </div>  
                            
                            
                         </div>
                      </div>  ';
        else:
            $baslik = htmlspecialchars($_POST["baslik"]);
            $icon = htmlspecialchars($_POST["icon"]);
            $icerik = htmlspecialchars($_POST["icerik"]);
            $kayitidsi = htmlspecialchars($_POST["kayitidsi"]);

            if ($baslik == "" && $icon == "" && $icerik == ""):
                echo ' <div class="col-lg-6 mx-auto">
                         <div class="alert alert-danger mt-5">VERİLER BOŞ OLAMAZ</div>
                       </div>';
                header("refresh:2,url=control.php?sayfa=hizmetlerayar");
            else:
                self::sorgum($vt,"update hizmetler set baslik='$baslik',icerik='$icerik',icon='$icon' where id=$kayitidsi",0);
                echo ' <div class="col-lg-6 mx-auto">
                         <div class="alert alert-success mt-5">GÜNCELLEME BAŞARILI</div>
                       </div>';
                header("refresh:2,url=control.php?sayfa=hizmetlerayar");


            endif;
        endif;
        echo '</div>';
    } // hizmetler güncelleme

    function hizmetlersil($vt){
        $kayitid = $_GET["id"];

        echo '<div class="row text-center">
                <div class="col-lg-12">';


        self::sorgum($vt,"delete from hizmetler where id=$kayitid",0);


        echo '<div class="alert alert-success mt-5">SİLME BAŞARILI</div>';
        echo '</div></div>';
        header("refresh:2,url=control.php?sayfa=hizmetlerayar");
    } // hizmetler silme

// -------------------- REFERANSLAR

    function referansayar($vt){
        echo '<div class="row text-center">
                <div class="col-lg-12 text-center border-bottom"><h3 class="float-left mt-3 text-info">Referanslar Kısmı</h3><a href="control.php?sayfa=referansekle" class="btn btn-success m-2 btn-sm float-right">YENİ EKLE</a></div>';
        $introbilgiler = self::sorgum($vt,"select * from referans",2);
        while ($sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC)):

        echo  '<div class="col-lg-4">
<div class="row card-bordered p-4 m-4 bg-light">
                   <div >
                        <div class="img-box"><img src="../'.$sonbilgi["resimyol"].'"></div>
                        <hr><br>
                        <div><p class="testimonial">'.$sonbilgi["icerik"].'</p>
                        <hr><br>
                        <p style="font-size: 25px;" class="overview"><b >'.$sonbilgi["kisi"].'</b>, '.$sonbilgi["gorev"].'</p></div>
                        <hr>
                        <div>
                              <a href="control.php?sayfa=referansguncelle&id='.$sonbilgi["id"].'" class="fa fa-edit m-2 text-success" style="font-size: 25px;"></a>
                              <a href="control.php?sayfa=referanssil&id='.$sonbilgi["id"].'" class="fa fa-trash m-2 text-danger" style="font-size: 25px;"></a>
                         </div>
                         
                    </div>
              </div>
              </div>
';

        endwhile;
        echo '</div>';
    } // referanslar

    function referansekle($vt){

        echo '<div class="row text-center">
                <div class="col-lg-12 text-center border-bottom"><h3 class="mt-3 text-info">REFERANS EKLE</h3></div>';
        $introbilgiler = self::sorgum($vt,"select * from referans",2);
        $sonbilgi=$introbilgiler->fetch(PDO::FETCH_ASSOC);
        if (!$_POST):

            echo '<div class="col-lg-6 mx-auto">
                        <div class="row card-bordered p-1 m-1 bg-light">
                            
                            <div class="col-lg-2 pt-3">
                                 RESİM
                            </div>  
                            
                            <div class="col-lg-10 p-2">
                    
                             <form action="" method="post" enctype="multipart/form-data">
                                <p class="card-text"><input type="file" name="dosya"></p>
                              
                            </div>
                            
                            <div class="col-lg-2 pt-3">
                                İÇERİK
                            </div>  
                            
                            <div class="col-lg-10 p-2">
                                  
                              <textarea name="icerik" class="form-control"  cols="30" rows="10"></textarea>                           

                            </div>                        
                            
                            <div class="col-lg-2 pt-3">
                                 ADI
                            </div>  
                            
                            <div class="col-lg-10 p-2">
                            
                                <input type="text" name="kisi" class="form-control">
                            </div>
                            
                             <div class="col-lg-2 pt-3">
                                GÖREVİ
                            </div>  
                            
                            <div class="col-lg-10 p-2">
                            
                                <input type="text" name="gorev" class="form-control">
                            </div>
                            
                            <div class="col-lg-12 border-top p-2">
                                <input type="submit" name="buton" value="EKLE" class="btn btn-primary">
                                </form>
                            </div>  
                            
                            
                         </div>
                      </div>  ';
        else:

            $resimadres = htmlspecialchars($_FILES["dosya"]["name"]);
            $icerik = htmlspecialchars($_POST["icerik"]);
            $kisi = htmlspecialchars($_POST["kisi"]);
            $gorev = htmlspecialchars($_POST["gorev"]);


            if ($icerik == "" && $kisi == "" && $gorev == ""  && $resimadres ==""):
                echo ' <div class="col-lg-6 mx-auto">
                         <div class="alert alert-danger mt-5">VERİLER BOŞ OLAMAZ</div>
                       </div>';
                header("refresh:2,url=control.php?sayfa=referansayar");
            else:
                $dosyaminyolu = '../img/referans/'.$_FILES["dosya"]["name"];
                move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaminyolu);
                $dosyaminyolu2 = str_replace('../','',$dosyaminyolu);
                self::sorgum($vt,"insert into referans (kisi,icerik,gorev,resimyol) VALUES ('$kisi','$icerik','$gorev','$dosyaminyolu2')",0);
                echo ' <div class="col-lg-6 mx-auto">
                         <div class="alert alert-success mt-5">EKLEME BAŞARILI</div>
                       </div>';
                header("refresh:2,url=control.php?sayfa=referansayar");


            endif;
        endif;
        echo '</div>';
    } // referans ekleme yapma

    function referansguncelle($vt){
        echo '<div class="row text-center">
                <div class="col-lg-12 text-center border-bottom"><h3 class="mt-3 text-info">REFERANS GÜNCELLE</h3></div>';
        /*
        ilk gelen id alınacak
        id ile veritabanına çıkılıp verinin bilgileri gelecek
        inputlara o veriler yazılacak
        hidden ile id post için taşınacak
        */
        $kayitid = $_GET["id"];
        $kayitbilgial = self::sorgum($vt,"select * from referans where id=$kayitid",1);

        if (!$_POST):

            echo '<div class="col-lg-6 mx-auto">
                        <div class="row card-bordered p-1 m-1 bg-light">
                            <div class="col-lg-2 pt-3">
                                RESİM
                            </div>
                            
                            <div class="col-lg-10 p-2">
                             <form action="" method="post">
                              <div class="img-box"><img src="../'.$kayitbilgial["resimyol"].'"></div>
                            </div>
                            
                             <div class="col-lg-2 pt-3">
                                İÇERİK
                            </div>  
                            
                            <div class="col-lg-10 p-2">
                               
                                <textarea name="icerik" class="form-control"  cols="30" rows="10">'.$kayitbilgial["icerik"].'</textarea>                           
                            </div>
                            
                            
                            <div class="col-lg-2 pt-3">
                                KİŞİ
                            </div>  
                            
                            <div class="col-lg-10 p-2">
                                
                                <input type="text" name="kisi" class="form-control" value="'.$kayitbilgial["kisi"].'">
                            </div>
                            
                            <div class="col-lg-2 pt-3">
                                GÖREVİ
                            </div>  
                            
                            <div class="col-lg-10 p-2">
                               
                                <input type="text" name="gorev" class="form-control" value="'.$kayitbilgial["gorev"].'">
                            </div>
                            
                            <div class="col-lg-12 border-top p-2">
                                <input type="hidden" name="kayitidsi" value="'.$kayitid.'">
                                <input type="submit" name="buton" value="GÜNCELLE" class="btn btn-primary">
                                </form>
                            </div>  
                            
                            
                         </div>
                      </div>  ';
        else:

            $gorev = htmlspecialchars($_POST["gorev"]);
            $kisi = htmlspecialchars($_POST["kisi"]);
            $icerik = htmlspecialchars($_POST["icerik"]);
            $kayitidsi = htmlspecialchars($_POST["kayitidsi"]);

            if ( $kisi == "" && $icerik == "" && $gorev==""):
                echo ' <div class="col-lg-6 mx-auto">
                         <div class="alert alert-danger mt-5">VERİLER BOŞ OLAMAZ</div>
                       </div>';
                header("refresh:2,url=control.php?sayfa=referansayar");
            else:
                self::sorgum($vt,"update referans set icerik='$icerik',kisi='$kisi',gorev='$gorev' where id=$kayitidsi",0);
                echo ' <div class="col-lg-6 mx-auto">
                         <div class="alert alert-success mt-5">GÜNCELLEME BAŞARILI</div>
                       </div>';
                header("refresh:2,url=control.php?sayfa=referansayar");


            endif;
        endif;
        echo '</div>';
    } // referans güncelleme

    function referanssil($vt){
        $kayitid = $_GET["id"];
        $verial = self::sorgum($vt,"select * from referans where id=$kayitid",1);
        echo '<div class="row text-center">
                <div class="col-lg-12">';



        unlink("../".$verial["resimyol"]);
        self::sorgum($vt,"delete from referans where id=$kayitid",0);


        echo '<div class="alert alert-success mt-5">SİLME BAŞARILI</div>';
        echo '</div></div>';
        header("refresh:2,url=control.php?sayfa=referansayar");
    } // referans silme

    // ---------------- GELEN MAİLLER -----------------

    private function mailgetir($vt,$veriler){

        $sor=$vt->prepare("select * from $veriler[0] where durum=$veriler[1]");
        $sor->execute();
        return $sor;

    } // mail sorgusu

    function gelenmesajlar($vt){
        echo '<div class="row">
                <div class="col-lg-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                        
                             <li class="nav-item">
                                <a href="#gelen" class="nav-link active" role="tab" aria-controls="gelen" aria-selected="true" id="gelen-tab" data-toggle="tab"><kbd>'.self::mailgetir($vt,array("gelenmail",0))->rowCount().'</kbd> GELEN MESAJLAR</a>
                             </li>
                             <li class="nav-item">
                                <a href="#okunmus" class="nav-link" role="tab" aria-controls="okunmus" aria-selected="false" id="okunmus-tab" data-toggle="tab"><kbd>'.self::mailgetir($vt,array("gelenmail",1))->rowCount().'</kbd> OKUNMUŞ MESAJLAR</a>
                             </li>
                             <li class="nav-item">
                                <a href="#arsiv" class="nav-link" role="tab" aria-controls="arsiv" aria-selected="false" id="arsiv-tab" data-toggle="tab"><kbd>'.self::mailgetir($vt,array("gelenmail",2))->rowCount().'</kbd> ARŞİVLENMİŞ MESAJLAR</a>
                             </li>
                         
                        </ul>
                    <div class="tab-content mt-3" id="benimTab">
                        <div class="tab-pane fade show active" id="gelen" role="tabpanel" aria-labelledby="gelen-tab">';

        $sonuc=self::mailgetir($vt,array("gelenmail",0));

        if ($sonuc->rowCount() !=0):

            while ($sonucson = $sonuc->fetch(PDO::FETCH_ASSOC)):

                echo '<div class="row">
                                    <div class="col-lg-12 bg-light mt-2 font-weight-bold" style="border-radius: 5px; border:1px solid #eeeeee;">
                                        <div class="row border-bottom">
                                            <div class="col-lg-1 p-1">Ad & Ünvan</div>
                                            <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
                                            <div class="col-lg-1 p-1">Mail Adresi</div>
                                            <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
                                            <div class="col-lg-1 p-1">Konu</div>
                                            <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
                                            <div class="col-lg-1 p-1">Tarih</div>
                                            <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
                                            <div class="col-lg-1 p-1">
                                            
                                           <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'"><i class="fa fa-folder-open border-right pr-2 text-dark" style="font-size: 20px;"></i></a>
                                            <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'"><i class="fa fa-share border-right pr-2 text-dark" style="font-size: 20px;"></i></a>
                                           <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'"> <i class="fa fa-close pr-2 text-dark" style="font-size: 20px;"></i></a>
                                            
                                            </div>
                                    </div>
                                    </div>
                                    </div>
                                    ';

            endwhile;

        else:

            echo '<div class="alert alert-info">GELEN MESAJ YOK</div>';

        endif;

        echo'</div>

                        <div class="tab-pane fade" id="okunmus" role="tabpanel" aria-labelledby="okunmus-tab">';
        $sonuc=self::mailgetir($vt,array("gelenmail",1));

        if ($sonuc->rowCount() !=0):

            while ($sonucson = $sonuc->fetch(PDO::FETCH_ASSOC)):

                echo '<div class="row">
                                    <div class="col-lg-12 bg-light mt-2 font-weight-bold" style="border-radius: 5px; border:1px solid #eeeeee;">
                                        <div class="row border-bottom">
                                            <div class="col-lg-1 p-1">Ad & Ünvan</div>
                                            <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
                                            <div class="col-lg-1 p-1">Mail Adresi</div>
                                            <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
                                            <div class="col-lg-1 p-1">Konu</div>
                                            <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
                                            <div class="col-lg-1 p-1">Tarih</div>
                                            <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
                                            <div class="col-lg-1 p-1">
                                            
                                           <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'"><i class="fa fa-folder-open border-right pr-2 text-dark" style="font-size: 20px;"></i></a>
                                            <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'"><i class="fa fa-share border-right pr-2 text-dark" style="font-size: 20px;"></i></a>
                                           <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'"> <i class="fa fa-close pr-2 text-dark" style="font-size: 20px;"></i></a>
                                            
                                            </div>
                                    </div>
                                    </div>
                                    </div>
                                    ';

            endwhile;

        else:

            echo '<div class="alert alert-info">OKUNMUŞ MESAJ YOK</div>';

        endif; echo'</div>
                        <div class="tab-pane fade" id="arsiv" role="tabpanel" aria-labelledby="arsiv-tab">';
        $sonuc=self::mailgetir($vt,array("gelenmail",2));

        if ($sonuc->rowCount() !=0):

            while ($sonucson = $sonuc->fetch(PDO::FETCH_ASSOC)):

                echo '<div class="row">
                                    <div class="col-lg-12 bg-light mt-2 font-weight-bold" style="border-radius: 5px; border:1px solid #eeeeee;">
                                        <div class="row border-bottom">
                                            <div class="col-lg-1 p-1">Ad & Ünvan</div>
                                            <div class="col-lg-2 p-1 text-primary">'.$sonucson["ad"].'</div>
                                            <div class="col-lg-1 p-1">Mail Adresi</div>
                                            <div class="col-lg-2 p-1 text-primary">'.$sonucson["mailadres"].'</div>
                                            <div class="col-lg-1 p-1">Konu</div>
                                            <div class="col-lg-2 p-1 text-primary">'.$sonucson["konu"].'</div>
                                            <div class="col-lg-1 p-1">Tarih</div>
                                            <div class="col-lg-1 p-1 text-primary">'.$sonucson["zaman"].'</div>
                                            <div class="col-lg-1 p-1">
                                            
                                           <a href="control.php?sayfa=mesajoku&id='.$sonucson["id"].'"><i class="fa fa-folder-open border-right pr-2 text-dark" style="font-size: 20px;"></i></a>
                                            <a href="control.php?sayfa=mesajarsivle&id='.$sonucson["id"].'"><i class="fa fa-share border-right pr-2 text-dark" style="font-size: 20px;"></i></a>
                                           <a href="control.php?sayfa=mesajsil&id='.$sonucson["id"].'"> <i class="fa fa-close pr-2 text-dark" style="font-size: 20px;"></i></a>
                                            
                                            </div>
                                    </div>
                                    </div>
                                    </div>
                                    ';

            endwhile;

        else:

            echo '<div class="alert alert-info">ARŞİVLENMİŞ MESAJ YOK</div>';

        endif; echo'</div></div></div></div></div></div>';



    } // gelen mesajlar iskelet

    function mesajdetay($vt,$id){

        $mesajbilgi = self::sorgum($vt,"select * from gelenmail where id=$id",1);

        echo '<div class="row m-2">
                                    <div class="col-lg-12 bg-light mt-2 font-weight-bold" style="border-radius: 5px; border:1px solid #eeeeee;">
                                        <div class="row border-bottom">
                                                <div class="col-lg-1 p-1">Ad & Ünvan</div>
                                                <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["ad"].'</div>
                                                <div class="col-lg-1 p-1">Mail Adresi</div>
                                                <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["mailadres"].'</div>
                                                <div class="col-lg-1 p-1">Konu</div>
                                                <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["konu"].'</div>
                                                <div class="col-lg-1 p-1">Tarih</div>
                                                <div class="col-lg-1 p-1 text-primary">'.$mesajbilgi["zaman"].'</div>
                                                <div class="col-lg-1 p-1">
                                                
                                                    <a href="control.php?sayfa=mesajarsivle&id='.$mesajbilgi["id"].'"><i class="fa fa-share border-right pr-2 text-dark" style="font-size: 20px;"></i></a>
                                                   <a href="control.php?sayfa=mesajsil&id='.$mesajbilgi["id"].'"> <i class="fa fa-close pr-2 text-dark" style="font-size: 20px;"></i></a>
                                                
                                                </div>
                                           </div>
                                            <div class="row text-left p-2">
                                                <div class="col-lg-12">
                                                    '.$mesajbilgi["mesaj"].'
                                                </div>
                                            </div>
                                    
                                    </div>
                                    </div>
                                    </div>
                                    ';

        // mesajın durumunu güncelledik
        self::sorgum($vt,"update  gelenmail set durum=1 where id=$id",0);

    } // mesaj detay

    function mesajarsivle($vt,$id){


        echo '<div class="row m-2">
               <div class="col-lg-12  mt-2" style="border-radius: 5px; border:1px solid #eeeeee;">
                    <div class="alert alert-info mt-2 mb-2">Mesaj Arşivlendi</div>                           

                                    </div>
                                    </div>
                                    ';
        header("refresh:2,url=control.php?sayfa=gelenmesaj");

        // mesajın durumunu güncelledik
        self::sorgum($vt,"update  gelenmail set durum=2 where id=$id",0);

    } // mesaj arşiv

    function mesajsil($vt,$id){

        echo '<div class="row m-2">
               <div class="col-lg-12  mt-2" style="border-radius: 5px; border:1px solid #eeeeee;">
                    <div class="alert alert-info mt-2 mb-2">Mesaj Silindi</div>                           

                                    </div>
                                    </div>
                                    ';
        header("refresh:2,url=control.php?sayfa=gelenmesaj");

        // mesajın durumunu güncelledik
        self::sorgum($vt,"delete from gelenmail where id=$id",0);

    } // mesaj sil

// ---------------- MAİL AYARLARI -----------------

    function mailayar($baglanti){
        $sonuc = self::sorgum($baglanti,"select * from gelenmailayar",1);

        if ($_POST):
            $host=htmlspecialchars($_POST["host"]);
            $mailadres=htmlspecialchars($_POST["mailadres"]);
            $sifre =htmlspecialchars($_POST["sifre"]);
            $port =htmlspecialchars($_POST["port"]);
            $aliciadres =htmlspecialchars($_POST["aliciadres"]);


            // burada bunların boş ve doluluk kontrolü yapılabilir
            // burada veritabanı işlemleri

            $guncelleme = $baglanti->prepare("update gelenmailayar set host=?,mailadres=?,sifre=?,port=?,aliciadres?");

            $guncelleme->bindParam(1,$host,PDO::PARAM_STR);
            $guncelleme->bindParam(2,$mailadres,PDO::PARAM_STR);
            $guncelleme->bindParam(3,$sifre,PDO::PARAM_STR);
            $guncelleme->bindParam(4,$port,PDO::PARAM_STR);
            $guncelleme->bindParam(5,$aliciadres,PDO::PARAM_STR);

            $guncelleme->execute();

            echo '
                <div class="alert alert-success mt-5">
                   <strong>MAİL AYARLARI</strong>  BAŞARIYLA GÜNCELLENDİ.
                </div>
            ';

            header("refresh:2,url=control.php?sayfa=mailayar");
        else:
            ?>
            <form action="control.php?sayfa=mailayar" method="post">
                <div class="row text-center">
                    <div class="col-lg-6 mx-auto">
                        <div class="col-lg-12 mx-auto mt-2">
                            <h3 class="text-info">MAİL AYARLARI </h3>
                        </div>

                        <div class="col-lg-12 mt-2 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3 text-left">
                                    <span id="siteayarfont">Host</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="host" class="form-control" value="<?php echo $sonuc["host"]; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- ******** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3 text-left">
                                    <span id="siteayarfont">Mail Adres</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="mailadres" class="form-control" value="<?php echo $sonuc["mailadres"]; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- ******** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3 text-left">
                                    <span id="siteayarfont">Host Şifre</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="sifre" class="form-control" value="<?php echo $sonuc["sifre"]; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- ******** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3 text-left">
                                    <span id="siteayarfont">Port</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="port" class="form-control" value="<?php echo $sonuc["port"]; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- ******** -->
                        <!-- ******** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-3 border-right pt-3 text-left">
                                    <span id="siteayarfont">Alıcı Mail</span>
                                </div>
                                <div class="col-lg-9 p-1">
                                    <input type="text" name="aliciadres" class="form-control" value="<?php echo $sonuc["aliciadres"]; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- ******** -->
                        <div class="col-lg-12 mx-auto mt-2">
                            <input type="submit" name="buton" class="btn btn-info m-1" value="GÜNCELLE">
                        </div>
                    </div>
                </div>


            </form>

        <?php
        endif;

    } // MAİL AYAR

// ---------------- KULLANICI AYARLARI -----------------

    function ayarlar($baglanti){

        $id = self::coz($_COOKIE["kulbilgi"]);
        $sonuc = self::sorgum($baglanti,"select * from yonetim where id=$id",1);

        if ($_POST):

            @$kulad=htmlspecialchars($_POST["kulad"]);
            @$eskisif=htmlspecialchars($_POST["sifre"]);
            @$yenisif =htmlspecialchars($_POST["yenisifre"]);
            @$yenisif2 =htmlspecialchars($_POST["yenisifre2"]);

            // ilk yazılan esk şifre şifreleme algoritmamıza göre şifrelenerek db ile karşılaştırılacak
            // girilen yeni şifrelerin birbiriyle aynı olup olmamasını kontrol edeceğiz

            if ($kulad == "" || $eskisif == "" || $yenisif == "" || $yenisif2 == ""):

                echo '<div class="alert alert-danger mt-5">HİÇBİR ALAN BOŞ GEÇİLEMEZ</div>';
                header("refresh:2,url=control.php?sayfa=ayarlar");

            else:


                $sifrelihal = md5(sha1(md5($eskisif)));

                if ($sonuc["sifre"] != $sifrelihal):
                    echo '<div class="alert alert-danger mt-5">ESKİ ŞİFRE HATALI GİRİLDİ</div>';
                    header("refresh:2,url=control.php?sayfa=ayarlar");

                else:

                    if ($yenisif != $yenisif2):
                        echo '<div class="alert alert-danger mt-5">GİRDİĞİNİZ YENİ ŞİFRELER BİRBİRİNE EŞİT DEĞİLDİR</div>';
                        header("refresh:2,url=control.php?sayfa=ayarlar");

                    else:

                        $yenisifson = md5(sha1(md5($yenisif)));
                        $guncelleme = $baglanti->prepare("update yonetim set kulad=?,sifre=? where id=$id");

                        $guncelleme->bindParam(1,$kulad,PDO::PARAM_STR);
                        $guncelleme->bindParam(2,$yenisifson,PDO::PARAM_STR);
                        $guncelleme->execute();

                        echo '
                            <div class="alert alert-success mt-5">BİLGİLER BAŞARIYLA GÜNCELLENDİ</div> ';
                        header("refresh:2,url=control.php?sayfa=ayarlar");
                    endif;

                endif;

            endif;

        else:
            ?>
            <form action="control.php?sayfa=ayarlar" method="post">
                <div class="row text-center">
                    <div class="col-lg-6 mx-auto">
                        <div class="col-lg-12 mx-auto mt-2">
                            <h3 class="text-info">KULLANICI AYARLARI </h3>
                        </div>

                        <div class="col-lg-12 mt-2 mx-auto border">
                            <div class="row">
                                <div class="col-lg-4 border-right pt-3 text-left">
                                    <span id="siteayarfont">Kullanıcı Adı</span>
                                </div>
                                <div class="col-lg-8 p-1">
                                    <input type="text" name="kulad" class="form-control" value="<?php echo $sonuc["kulad"]; ?>">
                                </div>
                            </div>
                        </div>
                        <!-- ******** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-4 border-right pt-3 text-left">
                                    <span id="siteayarfont">Şifre</span>
                                </div>
                                <div class="col-lg-8 p-1">
                                    <input type="password" name="sifre" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- ******** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-4 border-right pt-3 text-left">
                                    <span id="siteayarfont">Yeni Şifre</span>
                                </div>
                                <div class="col-lg-8 p-1">
                                    <input type="password" name="yenisifre" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- ******** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-4 border-right pt-3 text-left">
                                    <span id="siteayarfont">Yeni Şifre Tekrar</span>
                                </div>
                                <div class="col-lg-8 p-1">
                                    <input type="password" name="yenisifre2" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- ******** -->
                        <!-- ******** -->
                        <div class="col-lg-12 mx-auto mt-2">
                            <input type="submit" name="buton" class="btn btn-info m-1" value="DEĞİŞTİR">
                        </div>
                    </div>
                </div>


            </form>

        <?php
        endif;

    } // KULLANICI AYAR

// ---------------- KULLANICI EKLEME VE SİLME -----------------

    function kullistele($vt){

        $al = self::sorgum($vt,"select * from yonetim",2);
        echo '
            <div class="row text-center">
                <div class="col-lg-6 mt-5 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title text-dark">
                            <a href="control.php?sayfa=yonekle"><i class="ti-plus bg-dark p-1 text-white mr-2 mt-3" style="font-size: 20px;"></i></a>
                            KULLANICILAR</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                    <table class="table text-center border table-striped">
                                        <thead>
                                        <tr>
                                        <th scope="col" class="border-right">Ad</th>
                                        <th scope="col">İşlem</th>
                                        </tr>
                                        </thead>
                                        <tbody>';

        while ($yonson = $al->fetch(PDO::FETCH_ASSOC)):

            echo '<tr>
                                            <th scope="row" class="border-right">'.$yonson["kulad"].'</th>
                                            <th scope="row"><a href="control.php?sayfa=yonsil&id='.$yonson["id"].'"><i class="ti-trash text-danger" style="font-size: 20px;"></i></a></th>
                                            </tr>';

        endwhile;

        echo'</tbody>     
                                        </table>
        </div></div></div></div></div></div>';

    } // yöneticiler hepsi

    function yonsil($vt,$id){

        echo '<div class="row m-2">
               <div class="col-lg-12  mt-2" style="border-radius: 5px; border:1px solid #eeeeee;">
                    <div class="alert alert-info mt-2 mb-2">Yönetici Silindi</div>                           

                                    </div>
                                    </div>
                                    ';
        header("refresh:2,url=control.php?sayfa=kulayar");

        // mesajın durumunu güncelledik
        self::sorgum($vt,"delete from yonetim where id=$id",0);

    } // yönetici sil

    function yonekle($baglanti){

        if ($_POST):

            @$kulad=htmlspecialchars($_POST["kulad"]);
            @$yenisif =htmlspecialchars($_POST["yenisifre"]);
            @$yenisif2 =htmlspecialchars($_POST["yenisifre2"]);


            if ($kulad == "" || $yenisif == "" || $yenisif2 == ""):

                echo '<div class="alert alert-danger mt-5">HİÇBİR ALAN BOŞ GEÇİLEMEZ</div>';
                header("refresh:2,url=control.php?sayfa=yonekle");


            else:

                if ($yenisif != $yenisif2):
                    echo '<div class="alert alert-danger mt-5">GİRDİĞİNİZ YENİ ŞİFRELER BİRBİRİNE EŞİT DEĞİLDİR</div>';
                    header("refresh:2,url=control.php?sayfa=yonekle");

                else:

                    $yenisifson = md5(sha1(md5($yenisif)));
                    $ekle = $baglanti->prepare("insert into yonetim (kulad,sifre) VALUES (?,?)");

                    $ekle->bindParam(1,$kulad,PDO::PARAM_STR);
                    $ekle->bindParam(2,$yenisifson,PDO::PARAM_STR);
                    $ekle->execute();

                    echo '
                            <div class="alert alert-success mt-5">YÖNETİCİ EKLENDİ</div> ';
                    header("refresh:2,url=control.php?sayfa=kulayar");
                endif;

            endif;


        else:
            ?>
            <form action="control.php?sayfa=yonekle" method="post">
                <div class="row text-center">
                    <div class="col-lg-6 mx-auto">
                        <div class="col-lg-12 mx-auto mt-2">
                            <h3 class="text-info">YÖNETİCİ EKLE </h3>
                        </div>

                        <div class="col-lg-12 mt-2 mx-auto border">
                            <div class="row">
                                <div class="col-lg-4 border-right pt-3 text-left">
                                    <span id="siteayarfont">Kullanıcı Adı</span>
                                </div>
                                <div class="col-lg-8 p-1">
                                    <input type="text" name="kulad" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- ******** -->
                        <!-- ******** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-4 border-right pt-3 text-left">
                                    <span id="siteayarfont">Yeni Şifre</span>
                                </div>
                                <div class="col-lg-8 p-1">
                                    <input type="password" name="yenisifre" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- ******** -->
                        <div class="col-lg-12 mx-auto border">
                            <div class="row">
                                <div class="col-lg-4 border-right pt-3 text-left">
                                    <span id="siteayarfont">Yeni Şifre Tekrar</span>
                                </div>
                                <div class="col-lg-8 p-1">
                                    <input type="password" name="yenisifre2" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- ******** -->
                        <!-- ******** -->
                        <div class="col-lg-12 mx-auto mt-2">
                            <input type="submit" name="buton" class="btn btn-info m-1" value="YÖNETİCİ EKLE">
                        </div>
                    </div>
                </div>


            </form>

        <?php
        endif;

    } // yönetici ekle










}


?>