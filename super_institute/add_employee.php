<?php
// add_employee.php
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name   = $_POST['name'];
    $role   = $_POST['role'];
    $mobile = $_POST['mobile'];

    $sql = "INSERT INTO employees (name, role, mobile)
            VALUES ('$name', '$role', '$mobile')";

    if ($conn->query($sql) === TRUE) {
        $message = "Employee added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>
    <h2>Add Employee</h2>

    <?php if ($message) { echo "<p><b>$message</b></p>"; } ?>

    <form method="post">
        <label>
            Name:
            <input type="text" name="name" required>
        </label><br><br>

        <label>
            Role:
            <input type="text" name="role" required>
        </label><br><br>

        <label>
            Mobile:
            <input type="text" name="mobile">
        </label><br><br>

        <button type="submit">Save Employee</button>
    </form>
</body>
</html>
