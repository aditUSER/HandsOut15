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

    // SQL untuk memperbarui harga produk dengan id 1
    $sql = "UPDATE products SET price = :price WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':price' => 17500.00,
        ':id' => 1
    ]);

    echo "Harga produk berhasil diperbarui.";
} catch (PDOException $e) {
    echo "Koneksi atau pembaruan data gagal: " . $e->getMessage();
}
?>
