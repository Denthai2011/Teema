<div class="modal fade" id="editelmodal_<?php echo $row['E_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="exampleModalLabel">อัพเดทข้อมูลค่าไฟ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="elect_edit_data.php" method="post">
                            <div class="mb-3">
                                <input type="hidden" name="E_id" value="<?php echo $E_id ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Name" class="col-form-label">วันที่จด:</label>
                                <input type="date" name="E_dsave" class="form-control w-50" value="<?php echo $row['E_dsave']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label">ค่าไฟเดือนก่อน:</label>
                                <input type="text" name="E_bef" class="form-control w-50" value="<?php echo $row['E_bef']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label"> ค่าไฟเดือนนี้:</label>
                                <input type="text" name="E_af" class="form-control" value="<?php echo $row['E_af']; ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="editelect" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
