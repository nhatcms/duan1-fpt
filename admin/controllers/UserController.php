<?php
require_once "Main.php";

require_once "models/UserModel.php";
require_once "models/AuthModel.php";
require_once "models/AlertModel.php";

class UserController
{
    public function __construct()
    {
    }
    public static function userController()
    {
        $authModel = new AuthModel();
        $authModel->check_login();
        $userModel = new UserModel();
        $users = $userModel->getUserList();
        require_once "views/user.php";
    }

    public static function addUserController()
    {
        $authModel = new AuthModel();
        $authModel->check_login();

        $alertModel = new AlertModel();
        $userModel = new UserModel();
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = trim($_POST["username"]);
            $realname = trim($_POST["realname"]);
            $email = trim($_POST["email"]);
            $phoneNumber = trim($_POST["phoneNumber"]);
            $password = trim($_POST["password"]);
            $confirmPassword = trim($_POST["confirm_password"]);
            $role = intval(trim($_POST["role"]));
            $isActive = isset($_POST["isActive"]) ? 1 : 0;

            if (empty($username) || strlen($username) < 3) {
                $errors[] = "Username phải có ít nhất 3 ký tự.";
            }
            if (
                preg_match(
                    '/[0-9\/.,!#$%^&*()_+=:;\'"<>?{}\[\]\\|~`]/u',
                    $realname
                )
            ) {
                $errors[] =
                    "Real Name không được chứa số hoặc các ký tự đặc biệt.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email không hợp lệ.";
            }
            if (!preg_match('/^\d{10}$/', $phoneNumber)) {
                $errors[] = "Số điện thoại phải có 10 chữ số.";
            }
            if (strlen($password) < 8 || $password !== $confirmPassword) {
                $errors[] = "Password dưới 8 kí tự hoặc không khớp.";
            }
            if (!in_array($role, [1, 2, 3])) {
                $errors[] = "Role không hợp lệ.";
            }
            if ($userModel->checkUserExists($username, $email)) {
                $errors[] = "Username hoặc Email đã tồn tại.";
            }

            if (!empty($errors)) {
                $alertModel->showAlert(
                    "warning",
                    "Lỗi",
                    implode("<br>", $errors),
                    "?action=addUser"
                );
                //clear errors
                $errors = []; 
            } else {
                $userModel->addUser(
                    $username,
                    $realname,
                    $email,
                    $phoneNumber,
                    $password,
                    $role,
                    $isActive
                );
                $_SESSION["success"] = "Thêm người dùng thành công.";
                header("Location: ?action=user");
                exit();
            }
        }

        require_once "views/add-user.php";
    }

    public static function updateUserController($id)
    {
        $authModel = new AuthModel();
        $authModel->check_login();
        $alertModel = new AlertModel();
        $userModel = new UserModel();
        $errors = [];

        $currentUser = $userModel->getUserById($_SESSION["id"]);
        $userToUpdate = $userModel->getUserById($id);

        if (
            $currentUser["role"] == "1" &&
            $userToUpdate["role"] == "1" &&
            $currentUser["id"] != $id
        ) {
            $alertModel->showAlertWithRedirect(
                "warning",
                "Lỗi",
                "Bạn không có quyền sửa thông tin của admin khác.",
                "?action=user"
            );
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST["id"];
            $username = trim($_POST["username"]);
            $realname = trim($_POST["realname"]);
            $phoneNumber = trim($_POST["phoneNumber"]);
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);
            $confirmPassword = trim($_POST["repassword"]);

            if (empty($username) || strlen($username) < 3) {
                $errors[] = "Username phải có ít nhất 3 ký tự.";
            }

            if (
                preg_match(
                    '/[0-9\/.,!#$%^&*()_+=:;\'"<>?{}\[\]\\|~`]/u',
                    $realname
                )
            ) {
                $errors[] =
                    "Real Name không được chứa số hoặc các ký tự đặc biệt.";

                $errors[] = "Real Name chỉ được chứa chữ và khoảng trắng.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email không hợp lệ.";
            }

            if (!empty($password)) {
                if (strlen($password) < 8) {
                    $errors[] = "Password phải có ít nhất 8 ký tự.";
                }
                if ($password !== $confirmPassword) {
                    $errors[] = "Password và Re-Password không khớp.";
                }
            }

            if (!preg_match('/^\d{10}$/', $phoneNumber)) {
                $errors[] = "Số điện thoại phải gồm 10 chữ số.";
            }

            if (
                $userModel->checkUserExists(
                    $username,
                    $email,
                    $id,
                    $phoneNumber
                )
            ) {
                $errors[] =
                    "Username hoặc Email hoặc số điện thoại đã tồn tại.";
            }

            if (!empty($errors)) {
                $alertModel->showAlertWithRedirect(
                    "warning",
                    "Lỗi",
                    implode("<br>", $errors),
                    "?action=updateUser&id=" . $id
                );
            } else {
                $userModel->updateUser(
                    $id,
                    $username,
                    $realname,
                    $email,
                    $phoneNumber,
                    $password
                );
                $_SESSION["success"] =
                    "Cập nhật thông tin người dùng thành công.";
                header("Location: ?action=user");
                exit();
            }
        }

        $user = $userModel->getUserById($id);

        require_once "views/edit-user.php";
    }
}
