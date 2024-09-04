<?php
include('server.php');

if (isset($_POST['submit_feedback'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $feedback = mysqli_real_escape_string($db, $_POST['feedback']);

    $query = "INSERT INTO feedback (name, date, feedback) VALUES ('$name', '$date', '$feedback')";
    mysqli_query($db, $query);

    header('location: customer.php');
    exit();
}
?>
