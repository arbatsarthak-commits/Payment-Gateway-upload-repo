<?php
// work_list.php
include "db.php";

// employee_work + employees ko join karke data la rahe hain
$sql = "SELECT ew.*, e.name 
        FROM employee_work ew
        JOIN employees e ON ew.employee_id = e.id
        ORDER BY ew.id DESC";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Work List</title>
</head>
<body>
    <h2>Monthly Work List</h2>

    <p>
        <a href="add_work.php">➕ Add New Work</a> |
        <a href="employees_list.php">👥 Employees List</a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Employee</th>
            <th>Month</th>
            <th>MS-CIT</th>
            <th>Module</th>
            <th>Diploma</th>
            <th>₹149 Students</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['month'] . "</td>";
                echo "<td>" . $row['mscit'] . "</td>";
                echo "<td>" . $row['module'] . "</td>";
                echo "<td>" . $row['diploma'] . "</td>";
                echo "<td>" . $row['short149'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No work records found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
