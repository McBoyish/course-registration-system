<?php
include('../utils/json.php');
include('../sql/database.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-type: application/json");

$params = json_decode(file_get_contents('php://input'), TRUE);
$courseCode = $params['courseCode'];
$studentID = $params['studentID'];

if (courseExists($database, $courseCode)) {
    echo (json(null, 'course-exists'));
    exit;
}

if (getRegisteredCoursesCount($database, $studentID) >= 5) {
    echo (json(null, 'register-limit-reached'));
    exit;
}

if (!validateRegistrationDate($database, $courseCode)) {
    echo (json(null, 'register-deadline-passed'));
    exit;
}

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

function canRegister($now, $startDate)
{
    $msNow = strtotime($now); // converting to milliseconds
    $msStart = strtotime($startDate);
    $oneWeek = 1000 * 60 * 60 * 24 * 7;
    return $msNow + $oneWeek <= $msStart;
}

function validateRegistrationDate($database, $courseCode)
{
    $getCourse = "SELECT startDate FROM Course where courseCode = '$courseCode'";
    $res = mysqli_query($database, $getCourse);
    if ($res->num_rows !== 1) {
        echo (json(null, 'server-error'));
        exit;
    }
    $rows = array();
    while ($r = mysqli_fetch_assoc($res)) {
        $rows[] = $r;
    }
    $course = $rows[0];
    $now = date("Y-m-d");
    return canRegister($now, $course['startDate']);
}
