<?php
// index.php - Halaman utama Hiker Best
include 'insert.php'; // koneksi database

// CREATE: tambah data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO login_pendaki (username, email, pasword) 
            VALUES ('$username', '$email', '$password')";
    $conn->query($sql);
}

// DELETE: hapus data berdasarkan id
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM login_pendaki WHERE id=$id");
}

// READ: ambil semua data
$result = $conn->query("SELECT * FROM login_pendaki");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hiker Best - Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to top, #2c3e50, #27ae60);
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        h2 { margin-bottom: 20px; }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: #ecf0f1;
            color: #2c3e50;
        }
        th, td {
            border: 1px solid #2c3e50;
            padding: 8px;
        }
        th { background: #27ae60; color: #fff; }
        a { color: #c0392b; text-decoration: none; }
        a:hover { text-decoration: underline; }
        .form-container {
            margin: 20px auto;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            width: 300px;
            color: #2c3e50;
        }
        input, button {
            width: 90%;
            padding: 8px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background: #27ae60;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover { background: #1e8449; }
    </style>
</head>
<body>
    <h2>🏔️ Selamat datang di Hiker Best</h2>

    <div class="form-container">
        <h3>Tambah Data Pendaki</h3>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="add">Tambah</button>
        </form>
    </div>

    <h3>Daftar Pendaki</h3>
    <table>
        <tr>
            <th>ID</th><th>Username</th><th>Email</th><th>Password</th><th>Aksi</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['pasword'] ?></td>
            <td><a href="?delete=<?= $row['id'] ?>">Hapus</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
