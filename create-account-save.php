<?php
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php'; // Include your database connection file

    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $mobile = $_POST['mobile'];

    // Additional fields you may want for registration
    // $email = $_POST["email"];
    // $fullname = $_POST["fullname"];

    // Check if username already exists
    $sql_check_username = "SELECT * FROM users WHERE username = '$username'";
    $result_check_username = mysqli_query($con, $sql_check_username);
    if (mysqli_num_rows($result_check_username) > 0) {
        $showError = "Username already exists";
    } else {
        // If username doesn't exist, proceed with registration
        $sql_insert_user = "INSERT INTO users (username,mobile, password) VALUES ('$username', '$mobile' ,'$password')";
        if (mysqli_query($con, $sql_insert_user)) {
            // Registration successful, redirect to login page
            echo "<script>alert('Account Created Successfully')</script>";
            echo '<script>window.location.href = "login.php";</script>';
            exit();
        } else {
            $showError = "Error registering user";
        }
    }
}
?>
