<?php

namespace App\Http\Controllers;

use App\Models\DataSensor;
use Illuminate\Http\Request;
use PhpMqtt\Client\Exceptions\MqttClientException;
use PhpMqtt\Client\MqttClient;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function fetchData()
    {
        try {
            set_time_limit(5);
            $client = new MqttClient("broker.hivemq.com", "1883", 'water-guardian', MqttClient::MQTT_3_1);
            $client->connect(null, true);
            $client->subscribe('CWG/sensor/data2', function (string $topic, string $message, bool $retained) use ($client) {
                $dataSensor = explode(',', $message);
                $data = new DataSensor();
                $data->data_ph = floatval($dataSensor[0]);
                $data->data_tds = floatval($dataSensor[1]);
                $data->data_turbidity = floatval($dataSensor[2]);
                $data->data_temp = floatval($dataSensor[3]);

                $status_air = 'Bersih';

                if ($data->data_temp > 28) {
                    $status_air = 'Tercemar Kecil';
                }

                if ($data->data_ph < 6.5 || $data->data_ph > 7.5) {
                    $status_air = 'Tercemar Kecil';
                }

                if ($data->data_tds > 500) {
                    $status_air = 'Tercemar Kecil';
                }

                if ($data->data_turbidity < 5 || $data->data_turbidity > 25) {
                    $status_air = 'Tercemar Kecil';
                }

                if ($status_air === 'Tercemar Kecil') {
                    $parameter_tidak_sesuai = 0;
                    if ($data->data_temp > 28) {
                        $parameter_tidak_sesuai++;
                    }
                    if ($data->data_ph < 6.5 || $data->data_ph > 7.5) {
                        $parameter_tidak_sesuai++;
                    }
                    if ($data->data_tds > 500) {
                        $parameter_tidak_sesuai++;
                    }
                    if ($data->data_turbidity < 5 || $data->data_turbidity > 25) {
                        $parameter_tidak_sesuai++;
                    }

                    if ($parameter_tidak_sesuai === 2 || $parameter_tidak_sesuai === 3) {
                        $status_air = 'Tercemar Sedang';
                    } elseif ($parameter_tidak_sesuai === 4) {
                        $status_air = 'Tercemar Berat';
                    }
                }

                $data->status_air = $status_air;
                $data->save();
                $client->interrupt();
            }, MqttClient::QOS_AT_MOST_ONCE);
            $client->loop(true);
            $client->disconnect();
        } catch (MqttClientException $e) {
            echo sprintf('Subscribing to a topic using QoS 0 failed. An exception occurred. Full message: %s', $e->getMessage());
        }

        $sensor = DataSensor::latest()->first();
        return response()->json([
            'status_sensor' => 1,
            'ph' => number_format($sensor->data_ph, 2),
            'tds' => number_format($sensor->data_tds, 2),
            'turbidity' => number_format($sensor->data_turbidity, 2),
            'temp' => number_format($sensor->data_temp, 2),
            'status_air' => $sensor->status_air,
            'timestamp' => $sensor->created_at->format('Y-m-d H:i:s'),
        ]);
    }

    public function fetchLastData()
    {
        $sensor = DataSensor::latest()->first();
        return response()->json([
            'status_sensor' => 0,
            'ph' => number_format($sensor->data_ph, 2),
            'tds' => number_format($sensor->data_tds, 2),
            'turbidity' => number_format($sensor->data_turbidity, 2),
            'temp' => number_format($sensor->data_temp, 2),
            'status_air' => $sensor->status_air,
            'timestamp' => $sensor->created_at->format('Y-m-d H:i:s'),
        ]);
    }
}
