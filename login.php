<?php
session_start();
include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('https://th.bing.com/th/id/R.9e467993dd59fe218cae51c16cc163dd?rik=laZ58kOoexEsPQ&riu=http%3a%2f%2fwww.dairypesa.com%2fwp-content%2fuploads%2f2015%2f10%2fmyths-about-cows-milk.jpg&ehk=2TjBYG6tL22k%2bTNf6BO%2bqLhIcmJ67MK3qh5vLN6Sg9E%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1');
      background-size: cover;
      background-color: #f2f2f2;
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
    }

    .form-box {
      background-color: #fff;
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

    .input-group select {
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
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="header">
    <h2>User Login</h2>
  </div>
  <div class="form-box">
    <?php
    if (isset($_POST['login'])) {
        $user_type = $_POST['user_type'];
        $_SESSION['user_type'] = $user_type;
        
        switch ($user_type) {
            case 'customer':
                header('location: customer.php');
                break;
            case 'farmer':
                header('location: farmer.php');
                break;
            case 'admin':
                header('location: admin.php');
                break;
            default:
                echo "Invalid user type";
                break;
        }
    }
    ?>
    <form method="post" action="">
      <div class="input-group">
        <label>Select User Type:</label>
        <select name="user_type">
          <option value="admin">Admin</option>
          <option value="customer">Customer</option>
          <option value="farmer">Farmer</option>
        </select>
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="login">Login</button>
      </div>
    </form>
  </div>
</body>
</html>



