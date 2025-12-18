<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "petfeeder";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT password FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  if (password_verify($password, $row['password'])) {
    echo "Login berhasil!";
    // redirect ke halaman kontrol servo
    header("Location: feeder.html");
  } else {
    echo "Password salah!";
  }
} else {
  echo "User tidak ditemukan!";
}

$conn->close();
?>
