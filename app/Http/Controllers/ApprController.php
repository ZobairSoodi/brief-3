<?php

namespace App\Http\Controllers;

use App\Models\Apprenant;
use App\Models\promotion;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ApprController extends Controller
{
    //
    function add_appr(Request $req, $id_promo)
    {
        $new_appr = new Apprenant();
        $new_appr->nom = $req->nom;
        $new_appr->prenom = $req->prenom;
        $new_appr->email = $req->email;
        $new_appr->telephone = $req->telephone;
        $new_appr->CIN = $req->CIN;
        $new_appr->date_naissance = $req->date_naissance;
        $new_appr->parent_telephone = $req->parent_telephone;
        $new_appr->address = $req->address;
        $new_appr->filiere = $req->filiere;

        $new_appr->promo_id = $id_promo;
        $new_appr->save();
        return redirect("promotion/$id_promo/edit");
    }

    function update_appr(Request $req, $id_appr)
    {
        $appr = Apprenant::find($id_appr);
        $appr->nom = $req->nom_e;
        $appr->prenom = $req->prenom_e;
        $appr->email = $req->email_e;
        $appr->telephone = $req->telephone_e;
        $appr->CIN = $req->CIN_e;
        $appr->date_naissance = $req->date_naissance_e;
        $appr->parent_telephone = $req->parent_telephone_e;
        $appr->address = $req->address_e;
        $appr->filiere = $req->filiere_e;

        $appr->promo_id = $req->id_promo_e;
        $appr->save();
        return redirect(route('edit-promotion', ['id' => $req->id_promo_e]));
    }

    function edit_appr($id_appr)
    {
        $data = Apprenant::select(
            'promotions.id as id_prom',
            'apprenants.id as id_appr',
            'promotions.nom as nom_prom',
            'apprenants.nom as nom_appr',
            'apprenants.prenom',
            'apprenants.email'
        )
            ->rightJoin('promotions', 'promotions.id', '=', 'apprenants.promo_id')
            ->where('apprenants.id', $id_appr)
            ->get();
        $prom = promotion::find($data[0]->id_prom)->get();
        return view('apprenant/edit_appr', compact('data', 'prom'));
    }

    function delete_appr($id_appr)
    {
        $appr = Apprenant::where('id', $id_appr)->get();
        Apprenant::where('id', $id_appr)->delete();
        return redirect(route('edit-promotion', ['id' => $appr[0]->promo_id]));
    }

    function search_appr($id, $name = ""){
        $appr = Apprenant::whereRaw("
            promo_id = $id AND (
                nom like '%$name%' OR
                prenom like '%$name%' OR
                email like '%$name%'
            )
        ")->get();
        return view('apprenant/search_appr', compact('appr'));
    }

    
    public function get_appr($id)
    {
        $data = Apprenant::where('id', $id)->get();
        return $data;
    }
}
