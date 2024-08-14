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

    // SQL untuk menambahkan data ke tabel 'products'
    $sql = "INSERT INTO products (name, price) VALUES (:name, :price)";

    // Menyiapkan dan menjalankan statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':name' => 'Laptop',
        ':price' => 15000.00
    ]);

    echo "Data berhasil ditambahkan.";
} catch (PDOException $e) {
    echo "Koneksi atau penambahan data gagal: " . $e->getMessage();
}
?>
