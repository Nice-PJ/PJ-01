<?php
session_start();
include('../config/server.php');


if (isset($_POST['register_btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $urole = $_POST['urole'];

    if (empty($username)) {
        $_SESSION['error'] = 'กรุณากรอกชื่อผู้ใช้';
        header("location: user_table.php");
    } else if (empty($email)) {
        $_SESSION['error'] = 'กรุณากรอกอีเมล';
        header("location: user_table.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
        header("location: user_table.php");
    } else if (empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกรหัสผ่าน';
        header("location: user_table.php");
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
        header("location: user_table.php");
    } else if (empty($c_password)) {
        $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
        header("location: user_table.php");
    } else if ($password != $c_password) {
        $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
        header("location: user_table.php");
    } else {
        try {
            if (!isset($_SESSION['error'])) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("INSERT INTO users(username, email, password, urole) 
                                            VALUES(:username, :email, :password, :urole)");
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":email", $email);
                $stmt->bindParam(":password", $passwordHash);
                $stmt->bindParam(":urole", $urole);
                $stmt->execute();
                $_SESSION['success'] = "เพิ่มโปรไฟล์สำเร็จ";
                header("location: user_table.php");
            } else {
                $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                header("location: user_table.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
