<?php
$host = '172.17.0.2';
$dbname = 'redlock-web';
$username = 'root';
$password = 'mewmew';
$port = 3306;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

$stmt = $pdo->query('SELECT * FROM users');

echo '<table>';
echo '<tr><th>ID</th><th>Nama</th><th>Alamat</th><th>Jabatan</th></tr>';

while ($row = $stmt->fetch()) {
    echo '<tr>';
    echo '<td>' . $row['ID'] . '</td>';
    echo '<td>' . $row['Nama'] . '</td>';
    echo '<td>' . $row['Alamat'] . '</td>';
    echo '<td>' . $row['Jabatan'] . '</td>';
    echo '</tr>';
}

echo '</table>';
