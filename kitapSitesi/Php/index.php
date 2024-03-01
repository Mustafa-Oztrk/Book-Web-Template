<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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


    <div class="container">
        <!--En Son eklenen Kitaplar-->
        <div class="lastContainer">
            <h3>En Son Eklenen Kitaplar</h3>

            <div class="lastBook">
                <?php
                // Veritabanı bağlantısı
                $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

                if (!$baglanti) {
                    die("Bağlanamadı: " . mysqli_connect_error());
                }

                // Son 5 eklenen kitabın bilgilerini al
                $sql = "SELECT * FROM kitaplar ORDER BY kitap_id DESC LIMIT 5"; // Son 5 eklenen kitabı alır
                $result = mysqli_query($baglanti, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="bookBox">
                            <div class="bookPhoto">
                                <!-- Eğer kitap için fotoğrafın yolu veritabanında bir sütunda saklanıyorsa -->
                                <img src="<?php echo $row['kapak_fotografi']; ?>" alt="Kitap Fotoğrafı">
                            </div>
                            <div class="bookInfo">
                                <h4>
                                    <?php
                                    // Detaylar sayfasına link oluşturma
                                    echo "<a href='detaylar.php?id=" . $row["kitap_id"] . "&tur=" . $row["kitap_turu"] . "'>" . $row["kitap_adi"] . "</a>";
                                    ?>
                                </h4>
                                <p>
                                    <?php echo $row['fiyat']; ?> TL
                                </p>
                                <!-- Diğer kitap bilgilerini buraya ekleyebilirsiniz -->
                            </div>

                            <div class="sepetBtn">
                                <button>Sepete Ekle</button>
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

        <div class="lastContainer">
            <h3>Felsefe Kitapları</h3>
            <div class="lastBook">
                <?php
                // Veritabanı bağlantısı
                $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

                if (!$baglanti) {
                    die("Bağlanamadı: " . mysqli_connect_error());
                }

                // Son 5 eklenen kitabın bilgilerini al
                $sql = "SELECT * FROM kitaplar WHERE kitap_turu = 'Felsefe'"; // Son 5 eklenen kitabı alır
                $result = mysqli_query($baglanti, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="bookBox">
                            <div class="bookPhoto">
                                <!-- Eğer kitap için fotoğrafın yolu veritabanında bir sütunda saklanıyorsa -->
                                <img src="<?php echo $row['kapak_fotografi']; ?>" alt="Kitap Fotoğrafı">
                            </div>
                            <div class="bookInfo">
                                <h4>
                                    <?php
                                    // Detaylar sayfasına link oluşturma
                                    echo "<a href='detaylar.php?id=" . $row["kitap_id"] . "&tur=" . $row["kitap_turu"] . "'>" . $row["kitap_adi"] . "</a>";
                                    ?>
                                </h4>
                                <p>
                                    <?php echo $row['fiyat']; ?> TL
                                </p>
                                <!-- Diğer kitap bilgilerini buraya ekleyebilirsiniz -->
                            </div>

                            <div class="sepetBtn">
                                <button>Sepete Ekle</button>
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




        <div class="lastContainer">
            <h3>Fiyata Göre Kitaplar</h3>
            <div class="lastBook">
                <?php
                // Veritabanı bağlantısı
                $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

                if (!$baglanti) {
                    die("Bağlanamadı: " . mysqli_connect_error());
                }

                // Son 5 eklenen kitabın bilgilerini al
                $sql = "SELECT * FROM kitaplar ORDER BY fiyat DESC LIMIT 5"; // Son 5 eklenen kitabı alır
                $result = mysqli_query($baglanti, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="bookBox">
                            <div class="bookPhoto">
                                <!-- Eğer kitap için fotoğrafın yolu veritabanında bir sütunda saklanıyorsa -->
                                <img src="<?php echo $row['kapak_fotografi']; ?>" alt="Kitap Fotoğrafı">
                            </div>
                            <div class="bookInfo">
                                <h4>
                                    <?php
                                    // Detaylar sayfasına link oluşturma
                                    echo "<a href='detaylar.php?id=" . $row["kitap_id"] . "&tur=" . $row["kitap_turu"] . "'>" . $row["kitap_adi"] . "</a>";
                                    ?>
                                </h4>
                                <p>
                                    <?php echo $row['fiyat']; ?> TL
                                </p>
                                <!-- Diğer kitap bilgilerini buraya ekleyebilirsiniz -->
                            </div>

                            <div class="sepetBtn">
                                <button>Sepete Ekle</button>
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



        <div class="lastContainer">
            <h3>Ümit Doğan'ın Kitapları</h3>
            <div class="lastBook">
                <?php
                // Veritabanı bağlantısı
                $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

                if (!$baglanti) {
                    die("Bağlanamadı: " . mysqli_connect_error());
                }

                // Son 5 eklenen kitabın bilgilerini al
                $sql = "SELECT * FROM kitaplar WHERE yazari = 'Ümit Doğan'"; // Son 5 eklenen kitabı alır
                $result = mysqli_query($baglanti, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="bookBox">
                            <div class="bookPhoto">
                                <!-- Eğer kitap için fotoğrafın yolu veritabanında bir sütunda saklanıyorsa -->
                                <img src="<?php echo $row['kapak_fotografi']; ?>" alt="Kitap Fotoğrafı">
                            </div>
                            <div class="bookInfo">
                                <h4>
                                    <?php
                                    // Detaylar sayfasına link oluşturma
                                    echo "<a href='detaylar.php?id=" . $row["kitap_id"] . "&tur=" . $row["kitap_turu"] . "'>" . $row["kitap_adi"] . "</a>";
                                    ?>
                                </h4>
                                <p>
                                    <?php echo $row['fiyat']; ?> TL
                                </p>
                                <!-- Diğer kitap bilgilerini buraya ekleyebilirsiniz -->
                            </div>

                            <div class="sepetBtn">
                                <button>Sepete Ekle</button>
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



    </div>




    <div class="container">
        <!--En Son eklenen Kitaplar-->
        <div class="lastContainer">
            <h3>Biyografi Son EKlenen</h3>

            <div class="lastBook">
                <?php
                // Veritabanı bağlantısı
                $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

                if (!$baglanti) {
                    die("Bağlanamadı: " . mysqli_connect_error());
                }

                // Son 5 eklenen kitabın bilgilerini al
                $sql = "SELECT * FROM kitaplar WHERE kitap_turu = 'Biyografi' ORDER BY kitap_id DESC "; // Son 5 eklenen kitabı alır
                $result = mysqli_query($baglanti, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="bookBox">
                            <div class="bookPhoto">
                                <!-- Eğer kitap için fotoğrafın yolu veritabanında bir sütunda saklanıyorsa -->
                                <img src="<?php echo $row['kapak_fotografi']; ?>" alt="Kitap Fotoğrafı">
                            </div>
                            <div class="bookInfo">
                                <h4>
                                    <?php
                                    // Detaylar sayfasına link oluşturma
                                    echo "<a href='detaylar.php?id=" . $row["kitap_id"] . "&tur=" . $row["kitap_turu"] . "'>" . $row["kitap_adi"] . "</a>";
                                    ?>
                                </h4>
                                <p>
                                    <?php echo $row['fiyat']; ?> TL
                                </p>
                                <!-- Diğer kitap bilgilerini buraya ekleyebilirsiniz -->
                            </div>

                            <div class="sepetBtn">
                                <button>Sepete Ekle</button>
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

        <div class="lastContainer">
            <h3>Felsefe Kitapları</h3>
            <div class="lastBook">
                <?php
                // Veritabanı bağlantısı
                $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

                if (!$baglanti) {
                    die("Bağlanamadı: " . mysqli_connect_error());
                }

                // Son 5 eklenen kitabın bilgilerini al
                $sql = "SELECT * FROM kitaplar WHERE kitap_turu = 'Felsefe'"; // Son 5 eklenen kitabı alır
                $result = mysqli_query($baglanti, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="bookBox">
                            <div class="bookPhoto">
                                <!-- Eğer kitap için fotoğrafın yolu veritabanında bir sütunda saklanıyorsa -->
                                <img src="<?php echo $row['kapak_fotografi']; ?>" alt="Kitap Fotoğrafı">
                            </div>
                            <div class="bookInfo">
                                <h4>
                                    <?php
                                    // Detaylar sayfasına link oluşturma
                                    echo "<a href='detaylar.php?id=" . $row["kitap_id"] . "&tur=" . $row["kitap_turu"] . "'>" . $row["kitap_adi"] . "</a>";
                                    ?>
                                </h4>
                                <p>
                                    <?php echo $row['fiyat']; ?> TL
                                </p>
                                <!-- Diğer kitap bilgilerini buraya ekleyebilirsiniz -->
                            </div>

                            <div class="sepetBtn">
                                <button>Sepete Ekle</button>
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




        <div class="lastContainer">
            <h3>Fiyata Göre Kitaplar</h3>
            <div class="lastBook">
                <?php
                // Veritabanı bağlantısı
                $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

                if (!$baglanti) {
                    die("Bağlanamadı: " . mysqli_connect_error());
                }

                // Son 5 eklenen kitabın bilgilerini al
                $sql = "SELECT * FROM kitaplar ORDER BY fiyat DESC LIMIT 5"; // Son 5 eklenen kitabı alır
                $result = mysqli_query($baglanti, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="bookBox">
                            <div class="bookPhoto">
                                <!-- Eğer kitap için fotoğrafın yolu veritabanında bir sütunda saklanıyorsa -->
                                <img src="<?php echo $row['kapak_fotografi']; ?>" alt="Kitap Fotoğrafı">
                            </div>
                            <div class="bookInfo">
                                <h4>
                                    <?php
                                    // Detaylar sayfasına link oluşturma
                                    echo "<a href='detaylar.php?id=" . $row["kitap_id"] . "&tur=" . $row["kitap_turu"] . "'>" . $row["kitap_adi"] . "</a>";
                                    ?>
                                </h4>
                                <p>
                                    <?php echo $row['fiyat']; ?> TL
                                </p>
                                <!-- Diğer kitap bilgilerini buraya ekleyebilirsiniz -->
                            </div>

                            <div class="sepetBtn">
                                <button>Sepete Ekle</button>
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



        <div class="lastContainer">
            <h3>2019 dan Sonra Basınlan Kitaplar</h3>
            <div class="lastBook">
                <?php
                // Veritabanı bağlantısı
                $baglanti = mysqli_connect("127.0.0.1", "root", "", "odev_db");

                if (!$baglanti) {
                    die("Bağlanamadı: " . mysqli_connect_error());
                }

                // Son 5 eklenen kitabın bilgilerini al
                $sql = "SELECT * FROM kitaplar WHERE basim_yili >= 2019 ORDER BY basim_yili DESC LIMIT 5";
                $result = mysqli_query($baglanti, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="bookBox">
                            <div class="bookPhoto">
                                <!-- Eğer kitap için fotoğrafın yolu veritabanında bir sütunda saklanıyorsa -->
                                <img src="<?php echo $row['kapak_fotografi']; ?>" alt="Kitap Fotoğrafı">
                            </div>
                            <div class="bookInfo">
                                <h4>
                                    <?php
                                    // Detaylar sayfasına link oluşturma
                                    echo "<a href='detaylar.php?id=" . $row["kitap_id"] . "&tur=" . $row["kitap_turu"] . "'>" . $row["kitap_adi"] . "</a>";
                                    ?>
                                </h4>
                                <p>
                                    <?php echo $row['fiyat']; ?> TL
                                </p>
                                <!-- Diğer kitap bilgilerini buraya ekleyebilirsiniz -->
                            </div>

                            <div class="sepetBtn">
                                <button>Sepete Ekle</button>
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



    </div>
</body>

</html>