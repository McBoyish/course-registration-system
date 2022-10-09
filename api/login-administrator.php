<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-type: application/json");

$params = json_decode(file_get_contents('php://input'), TRUE);
$employmentID = $params["employmentID"];

// build SELECT query
$query = "SELECT employmentID FROM administrator WHERE employmentID = $employmentID";

// Connect to MySQL
if (!($database = mysqli_connect(
    "localhost",
    "root",
    ""
)))
    die("Could not connect to database </body></html>");

// open Products database
if (!mysqli_select_db($database, "Assignment1"))
    die("Could not open products database </body></html>");

// query Products database
if (!($result = mysqli_query($database, $query))) {
    print("Could not execute query! <br />");
    die(mysqli_error($database) . "</body></html>");
} // end if
else {
    $myArray = [];
    while ($row = $result->fetch_assoc()) {
        $myArray[] = $row;
    }
    echo json_encode($myArray);
}
mysqli_close($database);
