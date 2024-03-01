<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitap Detayları</title>
    <link rel="stylesheet" href="../Css/detaylar.css">
    <link rel="stylesheet" href="../Css/style.css">
</head>

<body>



    <!-- Navbar-->
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
                            echo "<a href='" . $row["tur_id"] . "'>" . $row["tur_name"] . "</a>";
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



    <?php
    $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

    if (!$baglanti) {
        die("Bağlanamadı: " . mysqli_connect_error());
    }

    // Check if the book ID is provided in the URL
    if (isset($_GET['id'])) {
        $book_id = $_GET['id'];

        // Query to retrieve book details based on the ID
        $sql = "SELECT * FROM kitaplar WHERE kitap_id = $book_id";
        $result = mysqli_query($baglanti, $sql);

        if (mysqli_num_rows($result) > 0) {
            $book_details = mysqli_fetch_assoc($result);
            ?>
            <div class="section">
                <div class="fotobox">
                    <div class="foto">
                        <img src="<?php echo $book_details['kapak_fotografi']; ?>" alt="Kitap Fotoğrafı">
                    </div>
                </div>

                <div class="detayBox">

                    <!--En Baştaki Div-->
                    <div class="start-line">
                        <div class="bkName">
                            <p>
                                <?php echo $book_details['kitap_adi']; ?>

                            </p>
                        </div>
                        <div class="bk-writer">
                            <div class="start-colum">
                                <p> Yazarı :
                                    <?php echo $book_details['yazari']; ?>
                                </p>
                            </div>
                            <div class="midle-colum">
                                <p>Dili :
                                    <?php echo $book_details['dili']; ?>
                                </p>
                            </div>
                            <div class="end-colum">
                                <p>Yayın Evi :
                                    <?php echo $book_details['yayin_evi']; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!--Orta Div-->
                    <div class="midle-line">
                        <div class="prize-line">
                            <h5>Fiyatı : </h5>
                            <p>
                                <?php echo $book_details['fiyat']; ?> TL
                            </p>
                        </div>

                        <div class="general-line">
                            <div class="left-colum">
                                <div class="left-S-line">
                                    <p>Türü :
                                        <?php echo $book_details['kitap_turu']; ?>
                                    </p>
                                </div>
                                <div class="left-M-line">
                                    <p>Basım Yılı :
                                        <?php echo $book_details['basim_yili']; ?>
                                    </p>
                                </div>

                                <div class="left-E-line">
                                    <p>Medya Tipi :
                                        <?php echo $book_details['medyaC']; ?>
                                    </p>
                                </div>
                            </div>

                            <!-- Detaylar Sağ Taraf-->
                            <div class="right-colum">
                                <div class="right-S-line">
                                    <p> Sayfa Sayısı :
                                        <?php echo $book_details['sayfa_sayisi']; ?>
                                    </p>
                                </div>
                                <div class="right-M-line">
                                    <p>Hamur Tipi :
                                        <?php echo $book_details['hamur_tipi']; ?>
                                    </p>
                                </div>
                                <div class="right-E-line">
                                    <p>Ebat :
                                        <?php echo $book_details['ebati']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="daha"><a href="#ozet">Daha Fazla</a></div>
                    </div>

                    <!-- Sonrdaki Div-->
                    <div class="end-line">
                        <Button>Sepete Ekle</Button>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo "Kitap bulunamadı";
        }
    } else {
        echo "Geçersiz istek";
    }

    mysqli_close($baglanti);
    ?>





    <div class="lastContainer">
        <h3>Benzer Kitaplar</h3>

        <div class=" detya">

            <?php

            // Veritabanı bağlantısı
            $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

            if (!$baglanti) {
                die("Bağlanamadı: " . mysqli_connect_error());
            }

            // URL'den tıklanan kitabın türünü al
            $tiklanan_kitap_id = $_GET['id'];

            $sql_tur = "SELECT kitap_turu FROM kitaplar WHERE kitap_id = '$tiklanan_kitap_id'";
            $result_tur = mysqli_query($baglanti, $sql_tur);

            if ($result_tur && mysqli_num_rows($result_tur) > 0) {
                $row_tur = mysqli_fetch_assoc($result_tur);
                $tiklanan_kitap_turu = $row_tur['kitap_turu'];

                // Diğer sayfada aynı türden 3 kitabı listeleyin
                $sql = "SELECT * FROM kitaplar WHERE kitap_turu = '$tiklanan_kitap_turu' AND kitap_id != '$tiklanan_kitap_id' LIMIT 3";
                $result = mysqli_query($baglanti, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $counter = 0; // Kaçıncı kitaba geldiğimizi izlemek için bir sayaç
                    while ($row = mysqli_fetch_assoc($result)) {
                        $counter++; // Her kitap için sayaç arttırılır
                        ?>
                        <!-- Aynı türdeki kitapları listeleyin -->
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
                                <?php if ($counter < 3) { ?>
                                    <p>+</p>
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "Veri bulunamadı";
                }
            } else {
                echo "Kitap bulunamadı";
            }

            mysqli_close($baglanti);
            ?>
        </div>
    </div>

    <div class="k-detaylari" id="ozet">



        <?php
        $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

        if (!$baglanti) {
            die("Bağlanamadı: " . mysqli_connect_error());
        }

        // Check if the book ID is provided in the URL
        if (isset($_GET['id'])) {
            $book_id = $_GET['id'];

            // Query to retrieve book details based on the ID
            $sql = "SELECT * FROM kitaplar WHERE kitap_id = $book_id";
            $result = mysqli_query($baglanti, $sql);

            if (mysqli_num_rows($result) > 0) {
                $book_details = mysqli_fetch_assoc($result);
                ?>


                <div class="ozeti">
                    <div class="baslik">Kitap Özeti</div>
                    <div class="oz">
                        <p>
                            <?php echo $book_details['ozeti']; ?>
                        </p>
                    </div>
                </div>


                <div class="k-bil">
                    <div class="info">
                        <div class="min-det"> <b>Kitap Adı : </b>
                            <p>
                                <?php echo $book_details['kitap_adi']; ?>
                            </p>
                        </div>
                        <div class="min-det"> <b>Kitap Yazarı : </b>
                            <p>
                                <?php echo $book_details['yazari']; ?>
                            </p>
                        </div>
                        <div class="min-det"><b>Yayın Evi : </b>
                            <p>
                                <?php echo $book_details['yayin_evi']; ?>
                            </p>
                        </div>
                        <div class="min-det"> <b>Basım Yılı : </b>
                            <p>
                                <?php echo $book_details['basim_yili']; ?>
                            </p>
                        </div>
                        <div class="min-det"> <b>Hamur Tipi : </b>
                            <p>
                                <?php echo $book_details['hamur_tipi']; ?>
                            </p>
                        </div>
                        <div class="min-det"> <b>Sayfa Sayısı : </b>
                            <p>
                                <?php echo $book_details['sayfa_sayisi']; ?>
                            </p>
                        </div>
                        <div class="min-det"> <b>Ebatı : </b>
                            <p>
                                <?php echo $book_details['ebati']; ?>
                            </p>
                        </div>
                        <div class="min-det"> <b>Dili : </b>
                            <p>
                                <?php echo $book_details['dili']; ?>
                            </p>
                        </div>
                        <div class="min-det"> <b>Barkodu : </b>
                            <p>
                                <?php echo $book_details['barkod']; ?>
                            </p>
                        </div>
                    </div>
                </div>


            </div>
            <?php
            } else {
                echo "Kitap bulunamadı";
            }
        } else {
            echo "Geçersiz istek";
        }

        mysqli_close($baglanti);
        ?>
    </div>

</body>

</html>