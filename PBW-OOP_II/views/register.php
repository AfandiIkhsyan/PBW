<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Digital Library Management</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="daftar-container">
        <h1>Buat Akun Anda</h1>
        <form action="register.php" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="role">Peran</label>
                <select id="role" name="role" required>
                    <option value="" disabled selected>Pilih peran Anda</option>
                    <option value="user">Pengguna</option>
                    <option value="librarian">Pustakawan</option>
                </select>
            </div>
            <button type="submit" class="btn-primary">Daftar</button>
        </form>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
    </div>
</body>
</html>
