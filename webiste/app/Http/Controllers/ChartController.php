<?php

namespace App\Http\Controllers;

use App\Models\DataSensor;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getChartDataPh()
    {
        $data = DataSensor::latest()->limit(10)->get();

        $formattedData = $data->map(function ($item) {
            return [
                'x' => $item->created_at->format('Y-m-d H:i:s'),
                'y' => number_format($item->data_ph, 2),
            ];
        });

        return response()->json($formattedData);
    }

    public function getChartDataTemp()
    {
        $data = DataSensor::latest()->limit(10)->get();

        $formattedData = $data->map(function ($item) {
            return [
                'x' => $item->created_at->format('Y-m-d H:i:s'),
                'y' => number_format($item->data_temp, 2),
            ];
        });

        return response()->json($formattedData);
    }

    public function getChartDataTds()
    {
        $data = DataSensor::latest()->limit(10)->get();

        $formattedData = $data->map(function ($item) {
            return [
                'x' => $item->created_at->format('Y-m-d H:i:s'),
                'y' => number_format($item->data_tds, 2),
            ];
        });

        return response()->json($formattedData);
    }

    public function getChartDataTurbidity()
    {
        $data = DataSensor::latest()->limit(10)->get();

        $formattedData = $data->map(function ($item) {
            return [
                'x' => $item->created_at->format('Y-m-d H:i:s'),
                'y' => number_format($item->data_turbidity, 2),
            ];
        });

        return response()->json($formattedData);
    }
}
