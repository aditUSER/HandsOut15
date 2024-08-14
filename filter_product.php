<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Products</title>
</head>
<body>
    <h1>Filter Produk Berdasarkan Harga</h1>
    <form method="GET" action="">
        <label for="min_price">Harga Minimum:</label>
        <input type="number" id="min_price" name="min_price" step="0.01" required>
        <button type="submit">Tampilkan Produk</button>
    </form>

    <?php
    if (isset($_GET['min_price'])) {
        $minPrice = (float)$_GET['min_price'];  // Mendapatkan nilai harga minimum dari input pengguna

        try {
            // Konfigurasi database
            $host = 'localhost';
            $db = 'pertemuan15';  // Ganti dengan nama database kamu
            $username = 'root';  // Ganti dengan username database kamu
            $password = '';  // Ganti dengan password database kamu

            // Membuat koneksi ke database menggunakan PDO
            $pdo = new PDO("mysql:host=$host;dbname=$db", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // SQL untuk membaca produk dengan harga di atas nilai tertentu
            $sql = "SELECT name, price FROM products WHERE price > :min_price";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':min_price' => $minPrice]);

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
    }
    ?>
</body>
</html>
