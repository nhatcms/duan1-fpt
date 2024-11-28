<?php
require_once 'MainModel.php';


class AccountModel extends MainModel
{
    public $SUNNY;
    public function __construct()
    {
        $this->SUNNY = $this->dbConnect();
    }

    // Add account to database
    public function addAccToDb($username, $password, $email, $phone, $realname, $repassword)
    {


        // Hash password
        $password = md5($password);
        $sql = "INSERT INTO users (username, password, email, phoneNumber, real_name) VALUES (:username, :password, :email, :phone, :realname)";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password,
            ':email' => $email,
            ':phone' => $phone,
            ':realname' => $realname
        ]);
        $_SESSION['isSuccess'] = true;
        $_SESSION['alert'] = 'Đăng ký thành công, mời đăng nhập';
        return true;
    }

    // Validate registration
    public function validateReg($username,$email,$phone, $password, $repassword)
    {
        if (strlen($username) < 5) {
            $_SESSION['alert'] = 'Tên đăng nhập phải có tối thiểu 5 kí tự';
            return false;
        }
        if (strlen($password) < 8) {
            $_SESSION['alert'] = 'Mật khẩu phải có tối thiểu 8 kí tự';
            return false;
        }
        if (!preg_match('/[0-9]/', $password)) {
            $_SESSION['alert'] = 'Mật khẩu phải chứa ít nhất 1 số';
            return false;
        }
        if (!preg_match('/[!@#$%^&*()]/', $password)) {
            $_SESSION['alert'] = 'Mật khẩu phải chứa ít nhất 1 kí tự đặc biệt';
            return false;
        }
        if ($password != $repassword) {
            $_SESSION['alert'] = 'Mật khẩu nhập lại không khớp';
            return false;
        }
        //check trùng username, email, phone
        $sql = "SELECT * FROM users WHERE username = :username OR email = :email OR phoneNumber = :phone";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':phone' => $phone
        ]);
        $user = $stmt->fetch();
        if ($user) {
            $_SESSION['alert'] = 'Tên đăng nhập hoặc email hoặc số điện thoại đã tồn tại';
            return false;
        }
        return true;
    }
    function validateAccountInfo($username, $email, $phone, $realName) {
        // Kiểm tra tên đăng nhập (tối thiểu 5 ký tự, không có ký tự đặc biệt)
        if (strlen($username) < 5 || !preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            return false;
        }
    
        // Kiểm tra tên thật (không chứa số và ký tự đặc biệt)
        if (!preg_match('/^[\p{L}\s]+$/u', $realName)) {
            return false;
        }        
    
        // Kiểm tra email (định dạng email hợp lệ)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
    
        // Kiểm tra số điện thoại (phải là số và có 10 hoặc 11 chữ số)
        if (!preg_match('/^\d{10,11}$/', $phone)) {
            return false;
        }
    
        return true; // Nếu tất cả đều hợp lệ
    }
    
    public function validatePassword($password, $repassword)
    {
        if (strlen($password) < 8) {
            $_SESSION['alert'] = 'Mật khẩu phải có tối thiểu 8 kí tự';
            return false;
        }
        if (!preg_match('/[0-9]/', $password)) {
            $_SESSION['alert'] = 'Mật khẩu phải chứa ít nhất 1 số';
            return false;
        }
        if (!preg_match('/[!@#$%^&*()]/', $password)) {
            $_SESSION['alert'] = 'Mật khẩu phải chứa ít nhất 1 kí tự đặc biệt';
            return false;
        }
        if ($password != $repassword) {
            $_SESSION['alert'] = 'Mật khẩu nhập lại không khớp';
            return false;
        }
        return true;
    }
    public function updateUserInfo($id, $username, $email, $phone, $realname, $imgPath)
    {
        $sql = "UPDATE users SET username = :username, email = :email, phoneNumber = :phone, real_name = :realname, imgPath = :imgPath WHERE id = :id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':username' => $username,
            ':email' => $email,
            ':phone' => $phone,
            ':realname' => $realname,
            ':imgPath' => $imgPath
        ]);
        return true;
    }
    // Check login
    public function checkLogin($username, $password)
    {
        try {
            // Mã hóa mật khẩu
            $password = md5($password);

            // Câu truy vấn
            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $this->SUNNY->prepare($sql);

            // Thực thi truy vấn
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch();

            // Kiểm tra người dùng
            if (!$user || $user['password'] !== $password) {
                $_SESSION['alert'] = 'Thông tin đăng nhập không chính xác';
                return false;
            }

            // Kiểm tra tài khoản có bị khóa không
            if ((int)$user['isActive'] === 0) {
                $_SESSION['alert'] = 'Tài khoản đã bị cấm, liên hệ quản trị viên để biết thêm chi tiết';
                return false;
            }

            // Lưu thông tin người dùng vào session
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['real_name'];
            $_SESSION['phone'] = $user['phoneNumber'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = true;

            return true;
        } catch (PDOException $e) {
            // Log lỗi hoặc thông báo lỗi khi cần
            error_log("Database error: " . $e->getMessage());
            $_SESSION['alert'] = 'Đã xảy ra lỗi hệ thống, vui lòng thử lại sau';
            return false;
        }
    }


    // check login status
    public function checkLoginStatus()
    {
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
            header('Location: ?action=login');
            die();
        }
    }
    // Get user info
    public function getUserInfo($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
    // Change password
    public function updatePassword($id, $password)
    {
        $password = md5($password);
        $sql = "UPDATE users SET password = :password WHERE id = :id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':password' => $password
        ]);
        return true;
    }
     
}

$AccountModel = new AccountModel();
