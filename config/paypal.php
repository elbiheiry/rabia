<?php 
return [ 
    'client_id' => 'AZ8lPBH6b-H-k1fTiihpLdOB59zyC2Ym4pnaBVnc5tqV1d1KnqFL0O0OI0IchVqa1YEP5ZlwEzQ54FNI',
    'secret' => 'EMS_eGTRtvTS0JofXyLyAiEXVeCq8G9mSqlQ2jIJvg-ode5zoWZzXcCcgJE6fqnGl2_hVIb5s728Ymqt',
    'settings' => array(
        'mode' => env('PAYPAL_MODE','live'),
        'http.ConnectionTimeOut' => 30,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];