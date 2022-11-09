<?php

namespace App\Http\Controllers;

use App\Models\Apprenant;
use App\Models\Brief;
use App\Models\briefStudent;
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
        $appr = Apprenant::all();
        return view("", compact("appr", "id_brief"));
    }

    function assign_brief($id_brief, $id_appr)
    {
        $row = briefStudent::where("id_brief", $id_brief)->where("id_appr", $id_appr)->first();
        if (count($row) > 0) {
            $row->delete();
            return redirect("");
        } else {
            $obj = new briefStudent();
            $obj->id_brief = $id_brief;
            $obj->id_appr = $id_appr;
            return redirect("");
        }
    }

    // Alternative function to assign_brief
    function assign_brief_alt($id_brief, $id_appr, $arg)
    {
        if ($arg == "add") {
            $row = new briefStudent();
            $row->id_brief = $id_brief;
            $row->id_appr = $id_appr;
            $row->save();
            return redirect("");
        } else if ($arg == "remove") {
            $row = briefStudent::where("id_brief", $id_brief)->where("id_appr", $id_appr);
            $row->delete();
            return redirect("");
        }
    }
}
