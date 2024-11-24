<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $matkul = $_POST['matkul'];
    $password = $_POST['password'];
    $file = $_FILES['file'];
    $errors = [];

    // Validasi server-side
    if (empty($name) || strlen($name) < 3) $errors[] = "Nama minimal 3 karakter.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email tidak valid.";
    if (empty($matkul)) $errors[] = "Mata kuliah harus dipilih.";
    if (strlen($password) < 6) $errors[] = "Password minimal 6 karakter.";
    if ($file['error'] !== 0 || $file['type'] !== 'text/plain' || $file['size'] > 2 * 1024 * 1024) {
        $errors[] = "File harus berupa teks (txt) dan maksimal 2MB.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) echo "<p style='color:red;'>$error</p>";
        echo "<a href='form.php'>Kembali</a>";
        exit();
    }

    // Membaca file
    $fileContent = file_get_contents($file['tmp_name']);
    $fileLines = explode("\n", $fileContent);

    // Simpan data ke sesi dan redirect
    session_start();
    $_SESSION['data'] = [
        'name' => $name,
        'email' => $email,
        'matkul' => $matkul,
        'password' => $password,
        'fileLines' => $fileLines
    ];
    header("Location: result.php");
    exit();
}
?>
