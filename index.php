<?php

use Model\ShtrafovnetClient\ShtrafovnetClient;
use Symfony\Component\Yaml\Yaml;

date_default_timezone_set('Europe/Moscow');

try {
    require __DIR__.'/vendor/autoload.php';
    require __DIR__.'/bootstrap.php';

    $params = Yaml::parse(file_get_contents('app/config/parameters.yml'));

    $apiClient = new ShtrafovnetClient($params);

    list($headers, $body) = $apiClient->createAccount(
        'sinyukov.ivan+dealer10@gmail.com',
        'super_password',
        'Test Company',
        'Sinyukov Ivan Sergeevich',
        '+79507756028',
        '1234567890', [
            'companyName' => 'Test company Fullname',
        ]
    );

    displayResponse($headers, $body);
} catch (\Exception $e) {
    displayError($e);
}