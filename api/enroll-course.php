<?php
include('../utils/json.php');
include('../sql/database.php');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-type: application/json");

$params = json_decode(file_get_contents('php://input'), TRUE);
$courseCode = $params['courseCode'];
$studentID = $params['studentID'];

if (!studentExists($database, $studentID)) {
    echo (json(null, 'invalid-student-id'));
    exit;
}

if (!courseExists($database, $courseCode)) {
    echo (json(null, 'invalid-course-code'));
    exit;
}

if (isAlreadyRegistered($database, $courseCode, $studentID)) {
    echo (json(null, 'already-registered'));
    exit;
}

$registeredCount = registeredCount($database, $studentID);

if ($registeredCount >= 5) {
    echo (json(null, 'register-limit-reached'));
    exit;
}

if (!validateRegistrationDate($database, $courseCode)) {
    echo (json(null, 'register-deadline-passed'));
    exit;
}

// build SELECT query
$query = "INSERT INTO Registered (studentID, courseCode) 
          VALUES('$studentID','$courseCode')";

if (!($result = mysqli_query($database, $query))) {
    echo (json(null, 'server-error'));
    exit;
}

$result = array('courseCode' => $courseCode, 'studentID' => $studentID, 'nRegistered' => ($registeredCount + 1));

echo json($result, null);

mysqli_close($database);

function courseExists($database, $courseCode)
{
    $checkCourse = "SELECT * FROM Course WHERE courseCode = '$courseCode'";
    $res = mysqli_query($database, $checkCourse);
    return $res->num_rows > 0;
}

function studentExists($database, $studentID)
{
    $checkStudent = "SELECT * FROM Student WHERE studentID = $studentID";
    $res = mysqli_query($database, $checkStudent);
    return $res->num_rows > 0;
}

function registeredCount($database, $studentID)
{
    $getRegiseredCourse = "SELECT * FROM Registered WHERE studentID = $studentID";
    $res = mysqli_query($database, $getRegiseredCourse);
    return $res->num_rows;
}

function canRegister($now, $startDate)
{
    $msNow = strtotime($now); // converting to milliseconds
    $msStart = strtotime($startDate);
    $oneWeek = 1000 * 60 * 60 * 24 * 7;
    $deadline = $msStart + $oneWeek;
    return $msNow <= $deadline;
}

function validateRegistrationDate($database, $courseCode)
{
    $getCourse = "SELECT * FROM Course where courseCode = '$courseCode'";
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

function isAlreadyRegistered($database, $courseCode, $studentID)
{
    $checkStudent = "SELECT * FROM Registered WHERE studentID = $studentID AND courseCode = '$courseCode'";
    $res = mysqli_query($database, $checkStudent);
    return $res->num_rows > 0;
}
