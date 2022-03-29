<?php

include __DIR__ . '../utils/Authentication.php';

$path = implode(DIRECTORY_SEPARATOR, [__DIR__, 'utils', 'recaudo.wsdl']);

// llaves para AUTH
$login = '';
$trankey = '';
$autentia = new Authentication();
$auth = $autentia->setAuthM011($login, $trankey);

// informacion de pago
$agreement = '';

//getBillByReference
$reference = '';

//getBillByDebtorID
$debtorID = '';

//getBillByDebtorCode
$debtorCode = '';

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
    $ws->__setLocation('https://test.placetopay.com/fidubogota');

    $variable = 'getBillByReference';

    switch ($variable) {
        case 'getBillByReference':
            $parameters = new stdClass();
            $parameters->auth = $auth;
            $parameters->reference = $reference;
            $parameters->agreement = $agreement;
            $result = $ws->getBillByReference($parameters);
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
            $parameters->auth = $auth;

            $parameters->reference = $reference;
            $parameters->totalAmount = $totalAmount;
            $parameters->date = $date;
            $parameters->receipt = $receipt;
            $parameters->franchise = $franchise;
            $parameters->channel = $channel;
            $parameters->method = $method;
            $parameters->cashAmount = $cashAmount;
            $parameters->payerID = $payerID;
            // $parameters->agreement = agreement;
            // $parameters->agentID
            // $parameters->location

            break;
    }

    print_r($result);
} catch (Exception $e) {
    echo $e->getMessage() . '<pre>';
}
