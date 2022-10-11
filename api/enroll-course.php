<?php
include('../utils/json.php');
include('../sql/database.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-type: application/json");

$params = json_decode(file_get_contents('php://input'), TRUE);
$courseCode = $params['courseCode'];
$studentID = $params['studentID'];
# enroll course post body: {studentID, courseCode}

// TODO:
// check if >= 5, throw error
// check dates, something

// username, password -> server, 

// build SELECT query
$query = "INSERT INTO Registered (registerID, studentID, courseCode) 
          VALUES('$studentID','$courseCode')";

if (!($result = mysqli_query($database, $query))) {
    echo (json(null, 500));
    exit;
}

echo json("Registered to " . $courseCode . " successfully", null);

mysqli_close($database);
