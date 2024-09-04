<?php 
include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>View Feedback</title>
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
      position: relative;
    }

    .header .logout-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      right: 20px;
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
    }

    .header .logout-btn:hover {
      background-color: #555;
    }

    .content-box {
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin: 20px auto;
      padding: 20px;
      width: 80%;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }

    .back-btn {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      border: none;
      text-align: center;
      cursor: pointer;
    }

    .back-btn:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="header">
    <h2>Feedbacks</h2>
    <a href="admin.php" class="logout-btn">Logout</a>
  </div> 
  <div class="content-box">
    <?php 
      // Assuming you have a $db connection established already
      $query = "SELECT * FROM feedback";
      $result = mysqli_query($db, $query);

      // Check for errors
      if (!$result) {
        die('Error in SQL query: ' . mysqli_error($db));
      }

      // Start table
      echo "<table>";
      echo "<tr><th>Name</th><th>Date</th><th>Your Feedback</th></tr>";

      // Fetch and display data
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
        echo "<td>" . htmlspecialchars($row['feedback']) . "</td>";
        echo "</tr>";
      }

      // End table
      echo "</table>";

      // Free result set
      mysqli_free_result($result);
    ?>

    <!-- Back button to go to admin.php -->
    <a href="admin.php" class="back-btn">Back to Admin</a>
  </div>
</body>
</html>
