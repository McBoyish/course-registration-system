<?php
include('../utils/json.php');
include('../sql/database.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-type: application/json");

$params = json_decode(file_get_contents('php://input'), TRUE);
$courseCode = $params['courseCode'];
$studentID = $params['studentID'];

function courseExists($database, $courseCode)
{
    $checkCourse = "SELECT * FROM Course WHERE courseCode = '$courseCode'";
    $res = mysqli_query($database, $checkCourse);
    return $res->num_rows > 0;
}

function getRegisteredCoursesCount($database, $studentID)
{
    $getRegiseredCourse = "SELECT * FROM Registered WHERE studentID = '$studentID'";
    $res = mysqli_query($database, $getRegiseredCourse);
    return $res->num_rows;
}

if (courseExists($database, $courseCode)) {
    echo (json(null, 'course-exists'));
    exit;
}

if (getRegisteredCoursesCount($database, $studentID) >= 5) {
    echo (json(null, 'registration-limit-reached'));
    exit;
}


// TODO:
// check if courseExists
// check if >= 5, throw error
// check dates, something

// username, password -> server, 

// build SELECT query
$query = "INSERT INTO Registered (registerID, studentID, courseCode) 
          VALUES('$studentID','$courseCode')";

if (!($result = mysqli_query($database, $query))) {
    echo (json(null, 'server-error'));
    exit;
}

$result->courseCode = $courseCode;
$result->studentID = $studentID;

echo json($result, null);

mysqli_close($database);
