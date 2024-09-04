<!DOCTYPE html>
<html>
<head>
  <title>Add Customer</title>
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

    .back-btn {
      position: absolute;
      top: 20px;
      left: 20px;
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
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="header">
    <h2>Add Customer</h2>
    <div class="back-btn">
      <button onclick="window.location.href='admin.php';" class="btn">Back</button>
    </div>
    <div class="logout-btn">
      <form method="post" action="">
        <button type="submit" name="logout" class="btn">Logout</button>
      </form>
    </div>
  </div>
  <div class="form-box">
    <form method="post" action="add_customer.php">
      <div class="input-group">
        <label>First Name</label>
        <input type="text" name="f_name" required>
      </div>
      <div class="input-group">
        <label>Last Name</label>
        <input type="text" name="l_name" required>
      </div>
      <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" required>
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
        <label>Milk Rating</label>
        <input type="text" name="milk_rating" required>
      </div>
      <div class="input-group">
        <label>Milk Price</label>
        <input type="text" name="milk_price" required>
      </div>
      <div class="input-group">
        <button type="submit" class="btn" name="submit">Submit</button>
      </div>
    </form>
  </div>
</body>
</html>
