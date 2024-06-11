<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://use.typekit.net/ndb2ytm.css">
    <title>Verification</title>
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
                        <a href="confirmation.php">
                            <div class="circle current">4</div>
                        </a>
                    </li>
                </ul>
            </section>
            <fieldset id="verification">
                <h2>VERIFY YOUR DATA.</h2>
                <hr class="linie">
                <h3>Step 1</h3>
                <div>
                    <!-- Icon hier einfügen -->
                    <p>Booking details</p>
                </div>
                <ul class="verification">
                    <li>Service: <?= htmlspecialchars(is_array($_SESSION["service"] ?? '') ? implode(', ', $_SESSION["service"]) : ($_SESSION["service"] ?? '')); ?></li>
                    <li>Script: <?= ($_SESSION["script"] ?? '') == 'Yes' ? 'Yes, I want the teleprompter.' : 'No, I will not be needing the teleprompter.'; ?></li>
                    <li>Selected Equipment: <?= htmlspecialchars(is_array($_SESSION["selected-equipment"] ?? '') ? implode(', ', $_SESSION["selected-equipment"]) : ($_SESSION["selected-equipment"] ?? '')); ?></li>
                    <li>Vision or idea: <?= htmlspecialchars(is_array($_SESSION["textarea-step1"] ?? '') ? implode(', ', $_SESSION["textarea-step1"]) : ($_SESSION["textarea-step1"] ?? '')); ?></li>
                    <li>First Date: <?= htmlspecialchars($_SESSION["first-date"] ?? ''); ?></li>
                    <li>Second Date: <?= htmlspecialchars($_SESSION["second-date"] ?? ''); ?></li>
                    <li>Third Date: <?= htmlspecialchars($_SESSION["third-date"] ?? ''); ?></li>
                    <li>Times: <?= htmlspecialchars(is_array($_SESSION["times"] ?? '') ? implode(', ', $_SESSION["times"]) : ($_SESSION["times"] ?? '')); ?></li>
                    <li>Email: <?= htmlspecialchars($_SESSION["email"] ?? ''); ?></li>
                    <li>Phone Number: <?= htmlspecialchars($_SESSION["phone-number"] ?? ''); ?></li>
                    <li>Date of Birth: <?= htmlspecialchars($_SESSION["date-of-birth"] ?? ''); ?></li>
                    <li>Company Role: <?= htmlspecialchars($_SESSION["company-role"] ?? ''); ?></li>
                </ul>
            </fieldset>
        </form>
        </div>
    </main>
    <?php include "footer.php" ?>
</body>

</html>