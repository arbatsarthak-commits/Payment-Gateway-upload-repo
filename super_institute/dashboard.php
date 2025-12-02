<?php
// dashboard.php
include "db.php";

// Total employees
$empSql = "SELECT COUNT(*) AS total_emp FROM employees";
$empRes = $conn->query($empSql);
$empRow = $empRes->fetch_assoc();
$totalEmp = $empRow['total_emp'];

// Total work entries
$workSql = "SELECT COUNT(*) AS total_work FROM employee_work";
$workRes = $conn->query($workSql);
$workRow = $workRes->fetch_assoc();
$totalWork = $workRow['total_work'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Teacher Salary – Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="container">
        <h1>Teacher Salary & Work Management</h1>
        <p class="sub-title">Charu – Employee & Work Module</p>

        <div class="cards">
            <div class="card">
                <h2>Total Employees</h2>
                <p class="number"><?php echo $totalEmp; ?></p>
                <a href="employees_list.php" class="btn">View Employees</a>
            </div>

            <div class="card">
                <h2>Total Work Entries</h2>
                <p class="number"><?php echo $totalWork; ?></p>
                <a href="work_list.php" class="btn">View Work</a>
            </div>
        </div>

        <div class="links">
            <a href="add_employee.php" class="link-btn">➕ Add Employee</a>
            <a href="add_work.php" class="link-btn">📝 Add Work</a>
        </div>
    </div>
</body>
</html>
