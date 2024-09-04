<!DOCTYPE html>
<html>
<head>
  <title>User Login</title>
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
      padding: 10px 0; /* Reduced padding */
      border-top-left-radius: 20px; /* Rounded top-left corner */
      border-top-right-radius: 20px; /* Rounded top-right corner */
    }

    .form-box {
      background-color: rgba(255, 255, 255, 0.8);
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
      text-align: center;
    }

    .input-group select {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url('https://th.bing.com/th/id/R.9e467993dd59fe218cae51c16cc163dd?rik=laZ58kOoexEsPQ&riu=http%3a%2f%2fwww.dairypesa.com%2fwp-content%2fuploads%2f2015%2f10%2fmyths-about-cows-milk.jpg&ehk=2TjBYG6tL22k%2bTNf6BO%2bqLhIcmJ67MK3qh5vLN6Sg9E%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1');
      background-size: cover;
      z-index: -1;
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
      margin: 0 auto;
    }

    .btn:hover {
      background-color: #555;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="background"></div>
  <div class="header">
    <h2>User Login</h2>
  </div>
  <div class="form-box">
    <form method="post" action="login.php">
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
  <?php
session_start();
include('server.php');
?>