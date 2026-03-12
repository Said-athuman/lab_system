<?php
session_start();

/* Database Connection (Independent) */
$conn = mysqli_connect("localhost","root","","lab_system");
if(!$conn){
    die("Database Connection Failed");
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1){
        $_SESSION['user']=$username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Laboratory Information System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    background:linear-gradient(135deg,#667eea,#764ba2);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.card{
    background:white;
    width:350px;
    padding:35px;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,0.2);
    text-align:center;
}

.card h2{
    margin-bottom:5px;
    color:#333;
}

.subtitle{
    font-size:14px;
    color:#777;
    margin-bottom:20px;
}

.input-group{
    text-align:left;
    margin-bottom:15px;
}

.input-group label{
    font-size:13px;
    color:#555;
}

.input-group input{
    width:100%;
    padding:12px;
    margin-top:5px;
    border-radius:10px;
    border:1px solid #ddd;
    transition:0.3s;
}

.input-group input:focus{
    border-color:#764ba2;
    outline:none;
    box-shadow:0 0 8px rgba(118,75,162,0.3);
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:#764ba2;
    color:white;
    font-size:15px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#667eea;
}

.error{
    background:#ffe5e5;
    color:#cc0000;
    padding:10px;
    border-radius:8px;
    margin-bottom:15px;
    font-size:14px;
}
</style>
</head>

<body>

<div class="card">
    <h2>Lab System</h2>
    <div class="subtitle">Sign in to continue</div>

    <?php if(isset($error)){ ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button name="login">Login</button>
    </form>
</div>

</body>
</html>