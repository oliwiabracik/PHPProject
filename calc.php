<?php
// KONTROLER strony kalkulatora kredytowego
require_once dirname(__FILE__).'/config.php';

// Inicjalizacja zmiennych
$messages = [];
$amount = $years = $interest = $monthlyPayment = null;

// 1. pobranie parametrów
$amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : '';
$years = isset($_REQUEST['years']) ? $_REQUEST['years'] : '';
$interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : '';

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
if (!isset($_REQUEST['amount'], $_REQUEST['years'], $_REQUEST['interest'])) {
    $messages[] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ($amount == "") {
    $messages[] = 'Nie podano kwoty kredytu';
}
if ($years == "") {
    $messages[] = 'Nie podano liczby lat';
}
if ($interest == "") {
    $messages[] = 'Nie podano oprocentowania';
}

if (empty($messages)) {
    if (!is_numeric($amount)) {
        $messages[] = 'Kwota kredytu nie jest liczbą';
    }
    
    if (!is_numeric($years)) {
        $messages[] = 'Liczba lat nie jest liczbą';
    }

    if (!is_numeric($interest)) {
        $messages[] = 'Oprocentowanie nie jest liczbą';
    }
}

if (empty($messages)) {
    $amount = floatval($amount);
    $years = intval($years);
    $interest = floatval($interest);

    // Obliczenia
    $monthlyInterestRate = ($interest / 100) / 12; // przeliczenie na miesięczną stopę
    $numberOfPayments = $years * 12; // liczba rat

    if ($monthlyInterestRate == 0) {
        $monthlyPayment = $amount / $numberOfPayments; // w przypadku braku oprocentowania
    } else {
        $monthlyPayment = $amount * $monthlyInterestRate / (1 - pow(1 + $monthlyInterestRate, -$numberOfPayments));
    }
}

// 4. Wywołanie widoku z przekazaniem zmiennych
include 'calc_view.php'; 
?>
