<?php
if (!($database = mysqli_connect("localhost", "root", ""))) {
  echo json(null, 500);
  exit;
}

if (!mysqli_select_db($database, "Assignment1")) {
  echo json(null, 500);
  exit;
}
