<?php
session_start();
if (!isset($_SESSION['data'])) {
    echo "Tidak ada data yang dikirim.";
    exit();
}

$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h2>Hasil Pendaftaran</h2>
        <table>
            <tr><th>Nama</th><td><?= htmlspecialchars($data['name']) ?></td></tr>
            <tr><th>Email</th><td><?= htmlspecialchars($data['email']) ?></td></tr>
            <tr><th>Mata Kuliah</th><td><?= htmlspecialchars($data['matkul']) ?></td></tr>
        </table>

        <h3>Isi File:</h3>
        <table>
            <tr><th>Baris</th><th>Isi</th></tr>
            <?php foreach ($data['fileLines'] as $index => $line): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($line) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
