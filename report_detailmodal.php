<div class="modal fade" id="reportdetailmodal_<?php echo $row['ReId'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="exampleModalLabel">จัดการ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="reportedit.php" method="post">
                        <div class="mb-3">
                                <input type="text" name="ReId" hidden value="<?php echo $ReId ?>" >
                            </div>
                            <div class="mb-3">
                                <label for="Name" class="col-form-label">ประเภท:</label>
                                <input type="text" readonly class="form-control w-50" value="<?php echo $row['Retype']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label"> สถานะเเจ้ง:</label>
                                <select name="Resta">
                                    <option value="เเจ้งปัญหา">เเจ้งปัญหา</option>
                                    <option value="กำลังดำเนิน">กำลังดำเนิน</option>
                                    <option value="เสร็จสิ้น">เสร็จสิ้น</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label"> ข้อมูลเเจ้งซ่อม:</label>
                                <textarea type="text" readonly class="form-control" placeholder="<?php echo $row['Redata']; ?>"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="editreport" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>