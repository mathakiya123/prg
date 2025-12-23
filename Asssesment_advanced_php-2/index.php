<!DOCTYPE html>
<html>
<head>
    <title>Survey Admin Panel</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<div class="container">

<h2>Admin: Upload Survey Question</h2>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="csv" accept=".csv" required>
    <button>Upload Survey</button>
</form>

<?php
require 'classes/Survey.php';
$survey = new Survey();

if (isset($_FILES['csv'])) {
    $survey->saveQuestions($_FILES['csv']['tmp_name']);
    echo "<p class='success'>Survey Uploaded Successfully</p>";
}
?>

<hr>

<h3>Survey Question (User View)</h3>

<form method="post" action="submit.php">
<?php
if (file_exists("data/questions.csv")) {
    $q = $survey->getQuestions();
    echo "<p class='question'>".$q[0][0]."</p>";

    foreach ($q[0] as $i => $option) {
        if ($i > 0) {
            echo "<label><input type='radio' name='answer' value='$option' required> $option</label><br>";
        }
    }
}
?>
<br>
<button>Submit Answer</button>
</form>

<hr>

<h3>Live Responses (AJAX Bar Chart)</h3>
<canvas id="surveyChart"></canvas>

</div>

<script src="js/app.js"></script>
</body>
</html>