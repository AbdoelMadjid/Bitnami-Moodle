<?php

require(__DIR__ . "/../config.php");
// require_once(__DIR__ . "/../lib/sessionlib.php");
require_once(__DIR__ . "/../login/lib.php");
// require_once(__DIR__ . "/../login/index.php");

header("Access-Control-Allow-Origin: *");

// $name = $_REQUEST['username'];
// $password = $_REQUEST['password'];


$token = $_REQUEST['token'];
// $dashboard = $CFG->wwwroot;

// $user = authenticate_user_login($name, $password);

function decodeBase64MultipleTimes($input, $times) {
    for ($i=0; $i < $times; $i++) { 
        $input = base64_decode($input);
    }
    return $input;
} 
$name = decodeBase64MultipleTimes($token, 5);

$user = \core_user::get_user_by_username($name);

if (complete_user_login($user)) {
    $actual_link = "http://$_SERVER[HTTP_HOST]/login/logout.php?sesskey=" . $user->sesskey;

    redirect(new moodle_url('/course/edit.php?category=2'));
    die;
} else {
    echo "not login";
    die;
}

?>
