<?php
require 'classes/Survey.php';
$survey = new Survey();

echo json_encode($survey->getResults());
?>