<?php
session_start();
if (!isset($_SESSION['username'])) {
    die('Session not set');
    header("Location: ../login-admin.php");
    exit();
}
include '../config.php';
include 'queries.php';
$nama_paket = $jenis = $gambar = $lokasi = $deskripsi_paket = $fasilitas = $harga = $deskripsi_harga = "";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($errors)) {
        $conn = connect_to_db();
        if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0){
            $sql = create_liburan();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sissssis", $nama_paket, $jenis, $gambarbase64, $lokasi, $deskripsi_paket, $fasilitas, $harga, $deskripsi_harga);
            $nama_paket = $_POST["nama_paket"];
            $jenis = $_POST["jenis"];

            $imageTmpName = $_FILES["gambar"]["tmp_name"];
            $imageData = file_get_contents($imageTmpName);
            $gambarbase64 = base64_encode($imageData);

            $lokasi = $_POST["lokasi"];
            $deskripsi_paket = $_POST["deskripsi_paket"];
            $fasilitas = $_POST["fasilitas"];
            $harga = $_POST["harga"];
            $deskripsi_harga = $_POST["deskripsi_harga"];

            if ($stmt->execute()) {
                echo "<script>alert('Data berhasil ditambahkan');</script>";
                header("Location: ../home.php");
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
<title>Add New Paket Liburan</title>
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
    <h1>Add New Paket Liburan</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <label for="nama_paket">Nama Paket:</label><br>
    <input type="text" id="nama_paket" name="nama_paket" value="<?php echo $nama_paket; ?>" required><br>

    <label for="jenis">Jenis Liburan:</label><br>
    <select id="jenis" name="jenis">
        <option value="1" <?php if ($jenis == 1) echo 'selected'; ?>>Paket 1 Hari</option>
        <option value="2" <?php if ($jenis == 2) echo 'selected'; ?>>Paket 2 Hari</option>
        <option value="3" <?php if ($jenis == 3) echo 'selected'; ?>>Paket 3 Hari</option>
    </select><br>

    <label for="gambar">Gambar:</label><br>
    <input type="file" id="gambar" name="gambar" required><br>

    <label for="lokasi">Lokasi:</label><br>
    <input type="text" id="lokasi" name="lokasi" value="<?php echo $lokasi; ?>" required><br>

    <label for="deskripsi_paket">Deskripsi Paket:</label><br>
    <textarea id="deskripsi_paket" name="deskripsi_paket" rows="4" cols="50" required><?php echo $deskripsi_paket; ?></textarea><br>

    <label for="fasilitas">Fasilitas:</label><br>
    <textarea id="fasilitas" name="fasilitas" rows="4" cols="50" required><?php echo $fasilitas; ?></textarea><br>

    <label for="harga">Harga:</label><br>
    <input type="number" id="harga" name="harga" value="<?php echo $harga; ?>" required><br>

    <label for="deskripsi_harga">Deskripsi Harga:</label><br>
    <textarea id="deskripsi_harga" name="deskripsi_harga" rows="4" cols="50" required><?php echo $deskripsi_harga; ?></textarea><br>

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
