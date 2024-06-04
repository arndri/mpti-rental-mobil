<?php
function get_armada(){
    return "SELECT * FROM armada";
}

function create_armada(){
    return "INSERT INTO armada (nama_kendaraan, jenis, gambar, kapasitas, fasilitas, harga, harga_12)
    VALUES (?, ?, ?, ?, ?, ?, ?)";
}

function update_armada($armada_id,$nama_kendaraan,$jenis,$gambar,$kapasitas,$fasilitas,$harga,$harga_12){
    return "UPDATE armada SET nama_kendaraan='$nama_kendaraan',jenis='$jenis',gambar='$gambar', kapasitas=$kapasitas, fasilitas='$fasilitas', harga=$harga, harga_12=$harga_12 WHERE id=$armada_id";
}

function select_armada($armada_id){
    return "SELECT * FROM armada WHERE id = $armada_id";
}

function delete_armada($armada_id){
    return "DELETE FROM armada WHERE id = $armada_id";
}

function create_bandara(){
    return "INSERT INTO bandara (nama_kendaraan, jenis, gambar, kapasitas, fasilitas, harga)
    VALUES (?, ?, ?, ?, ?, ?)";
}

function select_bandara($bandara_id){
    return "SELECT * FROM bandara WHERE id = $bandara_id";
}

function get_bandara(){
    return "SELECT * FROM bandara";
}

function update_bandara($bandara_id,$nama_kendaraan,$jenis,$gambar,$kapasitas,$fasilitas,$harga){
    return "UPDATE bandara SET nama_kendaraan='$nama_kendaraan',jenis='$jenis',gambar='$gambar', kapasitas=$kapasitas, fasilitas='$fasilitas', harga=$harga WHERE id=$bandara_id";
}

function delete_bandara($bandara_id){
    return "DELETE FROM bandara WHERE id = $bandara_id";
}

function create_liburan(){
    return "INSERT INTO liburan (nama_paket, jenis, gambar, lokasi, deskripsi_paket, fasilitas, harga, deskripsi_harga)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
}

function select_liburan($paket_id){
    return "SELECT * FROM liburan WHERE id = $paket_id";
}

function get_liburan(){
    return "SELECT * FROM liburan";
}

function update_liburan($paket_id, $nama_paket, $jenis, $gambar, $lokasi, $deskripsi_paket, $fasilitas, $harga, $deskripsi_harga) {
    return "UPDATE liburan SET nama_paket='$nama_paket',jenis='$jenis' , gambar='$gambar', lokasi='$lokasi', deskripsi_paket='$deskripsi_paket', fasilitas='$fasilitas', harga=$harga, deskripsi_harga='$deskripsi_harga' WHERE id=$paket_id";
}

function delete_liburan($paket_id){
    return "DELETE FROM liburan WHERE id = $paket_id";
}

?>