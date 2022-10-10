<?php
function json($message, $code)
{
  $array = array('message' => $message, 'code' => $code);
  return json_encode($array);
}
