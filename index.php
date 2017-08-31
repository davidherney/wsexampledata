<?php

define('_DEBUG', false);

$validtokens = array('d311e5f0f26c56979ad8ab7044322e1b', 'la vida es bella');
$validfunctions = array('search_enrolled_users');


// Change if the method is GET.
$params = $_POST;

if (!isset($params['wstoken'])) {
    die('The wstoken param is required');
}

if (!in_array($params['wstoken'], $validtokens)) {
    die('The token is not valid');
}

if (!isset($params['wsfunction'])) {
    die('The wsfunction param is required');
}

$function = $params['wsfunction'];

if (!in_array($function, $validfunctions)) {
    die('The function is not valid');
}

// Call the current function.
$function();
die();



function search_enrolled_users() {
    global $data, $params;

    if (!isset($params['course'])) {
        die('The course param is required');
    }

    include 'data.php';

    $course = $params['course'];

    if (!isset($data[$course])) {
        die('The course ' . $params['course'] . ' does not exist');
    }

    echo json_encode($data[$course]);
}