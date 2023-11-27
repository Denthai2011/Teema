<div class="modal fade" id="End_<?php echo $row['renId']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">เลิกเช่า</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="End_ren.php" method="post">
                    <div class="mb-3">
                        <input type="hidden" name="renId" value="<?php echo $renId ?>">
                    </div>
                    <div class="mb-3">
                        <label for="Lname" class="col-form-label">ห้อง<?php echo $row['roomId'] ?>    วันออก:</label>
                        <input type="Date" name="Dateout" class="form-control" value="<?php echo $row['Dateout']; ?>">
                    </div>
                        <input type="text" readonly name="End_ren" class="form-control" value="เลิกเช่า">
                        
                        <input type="text" hidden name="roomId" class="form-control" value="<?php echo $row['roomId'];?>">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="endren" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

