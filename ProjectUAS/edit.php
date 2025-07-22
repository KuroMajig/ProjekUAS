<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data tugas dari database
    $sql = "SELECT * FROM tugas WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tugas = $_POST['tugas'];
    $status = $_POST['status'];

    $sql = "UPDATE tugas SET tugas = '$tugas', status = '$status' WHERE id = $id";

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
    <title>Edit Tugas</title>
</head>

<body>
    <h1>Edit Tugas</h1>
    <form method="POST">
        <label for="tugas">Tugas:</label>
        <input type="text" name="tugas" id="tugas" value="<?php echo $row['tugas']; ?>" required><br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="Belum Selesai" <?php echo $row['status'] == 'Belum Selesai' ? 'selected' : ''; ?>>Belum Selesai
            </option>
            <option value="Selesai" <?php echo $row['status'] == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
        </select><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
    <a href="index.php">Kembali ke Daftar Tugas</a>
</body>

</html>

<?php $conn->close(); ?>