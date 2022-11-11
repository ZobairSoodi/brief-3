<?php

namespace App\Http\Controllers;

use App\Models\Apprenant;
use Illuminate\Http\Request;
use App\Models\promotion;
use Illuminate\Contracts\View\View;

class MainController extends Controller
{
    //

    public function index()
    {
        $data = promotion::all();
        return view('promotion/index', compact("data"));
    }

    public function add_promotion()
    {
        return view('promotion/add_promotion');
    }

    public function insert_promotion(Request $req)
    {
        $obj = new promotion();
        $obj->nom = $req->nom;
        $obj->save();
        return redirect('promotions');
    }

    public function edit_promotion($id)
    {
        $data = promotion::where('id', $id)->first();
        $assigned_briefs = [];
        $data->apprenants;
        foreach ($data->apprenants as $appr) {
            $assigned_briefs[] = $appr->briefs;
        }
        $briefs = collect($assigned_briefs)->unique('pivot');

        // return $data;
        $prom = promotion::all();
        return view('promotion/edit_promotion', compact("data", "prom", "briefs"));
    }

    public function update_promotion($id, Request $req)
    {
        $promo = promotion::where('id', $id)->first();
        $promo->nom = $req->nom;
        $promo->save();
        return redirect("promotion/$id/edit");
    }

    public function delete_promotion(Request $req)
    {
        promotion::where('id', $req->id)->delete();
        return redirect('promotions');

        // $data = promotion::where('id', $req->id)->first()->apprenants;
        // return $data;
    }

    public function show_appr_by_prom($id)
    {
        // $prom = promotion::where('id', $id)->first();
        $appr = Apprenant::select(
            'promotions.id as id_prom',
            'apprenants.id as id_apppr',
            'promotions.nom as nom_prom',
            'apprenants.nom as nom_appr'
        )
            ->rightJoin('promotions', 'promotions.id', '=', 'apprenants.promo_id')
            ->where('promotions.id', $id)
            ->get();
        return view('apprenant/appr_by_prom', compact('appr'));
    }

    public function search_prom($name = "")
    {
        $data = promotion::where('nom', 'like', '%' . $name . '%')->get();
        return view('promotion/search_prom', compact('data'));
    }
}
