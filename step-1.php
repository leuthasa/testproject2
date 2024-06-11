<?php

session_start();

// Verschiedene PHP Klassen 
$error_service = "";
$error_equipment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["next"])) {
    ini_set("display_errors", 1);
    error_reporting(E_ALL);
    $has_error = false;

    // Überprüft ob ein Service ausgewählt wurde 
    if (isset($_POST['service'])) {
        $_SESSION['service'] = htmlspecialchars($_POST["service"]);
    } else {
        $error_service = "Please select a service.";
        $has_error = true;
    }

    // Speichert die Informationen des Scripts
    $_SESSION['script'] = isset($_POST['script']) ? true : false;

    // Überprüft ob mindestens ein Equipment ausgewählt wurde" 
    $equipment_options = ['canoneos' => 'Canon EOS', 'canonrf24' => 'Canon RF24', 'canonrf55' => 'Canon RF25', 'tripodcam' => 'Tripod for camera', 'rode' => 'Rode', 'zoom' => 'Zoom', 'tripodmic' => 'Tripod for microphone'];
    $selected_equipment = [];
    foreach ($equipment_options as $key => $value) {
        if (isset($_POST[$key])) {
            $selected_equipment[] = $value;
        }
    }
    if (empty($selected_equipment)) {
        $error_equipment = "Please select at least one equipment.";
        $has_error = true;
    } else {
        $_SESSION["selected-equipment"] = $selected_equipment;
    }

    if (isset($_POST['textarea-step1'])) {
        $_SESSION['textarea-step1'] = htmlspecialchars($_POST['textarea-step1']);


        if (!$has_error) {
            header('Location: ./step-2.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ndb2ytm.css">
    <title>Step 1</title>
    <link rel="icon" type="image/x-icon" href="media/01_header/Logo_Videoroom_Bildmarke.png">
</head>

<body>
    <?php include "header.php" ?>
    <br>
    <main>
        <form method="post" action="">
            <!-- Navigationsbar -->
            <section class="link-navbar">
                <ul class="navbar">
                    <li class="nav-item">
                        <a href="step-1.php">
                            <div class="circle current">1</div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="step-2.php">
                            <div class="circle">2</div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="step-3.php">
                            <div class="circle">3</div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="verification.php">
                            <div class="circle">4</div>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- Anfang Formular -->
            <fieldset id="step-1">
                <div class="form-content">
                    <h2>LET'S GO!</h2>
                    <p>Tell us about your project.</p>
                    <hr class="linie">
                    <!-- Service Tag -->
                    <section class="step1">
                        <h3>Which service do you need?</h3>
                        <div class="radio-step1">
                            <input type="radio" id="service-equipment" name="service" value="Equipment only" required <?= isset($_SESSION["service"]) && $_SESSION["service"] == "Equipment only" ? "checked" : ""; ?>>
                            <label for="service-equipment" class="textdesign">Equipment only</label>
                            <br>
                            <input type="radio" id="service-room" name="service" value="Room and equipment" required <?= isset($_SESSION["service"]) && $_SESSION["service"] == "Room and equipment" ? "checked" : ""; ?>>
                            <label for="service-room" class="textdesign">Room and Equipment</label>
                        </div>
                        <span class="error-text"><?= $error_service ?? ""; ?></span>
                    </section>
                    <br>
                    <section class="step1">
                        <h3>Do you have a script?</h3>
                        <div class="switch">
                            <label class="switch-label" for="script">No</label>
                            <label class="switch">
                                <input type="checkbox" id="script" name="script" <?= isset($_SESSION['script']) && $_SESSION['script'] ? 'checked' : ''; ?>>
                                <span class="slider round"></span>
                            </label>
                            <label class="switch-label" for="script">Yes</label>
                        </div>
                    </section>
                    <br>
                    <section class="step1">
                        <h3>Tick the equipment you need.</h3>
                        <div class="checkbox-step1">
                            <?php
                            $equipment_options = ['canoneos' => 'Canon EOS', 'canonrf24' => 'Canon RF24', 'canonrf55' => 'Canon RF25', 'tripodcam' => 'Tripod for camera', 'rode' => 'Rode', 'zoom' => 'Zoom', 'tripodmic' => 'Tripod for microphone'];
                            foreach ($equipment_options as $key => $value) {
                                $checked = isset($_SESSION['selected-equipment']) && in_array($value, $_SESSION['selected-equipment']) ? 'checked' : '';
                                echo '<label><input type="checkbox" id="' . $key . '" name="' . $key . '" value="' . $value . '" ' . $checked . '> ' . $value . '</label><br>';
                            }
                            ?>
                        </div>
                        <span class="error-text"><?= $error_equipment ?? ""; ?></span>
                    </section>
                    <br>
                    <section class="step1-textdesign step1">
                        <p>| optional</p>
                        <h3>Please describe the vision or idea of your video.</h3>
                        <p>(What is the content? Which use will it have?)</p>
                        <textarea id="textarea-step1" name="textarea-step1" rows="4" cols="50"><?= isset($_SESSION['textarea-step1']) ? htmlspecialchars($_SESSION['textarea-step1']) : 'My vision or idea...'; ?></textarea>
                    </section>
                    <br>
                    <section class="button-container step1">
                        <input name="next" type="submit" value="Next page" class="submit-button" />
                    </section>
                </div>
            </fieldset>
        </form>
    </main>
    <?php include "footer.php" ?>
</body>

</html>