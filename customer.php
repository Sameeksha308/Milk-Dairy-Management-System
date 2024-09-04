<?php
session_start();
include('server.php');

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'customer') {
    header('location: index.php');
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Customer Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 10px 20px; /* Adjusted padding */
      border-top-left-radius: 20px; /* Rounded top-left corner */
      border-top-right-radius: 20px; /* Rounded top-right corner */
      position: relative; /* Added */
    }

    .header .logout-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      right: 20px;
    }

    .form-box, .user-details {
      background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent */
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
      margin: 0 auto; /* Center the button */
    }

    .btn:hover {
      background-color: #555;
    }

    .user-details p {
      margin-bottom: 10px;
    }

    /* Background image */
    .background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url('https://th.bing.com/th/id/R.9e467993dd59fe218cae51c16cc163dd?rik=laZ58kOoexEsPQ&riu=http%3a%2f%2fwww.dairypesa.com%2fwp-content%2fuploads%2f2015%2f10%2fmyths-about-cows-milk.jpg&ehk=2TjBYG6tL22k%2bTNf6BO%2bqLhIcmJ67MK3qh5vLN6Sg9E%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1');
      background-size: cover;
      z-index: -1;
      filter: brightness(80%); /* White tint */
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="background"></div>
  <div class="header">
    <h2>Welcome, Customer!</h2>
    <div class="logout-btn">
      <form method="post" action="index.php">
        <button type="submit" class="btn" name="logout">Logout</button>
      </form>
    </div>
  </div>

  <?php if (!isset($_POST['customer_login'])): ?>
  <div class="form-box">
    <form method="post" action="customer.php">
      <div class="input-group">
        <label>Username</label>
        <input type="text" name="c_username">
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="password" name="c_password">
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="customer_login">Login</button>
      </div>
    </form>
  </div>
  <?php endif; ?>

  <?php
  if (isset($_POST['customer_login'])) {
      $c_username = mysqli_real_escape_string($db, $_POST['c_username']);
      $c_password = mysqli_real_escape_string($db, $_POST['c_password']);

      $query = "SELECT * FROM customer WHERE username='$c_username' AND password='$c_password'";
      $result = mysqli_query($db, $query);

      if (mysqli_num_rows($result) == 1) {
          // User found, display details
          $row = mysqli_fetch_assoc($result);
          echo '<div class="user-details">';
          echo "<p><strong>Username:</strong> {$row['username']}</p>";
          echo "<p><strong>Name:</strong> {$row['f_name']} {$row['l_name']}</p>";
          echo "<p><strong>Email ID:</strong> {$row['email']}</p>";
          echo "<p><strong>Phone number:</strong> {$row['phone']}</p>";
          echo "<p><strong>Address:</strong> {$row['address']}</p>";
          echo '<form action="feedback_form.php" method="get">';
          echo '<button type="submit" class="btn" name="give_feedback">Give Feedback</button>';
          echo '</form>';
          echo '</div>';
          echo '<form method="post" action="transaction_history_customer.php">';
          echo '<input type="hidden" name="username" value="' . $row['username'] . '">';
          echo '<button type="submit" class="btn" name="transaction_history_customer">Transaction History</button>';
          echo '</form>';
      } else {
          // User not found
          echo "<p>Customer not found.</p>";
      }
  }
  ?>
</body>
</html>