<?php

session_start();

$error_email = "";
$error_name = "";
$error_surname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["next"])) {
    ini_set("display_errors", 1);
    error_reporting(E_ALL);
    $has_error = false;

    if (!empty($_POST["first-name"])) {
        $_SESSION["first-name"] = htmlspecialchars(trim($_POST["first-name"]));
    } else {
        $error_first_name = "Please enter your first name.";
        $has_error = true;
    }

    if (!empty($_POST["last-name"])) {
        $_SESSION["last-name"] = htmlspecialchars(trim($_POST["last-name"]));
    } else {
        $error_last_name = "Please enter your last name.";
        $has_error = true;
    }

    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $_SESSION["email"] = htmlspecialchars(trim($_POST["email"]));
    } else {
        $error_email = "Please enter an e-mail address in the format name@beispiel.org.";
        $has_error = true;
    }

    if (isset($_POST["company-role"])) {
        $_SESSION["company-role"] = $_POST["company-role"];
    }

    if (!$has_error) {
        header('Location: ./verification.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ndb2ytm.css">
    <title>Step 3</title>
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
                            <div class="circle current">3</div>
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
            <fieldset id="step-3">
                <div class="form-content">
                    <h2>ALMOST DONE!</h2>
                    <p>Lastly, please fill out your personal data.</p>
                    <hr class="linie">
                    <section>
                        <label for="first-name">Name</label>
                        <div class="personal-data">
                            <input type="text" id="first-name" name="first-name" placeholder="First Name" value="<?= $_SESSION["first-name"] ?? ""; ?>" autofocus required>
                            <span class="error-text"><?= $error_first_name ?? ""; ?></span>
                        </div>
                    </section>
                    <section>
                        <label for="last-name">Surname</label>
                        <div class="personal-data">
                            <input type="text" id="last-name" name="last-name" placeholder="Last Name" value="<?= $_SESSION["last-name"] ?? ""; ?>" required>
                            <span class="error-text"><?= $error_last_name ?? ""; ?></span>
                        </div>
                    </section>
                    <section class="step3">
                        <label for="email">E-Mail</label>
                        <div class="personal-data">
                            <input type="email" id="email" name="email" placeholder="email@example.com" value="<?= $_SESSION["email"] ?? ""; ?>" autofocus>
                            <span class="error-text"><?= $error_email ?? ""; ?></span>
                        </div>
                    </section>
                    <section>
                        <label for="company-role">Company role</label>
                        <div class="personal-data">
                            <select name="company-role" id="company-role">
                                <option value="" disabled <?= !isset($_SESSION["company-role"]) ? "selected" : ""; ?>>Select a role</option>
                                <option value="Management" <?= isset($_SESSION["company-role"]) && $_SESSION["company-role"] == "Management" ? "selected" : ""; ?>>Management</option>
                                <option value="Project Manager" <?= isset($_SESSION["company-role"]) && $_SESSION["company-role"] == "Project Manager" ? "selected" : ""; ?>>Project Manager</option>
                                <option value="IT-Specialist" <?= isset($_SESSION["company-role"]) && $_SESSION["company-role"] == "IT-Specialist" ? "selected" : ""; ?>>IT-Specialist</option>
                                <option value="Employee" <?= isset($_SESSION["company-role"]) && $_SESSION["company-role"] == "Employee" ? "selected" : ""; ?>>Employee</option>
                                <option value="Team Leader" <?= isset($_SESSION["company-role"]) && $_SESSION["company-role"] == "Team Leader" ? "selected" : ""; ?>>Team Leader</option>
                                <option value="Specialist" <?= isset($_SESSION["company-role"]) && $_SESSION["company-role"] == "Specialist" ? "selected" : ""; ?>>Specialist</option>
                                <option value="Other" <?= isset($_SESSION["company-role"]) && $_SESSION["company-role"] == "Other" ? "selected" : ""; ?>>Other</option>
                            </select>
                        </div>
                    </section>
                    <section class="button-container">
                        <input type="submit" name="previous" value="Back" formaction="./step-2.php" class="submit-button">
                        <input type="submit" name="next" value="Next Page" class="submit-button" />

                    </section>
                </div>
            </fieldset>
        </form>
    </main>
    <?php include "footer.php" ?>
</body>

</html>