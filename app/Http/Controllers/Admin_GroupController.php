<?php

namespace App\Http\Controllers;

use App\Models\Admin_group;
use App\Models\Admin_menu;
use Illuminate\Http\Request;

class Admin_GroupController extends Controller
{
    // Admin groups
    public function admin_groups(Request $request) {
        $query = Admin_group::all();
        // dd($query);
        return response()->json([$query, 200]);
    }
// Register Admin
public function register(Request $req) {
    // dd($req);
    $name = $req->input('name');
    // $description = $req->input('description');

    if($name != null ){
        
  $insert = new Admin_menu;
    $insert->aniti_bribery_and_corruption = $req->input('aniti_bribery_and_corruption');
    $insert->product_quailty_and_safety = $req->input('product_quailty_and_safety');
    $insert->sustainable_supply_chain = $req->input('sustainable_supply_chain');
    $insert->lnnovation = $req->input('lnnovation');
    $insert->tax = $req->input('tax');
    $insert->contribution_to_external_organization_and_associations = $req->input('contribution_to_external_organization_and_associations');
    $insert->consumer_health = $req->input('consumer_health');
    $insert->human_capital = $req->input('human_capital');
    $insert->healthy = $req->input('healthy');
    $insert->human_right = $req->input('human_right');
    $insert->ethical_marketing = $req->input('ethical_marketing');
    $insert->sustainable_packaging = $req->input('sustainable_packaging');
    $insert->energy_climate = $req->input('energy_climate');
    $insert->water_wastewater = $req->input('water_wastewater');
    $insert->waste_manangement = $req->input('waste_manangmement');
    $insert->policy_document = $req->input('policy_document');
    $insert->admin_all = $req->input('admin_all');
    $insert->admin_group = $req->input('admin_group');
    $insert->created_at = date("Y-m-d H:i:s");
    $insert->updated_at = date("Y-m-d H:i:s");
    $insert->save();
       $query = Admin_menu::orderByRaw('id desc')->get();
    $insert = new Admin_group;
    $insert->name = $req->input('name');
    $insert->description = $req->input('description');
    $insert->status = $req->input('status');
    $insert->vition_group = $query[0]->id;
    $insert->save();
    return response()->json([1,200]);  
    
    }
    else
       return response()->json([0,200]);  
     
}
public function delete(Request $request) {
    $id = $request->input('id');
    Admin_group::where('id', $id)->delete();
    return response()->json('success', 200);
}
}