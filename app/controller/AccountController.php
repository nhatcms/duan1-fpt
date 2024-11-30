<?php
require_once "MainController.php";
require_once "app/model/MainModel.php";
require_once "app/model/AlertModel.php";
require_once "app/model/MailModel.php";

class AccountController extends MainController
{
    public static function accountRegController($Model)
    {
        $Alert = new AlertModel();
        $Mail = new MailModel();
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
                $htmlContent = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                margin: 0;
                                padding: 0;
                                background-color: #f7f7f7;
                                color: #333;
                            }
                            .email-container {
                                max-width: 600px;
                                margin: 20px auto;
                                background-color: #ffffff;
                                border-radius: 8px;
                                overflow: hidden;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            }
                            .email-header {
                                background-color: #4CAF50;
                                color: white;
                                text-align: center;
                                padding: 15px;
                            }
                            .email-header img {
                                max-width: 100px;
                                margin-bottom: 10px;
                            }
                            .email-body {
                                padding: 20px;
                            }
                            .email-body h1 {
                                font-size: 24px;
                                margin-bottom: 20px;
                            }
                            .email-body p {
                                font-size: 16px;
                                line-height: 1.5;
                                margin-bottom: 20px;
                            }
                            .email-footer {
                                text-align: center;
                                font-size: 14px;
                                color: #777;
                                padding: 10px 20px;
                                background-color: #f1f1f1;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="email-container">
                            <div class="email-header">
                                <h2>Mobile Land!</h2>
                            </div>
                            <div class="email-body">
                                <h1>Chúc mừng bạn đã đăng ký tài khoản thành công!</h1>
                                <p>Xin chào, </p>
                                <p>Cảm ơn vì đã trở thành 1 phần của chúng tôi. Email này sẽ được dùng để nhận thông báo, khuyến mãi và khôi phục mật khẩu</p>
                                <p>Nếu có bất kỳ câu hỏi nào, liên hệ quản trị viên để được hỗ trợ (24/7).</p>
                            </div>
                            <div class="email-footer">
                                &copy; 2024 Mobile Land. All rights reserved.
                            </div>
                        </div>
                    </body>
                    </html>';
                $Mail->sendMail($email, "Mobile Land - Đăng ký thành công", $htmlContent);
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
                $currentPass = $_POST["currentpass"];
                $userPass = $user["password"];
                $password = $_POST["password"];
                $repassword = $_POST["repassword"];
                if (md5($currentPass) != $userPass) {
                    AlertModel::showAlertWithRedirect(
                        "error",
                        "Thất bại",
                        "Mật khẩu hiện tại không đúng",
                        "?action=changePass&id=" . $id
                    );
                    die();
                }
                if ($password != $repassword) {
                    AlertModel::showAlertWithRedirect(
                        "error",
                        "Thất bại",
                        "Mật khẩu nhập lại không khớp",
                        "?action=changePass&id=" . $id
                    );
                    die();
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
                    $mailContent = "
                    <!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Password Change Confirmation</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-color: #f9f9f9;
                                color: #333;
                                margin: 0;
                                padding: 0;
                            }
                            .email-container {
                                max-width: 600px;
                                margin: 20px auto;
                                background-color: #ffffff;
                                border-radius: 8px;
                                overflow: hidden;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            }
                            .email-header {
                                background-color: #4d4d4d;
                                color: white;
                                text-align: center;
                                padding: 20px;
                            }
                            .email-body {
                                padding: 20px;
                            }
                            .email-body h1 {
                                font-size: 22px;
                                margin-bottom: 20px;
                            }
                            .email-body p {
                                font-size: 16px;
                                line-height: 1.5;
                                margin-bottom: 10px;
                            }
                            .email-footer {
                                text-align: center;
                                font-size: 14px;
                                color: #777;
                                padding: 10px;
                                background-color: #f1f1f1;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='email-container'>
                            <div class='email-header'>
                                <h2>Mobile Land</h2>
                            </div>
                            <div class='email-body'>
                                <h1>Đổi mật khẩu thành công</h1>
                                <p>Xin chào,</p>
                                <p>Mật khẩu của bạn đã được đổi thành công. Nếu bạn không phải người thực hiện, lập tức liên hệ QTV để xử lý.</p>
                                <p>Cảm ơn bạn đã tin tưởng MobileLand.</p>
                            </div>
                            <div class='email-footer'>
                                &copy; 2024 Mobile Land. All rights reserved.
                            </div>
                        </div>
                    </body>
                    </html>
                    ";
                    MailModel::sendMail(
                        $user["email"],
                        "Mobile Land - Đổi mật khẩu thành công",
                        $mailContent
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
