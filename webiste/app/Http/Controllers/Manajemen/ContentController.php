<?php

namespace App\Http\Controllers\Manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        return view('management.content.index');
    }
}
