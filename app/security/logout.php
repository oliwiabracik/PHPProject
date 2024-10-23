<?php
require_once dirname(__FILE__).'/../../config.php';

// 1. zakończenie sesji
session_start();
session_destroy();

// 2. przekieruj do strony głównej aplikacji
header("Location: "._APP_URL);
exit; // Zakończ skrypt po przekierowaniu
?>

