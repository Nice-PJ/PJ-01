<?php
session_start();
include('../config/server.php');

if (isset($_POST['edit_btn'])) {
    $id = $_POST['edit_id'];
    $query = "SELECT * FROM repair WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);
}


if (isset($_POST['update_btn'])) {
    $id = $_POST['edit_id'];
    $name = $_POST['edit_name'];
    $phone = $_POST['edit_phone'];
    $devicetype = $_POST['edit_devicetype'];
    $building = $_POST['edit_building'];
    $room = $_POST['edit_room'];
    $date = $_POST['edit_date'];
    $message = $_POST['edit_message'];
    $status = $_POST['edit_status'];

    $query = "UPDATE repair SET name='$name', phone='$phone', devicetype='$devicetype', building='$building', room='$room', date='$date', message='$message', status='$status'   WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['success'] = "อัปเดตข้อมูลสำเร็จ";
        header('Location: repair_table.php');
    } else {
        $_SESSION['error'] = "อัปเดตข้อมูลไม่สำเร็จ";
        header('Location: repair_table.php');
    }
}