<div class="modal fade" id="usermodal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="edit.php" method="post">
                        <div class="mb-3">
                            <input type="hidden" name="roomId" value="<?php echo $roomId ?>">
                        </div>
                        <div class="mb-3">
                            <label for="Name" class="col-form-label">ชื่อ:</label>
                            <select name="Name">
                            <?php if ($result) {
                            foreach ($result as $row) { ?>
                                <option value="<?php echo $row['Name'] ?>"><?php echo $row['Name'] ?></option>
                        </div>
                        <div class="mb-3">
                            <label for="Lname" class="col-form-label">นามสกุล:</label>
                            <input type="text" name="Lname" class="form-control" value="<?php echo $row['Lname']; ?>">
                        </div><?php  };
                                } ?>
                        <div class="mb-3">
                            <label for="staID">สถานะห้อง:</label>
                            <select name="staID">
                                <option value="1">จองแล้ว</option>
                                <option value="2">เช่า</option>
                                <option value="3">ว่าง</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="edit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>