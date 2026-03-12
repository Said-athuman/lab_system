<?php
include("db.php");

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

$patients=mysqli_query($conn,"SELECT * FROM patients");
$tests=mysqli_query($conn,"SELECT * FROM tests");

if(isset($_POST['save'])){
    $patient=$_POST['patient'];
    $test=$_POST['test'];
    $result=$_POST['result'];
    $date=$_POST['date'];

    mysqli_query($conn,"INSERT INTO results(patient_id,test_id,result,date_done)
    VALUES('$patient','$test','$result','$date')");

    $success="Result Added Successfully!";
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
        <div>Welcome, <?php echo $_SESSION['user']; ?></div>
    </div>

    <h2 style="margin-bottom:15px;">Add Laboratory Result</h2>

    <?php if(isset($success)){ ?>
        <div style="background:#d4edda;padding:10px;border-radius:6px;color:#155724;margin-bottom:10px;">
            <?php echo $success; ?>
        </div>
    <?php } ?>

    <form method="POST">

        <label>Select Patient</label>
        <select name="patient" required>
            <option value="">Choose Patient</option>
            <?php while($p=mysqli_fetch_assoc($patients)){ ?>
                <option value="<?php echo $p['patient_id']; ?>">
                    <?php echo $p['full_name']; ?>
                </option>
            <?php } ?>
        </select>

        <label>Select Test</label>
        <select name="test" required>
            <option value="">Choose Test</option>
            <?php while($t=mysqli_fetch_assoc($tests)){ ?>
                <option value="<?php echo $t['test_id']; ?>">
                    <?php echo $t['test_name']; ?>
                </option>
            <?php } ?>
        </select>

        <label>Result Details</label>
        <textarea name="result" placeholder="Enter result details here..." required></textarea>

        <label>Date</label>
        <input type="date" name="date" required>

        <button name="save">Save Result</button>

    </form>

</div>