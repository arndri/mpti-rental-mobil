<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Data Example</title>
</head>
<body>
    <h1>Data from Backend API</h1>
    <div id="page1-container"></div>

    <script>
        function fetchDataFromBackend(page, containerId) {
            fetch(`http://localhost/mpti-backend/api.php?page=${page}`)
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
                        container.innerHTML += `<p>ID: ${item.id}, Name: ${item.nama_kendaraan}, Price: ${item.harga}</p>
                        <img src="data:image/png;base64,${item.gambar}" alt="Image">`;
                        
                    });
                })
                .catch(error => console.error(`Error fetching data for ${page}:`, error));
        }
         fetchDataFromBackend('all_armada', 'page1-container');
    </script>
</body>
</html>
