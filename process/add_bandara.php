<?php
session_start();
if (!isset($_SESSION['username'])) {
    die('Session not set');
    header("Location: ../login-admin.php");
    exit();
}
include '../config.php';
include 'queries.php';
$nama_kendaraan = $jenis = $gambar = $kapasitas = $fasilitas = $harga = "";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($errors)) {
        $conn = connect_to_db();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0){
            $sql = create_bandara();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $nama_kendaraan, $jenis, $gambarbase64, $kapasitas, $fasilitas, $harga);
            $nama_kendaraan = $_POST["nama_kendaraan"];
            $jenis = $_POST['jenis'];

            $imageTmpName = $_FILES["gambar"]["tmp_name"];
            $imageData = file_get_contents($imageTmpName);
            $gambarbase64 = base64_encode($imageData);

            $kapasitas = $_POST["kapasitas"];
            $fasilitas = $_POST["fasilitas"];
            $harga = $_POST["harga"];

            if ($stmt->execute()) {
                echo "<script>alert('Data berhasil ditambah'); window.location.href = '../home.php';</script>";
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $stmt->close();
            $conn->close();
        }
        else {
            echo "<script>alert('Semua data harus diisi'); window.history.back();</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add New Armada</title>
<link rel="stylesheet" href="assets/styles.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }
    .container {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        margin-bottom: 20px;
    }
    label {
        font-weight: bold;
    }
    input[type="text"],
    input[type="number"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="file"] {
        width: 100%;
        margin-bottom: 10px;
    }
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    .errors {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
        padding: 10px;
        margin-top: 20px;
    }
    .errors ul {
        margin: 0;
        padding: 0;
    }
    .errors li {
        list-style-type: none;
        margin-bottom: 5px;
    }
</style>
</head>
<body>

<div class="container">
    <h1>Add New Armada</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <label for="nama_kendaraan">Nama Kendaraan:</label><br>
        <input type="text" id="nama_kendaraan" name="nama_kendaraan" value="<?php echo $nama_kendaraan; ?>" required><br>

        <label for="jenis">Jenis Kendaraan:</label><br>
        <input type="text" id="jenis" name="jenis" value="<?php echo $jenis; ?>" required><br>

        <label for="gambar">Gambar (10mb)::</label><br>
        <input type="file" id="gambar" name="gambar" required><br>

        <label for="kapasitas">Kapasitas:</label><br>
        <input type="number" id="kapasitas" name="kapasitas" value="<?php echo $kapasitas; ?>" required><br>

        <label for="fasilitas">Fasilitas:</label><br>
        <input type="text" id="fasilitas" name="fasilitas" value="<?php echo $fasilitas; ?>" required><br>

        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga" value="<?php echo $harga; ?>" required><br>

        <input type="submit" value="Submit">
    </form>
    <?php
    if (!empty($errors)) {
        echo "<div class='errors'><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul></div>";
    }
    ?>
</div>

</body>
</html>