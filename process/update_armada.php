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
    if (!empty($_POST['armada_id']) && !empty($_POST['nama_kendaraan']) && !empty($_POST['jenis']) && !empty($_POST['kapasitas']) && !empty($_POST['fasilitas']) && !empty($_POST['harga']) && !empty($_POST['harga_12'])) {
        $armada_id = $_POST['armada_id'];
        $nama_kendaraan = $_POST['nama_kendaraan'];
        $jenis = $_POST['jenis'];
        $kapasitas = $_POST['kapasitas'];
        $fasilitas = $_POST['fasilitas'];
        $harga = $_POST['harga'];
        $harga_12 = $_POST['harga_12'];
        
        if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == 0) {
            $imageTmpName = $_FILES["gambar"]["tmp_name"];
            $imageData = file_get_contents($imageTmpName);
            $gambarbase64 = base64_encode($imageData);
        } else {
            $gambarbase64 = $_POST["gambar_lama"];
        }

        $sql = update_armada($armada_id, $nama_kendaraan, $jenis, $gambarbase64, $kapasitas, $fasilitas, $harga, $harga_12);
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data berhasil diupdate'); window.location.href = '../home.php';</script>";
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "<script>alert('Semua data harus diisi'); window.history.back();</script>";
    }
}




if(isset($_GET['id']) && !empty($_GET['id'])) {
    $armada_id = $_GET['id'];

    $sql = select_armada($armada_id);
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nama_kendaraan = $row['nama_kendaraan'];
        $jenis = $row['jenis'];
        $kapasitas = $row['kapasitas'];
        $fasilitas = $row['fasilitas'];
        $harga = $row['harga'];
        $harga_12 = $row['harga_12'];
        $gambar = $row['gambar'];
    } else {
        echo "Armada tidak ada.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Armada</title>
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
    <h1>Edit Armada</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <input type="hidden" name="armada_id" value="<?php echo $armada_id; ?>">
        <input type="hidden" name="gambar_lama" value="<?php echo $gambar; ?>">
        <label for="nama_kendaraan">Nama Kendaraan:</label><br>
        <input type="text" id="nama_kendaraan" name="nama_kendaraan" value="<?php echo $nama_kendaraan; ?>"><br>

        <label for="jenis">Jenis Kendaraan:</label><br>
        <input type="text" id="jenis" name="jenis" value="<?php echo $jenis; ?>"><br>

        <label for="gambar">Gambar:</label><br>
        <input type="file" id="gambar" name="gambar" accept="image/*"><br>

        <label for="kapasitas">Kapasitas:</label><br>
        <input type="number" id="kapasitas" name="kapasitas" value="<?php echo $kapasitas; ?>"><br>

        <label for="fasilitas">Fasilitas:</label><br>
        <input type="text" id="fasilitas" name="fasilitas" value="<?php echo $fasilitas; ?>"><br>

        <label for="harga">Harga Full:</label><br>
        <input type="number" id="harga" name="harga" value="<?php echo $harga; ?>"><br>

        <label for="harga_12">Harga 12 Jam:</label><br>
        <input type="number" id="harga_12" name="harga_12" value="<?php echo $harga_12; ?>"><br>

        <input type="submit" value="Update">
    </form>
</div>

</body>
</html>
