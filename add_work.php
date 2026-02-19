<?php
// add_work.php
include "db.php";

$message = "";

// Employees dropdown ke liye data
$empSql = "SELECT id, name FROM employees ORDER BY name";
$empResult = $conn->query($empSql);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $employee_id = $_POST['employee_id'];
    $month       = $_POST['month'];
    $mscit       = $_POST['mscit'];
    $module      = $_POST['module'];
    $diploma     = $_POST['diploma'];
    $short149    = $_POST['short149'];

    $sql = "INSERT INTO employee_work (employee_id, month, mscit, module, diploma, short149)
            VALUES ('$employee_id', '$month', '$mscit', '$module', '$diploma', '$short149')";

    if ($conn->query($sql) === TRUE) {
        $message = "Work added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Work</title>
</head>
<body>
    <h2>Add Monthly Work</h2>

    <?php if ($message) { echo "<p><b>$message</b></p>"; } ?>

    <form method="post">
        <label>
            Employee:
            <select name="employee_id" required>
                <option value="">-- Select Employee --</option>
                <?php
                if ($empResult->num_rows > 0) {
                    while ($e = $empResult->fetch_assoc()) {
                        echo "<option value='" . $e['id'] . "'>" . $e['name'] . "</option>";
                    }
                }
                ?>
            </select>
        </label><br><br>

        <label>
            Month (e.g. Dec-2025):
            <input type="text" name="month" required>
        </label><br><br>

        <label>
            MS-CIT Batches:
            <input type="number" name="mscit" value="0" min="0">
        </label><br><br>

        <label>
            Module Batches:
            <input type="number" name="module" value="0" min="0">
        </label><br><br>

        <label>
            Diploma Batches:
            <input type="number" name="diploma" value="0" min="0">
        </label><br><br>

        <label>
            ₹149 Students:
            <input type="number" name="short149" value="0" min="0">
        </label><br><br>

        <button type="submit">Save Work</button>
    </form>

    <p>
        <a href="work_list.php">View Work List</a> |
        <a href="employees_list.php">Back to Employees</a>
    </p>
</body>
</html>
