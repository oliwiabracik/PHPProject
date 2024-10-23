<?php
require_once dirname(__FILE__).'/config.php';

// Przekierowanie do kontrolera kalkulatora kredytowego
header("Location: "._APP_URL."/app/calc.php");
exit; // Zakończ skrypt po przekierowaniu
?>

