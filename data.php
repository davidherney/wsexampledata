<?php

$data = array();
$data['all'] = array();
$data['small'] = array();
$data['x-small'] = array();

// Empty course.
$data['empty'] = array();


// File from https://www.briandunning.com/sample-data/
// fields: firstname;lastname;institution;address;city;county;state;zip;phone1;phone2;email;web;username
// change "," (coma) by ";" (semicolon) as separator, whitout quotation marks ("")
$file = file('us-500.csv');
$fields = explode(';', $file[0]);

// Remove field names.
unset($file[0]);

foreach($file as $pos => $line) {
    $values = explode(';', $line);

    $user = new stdClass();
    for($i = 0; $i < count($fields); $i++) {
        $field = trim($fields[$i]);
        $user->$field = trim($values[$i]);
    }

    $data['all'][] = $user;

    if ($pos % 5 == 1) {
        $data['small'][] = $user;
    }

    if ($pos < 10) {
        $data['x-small'][] = $user;
    }
}


