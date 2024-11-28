<?php
require_once 'MainController.php';
require_once 'app/model/MainModel.php';
require_once 'app/model/AlertModel.php';

class AccountController extends MainController{
    // register controller
    public static function accountRegController($Model){
        if(isset($_POST['reg-btn'])){
            $Model = new AccountModel();
            $username = $_POST['username'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $email = $_POST['email'];
            $realname = $_POST['realname'];
            $ok = $Model->validateReg($username,$email, $phone, $password, $repassword);
            if($ok==true){
                $Model->addAccToDb($username, $password, $email, $phone, $realname, $repassword);
                $_SESSION['isSucces'] = true;
                $_SESSION['alert'] = 'Đăng ký thành công, mời đăng nhập';
                // header('Location: ?action=login');
            }
        }
        include 'app/view/reg.php';
    }
    // login controller
    public static function accountLoginController($Model)
    {
        if (isset($_POST['login-btn'])) {
            // Kiểm tra và lọc đầu vào
            $username = isset($_POST['username']) ? trim($_POST['username']) : null;
            $password = isset($_POST['password']) ? $_POST['password'] : null;

            if (!$username || !$password) {
                $_SESSION['alert'] = 'Vui lòng điền đầy đủ thông tin đăng nhập';
                header('Location: ?action=login');
                exit;
            }

            // Tạo đối tượng Model và kiểm tra đăng nhập
            $Model = new AccountModel();
            $check = $Model->checkLogin($username, $password);

            if ($check) {
                header('Location: ?action=home');
                exit;
            } else {
                header('Location: ?action=login');
                exit;
            }
        }

        // Bao gồm giao diện login
        include 'app/view/login.php';
    }

    // logout controller
    public static function accountLogoutController(){
        session_destroy();
        session_unset();
        header('Location: ?action=home');
        die();
    }

    //get profile controller

    public static function accountProfileController() {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            $Model = new AccountModel();
            $id = $_SESSION['user_id'];
            $user = $Model->getUserInfo($id); // Dùng $_SESSION['user_id'] thay vì $_SESSION['id']
    
            if (isset($_POST['update-btn'])) {
                // Lấy dữ liệu từ form
                $username = $_POST['username'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $realname = $_POST['realname'];
                $imagePath = $user['imgPath']; // Giữ nguyên ảnh nếu không cập nhật
    
                // Kiểm tra thông tin người dùng
                $ok = $Model->validateAccountInfo($username, $email, $phone, $realname);
                
                if ($ok == true) {
                    // Xử lý ảnh nếu có
                    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
                        // Tạo tên ngẫu nhiên cho ảnh
                        $newFileName = uniqid() . '.' . pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
                        $uploadDir =  'assets/img/'; // Đảm bảo sử dụng đường dẫn chính xác
                        $uploadPath = $uploadDir . $newFileName;
                            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $uploadPath)) {
                            $imagePath = $newFileName; 
                        } else {
                            $_SESSION['isSuccess'] = false;
                            $_SESSION['alert'] = 'Lỗi khi tải ảnh lên';
                            AlertModel::showAlertWithRedirect('error', 'Lỗi khi tải ảnh lên', 'OK', '?action=profile&id=' . $id);
                        }
                    }
    
                    // Cập nhật thông tin người dùng và ảnh đại diện
                    $Model->updateUserInfo($id, $username, $email, $phone, $realname, $imagePath);
                    AlertModel::showAlertWithRedirect('success', 'Thành công', 'Bạn đã cập nhật thông tin cá nhân', '?action=profile&id=' . $id);
                    // exit();
                } else {
                    AlertModel::showAlertWithRedirect('error', 'Thất bại', 'Thông tin bạn vừa nhập không hợp lệ', '?action=profile&id=' . $id);
                    // exit();
                }
            }
    
            // Gọi view profile.php để hiển thị thông tin người dùng
            include 'app/view/profile.php';
        } else {
            // Chuyển hướng người dùng chưa đăng nhập về trang login
            header('Location: ?action=login');
        }
    }
    public static function changePassController(){
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            $Model = new AccountModel();
            $id = $_SESSION['user_id'];
            $user = $Model->getUserInfo($id);
    
            if (isset($_POST['change-password-btn'])) {
                $password = $_POST['password'];
                $repassword = $_POST['repassword'];
    
                if ($password != $repassword) {
                    AlertModel::showAlertWithRedirect('error', 'Thất bại', 'Mật khẩu không khớp', '?action=changePass&id=' . $id);
                }
    
                $ok = $Model->validatePassword($password, $repassword);
    
                if ($ok == true) {
                    $Model->updatePassword($id, $password);
                    AlertModel::showAlertWithRedirect('success', 'Thành công', 'Bạn đã đổi mật khẩu', '?action=changePass&id=' . $id);
                    // exit();
                } else {
                    AlertModel::showAlertWithRedirect('error', 'Thất bại', 'Mật khẩu không hợp lệ, vui lòng xem lại quy tắc!', '?action=changePass&id=' . $id);
                    // exit();
                }
            }
    
            include 'app/view/change-pass.php';
        } else {
            header('Location: ?action=login');
        }
    }
    
    


}