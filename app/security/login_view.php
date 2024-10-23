<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Logowanie</title>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .btn-custom {
            background-color: #007bff; /* Kolor tła */
            color: white; /* Kolor tekstu */
            padding: 10px 15px; /* Padding */
            border: none; /* Bez obramowania */
            border-radius: 4px; /* Zaokrąglone rogi */
            cursor: pointer; /* Kursor wskaźnika */
        }
        .btn-custom:hover {
            background-color: #0056b3; /* Kolor tła po najechaniu */
        }
    </style>
</head>
<body>

<div style="width:90%; margin: 2em auto;">

<form action="<?php echo _APP_URL; ?>/app/security/login.php" method="post" class="pure-form pure-form-stacked">
    <legend>Logowanie</legend>
    <fieldset>
        <label for="id_login">Login:</label>
        <input id="id_login" type="text" name="login" value="<?php out($form['login']); ?>" class="pure-input-1-2" />
    </fieldset>
    <fieldset>
        <label for="id_pass">Hasło:</label>
        <input id="id_pass" type="password" name="pass" class="pure-input-1-2" />
    </fieldset>
    <button type="submit" class="btn-custom">
        <i class="fas fa-sign-in-alt"></i> Zaloguj
    </button>
</form>   

<?php
// Wyświetlenie listy błędów, jeśli istnieją
if (isset($messages) && count($messages) > 0) {
    echo '<ol style="padding: 10px; border-radius: 5px; background-color: #f88; width:300px;">';
    foreach ($messages as $msg) {
        echo '<li>'.$msg.'</li>';
    }
    echo '</ol>';
}
?>

</div>

</body>
</html>
