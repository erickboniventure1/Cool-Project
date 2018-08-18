<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function index() {
    $count = [
      'staff' => DB::table('staff')->count(),
      'regions' => DB::table('regions')->count(),
      'districts' => DB::table('districts')->count(),
      'ipcLeaders' => DB::table('ipc_leaders')->count(),
      'facilities' => DB::table('facilities')->count(),
    ];
    return view('cms.dashboard', compact('count'));
  }
}
