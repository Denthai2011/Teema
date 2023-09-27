<div class="container">
<div class="headdiv">ข้อมูลห้อง</div>
            <div class="container">
                <form class="form1">
                    <table class="table1">
                        <tr>
                            <dive>
                                <th>
                                    <label for="roomId">ห้องที่:</label>
                                </th>
                                <td><label type="text" name="roomId"> <?php echo $roomId; ?></label></td>
                            </dive>
                        </tr>
                        <div>
                            <tr>
                                <th>
                                    <label for="Name">ชื่อ: </label>
                                </th>
                                <td><label type="text" id="Name" name="Name"> <?php echo $row['Name']; ?> </label></td>
                        </div>
                        <div>
                            <th>
                                <label for="Name">นามสกุล: </label>
                            </th>
                            <td><label type="text" id="Lname" name="Lname"><?php echo $row['Lname']; ?></label></td>
                        </div>
                        </tr>
                        <tr>
                            <div>
                                <th>
                                    <label for="Dps">ค่าห้อง:</label>
                                </th>
                                <td><label type="tedx" id="Dps" name="Dps"><?php echo $row['Dps']; ?></label></td>
                            </div>
                        </tr>
                    </table>
                </form>
                <br>
                <div class="container2">
                    <table class="table2">
                        <thead>
                            <tr>
                                <th>ค่ามิเตอร์ไฟเดือนก่อน</th>
                                <td><?php echo $row["E_bef"] ?></td>

                            </tr>
                            <tr>
                                <th>ค่ามิเตอร์ไฟเดือนนี้</th>
                                <td><?php echo $row["E_af"] ?></td>
                            </tr>
                            <tr>
                                <th>ค่าต่างมิเตอร์</th>
                                <td><?php echo $Eitp = $row["E_af"] - $row["E_bef"]  ?></td>
                            </tr>
                    </table>
                    <br>
                    <table class="table3">
                        <thead>
                            <tr>
                                <th>ค่ามิเตอร์น้ำเดือนก่อน</th>
                                <td><?php echo $row["W_bef"] ?></td>
                            </tr>
                            <tr>
                                <th>ค่ามิเตอร์น้ำเดือนนี้</th>
                                <td><?php echo $row["W_af"] ?></td>
                            </tr>
                            <tr>
                                <th>ค่าต่างมิเตอร์</th>
                                <td><?php echo $Witp = $row["W_af"] - $row["W_bef"]  ?></td>
                            </tr>
                    </table>
                </div>
                <br>
                <table class="table4">
                    <tr>
                        <th>ค่าไฟ</th>
                        <th>ค่าน้ำ</th>
                        <th>ค่าห้อง</th>
                        <th>รวม</th>
                    </tr>
                    <tr>
                        <td><?php echo $Witp = $Witp * 10  ?></td>
                        <td><?php echo $Eitp = $Eitp * 10  ?></td>
                        <td><?php echo $row['Dps'] ?></td>
                        <td><?php echo $Sum = $Eitp + $Witp + $row['Dps'] ?></td>
                    </tr>
                    </tr>
                </table>
            </div>
</div>