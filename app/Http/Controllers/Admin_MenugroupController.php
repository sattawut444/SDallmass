<?php

namespace App\Http\Controllers;

use App\Models\Admin_group;
use App\Models\Osotsapa_sd_admin;
use App\Models\Admin_menu;
use Illuminate\Http\Request;

class Admin_MenugroupController extends Controller
{
    // Admin menu
    public function admin_menu(Request $request) {
        $query = Admin_menu::all();
        $data = array();
        return response()->json([$data, 200]);
    }
    function nemu_render($group, $menu_key)
    {

        $main_menu = config('admin.menu');
        // dd($main_menu);
        $social['main'] = '';

        return response()->json([$main_menu, 200]);
       
        }
    // Create Admin Group
    // public function create_group(Request $req) {
    //     $insert = new Admin_menu_group;
    //     $insert->admin_id = $req->input('id');
    //     $insert->name = $req->input('name');
    //     $insert->url = $req->input('url');
    //     $insert->type = $req->input('type');
    //     $insert->category = $req->input('category');
    //     $insert->sorting = '1';
    //     $insert->status = '1';
    //     $insert->created_at = date("Y-m-d H:i:s");
    //     $insert->updated_at = date("Y-m-d H:i:s");
    //     $insert->save();
    //     $status['success'] = array();
    //     $status['dashboard'] = array();
    //     $status['status'] = 'success';
    //     $status['dashboard'] = '/governance';
    //     return response()->json([$status,200]);
    


}