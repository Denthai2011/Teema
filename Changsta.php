<div class="modal fade" id="chang.php?Mo_Id=<?php echo $row['Mo_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title" id="exampleModalLabel">จัดการ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="Changdata.php" method="post">
                    <div class="mb-3">
                        <input type="text" name="roomId" readonly value="<?php echo $row['roomId']; ?>">
                        <input type="text" name="Date_cack" readonly value="<?php echo $row['Date_cack']; ?>">
                    </div>
                    <h4 style="color: red;">เจ้าของห้องได้มีการชำระเเล้วหรือไม่ โปรดเช็ค</h4>
                    <div class="mb-3">
                        <label for="Lname" class="col-form-label"> เปลี่ยนสถานะ:</label>
                        <select name="MC_sta">
                            <option value="ยังไม่จ่าย">ยังไม่จ่าย</option>
                            <option value="จ่ายเเล้ว">จ่ายเเล้ว</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>