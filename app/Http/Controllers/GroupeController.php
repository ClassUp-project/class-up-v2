<?php

namespace App\Http\Controllers;
use App\Groupe;
use App\Professeur;
use App\Eleve;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    public function __construct()
      {
         $this->middleware('auth');
      }


      public function create(){


        return view('choix-classe.create');

    }



    public function store(Request $request){


        $profId = Professeur::find(1);

        $groupeClasse = new Groupe;
        $groupeClasse->nom = $request->nom;
        $groupeClasse->acronyme = $request->acronyme;

        $groupeClasse->save();

        $groupeClasse->professeur()->attach($profId);


        return redirect('/maclasses/'.$groupeClasse->idgroupe);

    }



    public function show(Groupe $groupeClasse){



        return view('choix-classe.show', compact('groupeClasse'));
    }











}
