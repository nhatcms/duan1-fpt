<?php
require_once "Main.php";
class AuthModel extends MainModel
{
    public function login()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = '1'";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            $_SESSION["id"] = $result["id"];
            $_SESSION["username"] = $result["username"];
            $_SESSION["real_name"] = $result["real_name"];
            $_SESSION["password"] = $result["password"];
            $_SESSION["role"] = $result["role"];
            header("Location: ?action=home");
        } else {
            $_SESSION["error"] = "Tài khoản hoặc mật khẩu không đúng";
            header("Location: ?action=login");
        }
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: ?action=login");
    }
    public function check_login()
    {
        if (
            !isset($_SESSION["username"]) ||
            !isset($_SESSION["password"]) ||
            !isset($_SESSION["role"]) ||
            $_SESSION["role"] != "1"
        ) {
            header("Location: ?action=login");
            die();
        }
    }
}
$AuthModel = new AuthModel();
