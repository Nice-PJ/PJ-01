<?php
include('include/header.php');
include('include/navbar.php');

if (isset($_REQUEST['update_id'])){
    try{
        $id = $_REQUEST['update_id'];
        $select_stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
        $select_stmt->bindParam('id',$id);
        $select_stmt->execute();
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
        extract($row);
    }catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EditUser-Profile
        </div>
        <div class="card-body">
            <form action="user_update.php" method="POST">

                <input type="hidden" name="edit_id" value="<?php echo $id; ?>">

                <div class="form-group">
                    <label> ชื่อ </label>
                    <input type="text" name="edit_username" value="<?php echo $username; ?>" class="form-control" placeholder="ชื่อ" required>
                </div>
                <div class="form-group">
                    <label>อีเมล</label>
                    <input type="email" name="edit_email" value="<?php echo $email; ?>" class="form-control" placeholder="User@gmail.com" required>
                </div>
                <div class="form-group">
                    <label>รหัสผ่านใหม่</label>
                    <input type="password" name="edit_password" value="<?php echo $password; ?>" class="form-control" placeholder="รหัสผ่านใหม่" required>
                </div>
                <div class="form-group">
                    <label>ลำดับชั้น</label>
                    <select name="edit_urole" class="form-control">
                        <option value="user"> User </option>
                        <option value="admin"> Admin </option>
                    </select>
                </div>

                <a href="user_table.php" class="btn btn-danger"> ยกเลิก </a>
                <button type="submit" name="update_btn" class="btn btn-primary"> อัปเดต </button>
            </form>
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