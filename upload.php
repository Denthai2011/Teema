<?php 

session_start();
include_once 'mysql/connect.php';

// File upload path

if (isset($_POST['img'])) {
    $roomId = $_POST['roomId'];
    $Date_up = $_POST['Date_up'];
    $type_img = $_POST['type_img'];
    $targetDir = "uploads/";
    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $file_name = $fileName;
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                $insert = $conn->prepare("INSERT INTO imges SET Date_up=:Date_up, file_name=:file_name, roomId=:roomId, type_img= :type_img ");
                $insert->bindParam(":Date_up",$Date_up);
                $insert->bindParam(":file_name",$file_name);
                $insert->bindParam(":roomId",$roomId);
                $insert->bindParam(":type_img",$type_img);
                if ($insert->execute()) {
                    $_SESSION['statusMsg'] = "The file <b>" . $fileName . "</b> has been uploaded successfully.";
                  
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                   
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            
        }
    } else {
        $_SESSION['statusMsg'] = "Please select a file to upload.";
        
    }

}
else {
        echo "Error: Add form not submitted";
}
?>