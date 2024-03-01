<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Türler</title>
    <link rel="stylesheet" href="../Css/detaylar.css">
    <link rel="stylesheet" href="../Css/style.css">
</head>

<body>

    <div class="navbar">
        <div class="logoContainer">

            <a href="index.php"><img src="../logo.png" alt=""></a>
        </div>

        <div class="menu">

            <div class="menuBox">

                <div class="katagory">

                    <?php
                    $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

                    if (!$baglanti) {
                        die("Bağlanamadı: " . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM kitap_turu";
                    $result = $baglanti->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<a href='turpage.php?trID=" . $row["tur_name"] . "'>" . $row["tur_name"] . "</a>";
                        }
                    } else {
                        echo "Veri bulunamadı";
                    }

                    $baglanti->close();
                    ?>
                </div>

            </div>
        </div>

    </div>

    <div class="lastContainer">
        <h3>Türe Ait Kitaplar</h3>

        <div class=" detya">

            <?php

            // Veritabanı bağlantısı
            $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

            if (!$baglanti) {
                die("Bağlanamadı: " . mysqli_connect_error());
            }

            // URL'den tıklanan kitabın türünü al
            $turler = $_GET['trID'];

            $sql_tur = "SELECT * FROM kitaplar WHERE kitap_turu = '$turler'";
            $result_tur = mysqli_query($baglanti, $sql_tur);

            if (mysqli_num_rows($result_tur) > 0) {
                while ($row = mysqli_fetch_assoc($result_tur)) {
                    ?>

                    <div class="oneri-container">
                        <div class="oneri-box">
                            <div class="oneri-S-colum">
                                <div class="bookPhoto">
                                    <img src="<?php echo $row['kapak_fotografi']; ?>" alt="Kitap Fotoğrafı">
                                </div>
                                <div class="bookInfo">
                                    <h4>
                                        <?php echo "<a href='detaylar.php?id=" . $row["kitap_id"] . "'>" . $row["kitap_adi"] . "</a>"; ?>
                                    </h4>
                                    <p>
                                        <?php echo $row['fiyat']; ?> TL
                                    </p>
                                    <div class="sepetBtn">
                                        <button>Sepete Ekle</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Her iki kitap arasına bir <p>+</p> ekle -->

                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "Veri bulunamadı";
            }

            mysqli_close($baglanti);
            ?>
        </div>
    </div>





</body>

</html>