<?php
session_start();  // Mulai sesi
require_once '../_config/config.php';  // Include file koneksi

// Cek jika form login disubmit
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    // Query untuk memeriksa user
    $sql = "SELECT * FROM tb_akun WHERE username = '$username' AND password = '$password'";
    
    $result = $con->query($sql);
    
    if ($result && $result->num_rows > 0) {

        $userData = $result->fetch_assoc();
        // Jika login berhasil
        $_SESSION['username'] = $username;  // Simpan username di sesi
        $_SESSION['hak_akses'] = $userData['hak_akses'];
        header("Location: ../index.php");    // Redirect ke halaman welcome
        exit;  // Hentikan script setelah redirect
    } else {
        $error = "Username atau password salah!";
        echo "<script>alert('$error');</script>";  // Tampilkan pesan kesalahan
    }
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Page</title>
  <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: url('../_assets/bg-logo.png') no-repeat center/cover;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    /* Glassmorphism Effect */
    .glass-card {
    background: rgba(255, 255, 255, 0.3); /* Mengurangi transparansi */
    backdrop-filter: blur(15px) saturate(180%); /* Menambah blur untuk lebih jelas */
    -webkit-backdrop-filter: blur(15px) saturate(180%);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4); /* Memperkuat shadow untuk kontras */
    border: 1px solid rgba(255, 255, 255, 0.25); /* Menambah ketebalan border */
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .input-box {
        position: relative;
        margin-bottom: 30px;
    }

    .input-box input {
        width: 100%;
        padding: 10px;
        background: transparent;
        border: none;
        border-bottom: 2px solid rgba(255, 255, 255, 0.6);
        outline: none;
        color: #fff;
        font-size: 16px;
    }

    .input-box span {
        position: absolute;
        left: 0;
        top: 10px;
        font-size: 16px;
        color: rgba(255, 255, 255, 0.5);
        pointer-events: none;
        transition: 0.3s ease;
    }

    .input-box input:focus ~ span,
    .input-box input:valid ~ span {
        transform: translateY(-20px);
        font-size: 12px;
        color: rgba(255, 255, 255, 0.8);
    }

    .login-btn {
        width: 100%;
        padding: 10px;
        background-color: rgba(255, 255, 255, 0.4);
        border: none;
        border-radius: 8px;
        font-size: 16px;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .login-btn:hover {
        background-color: rgba(255, 255, 255, 0.6);
    }
  </style>
</head>
<body>

<div class="container text-light">
  <div class="login-container login-box">
    <h2 class="login-title">Maccarinna Kafe</h2>
    <form action="" method="POST">
      <div class="form-group input-box">
        <label for="username">Username</label>
        <input name="username" class="form-control" id="username" placeholder="Enter username" required>
      </div>
      <div class="form-group input-box">
        <label for="pwd">Password</label>
        <input name="password" type="password" class="form-control" id="pwd" placeholder="Enter password" required>
      </div>
      <button type="submit" name="login" class="btn btn-primary btn-block login-btn">Login</button>
    </form>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=base_url('_assets/title.png')?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Login Form</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .bg-img {
            background-image: url('../_assets/bg-logo.png'); /* Replace with your background image path */
            filter: blur(5px); /* Adds slight blur to the background */
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6); /* Transparent background */
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .login-container h2 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            display: inline-block;
            border: none;
            background: #fff;
            border-radius: 5px;
        }

        .login-container button {
            width: 100%;
            background-color: #c19a6b; /* Warm coffee-like color */
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-container button:hover {
            background-color: #b8860b; /* Darker warm color on hover */
        }

        .login-container a {
            color: #f1f1f1;
            display: block;
            text-align: center;
            margin-top: 10px;
        }

        .checkbox {
            color: #fff;
            margin-bottom: 15px;
        }

        .checkbox input {
            margin-right: 10px;
        }

        label {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="bg-img"></div>

    <div class="login-container">
      <h2>Maccarinna Kafe</h2>
      <form action="" method="POST">
        <div class="form-group">
          <label for="username" class="text-light">Username</label>
          <input type="text" placeholder="Enter your password" name="username" required>
        </div>
        <div class="form-group">
          <label for="pwd">Password</label>
          <input name="password" type="password" class="form-control" id="pwd" placeholder="Enter password" required>
        </div>
      <button type="submit" name="login" class="btn btn-primary btn-block login-btn">Log In</button>
      </form>
    </div>

   
      
      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
