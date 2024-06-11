<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ndb2ytm.css">
    <title>Confirmation</title>
    <link rel="icon" type="image/x-icon" href="media/01_header/Logo_Videoroom_Bildmarke.png">
    <style> 
    body, html {
        height: 100%;
        margin: 0;
    }

    .container {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .content {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 20px;
    }

    p {
        font-weight: bold;
    }

    #confirmation {
        text-align: center;
    }

    .last-button {
        color: #f3d0c4;
        border-radius: 20px;
        border: none;
        padding: 10px 20px;
        margin: 0 5px;
        background-color: #585A4D;
        cursor: pointer;
    }

    .last-button:hover {
        color: white;
    }
    
    .illustration {
        max-width: 100%;
        height: auto;
    }

    @media only screen and (max-width: 768px) {
        .content {
            padding: 10px; /* optional: Reduziert den Innenabstand des Inhalts in der Handyansicht */
        }

        .content:nth-child(1) {
            order: 2; /* Ändert die Reihenfolge des ersten Divs, um es unterhalb des zweiten Divs zu verschieben */
        }

        .illustration {
            width: 60%; /* Skaliert das Bild auf 80% der Bildschirmbreite in der Handyansicht */
            margin-top: 20px; /* Fügt einen oberen Abstand hinzu, um das Bild vom vorherigen Inhalt zu trennen */
        }
    }

    @media only screen and (min-width: 769px) {
        .container {
            flex-direction: row; /* Stellt die Flexbox-Ausrichtung auf Reihe zurück */
            margin: 0%;
            padding: 0%;
        }

        .content {
            padding: 20px; /* Stellt den Innenabstand in der normalen Ansicht wieder her */
            width: 45%; /* Verringert die Breite der Divs in der Desktopansicht */
        }

        .illustration {
            width: 25vh; /* Stellt die Breite des Bildes in der normalen Ansicht wieder her */
            margin-top: 0; /* Entfernt den oberen Abstand des Bildes in der normalen Ansicht */
        }

        .container .content:nth-child(2) {
            margin-left: 20px; /* Fügt einen seitlichen Abstand zwischen den Div-Containern hinzu */
        }
    }
    
    </style>
</head>

<body>
    <?php include "header.php" ?>

    <div class="container">
        <div class="content">
            <form method="post" action="" id="confirmation">
                <h2>THANK YOU!</h2>
                <hr class="linie">
                <p>Your request has been sent.</p>
                <br>
                <p>You will soon be contacted by email and we will confirm one of your slots.</p>
                <br>
                <div style="margin-bottom: 3%;">
                    <input name="next" type="submit" value="Return to home page" formaction="./index.php" class="last-button">
                </div>
            </form>
        </div>
        <div class="content">
            <img src="media/04_Confirmation/Illustration_Bestätigungsseite.png" alt="Confirmation Illustration" class="illustration"> 
        </div>
    </div>

    <?php include "footer.php" ?>
</body>

</html>
