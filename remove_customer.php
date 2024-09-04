<?php
session_start();
include('server.php');

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header('location: index.php');
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('location: index.php');
    exit();
}

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);

    $query = "DELETE FROM customer WHERE username='$username'";
    mysqli_query($db, $query);

    // Redirect to admin page after removing customer
    header('location: admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Remove Customer</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('https://th.bing.com/th/id/R.9e467993dd59fe218cae51c16cc163dd?rik=laZ58kOoexEsPQ&riu=http%3a%2f%2fwww.dairypesa.com%2fwp-content%2fuploads%2f2015%2f10%2fmyths-about-cows-milk.jpg&ehk=2TjBYG6tL22k%2bTNf6BO%2bqLhIcmJ67MK3qh5vLN6Sg9E%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      position: relative;
    }

    .logout-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      right: 20px;
    }

    .form-box {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin: 20px auto;
      width: 50%;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
      text-align: center; /* Center the label */
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .btn {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      display: block;
      margin: 10px auto; /* Center the button */
    }

    .btn:hover {
      background-color: #555;
    }

    .back-btn {
      background-color: #888;
      margin-top: 10px;
      text-align: center;
    }

    .back-btn:hover {
      background-color: #666;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="header">
    <h2>Remove Customer</h2>
    <form method="post" action="">
      <div class="logout-btn">
        <button type="submit" name="logout" class="btn">Logout</button>
      </div>
    </form>
  </div>
  <div class="form-box">
    <form method="post" action="remove_customer.php">
      <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" required>
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="submit">Remove Customer</button>
      </div>
    </form>
    <form method="post" action="admin.php">
      <button type="submit" class="btn back-btn">Back</button>
    </form>
  </div>
</body>
</html>
