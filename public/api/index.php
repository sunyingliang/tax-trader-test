<?php

require __DIR__ . '/../../autoload.php';
require __DIR__ . '/../../config/common.php';

ini_set('max_execution_time', TIMEOUT_CURL);


$router = new TT\Common\Router();

$router->post('/integer/calculate', function () {
    return (new TT\IntegerCalculator\Handler\IntegerHandler())->calculate();
});

$router->execute();
