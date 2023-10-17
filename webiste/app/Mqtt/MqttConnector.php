<?php

namespace App\Mqtt;

use PhpMqtt\Client\ConnectionSettings;
use PhpMqtt\Client\MqttClient;

class MqttConnector
{
    protected $client;

    public function __construct()
    {
        $settings = new ConnectionSettings();
        $settings->setBrokerHost('broker.hivemq.com');
        $settings->setBrokerPort(1883);
        $this->client = new MqttClient($settings);
    }

    public function getClient()
    {
        return $this->client;
    }
}
