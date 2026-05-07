<?php
session_start();
include('../config/server.php');

if (isset($_POST['update_btn'])) {
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    $urole = $_POST['edit_urole'];

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
    } else if (strlen($_POST['edit_password']) > 20 || strlen($_POST['edit_password']) < 5) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
        header("location: user_table.php");
    } else {
        try {
            if (!isset($_SESSION['error'])) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $update_stmt = $conn->prepare("UPDATE users set username = :uname_up, email = :email_up, password = :pass_up, urole = :urole_up WHERE id = :id");
                $update_stmt->bindParam(":uname_up", $username);
                $update_stmt->bindParam(":email_up", $email);
                $update_stmt->bindParam(":pass_up", $passwordHash);
                $update_stmt->bindParam(":urole_up", $urole);
                $update_stmt->bindParam(":id", $id);
                if ($update_stmt->execute()) {
                    $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
                    header("location: user_table.php");
                }
            } else {
                $_SESSION['error'] = "มีบางอย่างผิดพลาด";
                header("location: user_table.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
