-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Nis 2019, 13:31:14
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kurumsalyeni`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `metatitle` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `metadesc` text COLLATE utf8_turkish_ci NOT NULL,
  `metakey` text COLLATE utf8_turkish_ci NOT NULL,
  `metaauthor` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `metaowner` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `metacopy` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `logoresimadres` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `twitter` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `instagram` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `adres` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `mailadres` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `haritabilgi` text COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizdabaslik` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizdaicerik` text COLLATE utf8_turkish_ci NOT NULL,
  `hizmetlerbaslik` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `filobaslik` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `referansbaslik` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `iletisimbaslik` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sosyalmedyabaslik` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `mesajtercih` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `title`, `metatitle`, `metadesc`, `metakey`, `metaauthor`, `metaowner`, `metacopy`, `logoresimadres`, `twitter`, `facebook`, `instagram`, `adres`, `telefon`, `mailadres`, `haritabilgi`, `hakkimizdabaslik`, `hakkimizdaicerik`, `hizmetlerbaslik`, `filobaslik`, `referansbaslik`, `iletisimbaslik`, `sosyalmedyabaslik`, `mesajtercih`) VALUES
(1, 'Kurumsal Yeni', 'Kurumsal', 'kurumsal,yeni', 'nakliyat,taşıma', 'Mert Yücel', 'Mert', '2019', 'img/logos.jpg', 'https://twitter.com', 'https://www.facebook.com', 'https://www.instagram.com', 'San Francisco, CA 94126, USA', '+ 01 234 567 89', 'contact@mdbootstrap.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48187.25741308118!2d28.611613590057516!3d40.98797099143595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b55fc19deb0b3b%3A0xdf4ea093f30983c6!2zQmV5bGlrZMO8esO8L8Swc3RhbmJ1bA!5e0!3m2!1str!2str!4v1545739036216', 'HAKKIMIZDA', 'Kaliteli evden eve nakliye hizmeti, prensip olarak hiçbir ev eşyası ambalajlama, paketleme malzemelerine sarılmadan evden çıkarılmaz. Kaliteli evden eve taşımacılık, her zaman için gelişen teknolojiyi takip ederek müşterilerimiz için en son çıkan paketleme ve ambalajlama ürünlerini kullanır. Sigortalı evden eve nakliyat, olabilecek kazalar için eşyalarınızı türkiyenin önde gelen sigorta şirketleri tarafından eşyalarınızın değerinde sigorta yaptırır.', 'HİZMETLERİMİZ', 'FİLOMUZ', 'REFERANSLARIMIZ', 'İLETIŞIM', 'SOSYAL MEDYA HESAPLARIMIZ', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `filo`
--

CREATE TABLE `filo` (
  `id` int(11) NOT NULL,
  `resimyol` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `filo`
--

INSERT INTO `filo` (`id`, `resimyol`) VALUES
(1, 'img/filo/1.jpg'),
(2, 'img/filo/2.jpg'),
(3, 'img/filo/3.jpg'),
(4, 'img/filo/4.jpg'),
(5, 'img/filo/5.jpg'),
(6, 'img/filo/6.jpg'),
(7, 'img/filo/7.jpg'),
(8, 'img/filo/8.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelenmail`
--

CREATE TABLE `gelenmail` (
  `id` int(11) NOT NULL,
  `ad` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `mailadres` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `konu` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `zaman` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gelenmail`
--

INSERT INTO `gelenmail` (`id`, `ad`, `mailadres`, `konu`, `mesaj`, `zaman`, `durum`) VALUES
(1, 'Olcay', 'olci@bumbum.com', 'Deneme Konusu', 'icerik icerikicerik icerikicerik icerikicerik icerikicerik icerikicerik icerikicerik icerikicerik icerikicerik icerikicerik icerikicerik icerikicerik icerikicerik icerik', '15.03.2019', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelenmailayar`
--

CREATE TABLE `gelenmailayar` (
  `id` int(11) NOT NULL,
  `host` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `mailadres` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `port` int(11) NOT NULL,
  `aliciadres` varchar(40) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gelenmailayar`
--

INSERT INTO `gelenmailayar` (`id`, `host`, `mailadres`, `sifre`, `port`, `aliciadres`) VALUES
(1, 'aaaa', 'bbbb', 'cccc', 11111, 'info@udemynakliyat.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `id` int(11) NOT NULL,
  `baslik` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`id`, `baslik`, `icon`) VALUES
(1, 'Güvenilir', 'fa fa-shield fa-4x'),
(2, 'Tecrübe', 'fa fa-history fa-4x'),
(3, 'Uygun', 'fa fa-money fa-4x');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetler`
--

CREATE TABLE `hizmetler` (
  `id` int(11) NOT NULL,
  `baslik` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hizmetler`
--

INSERT INTO `hizmetler` (`id`, `baslik`, `icerik`, `icon`) VALUES
(1, ' Evden Eve Nakliye', 'Ev taşımacılığı uzmanlık isteyen bir iştir. Taşınacaklar düzgün paket yapılmalı ve araç içi istifi yapılması gerekli', 'fa fa-home'),
(2, ' Kurumsal Taşımacılık', 'Kamu yada özel kurumların tüm taşıma işlerini, kurumların bir yerden başka bir yere taşımasını yapmaktayız.', 'fa fa-users'),
(3, ' Depo Taşımacılığı', 'Stand ve stand içi ürün ve depo eşyalarınız özenle ve titizlikle gün içerisinde taşınması yapılır.', 'fa fa-archive'),
(4, ' Ofis Taşımacılığı', 'Kentlerde ve palazalardaki ofisleriniz titizlikle paketlenerek taşıma işlemleri ve depolama hizmeti verilir.', 'fa fa-support'),
(5, ' Şehirler Arası Nakliyat', 'İşyerinizi yada faliyetlerinizi bir şehirden başka bir şehire taşıma işlemini araçlarımız ile yapmaktayız.', 'fa fa-truck'),
(6, ' Eşya Parça Taşıma', 'Aracınıza girmeyen tek parça eşya yada ürünlerinizin taşıma işlemlerini aynı gün içinde yapmaktayız.', 'fa fa-cubes');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `intro`
--

CREATE TABLE `intro` (
  `id` int(11) NOT NULL,
  `resimyol` varchar(40) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `intro`
--

INSERT INTO `intro` (`id`, `resimyol`) VALUES
(1, 'img/carousel/1.jpg'),
(2, 'img/carousel/2.jpg'),
(3, 'img/carousel/3.jpg'),
(4, 'img/carousel/4.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `referans`
--

CREATE TABLE `referans` (
  `id` int(11) NOT NULL,
  `resimyol` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `kisi` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  `gorev` varchar(40) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `referans`
--

INSERT INTO `referans` (`id`, `resimyol`, `icerik`, `kisi`, `gorev`) VALUES
(1, 'img/referans/ref1.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.', 'MERT', 'ceo'),
(2, 'img/referans/ref2.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.', 'john', 'manager'),
(3, 'img/referans/ref3.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.', 'Bob', 'director'),
(4, 'img/referans/ref4.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.', 'Alisa', 'Teacher'),
(5, 'img/referans/ref5.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.', 'Nick', 'Nurse'),
(6, 'img/referans/ref6.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.', 'Stevei', 'pilot'),
(7, 'img/referans/ref7.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.', 'LWER', 'Police'),
(8, 'img/referans/ref8.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.', 'Nures', 'Doctor');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetim`
--

CREATE TABLE `yonetim` (
  `id` int(11) NOT NULL,
  `kulad` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yonetim`
--

INSERT INTO `yonetim` (`id`, `kulad`, `sifre`, `aktif`) VALUES
(1, 'mert', '44209a6a592dea91bcf7d4dd53e47a5a', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `filo`
--
ALTER TABLE `filo`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gelenmail`
--
ALTER TABLE `gelenmail`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gelenmailayar`
--
ALTER TABLE `gelenmailayar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hizmetler`
--
ALTER TABLE `hizmetler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `intro`
--
ALTER TABLE `intro`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `referans`
--
ALTER TABLE `referans`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yonetim`
--
ALTER TABLE `yonetim`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `filo`
--
ALTER TABLE `filo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `gelenmail`
--
ALTER TABLE `gelenmail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `gelenmailayar`
--
ALTER TABLE `gelenmailayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `hizmetler`
--
ALTER TABLE `hizmetler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `intro`
--
ALTER TABLE `intro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `referans`
--
ALTER TABLE `referans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `yonetim`
--
ALTER TABLE `yonetim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
