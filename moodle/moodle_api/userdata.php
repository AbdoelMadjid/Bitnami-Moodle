<?php

require('../config.php');
require_once('../login/lib.php');

header("Access-Control-Allow-Origin: *");

// require('config.php');
$token = $_REQUEST['token'];
$dashboard = $CFG->wwwroot;

function decodeBase64MultipleTimes($input, $times)
{
  for ($i = 0; $i < $times; $i++) {
    $input = base64_decode($input);
  }
  return $input;
}

$name = decodeBase64MultipleTimes($token, 5);

// get user from username
$user = \core_user::get_user_by_username($name);
if ($user) {
  // Construct a simplified user object
  $userObject = [
    'id' => $user->id,
    'username' => $user->username,
    'firstname' => $user->firstname,
    'lastname' => $user->lastname,
    'email' => $user->email,
    // Add any other fields you want to include
  ];

  echo json_encode($userObject);
} else {
  // Return an error message if the user is not found
  $errorObject = ['error' => 'User not found'];
  echo json_encode($errorObject);
}