<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tugas = $_POST['tugas'];
    $status = $_POST['status'];

    $sql = "INSERT INTO tugas (tugas, status) VALUES ('$tugas', '$status')";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas</title>
</head>

<body>
    <h1>Tambah Tugas</h1>
    <form method="POST">
        <label for="tugas">Tugas:</label>
        <input type="text" name="tugas" id="tugas" required><br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="Belum Selesai">Belum Selesai</option>
            <option value="Selesai">Selesai</option>
        </select><br>

        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">Kembali ke Daftar Tugas</a>
</body>

</html>

<?php $conn->close(); ?>