<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

    if (!$baglanti) {
        die("Bağlanamadı: " . mysqli_connect_error());
    }

    $kAdi = $_POST['kAdi'];
    $yazari = $_POST['yazari'];
    $secilen_tur = $_POST['secim'];
    $sayfa_sayisi = $_POST['sayfa_sayisi'];
    $basim_yili = $_POST['basim_yili'];
    $yayin_evi = $_POST['yayin_evi'];
    $dili = $_POST['dili'];
    $fiyat = $_POST['fiyat'];
    $barkod = $_POST['barkod'];
    $medyaC = $_POST['medyaC'];
    $hamur_tipi = $_POST['hamurtipi'];
    $ebati = $_POST['ebati'];
    $ozet = $_POST['ozet'];
    $dosya_adi = basename($_FILES["kapak_fotografi"]["name"]);
    $dosya_yolu = "../uploads/" . $dosya_adi;

    if (move_uploaded_file($_FILES["kapak_fotografi"]["tmp_name"], $dosya_yolu)) {
        $sql = "INSERT INTO kitaplar (kitap_adi, yazari, kitap_turu, sayfa_sayisi, basim_yili, yayin_evi, dili, ebati, fiyat, hamur_tipi, barkod, medyaC, ozeti, kapak_fotografi)
        VALUES ('$kAdi','$yazari', '$secilen_tur', '$sayfa_sayisi', '$basim_yili','$yayin_evi', '$dili', '$ebati', '$fiyat','$hamur_tipi', '$barkod','$medyaC', '$ozet','$dosya_yolu')";

        if (mysqli_query($baglanti, $sql)) {
            // Yönlendirme yapılacak URL
            $yonlendirmeURL = "admin.php";

            // JavaScript alert mesajını göstermek için bir parametre oluştur
            $alertMesaji = "İşlem tamamlandı!";

            // Yönlendirme işlemi
            header("Location: $yonlendirmeURL?alertMesaji=" . urlencode($alertMesaji));
          
        } else {
            echo "Hata: " . $sql . "<br>" . mysqli_error($baglanti);
        }
    } else {
        echo "Dosya yükleme hatası.";
    }

    mysqli_close($baglanti);
}
?>