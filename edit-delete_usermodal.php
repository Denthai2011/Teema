<div class="modal fade" id="editmodal_<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h5 class="modal-title" id="exampleModalLabel">เเก้ไขข้อมูล</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="edituser.php" method="post">
                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Name" class="col-form-label">ชื่อผู้ใช้:</label>
                                <input type="text" name="username" class="form-control w-50" value="<?php echo $row['username']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label">รหัสผู้ใช้:</label>
                                <input type="text" name="password" class="form-control w-50" value="<?php echo $row['password']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label">ชื่อ:</label>
                                <input type="text" name="Name" class="form-control" value="<?php echo $row['Name']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label">นามสกุล:</label>
                                <input type="text" name="Lname" class="form-control" value="<?php echo $row['Lname']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label">เบอร์โทร:</label>
                                <input type="text" name="Tel" class="form-control" value="<?php echo $row['Tel']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label">ที่อยู่บ้าน:</label>
                                <input type="text" name="Address" class="form-control" value="<?php echo $row['Address']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label">ที่อยุ่ทำงาน:</label>
                                <input type="text" name="Weddress" class="form-control" value="<?php echo $row['Weddress']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="Lname" class="col-form-label">ตำเเหน่ง:</label>
                                <select name="urold">
                                <option value="ผู้เช่า">ผู้เช่า</option>
                            </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="edituser" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deletemodal_<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="exampleModalLabel">ลบข้อมูล</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="deleteuser.php" method="post">
                            <div class="mb-3">
                                <h4>คุณต้องการที่จะลบข้อมูล</h4>
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <h4>ใช้หรือไม่ ?</h4>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="deleteuser" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        