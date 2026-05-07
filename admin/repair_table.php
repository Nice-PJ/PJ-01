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

<!-- addprofile modal-->
<div class="modal fade" id="addprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="repair_function.php" method="POST" enctype="multipart/form-data">

                <div class="modal-body">

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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" name="repair_btn" class="btn btn-primary">บันทึก</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!--end addprofile modal-->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <h6 class="m-0 font-weight-bold text-primary">Repair-Form
                    <button type="button" class="ml-2 btn btn-primary" data-toggle="modal" data-target="#addprofile">
                        เพิ่มข้อมูล
                    </button>
                </h6>
                <a href="excel.php" class="ml-3 btn btn-success">Export</a>
            </div>
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
            <?php if (isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php
                    echo $_SESSION['warning'];
                    unset($_SESSION['warning']);
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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ไอดี </th>
                            <th>ชื่อ</th>
                            <th>เบอร์โทร</th>
                            <th>ประเภท</th>
                            <th>อาคาร</th>
                            <th>ห้อง</th>
                            <th>วันที่</th>
                            <th>ข้อมูลเพิ่มเติม</th>
                            <th>สถานะ</th>
                            <th>รายละเอียด</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM repair";
                        $query_run = mysqli_query($connection, $query);
                        $i = 1;
                        while ($objResult = mysqli_fetch_array($query_run)) {
                        ?>
                            <tr>
                                <td>
                                    <div><?php echo $i; ?></div>
                                </td>
                                <td><?php echo $objResult['name']; ?> </td>
                                <td><?php echo $objResult['phone']; ?> </td>
                                <td><?php echo $objResult['devicetype']; ?> </td>
                                <td><?php echo $objResult['building']; ?> </td>
                                <td><?php echo $objResult['room']; ?> </td>
                                <td><?php echo $objResult['date']; ?> </td>
                                <td><?php echo $objResult['message']; ?> </td>
                                <td><?php echo $objResult['status']; ?> </td>
                                <td>
                                    <form action="repair_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $objResult['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> ข้อมูล </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="repair_delete.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $objResult['id']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> ลบ </button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ไอดี </th>
                            <th>ชื่อ</th>
                            <th>เบอร์โทร</th>
                            <th>ประเภท</th>
                            <th>อาคาร</th>
                            <th>ห้อง</th>
                            <th>วันที่</th>
                            <th>ข้อมูลเพิ่มเติม</th>
                            <th>สถานะ</th>
                            <th>รายละเอียด</th>
                            <th>ลบ</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
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