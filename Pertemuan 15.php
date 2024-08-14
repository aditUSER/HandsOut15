<?php
try {
    // Konfigurasi database
    $host = 'localhost';
    $db = 'pertemuan15';  // Ganti dengan nama database kamu
    $username = 'root';  // Ganti dengan username database kamu
    $password = '';  // Ganti dengan password database kamu

    // Membuat koneksi ke database menggunakan PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL untuk membuat tabel 'products'
    $sql = "
        CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            price FLOAT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";

    // Menjalankan query
    $pdo->exec($sql);

    echo "Tabel 'products' berhasil dibuat.";
} catch (PDOException $e) {
    echo "Koneksi atau pembuatan tabel gagal: " . $e->getMessage();
}
?>
