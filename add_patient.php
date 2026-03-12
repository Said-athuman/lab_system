<?php
include("db.php");

if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

if(isset($_POST['save'])){
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $phone=$_POST['phone'];

    mysqli_query($conn,"INSERT INTO patients(full_name,gender,age,phone)
    VALUES('$name','$gender','$age','$phone')");

    $success = "Patient Registered Successfully!";
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

    <h2 style="margin-bottom:15px;">Register New Patient</h2>

    <?php if(isset($success)){ ?>
        <div style="background:#dff9fb;padding:10px;border-radius:6px;color:#130f40;margin-bottom:10px;">
            <?php echo $success; ?>
        </div>
    <?php } ?>

    <form method="POST">

        <label>Full Name</label>
        <input type="text" name="name" placeholder="Enter full name" required>

        <label>Gender</label>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option>Male</option>
            <option>Female</option>
        </select>

        <label>Age</label>
        <input type="number" name="age" placeholder="Enter age" required>

        <label>Phone</label>
        <input type="text" name="phone" placeholder="Enter phone number">

        <button name="save">Register Patient</button>

    </form>

</div>