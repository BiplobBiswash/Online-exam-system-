<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

if ($result->num_rows > 0) {
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    header("Location: exam.php");
} else {
    echo "Invalid credentials. <a href='login.php'>Try again</a>";
}
?>