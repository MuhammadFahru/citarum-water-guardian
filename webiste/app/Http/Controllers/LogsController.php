<?php

namespace App\Http\Controllers;

use App\Models\DataSensor;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function ph()
    {
        return view('logs.data_ph');
    }

    public function temperature()
    {
        return view('logs.data_temperature');
    }

    public function tds()
    {
        return view('logs.data_tds');
    }

    public function turbidity()
    {
        return view('logs.data_turbidity');
    }

    public function dataSensorAjax()
    {
        $data = DataSensor::orderBy('id', 'desc')->get();
        return datatables()->of($data)->addIndexColumn()->toJson();
    }
}
