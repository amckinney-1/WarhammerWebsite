<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

// Get the db connection
$myDbConn = ConnectionGet();

$myJSON = null;
$row = null;
$myGet = "";

if (array_key_exists("Create_Name", $_GET) == TRUE) {
    $myGet = $_GET["Create_Name"];
    $param1 = $_GET["Create_dsID"];

    $dataSet = UploadImage($myDbConn, $myGet, $param1);
}

//$myJsonResult = GetAllImages($myDbConn);

if (array_key_exists("GET_ID", $_GET) == TRUE) {
    $myGet = $_GET["GET_ID"];

    $myJsonResult = GetImageByID($myDbConn, $myGet);
}

//Formats results into JSON
if ($myJsonResult) {
    // loop through each record and format the json (apply any needed business logic)
    while ($row = mysqli_fetch_array($myJsonResult)) {
        $rowArray[] = json_decode($row[0]);
    }

    // Format array as json
    $myJSON = json_encode($rowArray);
}

mysqli_close($myDbConn);

echo $myJSON; //return data

?>