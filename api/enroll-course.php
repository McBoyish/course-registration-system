<?php
include('utils/json.php');
include('sql/database.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-type: application/json");

$params = json_decode(file_get_contents('php://input'), TRUE);
# enroll course post body: {studentID, courseCode}

// check if >= 5, throw error
// check dates, something

// build SELECT query
$query = "INSERT INTO Registered (registerID, studentID, courseCode) 
          VALUES('$studentID','$courseCode')";

if (!($result = mysqli_query($database, $query))) {
    http_response_code(500);
    echo (json("An error has occurred", 500));
    exit;
}

mysqli_close($database);

http_response_code((200));
echo json("Registered to " . $courseCode . " successfully", 200);
