<?php
function json($data = null, $error = null)
{
  $array = array('data' => $data, 'error' => $error);
  return json_encode($array);
}
