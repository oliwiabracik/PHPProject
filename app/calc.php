<?php
require_once dirname(__FILE__).'/../config.php';

// Ochrona kontrolera – sprawdzanie, czy użytkownik jest zalogowany
include _ROOT_PATH.'/app/security/check.php';

// Pobranie parametrów
function getParams(&$amount, &$years, &$interest) {
    $amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
    $years = isset($_REQUEST['years']) ? $_REQUEST['years'] : null;
    $interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
}

// Walidacja parametrów
function validate(&$amount, &$years, &$interest, &$messages) {
    if (!isset($amount) || !isset($years) || !isset($interest)) {
        return false;
    }

    if ($amount == "") {
        $messages[] = 'Nie podano kwoty kredytu';
    }
    if ($years == "") {
        $messages[] = 'Nie podano okresu spłaty';
    }
    if ($interest == "") {
        $messages[] = 'Nie podano oprocentowania';
    }

    if (count($messages) > 0) return false;

    if (!is_numeric($amount) || $amount <= 0) {
        $messages[] = 'Kwota kredytu musi być liczbą dodatnią';
    }
    if (!is_numeric($years) || $years <= 0) {
        $messages[] = 'Okres spłaty musi być liczbą dodatnią';
    }
    if (!is_numeric($interest) || $interest <= 0) {
        $messages[] = 'Oprocentowanie musi być liczbą dodatnią';
    }

    return count($messages) === 0;
}

// Obliczenia
function process(&$amount, &$years, &$interest, &$messages, &$result) {
    $interestRate = ($interest / 100) / 12;
    $numPayments = $years * 12;
    $monthlyPayment = ($amount * $interestRate) / (1 - pow(1 + $interestRate, -$numPayments));
    $result = round($monthlyPayment, 2);
}

// Definicja zmiennych
$amount = null;
$years = null;
$interest = null;
$result = null;
$messages = array();

// Pobranie parametrów
getParams($amount, $years, $interest);

// Walidacja i obliczenia
if (validate($amount, $years, $interest, $messages)) {
    process($amount, $years, $interest, $messages, $result);
}

// Wywołanie widoku
include 'calc_view.php';
?>

