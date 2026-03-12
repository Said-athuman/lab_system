<?php
include("db.php");

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$sql = "SELECT patients.full_name, tests.test_name, results.result, results.date_done
        FROM results
        INNER JOIN patients ON results.patient_id = patients.patient_id
        INNER JOIN tests ON results.test_id = tests.test_id
        ORDER BY results.date_done DESC";

$data = mysqli_query($conn, $sql);
?>

<link rel="stylesheet" href="style.css">

<div class="sidebar">
    <h2>Lab System</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="add_patient.php">Register Patient</a>
    <a href="add_test.php">Add Test</a>
    <a href="add_result.php">Add Result</a>
    <a href="view_results.php">View Results</a>
    <a href="logout.php">Logout</a>
</div>

<div class="main">

    <div class="topbar">
        <div class="logo">
            <img src="logo.png">
            <h1>Kilenzi Memorial Hospital</h1>
        </div>

        <button onclick="window.print()" 
        style="width:auto;padding:6px 15px;">
        Print Report
        </button>
    </div>

    <h2 style="margin-bottom:15px;">Laboratory Results</h2>

    <table>
        <tr>
            <th>Patient Name</th>
            <th>Test</th>
            <th>Result</th>
            <th>Date</th>
        </tr>

        <?php
        if(mysqli_num_rows($data) > 0){
            while($row = mysqli_fetch_assoc($data)){
        ?>
        <tr>
            <td><?php echo htmlspecialchars($row['full_name']); ?></td>
            <td><?php echo htmlspecialchars($row['test_name']); ?></td>
            <td><?php echo htmlspecialchars($row['result']); ?></td>
            <td><?php echo htmlspecialchars($row['date_done']); ?></td>
        </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='4'>No Results Found</td></tr>";
        }
        ?>
    </table>

</div>