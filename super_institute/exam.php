<?php
$score = 0;
$submitted = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $submitted = true;

    if($_POST["q1"] == "b") $score++;
    if($_POST["q2"] == "a") $score++;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Exam</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Online Exam</h1>

<div class="card">

<?php if(!$submitted) { ?>

<form method="POST">

<p>1. What is Docker?</p>
<input type="radio" name="q1" value="a" required> A Database<br>
<input type="radio" name="q1" value="b"> A Container Platform<br>
<input type="radio" name="q1" value="c"> A Programming Language<br>

<br>

<p>2. PHP is a?</p>
<input type="radio" name="q2" value="a" required> Server-side Language<br>
<input type="radio" name="q2" value="b"> Database<br>
<input type="radio" name="q2" value="c"> Operating System<br>

<br>
<button type="submit">Submit Exam</button>
</form>

<?php } else  ?>

<?php
$total = 3;
$percentage = ($score / $total) * 100;
?>

<h2>Your Score: <?php echo $score; ?> / <?php echo $total; ?></h2>
<h3>Percentage: <?php echo $percentage; ?>%</h3>

<?php if($percentage >= 40) { ?>
    <p style="color:green;">Result: PASS 🎉</p>
<?php } else { ?>
    <p style="color:red;">Result: FAIL ❌</p>
<?php } ?>
