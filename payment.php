<!DOCTYPE html>
<html>
<head>
  <title>Payment Page</title>
  <style>
    /* Additional styles for improved UI */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('https://th.bing.com/th/id/R.9e467993dd59fe218cae51c16cc163dd?rik=laZ58kOoexEsPQ&riu=http%3a%2f%2fwww.dairypesa.com%2fwp-content%2fuploads%2f2015%2f10%2fmyths-about-cows-milk.jpg&ehk=2TjBYG6tL22k%2bTNf6BO%2bqLhIcmJ67MK3qh5vLN6Sg9E%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1');
      background-size: cover;
      background-repeat: no-repeat;
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

    .header h2 {
      margin: 0;
    }

    .form-box {
      background-color: rgba(255, 255, 255, 0.8); /* Transparent white background */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin: 20px auto;
      width: 50%;
      max-width: 600px;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
    }

    .input-group input, .input-group select {
      width: calc(100% - 10px);
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
    }

    .btn:hover {
      background-color: #555;
    }

    .btn-center {
      text-align: center;
    }

    .error-message {
      color: red;
      margin-top: 10px;
    }

    .success-message {
      color: green;
      margin-top: 10px;
    }

    .logout-btn, .back-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
    }

    .logout-btn {
      right: 20px;
    }

    .back-btn {
      left: 20px;
    }

    .logout-btn button, .back-btn button {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .logout-btn button:hover, .back-btn button:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
  <div class="header">
    <h2>Payment Form</h2>
    <div class="logout-btn">
      <form method="post" action="admin.php">
        <button type="submit" class="btn" name="logout">Logout</button>
      </form>
    </div>
    <div class="back-btn">
      <a href="admin.php"><button type="button" class="btn">Back</button></a>
    </div>
  </div>
  <div class="form-box">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="input-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="input-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="input-group">
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>
      </div>
      <div class="input-group">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="0.01" required>
      </div>
      <div class="input-group">
        <label for="payment_method">Payment Method:</label>
        <select id="payment_method" name="payment_method" required>
          <option value="">Select a method</option>
          <option value="Credit Card">Credit Card</option>
          <option value="Debit Card">Debit Card</option>
          <option value="PayPal">PayPal</option>
          <option value="Bank Transfer">Bank Transfer</option>
          <option value="Cash">Cash</option>
        </select>
      </div>
      <div class="input-group btn-center">
        <button type="submit" class="btn" name="submit_payment">Submit Payment</button>
      </div>
    </form>
    <?php if(isset($error_message)): ?>
      <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <?php if(isset($success_message)): ?>
      <div class="success-message"><?php echo $success_message; ?></div>
    <?php endif; ?>
  </div>
</body>
</html>
