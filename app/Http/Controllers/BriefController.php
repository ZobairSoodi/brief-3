<?php

namespace App\Http\Controllers;

use App\Models\Apprenant;
use App\Models\Brief;
use App\Models\briefStudent;
use App\Models\promotion;
use Illuminate\Http\Request;

class BriefController extends Controller
{
    function show_briefs()
    {
        $data = Brief::all();
        return view("brief/briefs", compact('data'));
    }

    function get_brief($id_brief){
        $brief = Brief::where("id_brief", $id_brief)->first();
        return [$brief];
    }

    function add_brief(Request $req)
    {
        $brief = new Brief();
        $brief->title_brief = $req->title_brief;
        $brief->descrip_brief = $req->descrip_brief;
        $brief->date_from = $req->date_from;
        $brief->date_to = $req->date_to;
        $brief->save();
        return redirect("");
    }

    function edit_brief(Request $req, $id_brief)
    {
        $brief = Brief::where("id_brief", $id_brief)->first();
        $brief->title_brief = $req->title_brief;
        $brief->descrip_brief = $req->descrip_brief;
        $brief->date_from = $req->date_from;
        $brief->date_to = $req->date_to;
        if($brief->save()){
            return "success";
        }
        return "error";
    }

    function delete_brief($id_brief)
    {
        $brief = Brief::where("id_brief", $id_brief)->first();
        $brief->delete();
        return redirect(route('briefs'));
    }

    function show_assign_brief($id_brief)
    {
        $data = Apprenant::all();
        foreach ($data as $appr) {
            $appr->has_brief = false;
            $appr->briefs;
            foreach ($appr->briefs as $brief) {
                if($brief->id_brief == $id_brief){
                    $appr->has_brief = true;
                }
            }
        }
        $prom = promotion::all();
        return view("brief/brief_assign", compact("data", "id_brief", "prom"));
        // return $data;
    }

    function assign_brief($id_brief, $id_appr)
    {
        $appr = Apprenant::where("id", $id_appr)->first();
        $appr->briefs()->attach($id_brief);
        return redirect(route('show-assign-brief', ['id_brief'=>$id_brief]));
    }

    function unassign_brief($id_brief, $id_appr)
    {
        $appr = Apprenant::where("id", $id_appr)->first();
        $appr->briefs()->detach($id_brief);
        return redirect(route('show-assign-brief', ['id_brief'=>$id_brief]));
    }

    function assign_brief_all($id_brief){
        $appr = Apprenant::all();
        foreach ($appr as $row) {
            if(!$row->briefs()->exists()){
                $row->briefs()->attach($id_brief);
            }
        }
        return redirect(route('show-assign-brief', ['id_brief'=>$id_brief]));
    }
}
