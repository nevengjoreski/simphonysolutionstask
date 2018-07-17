<?php
// Cross-site Scripting (XSS) and improved security
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, X-Requested-With');

require_once "../sys/models/conversion_chart.php";

$chart_model = new ConversionChartModel;

switch($_SERVER['REQUEST_METHOD']){

    case 'GET':
        echo $chart_model->getConversionChart();
        break;

    default:
        echo 'Request method unhandled';

}
exit;

