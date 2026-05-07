<?php
session_start();
include('../config/server.php');

if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];
    
    if (isset($_REQUEST['delete_id'])) {
        $id = $_REQUEST['delete_id'];
        $select_stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $select_stmt->bindParam('id', $id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        $delete_stmt = $conn->prepare("DELETE FROM users WHERE id = :id");
        $delete_stmt->bindParam(':id', $id);
        if ($delete_stmt->execute()) {
            $_SESSION['success'] = "ลบข้อมูลสำเร็จสำเร็จ";
            header("location: user_table.php");
        }
    } else {
        $_SESSION['error'] = "มีบางอย่างผิดพลาด";
        header("location: user_table.php");
    }
}
