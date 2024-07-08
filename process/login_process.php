<?php
include '../config.php';

$conn = connect_to_db();

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "SELECT * FROM admin WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['username'] = $username;
        echo "<script>alert('Login berhasil !'); window.location.href = '../home.php';</script>";
        exit();
    } else {
        echo "<script>alert('Data username/password salah !'); window.location.href = '../login-admin.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Data username/password salah !'); window.location.href = '../login-admin.php';</script>";
    exit();
}

$stmt->close();
$conn->close();
?>
