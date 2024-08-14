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

    // ID produk yang akan dihapus
    $productId = 2;  // Ganti dengan ID produk yang ingin dihapus

    // SQL untuk menghapus produk berdasarkan id
    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $productId]);

    echo "Produk dengan ID $productId berhasil dihapus.";
} catch (PDOException $e) {
    echo "Koneksi atau penghapusan data gagal: " . $e->getMessage();
}
?>
