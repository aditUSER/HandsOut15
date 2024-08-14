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

    // SQL untuk membaca data dari tabel 'products'
    $sql = "SELECT name, price FROM products";
    $stmt = $pdo->query($sql);

    // Menampilkan data dalam tabel HTML
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Price</th></tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>" . htmlspecialchars($row['name']) . "</td><td>" . htmlspecialchars($row['price']) . "</td></tr>";
    }
    echo "</table>";
} catch (PDOException $e) {
    echo "Koneksi atau pembacaan data gagal: " . $e->getMessage();
}
?>
