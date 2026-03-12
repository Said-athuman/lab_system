<?php
include("db.php");

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

if(isset($_POST['save'])){
    $test=$_POST['test'];
    $price=$_POST['price'];

    mysqli_query($conn,"INSERT INTO tests(test_name,price)
    VALUES('$test','$price')");

    $success = "Test Added Successfully!";
}
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
        <div>
            Welcome, <?php echo $_SESSION['user']; ?>
        </div>
    </div>

    <h2 style="margin-bottom:15px;">Add Laboratory Test</h2>

    <?php if(isset($success)){ ?>
        <div style="background:#dff9fb;padding:10px;border-radius:6px;color:#130f40;margin-bottom:10px;">
            <?php echo $success; ?>
        </div>
    <?php } ?>

    <form method="POST">

        <label>Test Name</label>
        <input type="text" name="test" placeholder="Enter test name (e.g Blood Group)" required>

        <label>Test Price (TZS)</label>
        <input type="number" name="price" placeholder="Enter price" required>

        <button name="save">Add Test</button>

    </form>

</div>