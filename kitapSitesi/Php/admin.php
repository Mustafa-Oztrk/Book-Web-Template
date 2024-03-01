<?php
// JavaScript alert mesajını kontrol et
if (isset($_GET['alertMesaji'])) {
    $alertMesaji = urldecode($_GET['alertMesaji']);
    echo '<script type="text/javascript">alert("' . $alertMesaji . '");</script>';
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../Css/admin.css">
</head>

<body>
    <div class="container">
        <form action="kaydet.php" method="post" enctype="multipart/form-data" id="kitapEkleForm">

            <div class="labels">
                <div class="labBox">
                    <label for="kAdi">Kitap Adı</label>
                </div>
                <input type="text" id="kAdi" name="kAdi"> <br>
            </div>

            <div class="labels">

                <div class="labBox">
                    <label for="yazari">Yazarı</label>
                </div>

                <input type="text" id="yazari" name="yazari"><br>
            </div>

            <div class="labels">
                <div class="labBox">
                    <label for="">Kitap Türü</label>
                </div>
                <select name="secim">
                    <?php
                    $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

                    if (!$baglanti) {
                        die("Bağlanamadı: " . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM kitap_turu";
                    $result = $baglanti->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["tur_name"] . "'>" . $row["tur_name"] . "</option>";
                        }
                    } else {
                        echo "Veri bulunamadı";
                    }

                    $baglanti->close();
                    ?>
                </select><br>
            </div>


            <div class="labels">
                <div class="labBox">
                    <label for="sayfa_sayisi">Sayfa Sayısı</label>
                </div>
                <input type="text" id="sayfa_sayisi" name="sayfa_sayisi"><br>
            </div>

            <div class="labels">
                <div class="labBox">
                    <label for="basim_yili">Basım Yılı</label>
                </div>
                <input type="text" id="basim_yili" name="basim_yili"><br>
            </div>

            <div class="labels">
                <div class="labBox">
                    <label for="basim_yili">Yayın Evi</label>
                </div>
                <input type="text" id="yayin_evi" name="yayin_evi"><br>
            </div>

            <div class="labels">
                <div class="labBox">
                    <label for="dili">Dili</label>
                </div>
                <input type="text" id="dili" name="dili"><br>
            </div>

            <div class="labels">
                <div class="labBox">
                    <label for="ebati">Ebatı</label>
                </div>
                <input type="text" id="ebati" name="ebati"><br>
            </div>

            <div class="labels">
                <div class="labBox">
                    <label for="fiyat">Fiyat</label>
                </div>
                <input type="text" id="fiyat" name="fiyat"><br>
            </div>

            <div class="labels">
                <div class="labBox">
                    <label for="hamurtipi">Hamur Tipi </label>
                </div>
                <input type="text" id="hamurtipi" name="hamurtipi"><br>
            </div>

            <div class="labels">
                <div class="labBox">
                    <label for="barkod">Barkod</label>
                </div>
                <input type="text" id="barkod" name="barkod"><br>
            </div>
            <div class="labels">
                <div class="labBox">
                    <label for="medyaC">Medya Cinsi</label>
                </div>
                <input type="text" id="medyaC" name="medyaC"><br>
            </div>

            <div class="labels">
                <div class="labBox">
                    <label for="ozet">özeti : </label>
                </div>
                <input type="text" id="ozet" name="ozet"><br>
            </div> 

            <div class="labels">
                <div class="labBox">
                    <label for="kapak_fotografi">Kapak Fotografı</label>
                </div>
                <input type="file" id="kapak_fotografi" name="kapak_fotografi"><br>
            </div>

            <div class="sbmt">
                <button type="submit">Kaydet</button>
            </div>
        </form>
    </div>


</body>

</html>