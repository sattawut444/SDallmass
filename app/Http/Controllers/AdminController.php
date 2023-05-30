<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Osotsapa_sd_admin;
use App\Models\Admin_group;
use App\Models\Osotsapa_sd_admin_upload;

class AdminController extends Controller
{
    // Login Admin
    public function login(Request $request)
    {
        // dd($request);
        $query = Osotsapa_sd_admin::where(['username' => $request->username, 'password' => $request->password])->get();
        // dd($query[0]->id);
        if ($query->count() != 0) {
            if ($query[0]->status == 1) {
                $admin = new AdminPageController;
                $request->session()->put('admin_menu', $admin->post_menu($query[0]->id));
                return response()->json(["status" => 1], 200);
            }
        } else {
            return response()->json([0, 200]);
        }
    }


    // Logout Admin
    public function logout(Request $request)
    {
        $query = Osotsapa_sd_admin::where('id', $request->id)->get();

        if ($query[0]->status == 1) {
            $query['login'] = '/login';

            return response()->json([$query, 200]);
        }
        return response()->json(['0', 200]);
    }


    // Register Admin
    public function register(Request $req)
    {
        $name = $req->input('name');
        $username = $req->input('username');
        $password = $req->input('password');
        // dd($req);
        if ($name != null) {
            if($username != null AND $password != null){
                $insert = new Osotsapa_sd_admin;
            $insert->name = $req->input('name');
            $insert->email = $req->input('email');
            $insert->username = $req->input('username');
            $insert->password = $req->input('password');
            $insert->role = $req->input('option');
            $insert->tex = $req->input('tex');
            $insert->phone = $req->input('phone');
            $insert->status = '1';
            $insert->created_at = date("Y-m-d H:i:s");
            $insert->updated_at = date("Y-m-d H:i:s");
            $insert->save();
            $status['success'] = array();
            $status['dashboard'] = array();
            $status['status'] = 'success';
            $status['login'] = '/login';
            return response()->json([$status, 200]);
            }
            return response()->json([-1, 200]);
        }
        return response()->json([0, 200]);

    }
    // Update admin..
    public function update_admin(Request $request)
    {
        $id = $request->input('id');
        // dd($id);
        Osotsapa_sd_admin::whereId($id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'tex' => $request->input('detail'),
            'role' => $request->input('role'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        return response()->json(['status' => 'success'], 200);
    }

    // Delete URL..
    public function DeleteUrl(Request $request)
    {
        $id = $request->input('id');
        Osotsapa_sd_admin::where('id', $id)->delete();
        return response()->json(['delete' => true], 200);
    }


    //------------------------ admin_user ----------------------
    public function admin_user(Request $request)
    {
        $query = Admin_group::leftJoin('osotsapa_sd_admins', 'admin_groups.id', '=', 'osotsapa_sd_admins.role')
            ->select(
                'osotsapa_sd_admins.id',
                'osotsapa_sd_admins.name',
                'admin_groups.id as group_id',
                'admin_groups.name as group',
                'admin_groups.description',
            )->get();
        // dd($query);
        return response()->json([$query, 200]);
    }



    //------------------- delete admin_user ----------------------

    public function delete_admin_user(Request $request)
    {
        $id = $request->input('id');
        // dd($id);
        Osotsapa_sd_admin::where('id', $id)->delete();
        return view('admin.admin.admin_user');
    }





    //  Dashboard จำนวนผู้ดูแลระบบ
    public function get_record(Request $request)
    {
        $query = Osotsapa_sd_admin::all();
        $num = count($query);
        return response()->json([$num, 200]);
    }

    //  Dashboard จำนวนการดาวน์โหลดไฟล์
    public function count_download(Request $request)
    {
        $query = Osotsapa_sd_admin_upload::all();
        $query_id = $query;
        $totel = 0;

        foreach ($query as $num) {
            $totel = $totel + $num->download;
        }
        return response()->json([$totel, 200]);
    }
}
