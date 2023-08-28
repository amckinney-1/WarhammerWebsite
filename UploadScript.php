<?php
// Include the database configuration file
include_once 'dbConnector.php';
$db = ConnectionGet();

// File upload directory
$targetDir = "Uploads/";

if (isset($_POST["submit"])) {
    if (!empty($_FILES["file"]["name"])) {
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $dsID = $_POST["ID"];

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                $insert = $db->query("INSERT INTO warhammerdb.images (filename, dataSheetID) VALUES ('" . $fileName . "', '" . $dsID . "')");
            }
        }
    }
}
?>