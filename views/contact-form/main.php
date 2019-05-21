<?php
$firstname = $_POST['firstname'] ?: '';
$lastname = $_POST['lastname'] ?: $firstname ?: 'Un utente del sito';
$from = $_POST['email'] ?: '';
$to = 'segreteria@tchoukball.it, val.senneca@gmail.com';
$message = $_POST['message'] ?: 'L\'utente non ha scritto nessun messaggio.';
$topic = $_POST['topic'] ?: 'Richiesta informazioni';

$localized_months = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];
$current_month  = $localized_months[date('n') - 1];
$date = date('j') . ' ' . $current_month . ' ' . date('Y');

include('_headers.php');
include('_template.php');

try {
    mail($to, $topic, $template, $headers);
    echo true;
} catch (Exception $e) {
    echo false;
}