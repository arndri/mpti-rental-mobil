<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login-admin.php");
    exit();
}

include 'config.php';
include 'process/queries.php';
$conn = connect_to_db();
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CRUD Dashboard</title>
<link rel="stylesheet" href="assets/styles.css">
<style>
    .truncate {
        max-width: 50px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
</style>
</head>
<body>

<div class="container">
    <h1>Dashboard</h1>
    <form action="process/logout_process.php" method="post">
        <button type="submit" class="btn">Logout</button></form>
    <div>
        <h2>Armada</h2>
        <a href="process/add_armada.php" class="btn">Add New Armada</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kendaraan</th>
                    <th>Jenis Kendaraan</th>
                    <th>Gambar</th>
                    <th>Kapasitas</th>
                    <th>Fasilitas</th>
                    <th>Harga Full</th>
                    <th>Harga 12 Jam</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = get_armada();
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nama_kendaraan"] . "</td>";
                        echo "<td>" . $row["jenis"] . "</td>";
                        echo "<td><img src='data:image/jpeg;base64," .$row['gambar'] . "' width='100'></td>";
                        echo "<td>" . $row["kapasitas"] . "</td>";
                        echo "<td>" . $row["fasilitas"] . "</td>";
                        echo "<td>" . $row["harga"] . "</td>";
                        echo "<td>" . $row["harga_12"] . "</td>";
                        echo "<td>";
                        echo "<a href='process/update_armada.php?id=".$row["id"]."' class='btn btn-edit'>Edit</a>";
                        echo "<a href='process/delete_armada.php?id=".$row["id"]."' class='btn btn-delete'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No armada found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div>
        <h2>Antar Jemput Bandara</h2>
        <a href="process/add_bandara.php" class="btn">Add New Antar Jemput Bandara</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kendaraan</th>
                    <th>Jenis Kendaraan</th>
                    <th>Gambar</th>
                    <th>Kapasitas</th>
                    <th>Fasilitas</th>
                    <th>Harga</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = get_bandara();
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nama_kendaraan"] . "</td>";
                        echo "<td>" . $row["jenis"] . "</td>";
                        echo "<td><img src='data:image/jpeg;base64," .$row['gambar'] . "' width='100'></td>";
                        echo "<td>" . $row["kapasitas"] . "</td>";
                        echo "<td>" . $row["fasilitas"] . "</td>";
                        echo "<td>" . $row["harga"] . "</td>";
                        echo "<td>";
                        echo "<a href='process/update_bandara.php?id=".$row["id"]."' class='btn btn-edit'>Edit</a>";
                        echo "<a href='process/delete_bandara.php?id=".$row["id"]."' class='btn btn-delete'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No bandara found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div>
        <h2>Paket Liburan</h2>
        <a href="process/add_liburan.php" class="btn">Add New Paket Liburan</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Paket</th>
                    <th>Jenis Paket</th>
                    <th>Gambar</th>
                    <th>Lokasi</th>
                    <th>Deskripsi Paket</th>
                    <th>Fasilitas</th>
                    <th>Harga</th>
                    <th>Deskripsi Harga</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = get_liburan();
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nama_paket"] . "</td>";
                        echo "<td>" . $row["jenis"] . "</td>";
                        echo "<td><img src='data:image/jpeg;base64," .$row['gambar'] . "' width='100'></td>";
                        echo "<td class='truncate'>" . $row["lokasi"] . "</td>";
                        echo "<td class='truncate'>" . $row["deskripsi_paket"] . "</td>";
                        echo "<td class='truncate'>" . $row["fasilitas"] . "</td>";
                        echo "<td>" . $row["harga"] . "</td>";
                        echo "<td class='truncate'>" . $row["deskripsi_harga"] . "</td>";
                        echo "<td>";
                        echo "<a href='process/update_liburan.php?id=".$row["id"]."' class='btn btn-edit'>Edit</a>";
                        echo "<a href='process/delete_liburan.php?id=".$row["id"]."' class='btn btn-delete'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No liburan found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>