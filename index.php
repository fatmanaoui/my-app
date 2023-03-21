<?php

$db_host = 'localhost';
$db_user = 'username';
$db_pass = 'password';
$db_name = 'database_name';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
  die('Database connection failed!');
}

$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

if (empty($name) || empty($email) || empty($message)) {
  echo 'Please fill in all fields.';
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo 'Invalid email format.';
} else {
  $query = "INSERT INTO data (name, email, message) VALUES ('$name', '$email', '$message')";

  if (mysqli_query($conn, $query)) {
    echo 'Form submitted successfully!';
  } else {
    echo 'Error submitting form.';
  }
}

mysqli_close($conn);

?>