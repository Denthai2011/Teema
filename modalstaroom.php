<div class="modal fade" id="usermodal_<?php echo $roomId ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" class="modal-title" id="exampleModalLabel">เปลี่ยนสถานะห้องเช่า</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="edit.php" method="post">
                            <div class="mb-3">
                                <input type="text" hidden name="roomId" value="<?php echo $roomId ?>">
                            </div>
                            <div class="mb-3">
                            <label for="staID">ห้อง:<?php echo $roomId ?></label>
                                <select class="col-form-label" name="staID">
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