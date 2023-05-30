<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Osotsapa_sd_admin_upload;


class Ocupational_health_safety extends Controller
{
    // Contact
    public function show_file(Request $req) {
        $order_by = $req->input('order_by');
        $limit_page = $req->input('limitpage');
        $limit_data = $req->input('limit_data');
        $type = $req->input('type');
        $page = $req->input('page');
        $order_by = $order_by ? $order_by : 'DESC';
        $query = Osotsapa_sd_admin_upload::where(['category'=>$req->category,'type'=>$req->type])->orderByRaw('sorting asc')->limit(4)->get();
    return response()->json([$query, 200]);
    }

    public function view_download($post_id) {
        // dd($req);
        $post = Osotsapa_sd_admin_upload::find($post_id);
        $id = $post->id;
        // dd($post->id);
        $todownload = $post->download +1;
        Osotsapa_sd_admin_upload::where('id',$id)->update([
            // 'admin_id' => $request->input('admin_id'),
            'download' => $todownload,
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        return view('site.social.occupational-health-safety.index');
    }
}