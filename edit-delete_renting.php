<div class="modal fade" id="editmodal_<?php echo $row['renId']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="exampleModalLabel">เเก้ไขข้อมูล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="editren.php" method="post">
                    <div class="mb-3">
                        <input type="hidden" name="renId" value="<?php echo $renId ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Lname" class="col-form-label">วันเข้า:</label>
                        <input type="Date" name="Datein" class="form-control" value="<?php echo $row['Datein']; ?>">
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
                        <label for="roomId" class="col-form-label">ห้องที่:</label>
                        <select name="roomId">
                            <?php

                                if ($row !== false AND $row_name !== false) {
                                    $roomselect = $conn->prepare("SELECT room.roomId, room.roomtype,starm.staName FROM room Left join starm ON starm.staId = room.staId");
                                    $roomselect->execute();
                                    $result = $roomselect->fetchAll(PDO::FETCH_ASSOC);
                                    if ($result) {
                                        foreach ($result as $row_room) {
                                ?>
                                    <option value="<?php echo $row_room['roomId'];?>"><?php echo $row_room['roomId'];?>/<?php echo $row_room['roomtype'];?>/<?php echo $row_room['staName'];?></option>
                            <?php
                                        }
                                    }
                                }
                            ?></select>
                    </div>
                    <div class="mb-3">
                        <label for="Deposit" class="col-form-label">ค่ามัดจำ:</label>
                        <select name="Deposit">
                            <option value=1500>1500</option>
                            <option value=2000>2000</option>
                        </select>
                    </div>
                    <div class="mb-3">
                            <label for="Deppay" class="col-form-label">เงินค่ามัดจำ:</label>
                            <input type="text" name="Deppay" class="col-form-label" placeholder="ขั้นต่ำ500บาท" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="editren" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deletemodal_<?php echo $row['renId']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">ลบข้อมูล</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="deleteren.php" method="post">
                    <div class="mb-3">
                        <h1>คุณต้องการที่จะลบข้อมูล</h1>
                            <input type="hidden" name="renId" value="<?php echo $renId ?>">
                            <h5>ใช้หรือไม่ ?</h5>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="deleteren" class="btn btn-danger">Delete</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>