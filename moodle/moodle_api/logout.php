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


// var_dump($user->id);
// var_dump($user->sesskey);
if (complete_user_login($user)) {
  $actual_link = "http://$_SERVER[HTTP_HOST]/login/logout.php?sesskey=" . $user->sesskey;
  if (confirm_sesskey($user->sesskey)) {
    require_logout();
    echo "You're log out";
    redirect(new moodle_url("http://localhost:3000/"));
    die;
  }
  die;
} else {
  echo "not login";
  die;
}