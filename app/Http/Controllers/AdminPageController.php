<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Osotsapa_sd_admin;
use App\Models\Admin_group;
use App\Models\Osotsapa_sd_admin_upload;
use App\Models\Admin_menu;

// --------------------- FILE ----------------------------
class AdminPageController extends Controller
{
    public function create_pdf(Request $request) {
        $data['category'] = $request->input('category');
        $data['type'] = $request->input('type');
        return view('admin.veryo.create_pdf', $data);
    }

public function update_file($post_id) {
    $post = Osotsapa_sd_admin_upload::find($post_id);
    return view('admin.veryo.edit_file', compact('post'));
}
// Test ------------------------
public function test($result) {
    $post = $this->admin($result);
    return view('components/menu',compact('post'));
}
public function test2($result) {
    // $post = $this->admin($result);
    dd($result);
    return view('admin/governance/aniti_bribery_and_corruption/index',compact('post'));
}
// --------------------- ADMIN ----------------------------
public function edit_admin($post_id) {
    $post = Admin_group::leftJoin('osotsapa_sd_admins', 'admin_groups.id', '=', 'osotsapa_sd_admins.role')->where('osotsapa_sd_admins.id',$post_id)
    ->select(
        'osotsapa_sd_admins.*',
        'admin_groups.id as group_id',
        'admin_groups.name as group'
    )->get();
   
    // dd($post[0]);

    return view('admin.veryo.edit_admin_user',compact('post'));
}
// *****************************
public function post_menu($post_id) {
    $posts = Osotsapa_sd_admin::find($post_id);
    $post = Osotsapa_sd_admin::leftJoin('admin_groups', 'osotsapa_sd_admins.role', '=', 'admin_groups.id')
    ->leftJoin('admin_menus', 'admin_groups.vition_group', '=', 'admin_menus.id')
    ->where('osotsapa_sd_admins.id',$posts->id)
    ->select(
        'osotsapa_sd_admins.*',
        'admin_groups.id as group_id',
        'admin_groups.name as group',
        'admin_groups.description',
        'admin_groups.vition_group',
        'admin_menus.*'
    )->get();
    // dd($post[0]->id);
    // return view('admin.governance.aniti_bribery_and_corruption.index',compact('post'));
    return $post;
}
public function admin_group($post_id) {
    // $post = Admin_group::find($post_id);
    $post = Admin_group::leftJoin('admin_menus', 'admin_groups.vition_group', '=', 'admin_menus.id')
    ->where('admin_groups.id',$post_id)
    ->select(
        'admin_groups.id as group_id',
        'admin_groups.name',
        'admin_groups.description',
        'admin_groups.status',
        'admin_menus.*',
    )->get();
    
    return view('admin.veryo.edit_admin_group', compact('post'));
}
public function delete_admin_user($post_id) {
    
    $post = Osotsapa_sd_admin::find($post_id);
    // dd($post);
    return view('admin.veryo.delete', compact('post'));
}

public function delete_admin_group($post_id) {
    
    $post = Admin_group::find($post_id);
    // dd($post);
    return view('admin.veryo.delete_group',compact('post'));
}

}