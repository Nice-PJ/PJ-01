<?php
include('include/header.php');
include('include/navbar.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EditUser-Profile-Repair
        </div>
        <div class="card-body">
            <?php

            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM repair WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach ($query_run as $row) {
            ?>
                    <form action="repair_update.php" method="POST">

                        <input type="hidden" name="edit_id" value="<?php echo $id; ?>">


                        <div class="form-group row">
                            <div class="col-sm-6 mt-2">
                                <label> ชื่อ-นามสกุล </label>
                                <input type="text" name="edit_name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="ชื่อ">
                            </div>
                            <div class="col-sm-6 mt-2">
                                <label> เบอร์โทรศัพท์ </label>
                                <input type="text" name="edit_phone" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="เบอร์โทรศัพท์">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">ประเภทของงานซ่อม</label>
                            <select name="edit_devicetype" id="" class="form-control">
                                <option selected><?php echo $row['devicetype'] ?></option>
                                <option value="งานไฟฟ้า">งานไฟฟ้า</option>
                                <option value="งานซ่อมบำรุง">งานซ่อมบำรุง</option>
                                <option value="งานประปาและสุขาภิบาล">งานประปาและสุขาภิบาล</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="" class="form-label">อาคาร</label>
                                <input type="text" name="edit_building" class="form-control" value="<?php echo $row['building'] ?>" placeholder="อาคาร" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="" class="form-label">ห้อง</label>
                                <input type="text" name="edit_room" id="" class="form-control" value="<?php echo $row['room'] ?>" placeholder="ห้อง" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="edit_date" value="<?php echo $row['date'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">แจ้งข้อมูลเพิ่มเติม</label>
                            <input type="text" name="edit_message" class="form-control" value="<?php echo $row['message'] ?>" placeholder="แจ้งข้อมูลเพิ่มเติม" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">รูปภาพ</label>
                            <div class="col-sm-6 "> 
                                <?php echo '<img src="../upload/' . $row['filename'] . '"width="200px;" alt="image">' ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>สถานะ</label>
                            <select name="edit_status" class="form-control">
                                <option value="กำลังดำเนินการ"> กำลังดำเนินการ </option>
                                <option value="เสร็จสิ้น"> เสร็จสิ้น </option>
                            </select>
                        </div>
                        <a href="repair_table.php" class="btn btn-danger"> ยกเลิก </a>
                        <button type="submit" name="update_btn" class="btn btn-primary"> อัปเดต </button>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include('include/footer.php');
include('include/script.php');
?>