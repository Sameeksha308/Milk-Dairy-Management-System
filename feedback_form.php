<!DOCTYPE html>
<html>
<head>
  <title>Feedback Form</title>
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
      padding: 15px 0;
      border-top-left-radius: 20px;
      border-top-right-radius: 20px;
      position: relative;
    }

    .header .logout-btn {
      position: absolute;
      top: 15px;
      right: 20px;
    }

    .form-box {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      margin: 40px auto;
      width: 60%;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    .input-group input,
    .input-group textarea,
    .input-group select {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .input-group textarea {
      resize: vertical;
      height: 100px;
    }

    .btn-container {
      display: flex;
      justify-content: space-between;
    }

    .btn {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
      margin-top: 10px;
    }

    .btn:hover {
      background-color: #555;
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
  </style>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="background"></div>
  <div class="header">
    <h2>Feedback Form</h2>
    <div class="logout-btn">
      <form method="post" action="index.php">
        <button type="submit" class="btn" name="logout">Logout</button>
      </form>
    </div>
  </div>
  <div class="form-box">
    <form method="post" action="submit_feedback.php">
      <div class="input-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="input-group">
        <label for="date">Date</label>
        <input type="date" id="date" name="date" required>
      </div>
      <div class="input-group">
        <label for="feedback">Feedback</label>
        <textarea id="feedback" name="feedback" required></textarea>
      </div>
      <div class="btn-container">
        <button type="submit" class="btn" name="submit_feedback">Submit Feedback</button>
        <a href="admin.php" class="btn">Back</a>
      </div>
    </form>
  </div>
</body>
</html>
