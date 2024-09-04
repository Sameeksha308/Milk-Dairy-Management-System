<!DOCTYPE html>
<html>
<head>
  <title>View Customers</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('https://th.bing.com/th/id/R.9e467993dd59fe218cae51c16cc163dd?rik=laZ58kOoexEsPQ&riu=http%3a%2f%2fwww.dairypesa.com%2fwp-content%2fuploads%2f2015%2f10%2fmyths-about-cows-milk.jpg&ehk=2TjBYG6tL22k%2bTNf6BO%2bqLhIcmJ67MK3qh5vLN6Sg9E%3d&risl=&pid=ImgRaw&r=0&sres=1&sresct=1');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      margin: 0;
      padding: 20px;
    }

    .header {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      position: relative;
      margin-bottom: 20px;
    }

    .header h2 {
      margin: 0;
    }

    .logout-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      right: 20px;
    }

    .logout-btn button {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .logout-btn button:hover {
      background-color: #555;
    }

    h2 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background-color: rgba(255, 255, 255, 0.8);
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #333;
      color: #fff;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .search-box {
      text-align: center;
      margin-bottom: 20px;
    }

    .search-box input[type="text"] {
      padding: 8px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .search-box button {
      background-color: #333;
      color: #fff;
      padding: 8px 16px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .search-box button:hover {
      background-color: #555;
    }

    .back-btn {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .back-btn button {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .back-btn button:hover {
      background-color: #555;
    }
  </style>
</head>
<body>
<?php
// Include your server.php or database connection code here
include('server.php');

// Query to fetch all customers
$query = "SELECT * FROM customer";
$result = mysqli_query($db, $query);

// Check if there are any customers
if (mysqli_num_rows($result) > 0) {
    echo "<div class='header'>
            <h2>All Customers</h2>
            <div class='logout-btn'>
              <button onclick=\"location.href='index.php'\">Logout</button>
            </div>
          </div>";

    // Display search box
    echo "<div class='search-box'>
            <input type='text' id='searchInput' onkeyup='searchTable()' placeholder='Search by first name'>
            <button onclick='searchTable()'>Search</button>
          </div>";

    echo "<table id='customersTable'>
            <tr>
                <th>Username</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Milk Rating</th>
                <th>Milk Price</th>
            </tr>";

    // Loop through each row of the result
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['f_name'] . ' ' . $row['l_name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['milk_rating'] . "</td>";
        echo "<td>" . $row['milk_price'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Add back button
    echo "<div class='back-btn'>
            <button onclick=\"location.href='admin.php'\">Back</button>
          </div>";
} else {
    echo "<h2>No customers found.</h2>";
}
?>
<script>
function searchTable() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("customersTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1]; // Column index for 'Name'
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
</body>
</html>
