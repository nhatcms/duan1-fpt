<?php
require_once "MainController.php";
require_once "app/model/MainModel.php";
require_once "app/model/AlertModel.php";

class AccountController extends MainController
{
    public static function accountRegController($Model)
    {
        $Alert = new AlertModel();
        if (isset($_POST["reg-btn"])) {
            $Model = new AccountModel();
            $username = $_POST["username"];
            $phone = $_POST["phone"];
            $password = $_POST["password"];
            $repassword = $_POST["repassword"];
            $email = $_POST["email"];
            $realname = $_POST["realname"];
            $ok = $Model->validateReg(
                $username,
                $email,
                $phone,
                $password,
                $repassword
            );
            if ($ok == true) {
                $Model->addAccToDb(
                    $username,
                    $password,
                    $email,
                    $phone,
                    $realname,
                    $repassword
                );

                $Alert->showAlertWithRedirect(
                    "success",
                    "Thành công",
                    "Chúc mừng bạn đăng ký thành công, đăng nhập ngay",
                    "?action=login"
                );
            } else {
                $Alert->showAlertWithRedirect(
                    "warning",
                    "Thất bại",
                    "{$_SESSION['alert']}",
                    "?action=register"
                );
                unset($_SESSION["alert"]);
            }
        }
        include "app/view/reg.php";
    }

    public static function accountLoginController($Model)
    {
        if (isset($_POST["login-btn"])) {
            $username = isset($_POST["username"])
                ? trim($_POST["username"])
                : null;
            $password = isset($_POST["password"]) ? $_POST["password"] : null;

            if (!$username || !$password) {
                $_SESSION["alert"] = "Vui lòng điền đầy đủ thông tin đăng nhập";
                header("Location: ?action=login");
                exit();
            }

            $Model = new AccountModel();
            $check = $Model->checkLogin($username, $password);

            if ($check) {
                header("Location: ?action=home");
                exit();
            } else {
                header("Location: ?action=login");
                exit();
            }
        }

        include "app/view/login.php";
    }

    public static function accountLogoutController()
    {
        session_destroy();
        session_unset();
        header("Location: ?action=home");
        die();
    }

    public static function accountProfileController()
    {
        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
            $Model = new AccountModel();
            $id = $_SESSION["user_id"];
            $user = $Model->getUserInfo($id);

            if (isset($_POST["update-btn"])) {
                $username = $_POST["username"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $realname = $_POST["realname"];
                $imagePath = $user["imgPath"];

                $ok = $Model->validateAccountInfo(
                    $username,
                    $email,
                    $phone,
                    $realname
                );

                if ($ok == true) {
                    if (
                        isset($_FILES["profile_image"]) &&
                        $_FILES["profile_image"]["error"] == 0
                    ) {
                        $newFileName =
                            uniqid() .
                            "." .
                            pathinfo(
                                $_FILES["profile_image"]["name"],
                                PATHINFO_EXTENSION
                            );
                        $uploadDir = "assets/img/";
                        $uploadPath = $uploadDir . $newFileName;
                        if (
                            move_uploaded_file(
                                $_FILES["profile_image"]["tmp_name"],
                                $uploadPath
                            )
                        ) {
                            $imagePath = $newFileName;
                        } else {
                            $_SESSION["isSuccess"] = false;
                            $_SESSION["alert"] = "Lỗi khi tải ảnh lên";
                            AlertModel::showAlertWithRedirect(
                                "error",
                                "Lỗi khi tải ảnh lên",
                                "OK",
                                "?action=profile&id=" . $id
                            );
                        }
                    }

                    $Model->updateUserInfo(
                        $id,
                        $username,
                        $email,
                        $phone,
                        $realname,
                        $imagePath
                    );
                    AlertModel::showAlertWithRedirect(
                        "success",
                        "Thành công",
                        "Bạn đã cập nhật thông tin cá nhân",
                        "?action=profile&id=" . $id
                    );
                } else {
                    AlertModel::showAlertWithRedirect(
                        "error",
                        "Thất bại",
                        "Thông tin bạn vừa nhập không hợp lệ",
                        "?action=profile&id=" . $id
                    );
                }
            }

            include "app/view/profile.php";
        } else {
            header("Location: ?action=login");
        }
    }
    public static function changePassController()
    {
        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
            $Model = new AccountModel();
            $id = $_SESSION["user_id"];
            $user = $Model->getUserInfo($id);

            if (isset($_POST["change-password-btn"])) {
                $password = $_POST["password"];
                $repassword = $_POST["repassword"];

                if ($password != $repassword) {
                    AlertModel::showAlertWithRedirect(
                        "error",
                        "Thất bại",
                        "Mật khẩu không khớp",
                        "?action=changePass&id=" . $id
                    );
                }

                $ok = $Model->validatePassword($password, $repassword);

                if ($ok == true) {
                    $Model->updatePassword($id, $password);
                    AlertModel::showAlertWithRedirect(
                        "success",
                        "Thành công",
                        "Bạn đã đổi mật khẩu",
                        "?action=changePass&id=" . $id
                    );
                } else {
                    AlertModel::showAlertWithRedirect(
                        "error",
                        "Thất bại",
                        "Mật khẩu không hợp lệ, vui lòng xem lại quy tắc!",
                        "?action=changePass&id=" . $id
                    );
                }
            }

            include "app/view/change-pass.php";
        } else {
            header("Location: ?action=login");
        }
    }
    public static function accountHistoryController()
    {
        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true) {
            $Model = new OrderModel();
            $id = $_SESSION["user_id"];
            $orders = $Model->getOrdersByUserId($id);
            $total_spent = $Model->getTotalSpent($id);
            $order_count = $Model->countOrdersByUserId($id);
            $completed_order = $Model->countCompletedOrdersByUserId($id);
            include "app/view/history.php";
        } else {
            header("Location: ?action=login");
        }
    }
}
