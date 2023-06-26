<?php

return [
    'client_id' => env('PAYPAL_CLIENT_ID', 'AUFlY7RCfwAmAHHdZpoiljL8AuqeSO6hZBGlW7v1x3Bn6AdW4U-waekZEMXZPMr-TQBI68ElILEClF6_'),
    'secret' => env('PAYPAL_SECRET', 'ENa1FxEK7p2iENdq8CiZ02D5Ypy8uUtBI-HV7dJYElNDYsBqi8mmAI-1uV7OP2FRNDtqOA0pZYZ5aBRh'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE', 'sandbox'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];
