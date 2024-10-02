<?php
session_start();
// Cek apakah pengguna sudah login
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Digital Library Management</title>
</head>
<body>
    <header>
        <h1>Selamat Datang di Dasbor Anda</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="books.php">Kelola Buku</a></li>
                <li><a href="users.php">Kelola Pengguna</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
        <h2>Hello, <?php echo isset($user['name']) ? htmlspecialchars($user['name']) : 'User'; ?>!</h2>
        <p>Nama pengguna Anda dari cookies: <?php echo isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : 'Not set'; ?></p>
            <p>Berikut adalah statistik Anda saat ini:</p>
            <ul>
                <li>Total Buku: 150</li>
                <li>Total Pengguna: 50</li>
                <li>Books Borrowed: 25</li>
            </ul>
        </section>

        <section>
            <h2>Aksi Cepat</h2>
            <ul>
                <li><a href="add-book.php">Tambah Buku Baru</a></li>
                <li><a href="view-borrowed.php">Lihat Buku yang Dipinjam</a></li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Digital Library Management. All rights reserved.</p>
    </footer>
</body>
</html>
