<?php
if (!($database = mysqli_connect("localhost", "root", ""))) {
  echo json(null, 'server-error');
  exit;
}

if (!mysqli_select_db($database, "Assignment1")) {
  echo json(null, 'server-error');
  exit;
}
