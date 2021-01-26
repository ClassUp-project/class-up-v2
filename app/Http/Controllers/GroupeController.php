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


      public function create(Professeur $idProf){


        return view('choix-classe.create', compact('idProf'));

    }



    public function store(){


        $groupeClasse = new Groupe;

        $profId = Professeur::find('idprofesseur');


        $groupeClasse->save();

        $groupeClasse->professeur()->attach($profId);

        return redirect('/maclasses/'.$groupeClasse->idgroupe);

    }



    public function show(Groupe $groupeClasse){

        

        return view('choix-classe.show', compact('groupeClasse'));
    }











}
