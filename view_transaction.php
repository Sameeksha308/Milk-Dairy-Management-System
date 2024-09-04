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

$query = "SELECT * FROM payment";
$result = mysqli_query($db, $query);
$payments = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Transactions</title>
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
      position: relative;
    }

    .login-btn, .back-btn {
      position: absolute;
      top: 20px;
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .login-btn {
      right: 20px;
    }

    .back-btn {
      left: 20px;
    }

    .table-container {
      margin: 20px auto;
      width: 80%;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #333;
      color: #fff;
    }

    .btn-center {
      text-align: center;
    }

    .btn {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      display: inline-block;
      margin-top: 20px;
    }

    .btn:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
  <div class="header">
    <h2>Transaction History</h2>
    <form method="post" action="admin.php" style="display: inline;">
      <button type="submit" class="login-btn" name="logout">Logout</button>
    </form>
    <a href="admin.php"><button class="back-btn">Back</button></a>
  </div>

  <div class="table-container">
    <table>
      <tr>
        <th>Payment ID</th>
        <th>Username</th>
        <th>Name</th>
        <th>Date</th>
        <th>Amount</th>
        <th>Payment Method</th>
      </tr>
      <?php foreach ($payments as $payment): ?>
        <tr>
          <td><?php echo $payment['payment_id']; ?></td>
          <td><?php echo $payment['username']; ?></td>
          <td><?php echo $payment['name']; ?></td>
          <td><?php echo $payment['date']; ?></td>
          <td><?php echo $payment['amount']; ?></td>
          <td><?php echo $payment['payment_method']; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>

</body>
</html>
