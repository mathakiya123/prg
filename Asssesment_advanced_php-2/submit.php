<?php
require 'classes/Survey.php';
$survey = new Survey();

if (isset($_POST['answer'])) {
    $survey->saveResponse($_POST['answer']);
}

header("Location: index.php");
exit;
?>