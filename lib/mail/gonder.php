<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$baglanti = new PDO("mysql:host=localhost;dbname=kurumsalyeni;charset=utf8","root","");

$ayarlar = $baglanti->prepare("select * from gelenmailayar");
$ayarlar->execute();
$ayarson = $ayarlar->fetch();

// TERCİHİ ALIYORUM
$ayarlar2 = $baglanti->prepare("select mesajtercih from ayarlar");
$ayarlar2->execute();
$tercihgeldi = $ayarlar2->fetch();

$mail = new PHPMailer(true);
$mail->SMTPDebug=0;
$mail->isSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = $ayarson["host"];
$mail->SMTPAuth = true;
$mail->Username=$ayarson["mailadres"];
$mail->Password = $ayarson["sifre"];
$mail->SMTPSecure="tls";
$mail->Port = $ayarson["port"];
$mail->isHTML(true);
$mail->addAddress($ayarson["aliciadres"]);
// info@udemynakliyat.com

if ($_POST):

    $isim = htmlspecialchars($_POST["isim"]);
    $mailadres = htmlspecialchars($_POST["mail"]);
    $konu = htmlspecialchars($_POST["konu"]) ;
    $mesaj = htmlspecialchars($_POST["mesaj"]) ;


    switch ($tercihgeldi["mesajtercih"]):

        case 1:

            $mail->setFrom($mailadres,$isim);
            $mail->addReplyTo($mailadres,"YANIT");
            $mail->Subject=$konu;
            $mail->Body=$mesaj;
            if ($mail->send()):
                echo '<div class="alert alert-success text-center mx-auto">Mesaj Başarıyla Gönderildi <br> Teşekkürler</div>';

            else:
                // Gönderide hata olabilir
                // Ama db kayıt edeceğiz
                $zaman = date("d.m.Y")."/".date("H:i");
                $kaydet = $baglanti->prepare("insert into gelenmail (ad,mailadres,konu,mesaj,zaman) VALUES (?,?,?,?,?)");

                $kaydet->bindParam(1,$isim,PDO::PARAM_STR);
                $kaydet->bindParam(2,$mailadres,PDO::PARAM_STR);
                $kaydet->bindParam(3,$konu,PDO::PARAM_STR);
                $kaydet->bindParam(4,$mesaj,PDO::PARAM_STR);
                $kaydet->bindParam(5,$zaman,PDO::PARAM_STR);
                $kaydet->execute();
                echo '<div class="alert alert-success text-center mx-auto">Mesaj Başarıyla Gönderildi <br> Teşekkürler</div>';

            endif;

            break;

        case 2:
            $mail->setFrom($mailadres,$isim);
            $mail->addReplyTo($mailadres,"YANIT");
            $mail->Subject($konu);
            $mail->Subject=$konu;
            $mail->Body=$mesaj;
            $zaman = date("d.m.Y")."/".date("H:i");
            $kaydet = $baglanti->prepare("insert into gelenmail (ad,mailadres,konu,mesaj,zaman) VALUES (?,?,?,?,?)");

            $kaydet->bindParam(1,$isim,PDO::PARAM_STR);
            $kaydet->bindParam(2,$mailadres,PDO::PARAM_STR);
            $kaydet->bindParam(3,$konu,PDO::PARAM_STR);
            $kaydet->bindParam(4,$mesaj,PDO::PARAM_STR);
            $kaydet->bindParam(5,$zaman,PDO::PARAM_STR);
            $kaydet->execute();
            echo '<div class="alert alert-success text-center mx-auto">Mesaj Başarıyla Gönderildi <br> Teşekkürler</div>';

            break;

        case 3:

            $zaman = date("d.m.Y")."/".date("H:i");
            $kaydet = $baglanti->prepare("insert into gelenmail (ad,mailadres,konu,mesaj,zaman) VALUES (?,?,?,?,?)");

            $kaydet->bindParam(1,$isim,PDO::PARAM_STR);
            $kaydet->bindParam(2,$mailadres,PDO::PARAM_STR);
            $kaydet->bindParam(3,$konu,PDO::PARAM_STR);
            $kaydet->bindParam(4,$mesaj,PDO::PARAM_STR);
            $kaydet->bindParam(5,$zaman,PDO::PARAM_STR);
            $kaydet->execute();
            echo '<div class="alert alert-success text-center mx-auto">Mesaj Başarıyla Gönderildi <br> Teşekkürler</div>';

            break;

        endswitch;


endif;

?>