<?php

namespace App\Http\Controllers\Manajemen;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $data = Feedback::orderBy('id', 'desc')->get();
        return view('feedback', compact('data'));
    }

    public function destroy($id)
    {
        $data = Feedback::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
