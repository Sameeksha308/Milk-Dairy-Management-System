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

if (isset($_POST['admin_login'])) {
    $a_username = mysqli_real_escape_string($db, $_POST['a_username']);
    $a_password = mysqli_real_escape_string($db, $_POST['a_password']);

    $query = "SELECT * FROM admin WHERE username='$a_username' AND password='$a_password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        // User found, display details
        $row = mysqli_fetch_assoc($result);
        $welcome_message = "Welcome, {$row['f_name']} {$row['l_name']}!";
        $username = "<strong>Username:</strong> {$row['username']}";
        $name = "<strong>Name:</strong> {$row['f_name']} {$row['l_name']}";
        $email = "<strong>Email ID:</strong> {$row['email']}";
        $phone = "<strong>Phone number:</strong> {$row['phone']}";
        $reg_date = "<strong>Registered Date:</strong> {$row['reg_date']}";
        $login_form_visible = false;
    } else {
        // User not found
        $welcome_message = "Admin not found.";
        $login_form_visible = true;
    }
}

// Display feedbacks if "See Feedback" button is pressed
if (isset($_POST['see_feedback'])) {
    header('location: view_feedback.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Page</title>
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
      position: relative; /* Added */
    }

    .header .logout-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      right: 20px;
    }

    .admin-details {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin: 20px auto;
      width: 50%;
    }

    .admin-details p {
      margin-bottom: 10px;
    }

    .menu-list {
      display: none;
      padding: 10px;
      border-radius: 5px;
      background-color: #333;
      color: #fff;
    }

    .menu-list.active {
      display: block;
      position: absolute;
      top: 100%;
      left: 0;
      width: 100%;
      z-index: 1;
    }

    .menu-list.active button {
      display: block;
      width: 100%;
      padding: 10px;
      margin: 5px 0;
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
      margin: 10px auto;
    }

    .btn:hover {
      background-color: #555;
    }

    /* Styles for the login form */
    .login-form {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin: 20px auto;
      width: 50%;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .login-form button {
      width: 100%;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="header">
    <h2><?php echo $welcome_message ?? "Welcome Admin"; ?></h2>
    <div class="logout-btn">
      <form method="post" action="admin.php">
        <button type="submit" class="btn" name="logout">Logout</button>
      </form>
    </div>
  </div>
  <?php if ($login_form_visible ?? true): ?>
  <div class="admin-details">
    <div class="login-form">
      <form method="post" action="admin.php">
        <div>
          <label>Username</label>
          <input type="text" name="a_username">
        </div>
        <div>
          <label>Password</label>
          <input type="password" name="a_password">
        </div>
        <button type="submit" class="btn" name="admin_login">Login</button>
      </form>
    </div>
  </div>
  <?php endif; ?>
  <?php if (isset($username)): ?>
  <div class="admin-details">
    <div class="user-details">
      <p><?php echo $username; ?></p>
      <p><?php echo $name; ?></p>
      <p><?php echo $email; ?></p>
      <p><?php echo $phone; ?></p>
      <p><?php echo $reg_date; ?></p>
    </div>
  </div>
  <div class="menu-list">
    <form method="post">
      <button type="submit" class="btn" name="see_feedback">See Feedback</button>
    </form>
    <form method="post" action="view_farmer.php">
      <button type="submit" class="btn" name="see_farmers">View Farmers</button>
    </form>
    <form method="post" action="add_farmer.php">
      <button type="submit" class="btn" name="add_farmer">Add Farmer</button>
    </form>
    <form method="post" action="remove_farmer.php">
      <button type="submit" class="btn" name="remove_farmer">Remove Farmer</button>
    </form>
    <form method="post" action="modify_farmer.php">
      <button type="submit" class="btn" name="modify_farmer">Modify Farmer</button>
    </form>
    <form method="post" action="view_customer.php">
      <button type="submit" class="btn" name="see_customers">View Customers</button>
    </form>
    <form method="post" action="add_customer.php">
      <button type="submit" class="btn" name="add_customer">Add Customer</button>
    </form>
    <form method="post" action="remove_customer.php">
      <button type="submit" class="btn" name="remove_customer">Remove Customer</button>
    </form>
    <form method="post" action="modify_customer.php">
      <button type="submit" class="btn" name="modify_customer">Modify Customer</button>
    </form>
    <form method="post" action="payment.php">
      <button type="submit" class="btn" name="payment">Payment</button>
    </form>
    <form method="post" action="view_transaction.php">
      <button type="submit" class="btn" name="view_transaction">Transaction History</button>
    </form>
  </div>
  <button class="btn" onclick="toggleMenu()">Menu</button>
  <?php endif; ?>
  <script>
    function toggleMenu() {
      var menuList = document.querySelector(".menu-list");
      menuList.classList.toggle("active");
    }
  </script>
</body>
</html>