<?php
// employees_list.php
include "db.php";

$sql = "SELECT * FROM employees ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employees List</title>
</head>
<body>
    <h2>Employees List</h2>

    <p>
        <a href="add_employee.php">➕ Add New Employee</a>
    </p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Role</th>
            <th>Mobile</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['role'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No employees found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
