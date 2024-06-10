<?php
include 'config.php';

$conn = connect_to_db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];

    $sql = "SELECT * FROM admin WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if ($user !== null) {
            $storedHash1= $user['jawaban1'];
            $storedHash2= $user['jawaban2'];
        if (password_verify($answer1, $storedHash1) && password_verify($answer2,$storedHash2)) {
            session_start();
            $_SESSION['username'] = $username;
            echo "<script>alert('Username tersedia'); window.location.href = 'process/forgot_password_process.php';</script>";
            exit();
        } else {
            echo "<script>alert('Jawaban salah'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Username tidak ada'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Username tidak ada'); window.history.back();</script>";
}

$stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
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
    <h2>Forgot Password</h2>
    <form action="" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="answer1">Apa mobil yang pertama direntalkan?</label><br>
        <input type="text" id="answer1" name="answer1" required><br>

        <label for="answer2">Apa nama hewan peliharaan anda?</label><br>
        <input type="text" id="answer2" name="answer2" required><br>

        <?php if (isset($error_message)) { echo "<script>alert($error_message); window.location.href = '../login-admin.php';</script>";} ?>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
