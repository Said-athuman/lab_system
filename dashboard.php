<?php include("db.php"); ?>

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
        <div>
           welcome, <?php echo $_SESSION['user']; ?>
        </div>
    </div>

    <div class="cards">
        <div class="card">
            <h3>Total Patients</h3>
            <p>
                <?php
                $res=mysqli_query($conn,"SELECT COUNT(*) as total FROM patients");
                $row=mysqli_fetch_assoc($res);
                echo $row['total'];
                ?>
            </p>
        </div>

        <div class="card">
            <h3>Total Tests</h3>
            <p>
                <?php
                $res=mysqli_query($conn,"SELECT COUNT(*) as total FROM tests");
                $row=mysqli_fetch_assoc($res);
                echo $row['total'];
                ?>
            </p>
        </div>

        <div class="card">
            <h3>Total Results</h3>
            <p>
                <?php
                $res=mysqli_query($conn,"SELECT COUNT(*) as total FROM results");
                $row=mysqli_fetch_assoc($res);
                echo $row['total'];
                ?>
            </p>
        </div>
    </div>

</div>