<?php 
session_start();
include('../config/server.php');


if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM repair WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "ลบข้อมูลสำเร็จ";
        header('Location: repair_table.php'); 
    }
    else
    {
        $_SESSION['error'] = "ลบข้อมูลไม่สำเร็จ";       
        header('Location: repair_table.php'); 
    }    
}

?>