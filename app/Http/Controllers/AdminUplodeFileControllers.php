<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Osotsapa_sd_admin_upload;

class AdminUplodeFileControllers extends Controller
{
    //

    function file_upload(Request $request)
    {

        if ($request->name != null) {
            $files = $request->file('file_upload');
            if($files == null){
                return response()->json(-2, 200);
            }
            // dd($request->name);
            $data_sorting = 0;
            $uniqueFileName = uniqid();
            $getClientOriginalName = $files->getClientOriginalName();
            $getClientMimeType = $files->getClientMimeType();
            $getClientSize = $files->getSize();
            $getExtension = $files->extension();
            $newFile = date("Y-m-d H:i:s");
            $newFile = md5($newFile . $uniqueFileName . $getClientOriginalName) . '.' . $getExtension;
            $files->move(public_path('uploads/'), $newFile);

            $query = Osotsapa_sd_admin_upload::where('type', $request->type)->orderByRaw('sorting desc')->limit(1)->get();
            // dd($query->count());
            if ($getExtension == 'pdf') {
                if ($query->count() == 0) {
                    $data_sorting = 1;
                    $insert = new Osotsapa_sd_admin_upload;
                    $insert->admin_id = $request->id;
                    $insert->name = $request->name;
                    $insert->type = $request->type;
                    $insert->category = $request->category;
                    $insert->file_name = $newFile;
                    $insert->path = $files;
                    $insert->status = '1';
                    $insert->sorting = $data_sorting;
                    $insert->file_type = $getClientMimeType;
                    $insert->file_size = $getClientSize;
                    $insert->file_format = $getExtension;
                    $insert->created_at = date("Y-m-d H:i:s");
                    $insert->updated_at = date("Y-m-d H:i:s");
                    $insert->save();
                    return response()->json(['status' => 'success'], 200);
                } else
                    $data_sorting = $query[0]->sorting + 1;
                $insert = new Osotsapa_sd_admin_upload;
                $insert->admin_id = $request->id;
                $insert->name = $request->name;
                $insert->type = $request->type;
                $insert->category = $request->category;
                $insert->file_name = $newFile;
                $insert->path = $files;
                $insert->status = '1';
                $insert->sorting = $data_sorting;
                $insert->file_type = $getClientMimeType;
                $insert->file_size = $getClientSize;
                $insert->file_format = $getExtension;
                $insert->created_at = date("Y-m-d H:i:s");
                $insert->updated_at = date("Y-m-d H:i:s");
                $insert->save();
                return response()->json(['status' => 'success'], 200);
            } else
                return response()->json(0, 200);
        } else
            return response()->json(-1, 200);
    }


    public function update($post_id)
    {
        // dd($req);
        $post = Osotsapa_sd_admin_upload::find($post_id);
        return view('admin.set_tool.edit_file', compact('post'));
    }
    public function add_actionplan($request)
    {
        // dd($req);
        $admin_past = new AdminPageController;
        $post = $admin_past->admin($request);
        // $post = Osotsapa_sd_admin_upload::find($post_id);
        return view('admin.set_tool.add_actionplan');
    }
    // Update file..
    public function update_file(Request $request)
    {

            $id = $request->ids;
            $name = $request->name;
            $files = $request->file('file_upload');
        if ($request->name != null) {
            // dd($request);
            if($files == null){
                Osotsapa_sd_admin_upload::where('id', $id)->update([
                    // 'admin_id' => $request->input('admin_id'),
                    'name' => $name,
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
                $status['success'] = array();
                $status['status'] = 'success';
                $status['category'] = $request->category;
                $status['type'] = $request->type;
                return response()->json($status, 200);
            }
            $uniqueFileName = uniqid();
            $getClientOriginalName = $files->getClientOriginalName();
            $getClientMimeType = $files->getClientMimeType();
            $getClientSize = $files->getSize();
            $getExtension = $files->extension();
            $newFile = date("Y-m-d H:i:s");
            $newFile = md5($newFile . $uniqueFileName . $getClientOriginalName) . '.' . $getExtension;
            $files->move(public_path('uploads/'), $newFile);
            // dd($getExtension);
            
            if ($getExtension == 'pdf') {
                Osotsapa_sd_admin_upload::where('id', $id)->update([
                    // 'admin_id' => $request->input('admin_id'),
                    'name' => $name,
                    'file_name' => $newFile,
                    'file_size' => $getClientSize,
                    'file_type' => $getClientMimeType,
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
                $status['success'] = array();
                $status['status'] = 'success';
                $status['category'] = $request->category;
                $status['type'] = $request->type;
                return response()->json($status, 200);
            } else {
                return response()->json(0, 200);
            }
        }
        else{
            return response()->json(-1, 200);

        }
    }
}
