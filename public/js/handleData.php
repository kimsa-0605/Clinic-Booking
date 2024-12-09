<?php
session_start();
header('Content-Type: application/json');

$data = file_get_contents("php://input");
$req = json_decode($data, true);

if (!$req) {
    error_log('Invalid JSON data');
    echo json_encode(array('error' => 'Invalid JSON data'));
    exit;
}

if (isset($req['doctorId'], $req['description'], $req['idDate'], $req['idSlot'])) {
    $_SESSION['appointmentData'] = array(
        'doctorId' => $req['doctorId'],
        'description' => $req['description'],
        'idDate' => $req['idDate'],
        'idSlot' => $req['idSlot']
    );

    echo json_encode(array(
        'idSlot' => $req['idSlot'],
        'description' => $req['description']
    ));
} else {
    echo json_encode(array(
        'error' => 'Invalid request: Missing required fields',
        'missingKeys' => array_diff(
            ['doctorId', 'description', 'idDate', 'idSlot'],
            array_keys($req)
        )
    ));
}
?>
