<?php
session_start();
session_unset();
session_destroy();

header("Location: ../index.php?logout=true");

if (isset($_SESSION['logout']) AND !empty($_SESSION['logout'])) {
    echo '<div class="logout">' . $_SESSION['logout'] . "</div>";
    $_SESSION['error'] = null;
}
