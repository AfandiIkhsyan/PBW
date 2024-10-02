<?php
require_once 'models/UserModel.php';

class AuthController {
    private $db;
    private $user;

    public function __construct($db) {
        $this->db = $db;
        $this->user = new UserModel($this->db);
    }

    public function login($username, $password) {
        $this->user->username = $username;
        $stmt = $this->user->authenticate();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            setcookie('username', $user['username'], time() + (86400 * 30), "/"); // 86400 = 1 hari
            header("Location: views/dashboard.php");
        } else {
            echo "Login Gagal";
        }
    }

    public function register($username, $password, $role) {
        $this->user->username = $username;
        $this->user->password = $password;
        $this->user->role = $role;
    
        if ($this->user->createUser()) {
            header("Location: login.php");
        } else {
            echo "Pendaftaran Gagal";
        }
    }

    public function logout() {
        session_destroy();
        setcookie('username', '', time() - 3600, "/");
        header("Location: login.php");
    }
}
?>
