<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Osotspa_sd_history_log;
use Illuminate\Http\Request;

class AdminHistoryController extends Controller
{
    // ADMIN History Login
    public function HistoryAdminLogin(Request $req) {
        // $query = Osotspa_sd_history_log::where('status','login')->get();
        $query = Admin::leftJoin('osotspa_sd_history_logs', 'admins.id', '=', 'osotspa_sd_history_logs.admin_id')
        ->select(
            'osotspa_sd_history_logs.in_time',
            'osotspa_sd_history_logs.status',
            'admins.name',
        )->orderByRaw('in_time desc')->limit(10)->get();
        // $users = new Admin()
        //     ->join('osotspa_sd_history_logs', 'admins.id', '=', 'osotspa_sd_history_logs.admin_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();
    return response()->json([$query, 200]);
    }
  
}