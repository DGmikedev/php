<?php

    define('BASE_PATH', __DIR__);

    require BASE_PATH . '/controller/reciboController.php';
    $data = new ReciboController(1234, 500);
    $data->getRecibo();