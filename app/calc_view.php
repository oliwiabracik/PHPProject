<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator kredytowy</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <style>
        .container { width: 90%; margin: 2em auto; }
        .messages { background-color: #f88; padding: 1em; border-radius: 0.5em; width: 30em; }
        .result { background-color: #ff0; padding: 1em; border-radius: 0.5em; width: 30em; }
    </style>
</head>
<body>

<div class="container">
    <a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div class="container">
    <form action="<?php print(_APP_ROOT); ?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
        <legend>Kalkulator kredytowy</legend>
        <fieldset>
            <label for="id_amount">Kwota kredytu: </label>
            <input id="id_amount" type="text" name="amount" value="<?php out($amount) ?>" />
            
            <label for="id_years">Liczba lat: </label>
            <input id="id_years" type="text" name="years" value="<?php out($years) ?>" />
            
            <label for="id_interest">Oprocentowanie (%): </label>
            <input id="id_interest" type="text" name="interest" value="<?php out($interest) ?>" />
        </fieldset>
        <input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
    </form>

    <?php if (isset($messages) && count($messages) > 0) { ?>
    <div class="messages">
        <ol>
        <?php foreach ($messages as $msg) { ?>
            <li><?php echo $msg; ?></li>
        <?php } ?>
        </ol>
    </div>
    <?php } ?>

    <?php if (isset($result)) { ?>
    <div class="result">
        Miesięczna rata: <?php echo $result; ?> zł
    </div>
    <?php } ?>
</div>

</body>
</html>

