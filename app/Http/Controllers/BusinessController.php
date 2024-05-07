<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class BusinessController extends Controller
{
    public function showData()
    {
        $datas = Data::all();
        return view('business_points', compact('datas'));
    }

    public function showSurvey()
    {
        return view('survey');
    }

}
