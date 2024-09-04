<?php
session_start();
include('server.php');

// Redirect to login page if the user is not logged in as admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header('location: index.php');
    exit();
}

// Process form submission
if (isset($_POST['remove_farmer'])) {
    if (isset($_POST['f_username'])) {
        $f_username = mysqli_real_escape_string($db, $_POST['f_username']);
        
        // Query to remove farmer with provided username
        $query = "DELETE FROM farmer WHERE username='$f_username'";
        mysqli_query($db, $query);
        
        // Check if the farmer was successfully removed
        if (mysqli_affected_rows($db) > 0) {
            $message = "Farmer '$f_username' removed successfully.";
        } else {
            $error = "Failed to remove farmer. Farmer with username '$f_username' not found.";
        }
    } else {
        $error = "Please provide the username of the farmer you want to remove.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Remove Farmer</title>
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
            position: relative;
        }
        .logout-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 20px;
        }
        .container {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
        }
        .error-message {
            color: red;
        }
        .success-message {
            color: green;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .btn-submit {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-submit:hover {
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
            text-align: center;
            display: block;
            margin: 10px auto;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Remove Farmer</h2>
        <div class="logout-btn">
            <form method="post" action="index.php">
                <button type="submit" class="btn" name="logout">Logout</button>
            </form>
        </div>
    </div>
    <div class="container">
        <?php if(isset($message)): ?>
            <p class="success-message"><?php echo $message; ?></p>
            <p>Redirecting to admin page...</p>
            <?php header("refresh:3;url=admin.php"); ?>
        <?php elseif(isset($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label>Enter Farmer Username:</label>
                <input type="text" name="f_username">
            </div>
            <div class="form-group">
                <button type="submit" name="remove_farmer" class="btn-submit">Remove Farmer</button>
            </div>
        </form>
        <form action="admin.php">
            <button type="submit" class="btn-back">Back to Admin Page</button>
        </form>
    </div>
</body>
</html>
