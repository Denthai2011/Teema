<div class="modal fade" id="editwtmodal_<?php echo $row['W_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="exampleModalLabel">อัพเดทข้อมูลค่าน้ำ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="water_edit_data.php" method="post">
                        <div class="mb-3">
                                <input type="hidden" name="W_id" value="<?php echo $W_id ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Name" class="col-form-label">วันที่จด:</label>
                                <input type="date" name="W_dsave" class="form-control w-50" value="<?php echo $row['W_dsave']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label">ค่าน้ำเดือนก่อน:</label>
                                <input type="text" name="W_bef" class="form-control w-50" value="<?php echo $row['W_bef']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label"> ค่าน้ำเดือนนี้:</label>
                                <input type="text" name="W_af" class="form-control" value="<?php echo $row['W_af']; ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="editwater" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>