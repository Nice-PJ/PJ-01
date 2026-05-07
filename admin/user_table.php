<?php
include('include/header.php');
include('include/navbar.php');

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
            <form action="user_function.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <label> Username </label>
                        <input type="text" class="form-control mt-2" name="username" placeholder="ชื่อผู้ใช้งาน" required>
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="email" class="form-control mt-2" name="email" placeholder="User@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control mt-2" name="password" placeholder="รหัสผ่าน" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control mt-2" name="c_password" placeholder="ยืนยันรหัสผ่าน" required>
                    </div>
                    <div class="form-group">
                        <label>User Type</label>
                        <select name="urole" class="form-control">
                            <option selected>เลือกประเภทของผู้ใช้</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" name="register_btn" class="btn btn-primary">บันทึก</button>
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
            <h6 class="m-0 font-weight-bold text-primary">User-Profile
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addprofile">
                    เพิ่มข้อมูล
                </button>
            </h6>
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
                            <th>อีเมล</th>
                            <th>รหัสผ่าน</th>
                            <th>ลำดับชั้น</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $select_stmt = $conn->prepare("SELECT * FROM users");
                        $select_stmt->execute();
                        $i = 1;
                        while ($objResult = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td>
                                    <div><?php echo $i; ?></div>
                                </td>
                                <td><?php echo $objResult['username']; ?> </td>
                                <td><?php echo $objResult['email']; ?> </td>
                                <td><?php echo $objResult['password']; ?> </td>
                                <td><?php echo $objResult['urole']; ?> </td>
                                <td><a href="user_edit.php?update_id=<?php echo $objResult['id']; ?>" class="btn btn-success">แก้ไข</a></td>
                                <td>
                                    <form action="user_delete.php" method="post">
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
                            <th>อีเมล</th>
                            <th>รหัสผ่าน</th>
                            <th>ลำดับชั้น</th>
                            <th>แก้ไข</th>
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