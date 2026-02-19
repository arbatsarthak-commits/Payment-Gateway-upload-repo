<?php
$message = "";   // 👈 THIS LINE IS IMPORTANT

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $amount = $_POST["amount"];
    $message = "Payment of ₹$amount successful!";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Fee Payment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Fee Payment</h1>

<div class="card">
    <p>Total Fees: ₹50,000</p>
    <p>Paid: ₹20,000</p>
    <p>Pending: ₹30,000</p>

    <form method="POST">
        <input type="number" name="amount" placeholder="Enter amount" required>
        <br><br>
        <button type="submit">Pay Now</button>
    </form>

    <p style="color:green;"><?php echo $message; ?></p>
</div>

<br>
<a href="student_dashboard.php">← Back to Dashboard</a>

</body>
</html>
