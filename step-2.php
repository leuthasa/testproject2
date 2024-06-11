<?php

session_start();

$errors = array(
    "first-date" => "",
    "first-starttime" => "",
    "first-endtime" => "",
    "second-date" => "",
    "second-starttime" => "",
    "second-endtime" => "",
    "third-date" => "",
    "third-starttime" => "",
    "third-endtime" => "",
);

$has_error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["next"])) {
    ini_set("display_errors", 1);
    error_reporting(E_ALL);

    // Erstellt arrays um die Daten zusammenzuschliessen
    $dates = ["first-date", "second-date", "third-date"];
    $times = ["first-starttime", "first-endtime", "second-starttime", "second-endtime", "third-starttime", "third-endtime"];

    // Überprüft die Datumsfelder
    foreach ($dates as $date) {
        if (!empty($_POST[$date])) {
            $_SESSION[$date] = $_POST[$date];
        } else {
            $errors[$date] = "Please select a date.";
            $has_error = true;
        }
    }

    // Überprüft die Zeitfelder
    foreach ($times as $time) {
        if (!empty($_POST[$time])) {
            $_SESSION[$time] = $_POST[$time];
        } else {
            $errors[$time] = "Please select a time.";
            $has_error = true;
        }
    }

    if (!$has_error) {
        header('Location: ./step-3.php');
        exit();
    }
}

// Wiederherstellung der Formulardaten aus der Session
if (!$has_error || $_SERVER["REQUEST_METHOD"] != "POST") {
    foreach ($errors as $field => $error) {
        if (isset($_SESSION[$field])) {
            $_POST[$field] = $_SESSION[$field];
        }
    }
}

// Überprüft, ob Fehlermeldungen vorhanden sind
foreach ($errors as $field => $error) {
    if (isset($_POST[$field]) && empty($_POST[$field])) {
        $errors[$field] = "Please select a value.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ndb2ytm.css">
    <title>Step 2</title>
    <link rel="icon" type="image/x-icon" href="media/01_header/Logo_Videoroom_Bildmarke.png">
</head>

<body>
    <?php include "header.php" ?>
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
                            <div class="circle current">2</div>
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
            <fieldset id="step-2">
                <div class="form-content">
                    <h2>HERE WE GO!</h2>
                    <p>Please tell us when you have time.</p>
                    <hr class="linie">
                    <section class="step2">
                        <div>
                            <label for="first-date">My first preferred time slot:</label>
                            <div class="time-date custom-date-input">
                                <input type="date" id="first-date" name="first-date" value="<?= $_POST['first-date'] ?? '' ?>" autofocus>
                                <span class="error-text"><?= $errors['first-date'] ?? ""; ?></span>
                            </div>
                        </div>
                        <div>
                            <label for="first-starttime">From when...</label>
                            <div class="time-date">
                                <input type="time" id="first-starttime" name="first-starttime" value="<?= $_POST['first-starttime'] ?? '' ?>">
                                <span class="error-text"><?= $errors['first-starttime'] ?? ""; ?></span>
                            </div>
                        </div>
                        <div>
                            <label for="first-endtime">To when...</label>
                            <div class="time-date">
                                <input type="time" id="first-endtime" name="first-endtime" value="<?= $_POST['first-endtime'] ?? '' ?>">
                                <span class="error-text"><?= $errors['first-endtime'] ?? ""; ?></span>
                            </div>
                        </div>
                    </section>
                    <section class="step2">
                        <div>
                            <label for="second-date">My second preferred time slot:</label>
                            <div class="time-date custom-date-input">
                                <input type="date" id="second-date" name="second-date" value="<?= $_POST['second-date'] ?? '' ?>">
                                <span class="error-text"><?= $errors['second-date'] ?? ""; ?></span>
                            </div>
                        </div>
                        <div>
                            <label for="second-starttime">From when...</label>
                            <div class="time-date">
                                <input type="time" id="second-starttime" name="second-starttime" value="<?= $_POST['second-starttime'] ?? '' ?>">
                                <span class="error-text"><?= $errors['second-starttime'] ?? ""; ?></span>
                            </div>
                        </div>
                        <div>
                            <label for="second-endtime">To when...</label>
                            <div class="time-date">
                                <input type="time" id="second-endtime" name="second-endtime" value="<?= $_POST['second-endtime'] ?? '' ?>">
                                <span class="error-text"><?= $errors['second-endtime'] ?? ""; ?></span>
                            </div>
                        </div>
                    </section>
                    <section class="step2">
                        <div>
                            <label for="third-date">My third preferred time slot:</label>
                            <div class="time-date custom-date-input">
                                <input type="date" id="third-date" name="third-date" value="<?= $_POST['third-date'] ?? '' ?>">
                                <span class="error-text"><?= $errors['third-date'] ?? ""; ?></span>
                            </div>
                        </div>
                        <div>
                            <label for="third-starttime">From when...</label>
                            <div class="time-date">
                                <input type="time" id="third-starttime" name="third-starttime" value="<?= $_POST['third-starttime'] ?? '' ?>">
                                <span class="error-text"><?= $errors['third-starttime'] ?? ""; ?></span>
                            </div>
                        </div>
                        <div>
                            <label for="third-endtime">To when...</label>
                            <div class="time-date">
                                <input type="time" id="third-endtime" name="third-endtime" value="<?= $_POST['third-endtime'] ?? '' ?>">
                                <span class="error-text"><?= $errors['third-endtime'] ?? ""; ?></span>
                            </div>
                        </div>
                    </section>
                    <section class="button-container step2">
                        <input type="submit" name="previous" value="Back" formaction="./step-1.php" class="submit-button">
                        <input type="submit" name="next" value="Next page" class="submit-button" />
                    </section>
                </div>
            </fieldset>
        </form>
    </main>
    <?php include "footer.php" ?>
</body>

</html>