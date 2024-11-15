<?php
session_start();

if (!isset($_SESSION['username'])) {
    // ngambil sesi dari halaman login sebelumnya... siapa sih nama usernya?    
    header("Location: login.php");  
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center mt-5">
        <h1> Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <a href="logout.php" class="btn btn-danger mt-3">logout</a>
    </div>
</body>
</html>
