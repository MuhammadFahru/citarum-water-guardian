<?php

return [
    'connections' => [
        'default' => [
            'host' => env('MQTT_HOST', '127.0.0.1'),
            'password' => env('MQTT_PASSWORD', ''),
            'username' => env('MQTT_USERNAME', ''),
            'certfile' => env('MQTT_CERTFILE', ''),
            'port' => env('MQTT_PORT', 1883),
            'debug' => env('MQTT_DEBUG', false),
        ],
    ],
];
