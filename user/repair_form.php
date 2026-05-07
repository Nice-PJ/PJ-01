<?php
include('include/header.php');
include('include/navbar.php');

date_default_timezone_set('Asia/Bangkok');
$dayTH = ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'];
$monthTH = [null, 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
$monthTH_brev = [null, 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];

function thai_date_and_time($time)
{
    global $dayTH, $monthTH;
    $thai_date_return = date("j", $time);
    $thai_date_return .= " " . $monthTH[date("n", $time)];
    $thai_date_return .= " " . (date("Y", $time) + 543);
    $thai_date_return .= " เวลา " . date("H:i:s", $time);
    return $thai_date_return;
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Repair-Form
        </div>
        <div class="card-body">
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <form action="repair_function.php" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-6 mt-2">
                        <label>ชื่อ-นามสกุล</label>
                        <input type="text" name="name" class="form-control" placeholder="ชื่อ-นามสกุล" required>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <label>เบอร์โทรศัพท์</label>
                        <input type="tel" name="phone" id="" class="form-control" placeholder="06x-xxx-xxx" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>ประเภทของงานซ่อม</label>
                    <select name="devicetype" id="" class="form-control">
                        <option selected>เลือกประเภทของงานซ่อม</option>
                        <option value="งานไฟฟ้า">งานไฟฟ้า</option>
                        <option value="งานซ่อมบำรุง">งานซ่อมบำรุง</option>
                        <option value="งานประปาและสุขาภิบาล">งานประปาและสุขาภิบาล</option>
                    </select>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mt-2">
                        <label>อาคาร</label>
                        <input type="text" name="building" class="form-control" placeholder="อาคาร" required>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <label>ห้อง</label>
                        <input type="text" name="room" id="" class="form-control" placeholder="ห้อง" required>
                    </div>
                </div>
                <div class="form-group">
                    <!-- <label>วันที่</label> -->
                    <input type="hidden" name="date" class="form-control" value="<?= thai_date_and_time(time()) ?>" required>
                </div>
                <div class="form-group">
                    <label>แจ้งข้อมูลเพิ่มเติม</label>
                    <textarea type="text" name="message" class="form-control" rows="3" placeholder="แจ้งข้อมูลเพิ่มเติม" required></textarea>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 mt-2">
                        <label>รูปภาพ</label>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <input type="file" name="uploadfile" value="" />
                    </div>
                </div>
                <input type="hidden" name="status" value="กำลังดำเนินการ">
                <button type="submit" name="repair_btn" class="btn btn-primary w-100"> แจ้งซ่อม </button>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php
include('include/footer.php');
include('include/script.php');
?>