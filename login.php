<?php
include('db.php');  // Menyertakan file koneksi biar konek ke login di dalam fungsi di bawah

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    //if di atas Mengecek apakah data dikirimkan dengan metode POST. Ini berarti data datang dari form yang dikirimkan oleh pengguna.
    $username = $_POST['username'];
    //Mencari apakah ada pengguna dengan username yang sesuai di dalam tabel users di database.
    $password = $_POST['password'];
    //sama aja cuma buat pw

    $sql = "SELECT * FROM users WHERE username = '$username'";
    // kek buat mang eak? yang diinputin ada di database [username]
    $result = $conn->query($sql);
    // Menjalankan query untuk mencari username di database,anjay bansur

    if ($result->num_rows > 0) {
        // Mengambil data pengguna
        $row = $result->fetch_assoc();
        // fungsi php ngambil data dari baris jadi array,,, ara araah :v


        // Verifikasi password
        if ($password == $row['password']) {  
            $_SESSION['username'] = $username;
            header("Location: welcome.php");  // pindah ke halaman baru kalo berhasil
            exit();
        } else {
            $error = "Username atau password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg" style="max-width: 400px; width: 100%;">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Login Page</h3>
                <?php
                if (isset($error)) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
                ?>
                <form method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
