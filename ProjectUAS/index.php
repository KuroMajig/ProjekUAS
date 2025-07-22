<?php
include 'db.php';

$sql = "SELECT * FROM tugas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <link rel="stylesheet" href="style.css"> <!-- Link ke file CSS -->
</head>

<body>
    <div class="container">
        <header>
            <h1>Daftar Tugas</h1>
            <a href="tambah.php" class="btn">Tambah Tugas</a>
        </header>

        <table>
            <thead>
                <tr>
                    <th>Tugas</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['tugas']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                            <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-delete">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>

<?php $conn->close(); ?>