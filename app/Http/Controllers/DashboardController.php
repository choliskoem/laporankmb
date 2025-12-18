<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Person;
use App\Models\Program;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalKonten' => Content::count(),
            'totalPerson' => Person::count(),
            'totalProgram' => Program::count(),
            'kontenBulanIni' => Content::whereMonth('tanggal', Carbon::now()->month)->count(),
            'latestContents' => Content::with(['program','klasifikasi','medsos'])
                                        ->orderBy('tanggal', 'desc')
                                        ->limit(5)
                                        ->get()
        ]);
    }
}
