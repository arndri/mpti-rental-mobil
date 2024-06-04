<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Data Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .data-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .data-box {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin: 10px;
            padding: 20px;
            width: 300px;
            text-align: center;
        }
        .data-box img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .data-box h2 {
            margin-top: 0;
            color: #555;
        }
        .data-box p {
            margin: 10px 0;
            color: #777;
        }
    </style>
</head>
<body>
    <h1>Data from Backend API</h1>
    <div id="page1-container" class="data-container"></div>
    <div id="data-by-id-container" class="data-container"></div>

    <script>
        function fetchDataFromBackend(page, containerId) {
            fetch(`http://localhost/mpti-frontend/api.php?page=${page}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Failed to fetch data for ${page}. Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(`Data for ${page}:`, data);
                    const container = document.getElementById(containerId);
                    container.innerHTML = `<h2>${page}</h2>`;
                    data.forEach(item => {
                        container.innerHTML += `
                            <div class="data-box">
                                <p>ID: ${item.id}</p>
                                <p>Name: ${item.nama_kendaraan}</p>
                                <p>Price: ${item.harga}</p>
                                <img src="data:image/png;base64,${item.gambar}" alt="Image">
                            </div>`;
                    });
                })
                .catch(error => console.error(`Error fetching data for ${page}:`, error));
        }

        function fetchDataById(id, containerId) {
            fetch(`http://localhost/mpti-frontend/api.php?id=${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Failed to fetch data for ID: ${id}. Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(`Data for ID ${id}:`, data);
                    const container = document.getElementById(containerId);
                    const fasilitasFormatted = data.fasilitas.replace(/(?:\r\n|\r|\n)/g, '<br>');
                    container.innerHTML = `
                        <div class="data-box">
                            <h2>Data for ID: ${id}</h2>
                            <p>ID: ${data.id}</p>
                            <p>Name: ${data.nama_paket}</p>
                            <p>Price: ${data.harga}</p>
                            <img src="data:image/png;base64,${data.gambar}" alt="Image">
                            <p><br>${fasilitasFormatted}</p>
                        </div>`;
                })
                .catch(error => console.error(`Error fetching data for ID ${id}:`, error));
        }

        fetchDataById(14, 'data-by-id-container');
    </script>
</body>
</html>
