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
    // Retrieve form data
    $f_name = mysqli_real_escape_string($db, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($db, $_POST['l_name']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $membership_date = mysqli_real_escape_string($db, $_POST['membership_date']);

    // Check if username already exists
    $check_query = "SELECT * FROM farmer WHERE username='$username'";
    $check_result = mysqli_query($db, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        // Update existing user's information
        $update_query = "UPDATE farmer SET f_name='$f_name', l_name='$l_name', password='$password', 
                         email='$email', phone='$phone', address='$address', membership_date='$membership_date' WHERE username='$username'";
        mysqli_query($db, $update_query);

        // Redirect to admin page after updating customer
        header('location: admin.php');
        exit();
    } else {
        // Username does not exist, display error message
        echo "Error: Username does not exist. Please enter a valid username.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Modify Farmer</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('https://th.bing.com/th/id/R.9e467993dd59fe218cae51c16cc163dd?rik=laZ58kOoexEsPQ&riu=http%3a%2f%2fwww.dairypesa.com%2fwp-content%2fuploads%2f2015%2f10%2fmyths-about-cows-milk.jpg&ehk=2TjBYG6tL22k%2bTNf6BO%2bqLhIcmJ67MK3qh5vLN6Sg9E%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1');
      background-size: cover;
      background-position: center;
    }

    .header {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      position: relative; /* Required for absolute positioning */
    }

    .logout-btn {
      position: absolute;
      top: 20px;
      right: 20px;
    }

    .form-box {
      background-color: rgba(255, 255, 255, 0.8); /* Transparent background color */
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

    .btn-back {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      display: block;
      margin: 10px auto; /* Center the button */
    }

    .btn-back:hover {
      background-color: #0056b3;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="header">
    <h2>Modify Farmer</h2>
    <div class="logout-btn">
      <form method="post" action="">
        <button type="submit" name="logout" class="btn">Logout</button>
      </form>
    </div>
  </div>
  <div class="form-box">
    <form method="post" action="modify_farmer.php">
      <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" required>
      </div>
      <div class="input-group">
        <label>First Name</label>
        <input type="text" name="f_name" required>
      </div>
      <div class="input-group">
        <label>Last Name</label>
        <input type="text" name="l_name" required>
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>
      <div class="input-group">
        <label>Email ID</label>
        <input type="email" name="email" required>
      </div>
      <div class="input-group">
        <label>Phone Number</label>
        <input type="text" name="phone" required>
      </div>
      <div class="input-group">
        <label>Address</label>
        <input type="text" name="address" required>
      </div>
      <div class="input-group">
        <label>Membership Date</label>
        <input type="date" name="membership_date" required>
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="submit">Submit</button>
      </div>
    </form>
    <form action="admin.php">
      <button type="submit" class="btn-back">Back to Admin Page</button>
    </form>
  </div>
</body>
</html>
