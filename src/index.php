<?php
// $s3_bucket = $_ENV['S3_BUCKET'];

// var_dump($s3_bucket);

include __DIR__ . '../utils/Authentication.php';

$path = implode(DIRECTORY_SEPARATOR, [__DIR__, 'utils', 'recaudo.wsdl']);

// llaves para AUTH
$login = '';
$trankey = '';
$autentia = new Authentication();
$auth = $autentia->setAuthM011($login, $trankey);

// informacion de pago

//Código convenio
$agreement = '';

//getBillByReference
$reference = '';

//getBillByDebtorID
$debtorID = '';

//getBillByDebtorCode
$debtorCode = '';

//url del cliente del comercio
$uriCustomer = 'https://test.placetopay.com/fidubogota';

//intarciar el cliente SOAP publidado para el insumo
try {
    $ws = new SoapClient($path, [
        'trace' => true,
        'soap_version' => SOAP_1_1,
        'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
        'stream_context' => [
            'http' => [
                'timeout' => 10,
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ],
        ],
    ]);
    $ws->__setLocation($uriCustomer);

    //indicar el tipo de metodo que se desea utilizar
    $method = 'getBillByReference';

    switch ($method) {
        case 'getBillByReference':
            $parameters = new stdClass();
            $parameters->auth = $auth;
            $parameters->reference = $reference;
            $parameters->agreement = $agreement;
            $result = $ws->getBillByReference($parameters);
            //var_dump($ws->__getLastRequest());
            break;
        case 'getBillByDebtorID':
            $parameters = new stdClass();
            $parameters->auth = $auth;
            $parameters->debtorID = $debtorID;
            $parameters->agreement = $agreement;
            $result = $ws->getBillByDebtorID($parameters);
            break;
        case 'getBillByDebtorCode':
            $parameters = new stdClass();
            $parameters->auth = $auth;
            $parameters->debtorCode = $debtorCode;
            $parameters->agreement = $agreement;
            $result = $ws->getBillByDebtorCode($parameters);
            break;
        case 'settlePayment':
            $parameters = new stdClass();
            $payment = new stdClass();
            $parameters->auth = $auth;

            $payment->reference = $reference;
            $payment->totalAmount = 2000000;
            $payment->date = date('c');
            $payment->receipt = 878794;
            $payment->franchise = 'DVVND';
            $payment->channel = 'OFC';
            $payment->method = 'CASH';
            $payment->checkInfo = null;
            $payment->cashAmount = 2000000;
            $payment->payerID = '1019902745';
            $payment->agreement = $agreement;
            $payment->agentID = '123456';
            $payment->location = '999';
            $parameters->payment = $payment;
            $result = $ws->settlePayment($parameters);
            break;
    }

    print_r($result);
} catch (Exception $e) {
    echo $e->getMessage() . '<pre>';
}
