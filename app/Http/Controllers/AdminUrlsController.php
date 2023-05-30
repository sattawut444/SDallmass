<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin_urls;
use App\Models\Osotsapa_sd_admin_upload;
class AdminUrlsController extends Controller
{

    public function add(Request $request) {
        // dd($req);
        $data['category'] = $request->input('category');
        $data['type'] = $request->input('type');
        // $post = Osotsapa_sd_admin_upload::find($posts);
        return view('admin.set_tool.add_url', $data);
    }
    public function add_performance() {
        // dd($req);
        // $post = Osotsapa_sd_admin_upload::find($posts);
        return view('admin.set_tool.add_performance');
    }
    // DETAIL Governance ->paginate($limit_page, '*', 'page', $page)
    public function DetailGovernance(Request $req) {
        $order_by = $req->input('order_by');
        $limit_page = $req->input('limitpage');
        $limit_data = $req->input('limit_data');
        $type = $req->input('type');
        $page = $req->input('page');
        $order_by = $order_by ? $order_by : 'DESC';
        $query = Osotsapa_sd_admin_upload::where(['category'=>$req->category,'type'=>$req->type])->orderByRaw('sorting desc')->get();
    return response()->json([$query, 200]);
    }
    // CREATE URL.. $query = Osotsapa_sd_admin_upload::orderByRaw('updated_at desc')
    public function CreateUrl(Request $req) {
        // dd($req);
        $insert = new Osotsapa_sd_admin_upload;
        $insert->admin_id = $req->input('id');
        $insert->name = $req->input('name');
        $insert->url = $req->input('url');
        $insert->type = $req->input('type');
        $insert->category = $req->input('category');
        $insert->sorting = '1';
        $insert->status = '1';
        $insert->created_at = date("Y-m-d H:i:s");
        $insert->updated_at = date("Y-m-d H:i:s");
        $insert->save();
        $status['success'] = array();
        $status['dashboard'] = array();
        $status['status'] = 'success';
        $status['dashboard'] = '/governance';
        return response()->json([$status,200]);
    }
    // CREATE URL.. $query = Osotsapa_sd_admin_upload::orderByRaw('updated_at desc')
    public function edit($post_id) {
        // dd($req);
        $post = Osotsapa_sd_admin_upload::find($post_id);
        return view('admin.set_tool.edit_policy', compact('post'));
    }

        // Update URL..
        public function UpdateUrl(Request $request) {
            // dd($request);
            $id = $request->input('id');
            $name = $request->input('name');
            Osotsapa_sd_admin_upload::where('id',$id)->update([
            // 'admin_id' => $request->input('admin_id'),
            'name' => $name,
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        $status['success'] = array();
        $status['link'] = array();
        $status['status'] = 'success';
        $status['link'] = '/governance';
        return response()->json($status, 200);
    }

    
        // Delete URL..
        public function delete($post_id) {
            $post = Osotsapa_sd_admin_upload::find($post_id);
            return view('admin.set_tool.delete', compact('post'));
        }
        public function DeleteUrl(Request $request)
    {
        $id = $request->input('id');
        $status = array();
        Osotsapa_sd_admin_upload::where('id', $id)->delete();
        $status['status'] = 'success';
        $status['link'] = $request->category;
        return response()->json($status, 200);
    }




    public function sorting(Request $request)
    {
        // dd($request->e[1]);
        if($request->e[1] == 'up'){
        $id1 = Osotsapa_sd_admin_upload::find($request->e[0]);
        $max = Osotsapa_sd_admin_upload::where('type',$id1->type)->orderByRaw('sorting desc')->limit(1)->get();
        if( $id1->sorting < $max[0]->sorting){
            $sorting_up = $id1->sorting +1;
        $id2 = Osotsapa_sd_admin_upload::where(['sorting'=>$sorting_up,'type'=>$max[0]->type])->get();
        Osotsapa_sd_admin_upload::where('id',$id1->id)->update([
            'sorting' => $id2[0]->sorting,
        ]);
        Osotsapa_sd_admin_upload::where('id',$id2[0]->id)->update([
            'sorting' => $id1->sorting,
        ]);
        return response()->json('success', 200);
        }
        return response()->json('success', 200);

        } elseif($request->e[1] == 'dow'){
        $id1 = Osotsapa_sd_admin_upload::find($request->e[0]);
        $min = Osotsapa_sd_admin_upload::where('type',$id1->type)->orderByRaw('sorting asc')->limit(1)->get();
        if( $id1->sorting > $min[0]->sorting){
            $sorting_dow = $id1->sorting -1;
        $id2 = Osotsapa_sd_admin_upload::where(['sorting'=>$sorting_dow,'type'=>$min[0]->type])->get();
        Osotsapa_sd_admin_upload::where('id',$id1->id)->update([
            'sorting' => $id2[0]->sorting,
        ]);
        Osotsapa_sd_admin_upload::where('id',$id2[0]->id)->update([
            'sorting' => $id1->sorting,
        ]);
        return response()->json('success', 200);
        }
        return response()->json('success', 200);
        }else{
        return response()->json('error', 200);
        }
    }
}