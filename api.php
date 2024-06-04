<?php
include 'config.php';

$conn = connect_to_db();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["page"])) {
        $requestedPage = $_GET["page"];
        switch ($requestedPage) {
            case "all_armada":
                echo "This switch work";
                $sql = "SELECT * FROM armada";
                break;
            case "popular":
                $sql = "SELECT * FROM armada ORDER BY harga ASC";
                break;
            case "mewah":
                $sql = "SELECT * FROM armada WHERE jenis='mobil' ORDER BY harga DESC";
                break;
            case "bus":
                $sql = "SELECT * FROM armada WHERE jenis ='bus' ORDER BY harga ASC";
                break;
            case "bandara":
                $sql = "SELECT * FROM bandara";
                break;
            case "jenis_liburan":
                $sql = "SELECT jenis, MIN(harga) AS harga_minimum
                FROM liburan
                GROUP BY jenis";
                break;
            case "liburan_1":
                $sql = "SELECT * FROM liburan WHERE jenis=1";
                break;
            case "liburan_2":
                $sql = "SELECT * FROM liburan WHERE jenis=2";
                break;
            case "liburan_3":
                $sql = "SELECT * FROM liburan WHERE jenis=3";
                break;
            default:
                http_response_code(404);
                echo json_encode(array("error" => "Page not found"));
                exit;
        }
        $result = $conn->query($sql);

        if ($result) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);
        } else {
            http_response_code(500);
            echo json_encode(array("error" => "Failed to fetch data"));
        }
    } elseif (isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM liburan WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $data = $result->fetch_assoc();
            echo json_encode($data);
        } else {
            http_response_code(404);
            echo json_encode(array("error" => "Data not found"));
        }
    } else {
        http_response_code(400);
        echo json_encode(array("error" => "Page or ID parameter is missing"));
    }
}

$conn->close();
?>
