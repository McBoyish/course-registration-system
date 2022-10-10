<?php
if (!($database = mysqli_connect("localhost", "root", ""))) {
  http_response_code((500));
  echo json("Internal server error", 500);
  exit;
}

if (!mysqli_select_db($database, "Assignment1")) {
  http_response_code((500));
  echo json("Internal server error", 500);
  exit;
}
