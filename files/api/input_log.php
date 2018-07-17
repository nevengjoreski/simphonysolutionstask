<?php
// Cross-site Scripting (XSS) and improved security
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, X-Requested-With');

require_once "../sys/models/input_log.php";

$input_log_model = new InputLogModel;
$input_log_model->field_value = $_POST['field_value'] ?? '';
$input_log_model->field_id = $_POST['field_id'] ?? '';

switch($_SERVER['REQUEST_METHOD']){

    case 'POST':
        echo $input_log_model->createInputLog();
        break;

    default:
        echo 'Request method unhandled';

}
exit;

