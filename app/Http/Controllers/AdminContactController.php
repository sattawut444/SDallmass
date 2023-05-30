<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Osotspa_sd_contact;


class AdminContactController extends Controller
{
    // Contact
    public function Contact_all(Request $req) {
        $limit_data = $req->input('limit_data');
        $query = Osotspa_sd_contact::all();
        
    return response()->json([$query, 200]);
    }
    public function contact_betail($post_id) {
        $post = Osotspa_sd_contact::find($post_id);
        return view('admin.contact.detail',compact('post'));
    }
    public function contact_delete($post_id) {
        $id = $post_id;
        Osotspa_sd_contact::where('id', $id)->delete();
        return view('admin.contact.detail');
    }
    
}