<?php
include('utils/json.php');
include('sql/database.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-type: application/json");

$params = json_decode(file_get_contents('php://input'), TRUE);
$employmentID = $params["employmentID"];

// build SELECT query
$query = "SELECT employmentID FROM Administrator WHERE employmentID = $employmentID";

if (!($result = mysqli_query($database, $query))) {
    http_response_code(500);
    echo (json("An error has occurred", 500));
    exit;
}

mysqli_close($database);

$myArray = [];
while ($row = $result->fetch_assoc()) {
    $myArray[] = $row;
}

http_response_code(200);
echo json_encode($myArray);
