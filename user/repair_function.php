<?php
session_start();
include('../config/server.php');


if (isset($_POST['repair_btn'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $devicetype = $_POST['devicetype'];
    $building = $_POST['building'];
    $room = $_POST['room'];
    $date = $_POST['date'];
    $message = $_POST['message'];
    $filename = $_FILES['uploadfile']['name'];
    $tempname = $_FILES['uploadfile']['tmp_name'];
    $status = $_POST['status'];
    $folder = "../upload/" . $filename;


    $query = "INSERT INTO repair (name,phone,devicetype,building,room,date,message,filename,status)
            VALUES ('$name','$phone','$devicetype','$building','$room','$date','$message','$filename','$status')";
    $query_run = mysqli_query($connection, $query);

    if (move_uploaded_file($tempname, $folder) && $query_run) {
        $_SESSION['success'] = "แจ้งซ่อมสำเร็จ";
        header('Location: repair_form.php');
    } else {
        $_SESSION['error'] = "แจ้งซ่อมไม่สำเร็จ";
        header('Location: repair_form.php');
    }
}

$result = mysqli_query($connection, "SELECT * FROM repair");
while ($data = mysqli_fetch_array($result)); {
?>
    <img src="<?php echo $data['filename']; ?>">

<?php
}
?>