<?php

include 'ICS.php';
$filename = 'evenement-cnrs.ics';
if ($_POST['filename'] && $_POST['filename'] != '') {
    $filename = $_POST['filename'] . '.ics';
}
header('Content-type: text/calendar; charset=utf-8');
header('Content-Disposition: inline; filename=' . $filename);

$ics = new ICS(array(
    'location' => $_POST['location'],
    'description' => $_POST['description'],
    'dtstart' => $_POST['date_start'],
    'dtend' => $_POST['date_end'],
    'summary' => $_POST['summary'],
    'url' => $_POST['url']
        ));
var_dump($ics); die(); 
echo $ics->to_string();
