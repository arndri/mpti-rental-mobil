<?php
session_start();
if (!isset($_SESSION['username'])) {
    die('Session not set');
    header("Location: ../forgot_password.php");
    exit();
}

include '../config.php';
$conn = connect_to_db();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password === $confirm_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE admin SET password = ? WHERE username = ?");
        $stmt->bind_param("ss", $hashed_password, $username);
        $stmt->execute();

        session_destroy();
        echo "<script>alert('Password berhasil diubah'); window.location.href = '../login-admin.php';</script>";
        exit();
    } else {
        echo "<script>alert('Password tidak sama, coba lagi'); window.history.back();</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            width: 800px; /* Adjusted width */
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #bf071b;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #6b6b6b;
        }
    </style>
</head>
<body>
    <h2>Reset Password</h2>
    <form action="" method="POST">
        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br>

        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <input type="submit" value="Reset Password">
    </form>
</body>
</html>
