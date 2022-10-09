<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-type: application/json");

// values for day and semester
// day: "mon", "tue", "wed", "thu", "fri", "sat", "sun"
// days: day-day-day...ie "mon-thu"
// semester: "summer", "winter", "fall"

// courseTime can be "hh:mm:ss" or "hh:mm"
// start and end date should be "yyyy-mm-dd"
$params = json_decode(file_get_contents('php://input'), TRUE);
$courseCode = $params["courseCode"];
$title = $params["title"];
$semester = $params["semester"];
$days = $params["days"];
$courseTime = $params["courseTime"];
$instructor = $params["instructor"];
$room = $params["room"];
$startDate = $params["startDate"];
$endDate = $params["endDate"];

// validate inputs

function courseExists($database, $courseCode)
{
  $checkCourse = "SELECT FROM Course WHERE courseCode = '$courseCode'";
  $res = mysqli_query($database, $checkCourse);
  return $res->num_rows > 0;
}

function json($message, $code)
{
  $array = array('message' => $message, 'code' => $code);
  return json_encode($array);
}

$insertCourse = "INSERT INTO Course (courseCode, title, semester, days, courseTime, instructor, room, startDate, endDate)
			     VALUES ('$coursecode', '$title','$semester','$days', '$courseTime', '$instructor', '$room', '$startDate', '$endDate')";

if (!($database = mysqli_connect("localhost", "root", ""))) {
  echo json("Internal server error", 500);
  exit;
}

if (!mysqli_select_db($database, "Assignment1")) {
  echo json("Internal server error", 500);
  exit;
}

if (courseExists($database, $courseCode)) {
  echo json("Course code already exists", 400);
  exit;
}


if (!($insertUserResult = mysqli_query($database, $insertCourse))) {
  echo json("Internal server error", 500);
  exit;
}

mysqli_close($database);
echo json("Course " . $courseCode . " successfully created", 200);
