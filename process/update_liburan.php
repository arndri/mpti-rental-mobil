<?php
session_start();
if (!isset($_SESSION['username'])) {
    die('Session not set');
    header("Location: ../login-admin.php");
    exit();
}
include '../config.php';
include 'queries.php';
$conn = connect_to_db();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['paket_id']) && !empty($_POST['nama_paket']) && !empty($_POST['jenis']) && !empty($_POST['lokasi']) && !empty($_POST['deskripsi_paket']) && !empty($_POST['fasilitas']) && !empty($_POST['harga']) && !empty($_POST['deskripsi_harga'])) {
        
            $paket_id= $_POST['paket_id'];
            $nama_paket = $_POST['nama_paket'];
            $jenis = $_POST['jenis'];
            $lokasi = $_POST['lokasi'];
            $deskripsi_paket = $_POST['deskripsi_paket'];
            $fasilitas = $_POST['fasilitas'];
            $harga = $_POST['harga'];
            $deskripsi_harga = $_POST['deskripsi_harga'];

            if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0){
            $imageTmpName = $_FILES["gambar"]["tmp_name"];
            $imageData = file_get_contents($imageTmpName);
            $gambarbase64 = base64_encode($imageData);
            }else{
                $gambarbase64 = $_POST["gambar_lama"];
            }
    
            $sql = update_liburan($paket_id,$nama_paket,$jenis,$gambarbase64,$lokasi,$deskripsi_paket,$fasilitas,$harga,$deskripsi_harga);
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Data berhasil diupdate'); window.location.href = '../home.php';</script>";
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
    }
    else {
        echo "<script>alert('Semua data harus diisi'); window.history.back();</script>";
    }
}


if(isset($_GET['id']) && !empty($_GET['id'])) {
    $paket_id = $_GET['id'];

    $sql = select_liburan($paket_id);
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nama_paket = $row['nama_paket'];
        $jenis = $row['jenis'];
        $lokasi = $row['lokasi'];
        $deskripsi_paket = $row['deskripsi_paket'];
        $fasilitas = $row['fasilitas'];
        $harga = $row['harga'];
        $deskripsi_harga = $row['deskripsi_harga'];
        $gambar = $row['gambar'];
    } else {
        echo "Paket Liburan tidak ada.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
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
    <h1>Update Paket Liburan</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <input type="hidden" name="paket_id" value="<?php echo $paket_id; ?>">
    <input type="hidden" name="gambar_lama" value="<?php echo $gambar; ?>">
    <label for="nama_paket">Nama Paket:</label><br>
    <input type="text" id="nama_paket" name="nama_paket" value="<?php echo $nama_paket; ?>"><br>

    <label for="jenis">Jenis Liburan:</label><br>
    <select id="jenis" name="jenis">
        <option value="1" <?php if ($jenis == 1) echo 'selected'; ?>>Paket 1 Hari</option>
        <option value="2" <?php if ($jenis == 2) echo 'selected'; ?>>Paket 2 Hari</option>
        <option value="3" <?php if ($jenis == 3) echo 'selected'; ?>>Paket 3 Hari</option>
    </select><br>

    <label for="gambar">Gambar (10mb)::</label><br>
    <input type="file" id="gambar" name="gambar"><br>

    <label for="lokasi">Lokasi:</label><br>
    <input type="text" id="lokasi" name="lokasi" value="<?php echo $lokasi; ?>"><br>

    <label for="deskripsi_paket">Deskripsi Paket:</label><br>
    <textarea id="deskripsi_paket" name="deskripsi_paket" rows="4" cols="50"><?php echo $deskripsi_paket; ?></textarea><br>

    <label for="fasilitas">Fasilitas:</label><br>
    <textarea id="fasilitas" name="fasilitas" rows="4" cols="50"><?php echo $fasilitas; ?></textarea><br>

    <label for="harga">Harga:</label><br>
    <input type="number" id="harga" name="harga" value="<?php echo $harga; ?>"><br>

    <label for="deskripsi_harga">Deskripsi Harga:</label><br>
    <textarea id="deskripsi_harga" name="deskripsi_harga" rows="4" cols="50"><?php echo $deskripsi_harga; ?></textarea><br>

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
