<?php

$errors = array();

// Establish database connection
$db = mysqli_connect('localhost', 'root', '', 'milk_dairy');

// LOGIN USER
if (isset($_POST['login_customer'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username) || empty($password)) {
        array_push($errors, "Username and password are required");
    } else {
        $password = md5($password);
        
        $query_customer = "SELECT * FROM customer WHERE username='$username' AND password='$password'";
        $result_customer = mysqli_query($db, $query_customer);

        if (mysqli_num_rows($result_customer) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = "customer";
            $_SESSION['success'] = "You are now logged in";
            header('Location: customer.php');
            exit();
        }
         
        $query_farmer = "SELECT * FROM farmer WHERE username='$username' AND password='$password'";
        $result_farmer = mysqli_query($db, $query_farmer);

        if (mysqli_num_rows($result_farmer) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = "farmer";
            $_SESSION['success'] = "You are now logged in";
            header('Location: farmer.php');
            exit();
        }

        $query_admin = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result_admin = mysqli_query($db, $query_admin);
        
        if (mysqli_num_rows($result_admin) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = "admin";
            $_SESSION['success'] = "You are now logged in";
            header('Location: admin.php');
            exit();
        }
        
       

        array_push($errors, "Wrong username/password combination");
    }
}






//farmer



if (isset($_POST['fadd'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $f_name = mysqli_real_escape_string($db, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($db, $_POST['l_name']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $milk_produced = mysqli_real_escape_string($db, $_POST['milk_produced']);
    $membership_date = mysqli_real_escape_string($db, $_POST['membership_date']);
    $address = mysqli_real_escape_string($db, $_POST['address']);

    // Form validation
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (empty($f_name)) {
        array_push($errors, "First Name is required");
    }
    if (empty($l_name)) {
        array_push($errors, "Last Name is required");
    }
    if (empty($phone)) {
        array_push($errors, "Phone is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($milk_produced)) {
        array_push($errors, "Milk Produced is required");
    }
    if (empty($membership_date)) {
        array_push($errors, "Membership Date is required");
    }
    if (empty($address)) {
        array_push($errors, "Address is required");
    }

    // Check if farmer already exists
    $farmer_check_query = "SELECT * FROM farmer WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $farmer_check_query);
    $farmer = mysqli_fetch_assoc($result);

    if ($farmer) { // If farmer exists
        if ($farmer['username'] === $username) {
            array_push($errors, "Username already exists");
        }
        if ($farmer['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // If no errors, add farmer to database
    if (count($errors) == 0) {
        $password_hash = md5($password); // Hash password before storing
        $query = "INSERT INTO farmer (username, password, f_name, l_name, phone, email, milk_produced, membership_date, address) 
                  VALUES ('$username', '$password_hash', '$f_name', '$l_name', '$phone', '$email', '$milk_produced', '$membership_date', '$address')";
        mysqli_query($db, $query);

        $_SESSION['success'] = "New farmer added successfully";
    }
}

elseif(isset($_POST['fmodify'])) {
    // Retrieve form data
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $f_name = mysqli_real_escape_string($db, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($db, $_POST['l_name']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $milk_produced = mysqli_real_escape_string($db, $_POST['milk_produced']);
    $membership_date = mysqli_real_escape_string($db, $_POST['membership_date']);
    $address = mysqli_real_escape_string($db, $_POST['address']);

    $errors = array();

    // Validate inputs
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
    if (empty($f_name)) { array_push($errors, "First Name is required"); }
    if (empty($l_name)) { array_push($errors, "Last Name is required"); }
    if (empty($phone)) { array_push($errors, "Phone is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($milk_produced)) { array_push($errors, "Milk Produced is required"); }
    if (empty($membership_date)) { array_push($errors, "Membership Date is required"); }
    if (empty($address)) { array_push($errors, "Address is required"); }

    // If no validation errors, update data in the database
    if (count($errors) == 0) {
        $password_hash = md5($password); // Hash password before storing
        $sql = "UPDATE farmer SET password='$password_hash', f_name='$f_name', l_name='$l_name', phone='$phone', email='$email', milk_produced='$milk_produced', membership_date='$membership_date', address='$address' WHERE username='$username'";
        if (mysqli_query($db, $sql)) {
            // Display success message
            echo "<p>Farmer updated successfully!</p>";
        } else {
            // Display error message if modification fails
            echo "Error updating record: " . mysqli_error($db);
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}

elseif(isset($_POST['fdelete'])) {
    // Retrieve form data
    $username = mysqli_real_escape_string($db, $_POST['username']);

    // If username is not empty, perform deletion
    if (!empty($username)) {
        $sql = "DELETE FROM farmer WHERE username='$username'";
        if (mysqli_query($db, $sql)) {
            // Display success message
            echo "<p>Farmer deleted successfully!</p>";
        } else {
            // Display error message if deletion fails
            echo "Error deleting record: " . mysqli_error($db);
        }
    } else {
        // Display error message if username is empty
        echo "<p>Username is required for deletion</p>";
    }
}




//customer



if (isset($_POST['cadd'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $f_name = mysqli_real_escape_string($db, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($db, $_POST['l_name']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $milk_rating = mysqli_real_escape_string($db, $_POST['milk_rating']);
    $milk_price = mysqli_real_escape_string($db, $_POST['milk_price']);

    // Form validation
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if (empty($f_name)) {
        array_push($errors, "First Name is required");
    }
    if (empty($l_name)) {
        array_push($errors, "Last Name is required");
    }
    if (empty($phone)) {
        array_push($errors, "Phone is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($address)) {
        array_push($errors, "Address is required");
    }
    if (empty($milk_rating)) {
        array_push($errors, "Milk Rating is required");
    }
    if (empty($milk_price)) {
        array_push($errors, "Milk Price is required");
    }

    // Check if customer already exists
    $customer_check_query = "SELECT * FROM customer WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $customer_check_query);
    $customer = mysqli_fetch_assoc($result);

    if ($customer) { // If customer exists
        if ($customer['username'] === $username) {
            array_push($errors, "Username already exists");
        }
        if ($customer['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // If no errors, add customer to database
    if (count($errors) == 0) {
        $password_hash = md5($password); // Hash password before storing
        $query = "INSERT INTO customer (username, password, f_name, l_name, phone, email, address, milk_rating, milk_price) 
                  VALUES ('$username', '$password_hash', '$f_name', '$l_name', '$phone', '$email', '$address', '$milk_rating', '$milk_price')";
        mysqli_query($db, $query);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "New customer added successfully";
    }
}

elseif(isset($_POST['cmodify'])) {
    // Retrieve form data
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $f_name = mysqli_real_escape_string($db, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($db, $_POST['l_name']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $milk_rating = mysqli_real_escape_string($db, $_POST['milk_rating']);
    $milk_price = mysqli_real_escape_string($db, $_POST['milk_price']);

    $errors = array();

    // Validate inputs
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
    if (empty($f_name)) { array_push($errors, "First Name is required"); }
    if (empty($l_name)) { array_push($errors, "Last Name is required"); }
    if (empty($phone)) { array_push($errors, "Phone is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($address)) { array_push($errors, "Address is required"); }
    if (empty($milk_rating)) { array_push($errors, "Milk Rating is required"); }
    if (empty($milk_price)) { array_push($errors, "Milk Price is required"); }

    // If no validation errors, update data in the database
    if (count($errors) == 0) {
        $password_hash = md5($password); // Hash password before storing
        $sql = "UPDATE customer SET password='$password_hash', f_name='$f_name', l_name='$l_name', phone='$phone', email='$email', address='$address', milk_rating='$milk_rating', milk_price='$milk_price' WHERE username='$username'";
        if (mysqli_query($db, $sql)) {
            // Display success message
            echo "<p>Customer updated successfully!</p>";
        } else {
            // Display error message if modification fails
            echo "Error updating record: " . mysqli_error($db);
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    }
}

elseif(isset($_POST['cdelete'])) {
    // Retrieve form data
    $username = mysqli_real_escape_string($db, $_POST['username']);

    // If username is not empty, perform deletion
    if (!empty($username)) {
        $sql = "DELETE FROM customer WHERE username='$username'";
        if (mysqli_query($db, $sql)) {
            // Display success message
            echo "<p>Customer deleted successfully!</p>";
        } else {
            // Display error message if deletion fails
            echo "Error deleting record: " . mysqli_error($db);
        }
    } else {
        // Display error message if username is empty
        echo "<p>Username is required for deletion</p>";
    }
}



?>
