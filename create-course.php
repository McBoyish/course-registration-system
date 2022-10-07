<?php

// values for day and semester
// day: "mon", "tue", "wed", "thu", "fri", "sat", "sun"
// days: day-day-day...
// semester: "summer", "winter", "fall"

// courseTime can be "hh:mm:ss" or "hh:mm"
// start and end date should be "yyyy-mm-dd"

$courseCode = $_POST["courseCode"];
$title = $_POST["title"];
$semester = $_POST["semester"];
$days = $_POST["days"];
$courseTime = $_POST["courseTime"];
$instructor = $_POST["instructor"];
$room = $_POST["room"];
$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];

function courseExists($database, $courseCode)
{
  $checkCourse = "SELECT FROM Course WHERE courseCode = '$courseCode'";
  $res = mysqli_query($database, $checkCourse);
  return $res->num_rows > 0;
}

$insertCourse = "INSERT INTO Course (courseCode, title, semester, days, courseTime, instructor, room, startDate, endDate)
			     VALUES ('$coursecode', '$title','$semester','$days', '$courseTime', '$instructor', '$room', '$startDate', '$endDate')";


// Connect to MySQL
if (!($database = mysqli_connect("localhost", "root", "")))
  die("Could not connect to database");

if (!mysqli_select_db($database, "Assignment1"))
  die("Could not open database");

if (courseExists($database, $courseCode))
  die("Course code already exists");

if (!($insertUserResult = mysqli_query($database, $insertCourse))) {
  print("Error inserting course");
  die(mysqli_error($database));
}

print("Course " . $courseCode . " successfully created");

mysqli_close($database);
