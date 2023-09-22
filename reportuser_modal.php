<div class="modal fade" id="reportusermodal_<?php echo $roomId?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="exampleModalLabel">จัดการ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="reportuser.php" method="post">
                        <div class="mb-3">
                                <input type="text" name="roomId" hidden value="<?php echo $roomId ?>" >
                                <input type="text" name="Name" hidden value="<?php echo $Name ?>" >
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label"> ประเภทของปัญหา:</label>
                                <select name="Retype">
                                    <option value="น้ำ">น้ำ</option>
                                    <option value="ไฟ">ไฟ</option>
                                    <option value="ห้อง">ห้อง</option>
                                    <option value="อื่น ๆ">อื่น ๆ</option>
                                </select>
                            </div>
                            <div class="mb-3">
                            <input type="text" name="Resta" hidden value="เเจ้งปัญหา"/>
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label"> เเจ้งปัญหา:</label>
                                <textarea name="Redata" type="text" class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="reportuser" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>