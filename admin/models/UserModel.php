<?php

class UserModel extends MainModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getUserQuanlity()
    {
        $sql = "SELECT COUNT(*) AS quantity FROM users";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result["quantity"];
    }
    public function getUserList()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function changeStatus($id, $status)
    {
        $sql = "UPDATE users SET isActive = $status WHERE id = $id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
    }

    public function addUser(
        $username,
        $realname,
        $email,
        $phoneNumber,
        $password,
        $role,
        $isActive
    ) {
        try {
            $hashedPassword = md5($password);

            $sql = "INSERT INTO users (username, real_name, email, phoneNumber, password, role, isActive) 
                    VALUES (:username, :realname, :email, :phoneNumber, :password, :role, :isActive)";
            $stmt = $this->SUNNY->prepare($sql);

            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":realname", $realname);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phoneNumber", $phoneNumber);
            $stmt->bindParam(":password", $hashedPassword);
            $stmt->bindParam(":role", $role, PDO::PARAM_INT);
            $stmt->bindParam(":isActive", $isActive, PDO::PARAM_BOOL);

            $stmt->execute();
            $_SESSION["isSuccess"] = true;
            $_SESSION["alert"] = "Thêm người dùng mới thành công";
        } catch (PDOException $e) {
            $_SESSION["isSuccess"] = false;
            $_SESSION["alert"] = "Có lỗi xảy ra khi thêm người dùng";
        }
    }

    public function checkUserExists($username, $email, $excludeId = null)
    {
        $sql =
            "SELECT id FROM users WHERE (username = :username OR email = :email)";
        if ($excludeId) {
            $sql .= " AND id != :excludeId";
        }
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        if ($excludeId) {
            $stmt->bindParam(":excludeId", $excludeId, PDO::PARAM_INT);
        }
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }

    public function updateUser(
        $id,
        $username,
        $realname,
        $email,
        $phoneNumber,
        $password = null
    ) {
        try {
            if (!empty($password)) {
                $hashedPassword = md5($password);
                $sql =
                    "UPDATE users SET username = :username, real_name = :realname, email = :email, phoneNumber = :phoneNumber, password = :password, isActive = :isActive, role = :role WHERE id = :id";
                $stmt = $this->SUNNY->prepare($sql);
                $stmt->bindParam(":password", $hashedPassword);
            } else {
                $sql =
                    "UPDATE users SET username = :username, real_name = :realname, email = :email, phoneNumber = :phoneNumber, isActive = :isActive, role = :role WHERE id = :id";
                $stmt = $this->SUNNY->prepare($sql);
            }

            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":realname", $realname);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":phoneNumber", $phoneNumber);
            $stmt->bindParam(":isActive", $_POST["isActive"], PDO::PARAM_INT);
            $stmt->bindParam(":role", $_POST["role"], PDO::PARAM_INT);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            $_SESSION["isSuccess"] = true;
            $_SESSION["alert"] = "Cập nhật người dùng thành công";
        } catch (PDOException $e) {
            error_log("Error updating user: " . $e->getMessage());
            throw new Exception("Có lỗi xảy ra khi cập nhật người dùng.");
        }
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
