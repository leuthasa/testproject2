<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ndb2ytm.css">
    <title>Home</title>
    <link rel="icon" type="image/x-icon" href="media/01_header/Logo_Videoroom_Bildmarke.png">
</head>

<body>
    <?php include "header.php" ?>

    <main class="index-main">
        <div class="slideshow-container">

            <div class="mySlides">
                <img src="media/03_Index/Videoroom_Bild_Kamera_seitlich.jpeg" alt="Studio" style="width: 70%;">
            </div>

            <div class="mySlides">
                <img src="media/03_Index/Videoroom_Bild_Kamerascreen.jpeg" alt="Kamera" style="width: 70%;">
            </div>

            <div class="mySlides">
                <img src="media/03_Index/Videoroom_Bild_Setup_V1.jpeg" alt="Raum" style="width: 70%;">
            </div>

            <a class="prev" onclick="plusSlides(-1)"><img src="media/03_Index/Pfeil_links.png" style="width: 50%;"></a>
            <a class="next" onclick="plusSlides(1)"><img src="media/03_Index/Pfeil_rechts.png" style="width: 50%;"></a>

        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        <script>
            let slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                if (n > slides.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
            }
        </script>
        <div>
            <h2 style="text-align: center;">You are looking for an
                <br> alternative to shoot a video?
            </h2>
        </div>
        <div style="margin: 3%">
            <a href="step-1.php">
                <input name="next" type="submit" value="Contact us!" class="submit-button" />
            </a>
        </div>
    </main>

    <?php include "footer.php" ?>
</body>

</html>